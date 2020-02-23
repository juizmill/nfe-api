<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UserRoleRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRoleController extends Controller
{
    public function store(UserRoleRequest $request)
    {
        try {
            $user = User::query()->findOrFail($request->input('user'));
            $user->roles()->detach();
            $user->roles()->attach($request->input('roles'));

            return response()->json('Papeis adicionado com sucesso', Response::HTTP_CREATED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_UPDATE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function destroy(UserRoleRequest $request)
    {
        try {
            $user = User::query()->findOrFail($request->input('user'));
            $roles = !empty($request->input('roles')) ? $request->input('roles') : null;
            $user->roles()->detach($roles);

            return response()->json('Papeis removidos com sucesso', Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_UPDATE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }
}
