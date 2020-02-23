<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class RoleRequest extends BaseFormRequest
{
    public function rules(Request $request): array
    {
        $rules = [
            'name' => 'required|max:100|min:2|unique:roles,name'
        ];

        if ($request->method() == Request::METHOD_PUT) {
            $id = Request::instance()->id;
            $rules['name'] = sprintf('%s,%s,id', $rules['name'], $id);
        }

        return $rules;
    }
}
