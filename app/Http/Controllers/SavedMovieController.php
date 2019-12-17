<?php

namespace App\Http\Controllers;

use App\SavedMovie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Support\Facades\Auth;

class SavedMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $saved = $user->movies;
        return view('member.saved')->with('saved', $saved);
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
    public function store(Movie $movie)
    {
        $user = Auth::user();
        $user->movies()->attach($movie->id);
        return view('home', [
            'movies' => Movie::paginate(10),
            'notification' => 'Saved movie'.$movie->title
        ]);
    }

    public function storeFromShow(Movie $movie)
    {
        $user = Auth::user();
        $user->movies()->attach($movie->id);
        return redirect()->route('movie', [$movie])->with('status', 'Movie saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SavedMovie  $savedMovie
     * @return \Illuminate\Http\Response
     */
    public function show(SavedMovie $savedMovie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SavedMovie  $savedMovie
     * @return \Illuminate\Http\Response
     */
    public function edit(SavedMovie $savedMovie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SavedMovie  $savedMovie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SavedMovie $savedMovie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SavedMovie  $savedMovie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $user = Auth::user();
        $user->movies()->detach($movie->id);
        return view('member.saved', [
            'movies' => Movie::paginate(10),
            'notification' => 'Unsaved movie '.$movie->title
        ]);
    }

    public function destroyFromShow(Movie $movie)
    {
        $user = Auth::user();
        $user->movies()->detach($movie->id);
        return redirect()->route('movie', [$movie])->with('status', 'Movie unsaved');
    }
}
