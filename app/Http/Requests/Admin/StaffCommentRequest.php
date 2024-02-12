<?php

namespace App\Http\Requests\Admin;

use App\Models\StaffComment;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StaffCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        /** @var StaffComment $staffComment */
        $staffComment = $this->route('staff_comment');

        if($this->isMethod('POST')){
            return Gate::allows('create', StaffComment::class);
        }

        if($this->isMethod('PATCH') || $this->isMethod('PUT')){
            return Gate::allows('update', $staffComment);
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
        return [
            'listing_id'     => 'required',
            'author_id'     => 'required',
            'tags'          => 'array',
            'categories'    => 'array',
            'facilities'    => 'array',
            'comment'       => 'required|min:3',
            'status'        => 'required|in:published,draft',
        ];
    }

}
