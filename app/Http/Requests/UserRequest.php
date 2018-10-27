<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
          'user' = 'required|string|max:55|unique:users',
          'name' = 'required|string|max:255',
          'email' = 'required|string|email|max:255|unique:users',
          'password' = 'required|string|min:6|confirmed'
      ];
    }
}
