<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'title'=>'required',
            'slug'=>'required',
            // 'published_at'=>'nullable|date_format:Y-m-d H:i:s',
            'published_at'=>'nullable',
            'excerpt'=>'required',
            'body'=>'required',
        ];
    }
}
