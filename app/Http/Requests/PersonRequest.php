<?php

namespace App\Http\Requests;

final class PersonRequest
{
    public static $customRoles = [
        'active' => 'required|in:1,0',
        'type' => 'required|in:J,P',
        'cell_phone' => 'max:15',
        'phone' => 'max:15',
        'email' => 'required|max:255'
    ];
}
