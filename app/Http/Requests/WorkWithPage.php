<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkWithPage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        // Asa
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'url' => 'required',
            'content' => 'required|max:255'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'You must enter a title.',
            'url.required' => 'Please provide a url.',
            'content.required' => 'Content have to be must Filled and max 255 character.',
        ];
    }

}
