<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CursoRequest;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Create the controller instance.
     */
    public function __construct()
    {
        $this->authorizeResource(Curso::class, 'curso');
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
     * @param Curso $curso
     * @return Application|Factory|View
     */
    public function show(Curso $curso) : View|Factory|Application
    {
        return view('admin.cursos.show', [
            'curso' => $curso
        ]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create(Request $request) : View|Factory|Application
    {
        return view('admin.cursos.create');
    }

    /**
     * @param CursoRequest $request
     * @return RedirectResponse
     */
    public function store(CursoRequest $request) : RedirectResponse
    {

        $user = new Curso($request->all());
        $user->save();

        session()->flash('success', 'Curso añadido');

        return redirect()->route('admin.cursos.index');
    }

    /**
     * @param Curso $curso
     * @param Request $request
     * @return View|Factory|Application
     */
    public function edit(Curso $curso, Request $request) : View|Factory|Application
    {
        return view('admin.cursos.edit', [
            'curso' => $curso,
        ]);
    }

    /**
     * @param Curso $curso
     * @param CursoRequest $request
     * @return RedirectResponse
     */
    public function update(Curso $curso, CursoRequest $request) : RedirectResponse
    {
        $curso->update($request->all());

        session()->flash('success', $curso->name . ' actualizado');

        return redirect()->route('admin.cursos.index');
    }

    /**
     * @param Curso $curso
     * @return View|Factory|Application
     */
    public function delete(Curso $curso) : View|Factory|Application
    {
        $this->authorize('delete', $curso);

        return view('admin.cursos.delete', [
            'curso' => $curso,
        ]);
    }

    /**
     * @param Curso $curso
     * @return RedirectResponse
     */
    public function destroy(Curso $curso) : RedirectResponse
    {
        $name = $curso->name;

        $curso->delete();

        session()->flash('success', $name . ' eliminado');

        return redirect()->route('admin.cursos.index');
    }

    /**
     * @param Curso $curso
     * @param User $user
     * @return RedirectResponse
     */
    public function accept(Curso $curso, User $user) : RedirectResponse
    {
        $name = $user->name;

        $curso->users()->updateExistingPivot($user->id, [
            'approved' => true
        ]);

        $user->delete();

        session()->flash('success', 'invitación aceptado' . $name);

        return redirect()->route('admin.cursos.show', $curso);
    }

    /**
     * @param Curso $curso
     * @param User $user
     * @return RedirectResponse
     */
    public function reject(Curso $curso, User $user) : RedirectResponse
    {
        $name = $user->name;

        $curso->users()->detach($curso->id);

        $user->delete();

        session()->flash('success', 'invitación eliminado' . $name);

        return redirect()->route('admin.cursos.show', $curso);
    }

}
