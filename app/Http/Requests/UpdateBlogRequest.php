<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'     => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'slug'      => 'required|string|max:255|unique:blogs,slug,' . $this->blog,
            'content'   => 'required|string',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author'    => 'nullable|string|max:255',
            'tags'      => 'nullable|string|max:255',
        ];

    }
}