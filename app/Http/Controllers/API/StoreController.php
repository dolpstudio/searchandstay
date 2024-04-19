<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Store;
use App\Http\Requests\StoreRequest;
use App\Http\Resources\StoreCollection;
use App\Http\Resources\StoreResource;


class StoreController extends Controller
{
    /**
     * Create a new Auth controller instance.
     * Add middlewares
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {

        return response()->json(
            new StoreCollection($request->user()->stores),
        );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): JsonResponse
    {

        $store = $request->user()->stores()->create($request->toArray());

        return response()->json([
            'message' => 'Store created successfully',
            'store' => new StoreResource($store),
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store, Request $request): JsonResponse
    {
        return response()->json([
            'store' => new StoreResource($store),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store): JsonResponse
    {

        $store->fill($request->all());
        $store->save();

        return response()->json([
            'message' => 'Store updated successfully',
            'store' => new StoreResource($store),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store, Request $request): JsonResponse
    {
        $store->delete();

        return response()->json([
            'message' => 'Store deleted successfully',
        ], 200);
    }
}
