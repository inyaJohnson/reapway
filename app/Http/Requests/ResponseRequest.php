<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResponseRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required',
            'copy' => 'string',
            'attachment' => 'mimes:png,jpg,jpeg,svg,mp3,mp4,docs,odt,xlx,xls,csv,ods,pdf|max:2048',
            'help_id' => 'required'
        ];
    }
}
