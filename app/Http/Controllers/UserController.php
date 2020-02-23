<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Service\MaterialTable;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = (new MaterialTable($request, User::query()))
            ->setColumns(['name', 'email'])
            ->pagination();

        return response()->json($users, Response::HTTP_OK);
    }

    public function store(UserRequest $request)
    {
        try {
            $data = $request->only(['name', 'email', 'password']);
            $data['password'] = Hash::make($data['password']);
            $user = User::query()->create($data);

            return response()->json($user, Response::HTTP_CREATED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_STORE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function show($id)
    {
        try {
            $user = User::query()->with(['roles', 'roles.permissions'])->findOrFail($id);
            return response()->json($user, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_SHOW, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(UserRequest $request, $id)
    {
        try {
            $user = User::query()->with(['roles'])->findOrFail($id);
            $data = $request->only(['name', 'email', 'password']);

            $user->update($data);

            return response()->json($user, Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_UPDATE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::query()->findOrFail($id);
            $user->delete();

            return response()->json($user, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_DESTROY, Response::HTTP_NOT_FOUND);
        }
    }
}
