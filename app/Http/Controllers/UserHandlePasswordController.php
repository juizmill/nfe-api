<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Jobs\SendEmailResetPassword;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendEmailRecoverPassword;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\RecoverPasswordRequest;
use App\Http\Requests\UserUpdatePasswordRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserHandlePasswordController extends Controller
{
    public function update(UserUpdatePasswordRequest $request, $id)
    {
        try {
            $user = User::query()->with(['roles'])->findOrFail($id);
            $data = $request->only(['password']);
            $data['password'] = Hash::make($data['password']);

            $user->update($data);

            return response()->json($user, Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_UPDATE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function recoverPassword(RecoverPasswordRequest $request)
    {
        try {
            $data = $request->only(['email']);

            $user = User::query()->where('email', '=', $data['email'])->first();
            $user->update(['token' => uniqid(Str::random())]);

            SendEmailRecoverPassword::dispatch($user)->onQueue('recover.password');

            return response()->json('Para continuar confirme no email!', Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_SHOW, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        try {
            $data = $request->only(['password', 'token']);

            $user = User::query()->where('token', '=', $data['token'])->first();

            $user->update([
                'password' => Hash::make($data['password']),
                'token' => null
            ]);

            SendEmailResetPassword::dispatch($user)->onQueue('reset.password');

            return response()->json('Senha atualizada com sucesso!', Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_SHOW, Response::HTTP_NOT_ACCEPTABLE);
        }
    }
}
