<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class WizardSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->isAdminOrSuper();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'features' => 'string',
            'show_facilities' => 'bool',
            'show_only' => 'nullable|array',
            'facilities_heading' => 'nullable|string',
            'facilities_description' => 'nullable|string',
            'features_heading' => 'nullable|string',
            'features_description' => 'nullable|string',
            'thank_you_heading' => 'nullable|string',
            'thank_you_page' => 'nullable|string',
        ];
    }

}
