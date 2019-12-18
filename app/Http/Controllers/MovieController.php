<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Genre;
use App\Movie;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $movies = Movie::paginate(10);

        return view('movie.master')->with('movies', $movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $genres = Genre::all();
        return view('movie.create')->with('genres', $genres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation =
        [
            'title' => 'required',
            'genre' => 'required|not_in:0',
            'description' => 'required',
            'rating' => 'required|numeric|max:10|min:0',
            'movie_image' => 'required|mimes:jpeg,png,jpg'
        ];

        $this->validate($request, $validation);

        $photo = $request->file('movie_image');
        $photo_name = Uuid::uuid(). '.' . $photo->getClientOriginalExtension();
        $storage_destination = storage_path('/app/public/images/movieImg');
        $photo->move($storage_destination, $photo_name);

        $movie = Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'rating' => $request->rating,
            'movie_image' => $photo_name,
            'genre_id' => $request->genre,
            'poster_id' => Auth::user()->id,
        ]);
        return redirect()->route('movieMaster')->with('notification', 'Successfully added '.$movie->title);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        $comments = Comment::where('movie_id', $movie->id)->paginate(10);
        return view('movie.show')->with(['movie' => $movie,'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
        $genres = Genre::all();
        return view('movie.edit')->with(['movie' => $movie, 'genres'=> $genres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
        $validation =
        [
            'title' => 'required',
            'genre' => 'required|not_in:0',
            'description' => 'required',
            'rating' => 'required|numeric|max:10|min:0',
            'movie_image' => 'required|mimes:jpeg,png,jpg'
        ];

        $this->validate($request, $validation);
        unlink(storage_path('/app/public/images/movieImg/'.$movie->movie_image));

        $image = $request->file('movie_image');
        $image_name = Uuid::uuid(). '.' . $image->getClientOriginalExtension();
        $storage_destination = storage_path('/app/public/images/movieImg');
        $image->move($storage_destination, $image_name);

        $movie->title =  $request->title;
        $movie->description =  $request->description;
        $movie->rating =  $request->rating;
        $movie->movie_image =  $image_name;
        $movie->genre_id =  $request->genre;
        $movie->poster_id =  Auth::user()->id;
        $movie->save();
        return redirect()->route('movieMaster')->with('status', 'Movie '.$movie->title. ' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
        $title = $movie->title;
        Movie::destroy($movie->id);
        return redirect()->route('movieMaster')->with('status' , 'Movie '. $title.' has been deleted');
    }


}
