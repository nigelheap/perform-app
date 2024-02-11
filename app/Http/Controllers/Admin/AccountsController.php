<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AccountRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Account;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountsController extends Controller
{

    /**
     * Create the controller instance.
     */
    public function __construct()
    {
        $this->authorizeResource(Account::class, 'account');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(Request $request)
    {
        $accounts = Account::orderBy('name')
            ->withCount('users', 'listings')
            ->search($request->get('search'))
            ->paginate(50);

        return view('admin.accounts', [
            'accounts' => $accounts,
        ]);
    }

    /**
     * @param Account $account
     * @param Request $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(Account $account, Request $request)
    {
        $account->load(['users', 'listings']);

        return view('admin.accounts.show', [
            'account' => $account,
        ]);
    }


    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create(Request $request) : View|Factory|Application
    {
        return view('admin.accounts.create');
    }

    /**
     * @param AccountRequest $request
     * @return RedirectResponse
     */
    public function store(AccountRequest $request) : RedirectResponse
    {
        $data = $request->except(['listings', 'zohocrm', 'users']);
        $data['zohocrm_id'] = $request->input('zohocrm.id');
        $data['zohocrm_name'] = $request->input('zohocrm.name');

        $account = new Account($data);
        $account->save();
        $account->users()->sync($request->get('users'));

        session()->flash('success', $account->name . ' added');

        return redirect()->route('admin.accounts.index');
    }


    public function edit(Account $account, Request $request) : View|Factory|Application
    {
        return view('admin.accounts.edit', [
            'account' => $account,
        ]);
    }

    /**
     * @param Account $account
     * @param AccountRequest $request
     * @return RedirectResponse
     */
    public function update(Account $account, AccountRequest $request) : RedirectResponse
    {
        $data = $request->except(['listings', 'zohocrm', 'users']);
        $data['zohocrm_id'] = $request->input('zohocrm.id');
        $data['zohocrm_name'] = $request->input('zohocrm.name');


        $account->update($data);
        $account->users()->sync($request->get('users'));

        session()->flash('success', $account->name . ' updated');

        return redirect()->route('admin.accounts.index');

    }


    public function delete(Account $account) : View|Factory|Application
    {
        $this->authorize('delete', $account);

        return view('admin.accounts.delete', [
            'account' => $account,
        ]);
    }


    public function destroy(Account $account) : RedirectResponse
    {
        $name = $account->name;

        $account->delete();

        session()->flash('success', $name . ' deleted');

        return redirect()->route('admin.accounts.index');
    }

}
