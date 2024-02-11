@inject('accountRepository', 'App\Repositories\AccountRepository')
<div class="sm:flex gap-4">
    <label for="account" class="block text-sm font-medium leading-6 text-gray-900 sr-only">Account</label>
    <div class="relative flex items-center">
        <select
               name="account"
               id="account"
               class="block w-full md:w-64 rounded-md border-0 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-region-forest sm:text-sm sm:leading-6"
        >
            <option value="">-- account --</option>
            @foreach($accountRepository->allByName() as $account)
                <option value="{{ $account->id }}" {{ request()->get('account') == $account->id ? 'selected' : '' }}>{{ $account->name }}</option>
            @endforeach
        </select>
    </div>
</div>
