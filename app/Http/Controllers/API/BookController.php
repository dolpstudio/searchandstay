<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;


class BookController extends Controller
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
            new BookCollection($request->user()->books),
        );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request): JsonResponse
    {

        $book = $request->user()->books()->create($request->toArray());

        return response()->json([
            'message' => 'Book created successfully',
            'book' => new BookResource($book),
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book, Request $request): JsonResponse
    {
        return response()->json([
            'book' => new BookResource($book),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book): JsonResponse
    {

        $book->fill($request->all());
        $book->save();

        return response()->json([
            'message' => 'Book updated successfully',
            'book' => new BookResource($book),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book, Request $request): JsonResponse
    {
        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully',
        ], 200);
    }
}
