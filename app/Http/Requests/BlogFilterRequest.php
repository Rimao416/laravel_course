<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>['required','min:4'],
            'slug'=>['required','regex:/^[a-z0-9-]+$/i'],
        ];
    }
//    Un peu comme pre-save dans nodejs
    protected function prepareForValidation()
    {
        $this->merge([
            'slug'=>str($this->slug)->slug(),
        ]);
    }
}
