<?php

namespace App\Http\Requests\Admin;

use App\Models\Account;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /** @var Account $account */
        $account = $this->route('account');

        if($this->isMethod('POST')){
            return Gate::allows('create', Account::class);
        }

        if($this->isMethod('PATCH') || $this->isMethod('PUT')){
            return Gate::allows('update', $account);
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|required|min:2',
            'zohocrm_id' => 'nullable',
            'approver_email' => 'nullable|email',
            'users' => 'array',
        ];
    }
}
