<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /** @var User $user */
        $user = $this->route('user');

        if($this->isMethod('POST')){
            return Gate::allows('create', User::class);
        }

        if($this->isMethod('PATCH') || $this->isMethod('PUT')){
            return Gate::allows('update', $user);
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $validation = [
            'first_name'    => 'required|min:1',
            'last_name'     => 'required|min:1',
            'email'         => 'required|email',
            'accounts'      => 'array',
        ];

        if($this->user()->isSuper()){
            $validation['role'] = 'required';
        }

        if($this->isMethod('POST')){
            $validation['email'] = 'required|email|unique:users';
        }

        if($this->exists('password') && !empty($this->get('password'))){
            $validation['password'] = 'required|confirmed|min:6';
        }

        return $validation;
    }
}
