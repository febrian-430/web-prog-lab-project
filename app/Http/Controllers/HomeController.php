<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // where('title' , 'LIKE', "%$search%")->
        $search = request()->search;
        $movies = Movie::
        whereHas('genre', function($query) use ($search){
                $query->where('name', 'LIKE', "%$search%");
        })->
        orWhere('title', 'LIKE', "%$search%")->paginate(10);
        $movies->appends(['search' => $search]);
        return view('home', ['movies' => $movies]);
    }
}
