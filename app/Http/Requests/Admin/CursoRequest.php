<?php

namespace App\Http\Requests\Admin;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class CursoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /** @var Curso $curso */
        $curso = $this->route('curso');

        if($this->isMethod('POST')){
            return Gate::allows('create', Curso::class);
        }

        if($this->isMethod('PATCH') || $this->isMethod('PUT')){
            return Gate::allows('update', $curso);
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }
}
