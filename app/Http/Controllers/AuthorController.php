<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\author; 

class AuthorController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author =author::get();
        return response()->json(
            [
                'status' => 200, 
                'data' => $author
            ], 200
        );
     
        // return author::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new author();
            $author -> name = $request->name;
            $author -> date_of_birth = $request->date_of_birth;
            $author -> place_of_birth = $request->place_of_birth;
            $author -> gender = $request->gender;
            $author -> email = $request->email;
            $author -> hp = $request->hp;
            $author -> save();

            return response()->json(
            [
                'status' => 201, 
                'message' => 'data berhasil disimpan',
                'data' => $author
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
        return response()->json(
            author::findOrFail($id)
        );
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
        $author=author::find($id);
        if($author)
        {
            $author -> name = $request->name ? $request->name : $author->name;
            $author -> date_of_birth = $request->date_of_birth ? $request->date_of_birth : $author->date_of_birth;
            $author -> place_of_birth = $request->place_of_birth ? $request->place_of_birth : $author->place_of_birth;
            $author -> gender = $request->gender ? $request->gender : $author->gender;
            $author -> email = $request->email ? $request->email : $author->email;
            $author -> hp = $request->hp? $request->hp : $author->hp;
            $author -> save();
            return response()->json([
                'status' => 200,
                'data' => $author

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
        // return author::find($id)->delete();
        // author::destroy($id);
        $author = author::where('id', $id)->first();
        if($author){
            $author->delete();
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
