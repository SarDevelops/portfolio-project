<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
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
            'sub_title' => 'required|string|max:255',
            'slug'      => 'required|string|unique:blogs,slug|max:255',
            'content'   => 'required|string',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author'    => 'nullable|string|max:255',
            'tags'      => 'nullable|string|max:255',
        ];

    }
}