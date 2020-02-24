<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Service\MaterialTable;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = (new MaterialTable($request, Product::query()))
            ->setColumns(['xProd', 'NCM', 'vProd', 'created_at'])
            ->pagination();

        return response()->json($products);
    }

    public function store(ProductRequest $request)
    {
        try {
            $data = $request->only([
                'item',
                'cProd',
                'cEAN',
                'xProd',
                'NCM',
                'cBenef',
                'EXTIPI',
                'CFOP',
                'uCom',
                'qCom',
                'vUnCom',
                'vProd',
                'cEANTrib',
                'uTrib',
                'qTrib',
                'vUnTrib',
                'vFrete',
                'vSeg',
                'vDesc',
                'vOutro',
                'indTot',
                'xPed',
                'nItemPed',
                'nFCI',
            ]);

            //$data['user_id'] = auth('api')->user()->id;
            $product = Product::query()->create($data);

            return response()->json($product, Response::HTTP_CREATED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_STORE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function show($id)
    {
        try {
            $product = Product::query()->findOrFail($id);
            return response()->json($product, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_SHOW, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            $product = Product::query()->findOrFail($id);
            $data = $request->only([
                'item',
                'cProd',
                'cEAN',
                'xProd',
                'NCM',
                'cBenef',
                'EXTIPI',
                'CFOP',
                'uCom',
                'qCom',
                'vUnCom',
                'vProd',
                'cEANTrib',
                'uTrib',
                'qTrib',
                'vUnTrib',
                'vFrete',
                'vSeg',
                'vDesc',
                'vOutro',
                'indTot',
                'xPed',
                'nItemPed',
                'nFCI',
            ]);

            //$data['user_id'] = auth('api')->user()->id;
            $product->update($data);

            return response()->json($product, Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_UPDATE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::query()->findOrFail($id);
            $product->delete();

            return response()->json($product, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_DESTROY, Response::HTTP_NOT_FOUND);
        }
    }
}
