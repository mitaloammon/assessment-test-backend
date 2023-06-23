<?php

namespace App\Http\Controllers;

use App\Models\Books;

use App\Http\Requests\StorebookRequest;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        return response()->json($books, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebookRequest $request)
    {
        $book = Books::create($request->all());
        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $bookId)
    {
        $books = Books::find($bookId);

        if (!$books) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        return response()->json($books, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorebookRequest $request, Books $bookId)
    {
        $books = Books::find($bookId);

        if (!$books) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $books->update($request->all());

        return response()->json($books, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $bookId)
    {
        $books = Books::find($bookId);

        if (!$books) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $books->delete();

        return response()->json(['message' => 'Book deleted'], 200);
    }
}
