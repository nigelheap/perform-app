<?php

namespace App\Http\Controllers\Admin;

use App\Enumeration\UserRoles;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CursosController extends Controller
{
    /**
     * Create the controller instance.
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * @param Request $request
     * @return View|Factory|Application
     */
    public function index(Request $request) : View|Factory|Application
    {
        $cursos = Curso::withCount('users')
            ->orderBy('name')
            ->search($request->get('search'))
            ->paginate(50)
            ->withQueryString();

        return view('admin.cursos', [
            'cursos' => $cursos,
        ]);
    }


    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user) : View|Factory|Application
    {
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create(Request $request) : View|Factory|Application
    {
        return view('admin.users.create');
    }

    /**
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request) : RedirectResponse
    {
        $data = $request->except(['password_confirmation']);
        $data['password'] = Hash::make($data['password']);

        if(!$request->user()->isSuper()){
            $data['role'] = UserRoles::USER->value;
        }

        $user = new User($data);
        $user->save();
        $user->accounts()->sync($request->get('accounts'));
        $user->forceFill([
            'remember_token' => Str::random(60),
        ])->save();

        session()->flash('success', 'User Added');

        return redirect()->route('admin.cursos.index');
    }

    /**
     * @param User $user
     * @param Request $request
     * @return View|Factory|Application
     */
    public function edit(User $user, Request $request) : View|Factory|Application
    {
        return view('admin.cursos.edit', [
            'user' => $user,
        ]);
    }

    /**
     * @param User $user
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function update(User $user, UserRequest $request) : RedirectResponse
    {
        $data = $request->except(['password', 'password_confirmation']);
        $user->update($data);

        $user->accounts()->sync($request->get('accounts'));

        if($request->has('password')){
            $user->forceFill([
                'password' => Hash::make($request->get('password')),
                'remember_token' => Str::random(60),
            ])->save();
        }

        session()->flash('success', $user->name . ' updated');

        return redirect()->route('admin.cursos.index');
    }


    public function delete(User $user) : View|Factory|Application
    {
        $this->authorize('delete', $user);

        return view('admin.cursos.delete', [
            'user' => $user,
        ]);
    }


    public function destroy(Curso $curso) : RedirectResponse
    {
        $name = $curso->name;

        $curso->delete();

        session()->flash('success', $curso . ' eliminado');

        return redirect()->route('admin.cursos.index');
    }




    public function accept(Curso $curso, User $user) : RedirectResponse
    {
        $name = $user->name;

        $curso->users()->updateExistingPivot($user->id, [
            'approved' => true
        ]);

        $user->delete();

        session()->flash('success', 'invitación eliminado' . $name);

        return redirect()->route('admin.cursos.show', $curso);
    }


}
