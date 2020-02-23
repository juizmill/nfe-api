<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class UserRequest extends BaseFormRequest
{
    public function rules(Request $request): array
    {
        $rules = [
            'name' => 'required|max:190|min:5',
            'email' => 'required|max:190|min:5|email|unique:users,email',
            'password' => 'required|max:190|min:5',
        ];

        if ($request->method() == Request::METHOD_PUT) {
            $id = Request::instance()->id;
            $rules['email'] = sprintf('%s,%s,id', $rules['email'], $id);
        }

        return $rules;
    }
}
