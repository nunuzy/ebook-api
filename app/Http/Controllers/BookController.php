<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book =book::get();
        return response()->json(
            [
                'status' => 200, 
                'data' => $book
            ], 200
        );
     
        // return Book::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $book = new book();
            $book -> title = $request->title;
            $book -> description = $request->description;
            $book -> author = $request->author;
            $book -> publisher = $request->publisher;
            $book -> date_of_issue = $request->date_of_issue;
            $book -> save();

            return response()->json(
            [
                'status' => 201, 
                'message' => 'data berhasil disimpan',
                'data' => $book
            ], 201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Book::find($id);
        $book =book::where('id', $id)->first();
        if($book){
            return response()->json([
                'status' => 200,
                'data' => $book

            ],200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'id atas ' . $id . ' tidak ditemukan'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book=book::find($id);
        if($book)
        {
            $book -> title = $request->title ? $request->title : $book->title;
            $book -> description = $request->description ? $request->description : $book->description;
            $book -> author = $request->author ? $request->author : $book->author;
            $book -> publisher = $request->publisher ? $request->publisher : $book->publisher;
            $book -> date_of_issue = $request->date_of_issue ? $request->date_of_issue : $book->date_of_issue;
            $book -> save();
            return response()->json([
                'status' => 200,
                'data' => $book

            ],200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'id atas ' . $id . ' tidak ditemukan'
            ],404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return Book::find($id)->delete();
        // book::destroy($id);
        $book = book::where('id', $id)->first();
        if($book){
            $book->delete();
            return response()->json([
                'status' => 200,
                'message' => 'data berhasil dihapus atas id ' . $id
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'data diatas id ' . $id . ' tidak ditemukan'
            ],404);
        }
    }
}