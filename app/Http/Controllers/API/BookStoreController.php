<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Book;
use App\Models\Store;
use App\Http\Resources\BookCollection;


class BookStoreController extends Controller
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
     * Store a newly created resource in storage.
     */
    public function store(Book $book, Store $store, Request $request): JsonResponse
    {

        $store->book()->syncWithoutDetaching($book->id);
        
        return response()->json([
            'message' => 'BookStore relationship created successfully',
        ]);

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book, Store $store, Request $request): JsonResponse
    {

        $store->book()->detach($book->id);

        return response()->json([
            'message' => 'BookStore relationship deleted successfully',
        ]);
    }
}
