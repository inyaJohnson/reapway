<?php

namespace App\Http\Requests;

use App\Account;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingsRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => Rule::unique('users')->ignore(auth()->user()->id, 'id'),
            'phone' => ['required', 'digits:11'],
            'account_name' => ['required', 'string', 'max:255'],
            'bank' => ['required', 'string', 'max:255'],
            'account_number' => ['required', 'digits:10']
        ];
    }
}
