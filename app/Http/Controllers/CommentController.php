<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function fetchAll(Movie $movie){
        return Comment::where('movie_id', $movie->id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
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
    public function store(Request $request, Movie $movie)
    {
        //
        $validation = [
            'comment' => 'required'
        ];

        $this->validate($request, $validation);

        Comment::create([
            'content' => $request->comment,
            'movie_id' => $movie->id,
            'poster_id' => Auth::user()->id
        ]);
        return redirect()->route('movie', [$movie])->with('status', 'Your comment is posted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie, Comment $comment)
    {
        Comment::destroy($comment->id);
        return redirect()->route('movie', [$movie])->with('status', 'Your comment has been deleted');
    }
}
