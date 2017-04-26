<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdherent extends FormRequest
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
        $user = User::where('email', $this->get('email'))->first();

        $email_rule = 'required|email|unique:users,email';
        if ($this->isMethod('put'))
            $email_rule .= ',' . $user->id;

        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'phone' => 'required|regex:/0[1-9][0-9]{8}/',
            'begin_adhesion' => 'required|date',
            'end_adhesion' => 'required|date',
            'contribution_id' => 'required',
            'email' => $email_rule,
        ];
    }
}
