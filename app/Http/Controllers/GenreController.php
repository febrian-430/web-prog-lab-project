<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function fetchAll(){
        return Genre::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Self::fetchAll();
        return view('genre.master')->with('genres', $genres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validation = [
            'genre_name' => 'required|unique:genres,genre_name|alpha_dash'
        ];
        $this->validate($request, $validation);

        $genre = new Genre();
        $genre->genre_name = $request->genre_name;
        $genre->save();

        return view('genre.master',
        [
            'notification' => 'Genre '.$genre->genre_name. ' has been added',
            'genres' => Self::fetchAll()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        // $genre = Genre::find($id);
        //
        return $genre;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        // $genre = Genre::find($id);
        // return view('genre.edit', compact($genre));
        return view('genre.edit')->with('genre', $genre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        $validation = [
            'genre_name' => 'required|unique:genres,genre_name,'.$genre->id.'|alpha_dash'
        ];
        $this->validate($request, $validation);
        $prev_name = $genre->genre_name;
        $genre->genre_name = $request->genre_name;
        $genre->save();
        return view('genre.master',
        [
            'notification' => 'Genre '.$prev_name. ' was updated',
            'genres' => Self::fetchAll()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $name = $genre->genre_name;
        Genre::destroy($genre->id);
        return redirect('/manage/genres',
        [
            'notification' => 'Genre '.$name.' has been deleted',
            ''
        ]);
    }
}
