<?php

namespace App\Http\Controllers;

use App\Transport;
use Illuminate\Http\Request;
use App\Service\MaterialTable;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\TransportRequest;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransportController extends Controller
{
    public function index(Request $request)
    {
        $transports = (new MaterialTable($request, $this->transportBuilder()))
            ->setColumns(['xNome', 'xMun', 'CPFCNPJ', 'created_at'])
            ->pagination();

        return response()->json($transports);
    }

    public function store(TransportRequest $request)
    {
        try {
            $data = $request->only([
                'xNome',
                'IE',
                'xEnder',
                'xMun',
                'UF',
                'CPFCNPJ',
                'type',
            ]);

            $data['user_id'] = auth('api')->user()->id;
            $transport = Transport::query()->create($data);

            return response()->json($transport, Response::HTTP_CREATED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_STORE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function show($id)
    {
        try {
            $transport = $this->transportBuilder()->findOrFail($id);
            return response()->json($transport, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_SHOW, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(TransportRequest $request, $id)
    {
        try {
            $transport = $this->transportBuilder()->findOrFail($id);
            $data = $request->only([
                'xNome',
                'IE',
                'xEnder',
                'xMun',
                'UF',
                'CPFCNPJ',
                'type',
            ]);

            $data['user_id'] = auth('api')->user()->id;
            $transport->update($data);

            return response()->json($transport, Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_UPDATE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function destroy($id)
    {
        try {
            $transport = $this->transportBuilder()->findOrFail($id);
            $transport->delete();

            return response()->json($transport, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_DESTROY, Response::HTTP_NOT_FOUND);
        }
    }

    protected function transportBuilder(): Builder
    {
        $user = auth('api')->user();
        return Transport::query()
            ->where('user_id', '=', $user->id);
    }
}
