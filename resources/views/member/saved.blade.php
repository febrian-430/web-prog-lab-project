@extends('master')

@section('title')
    Saved Movies
@endsection

@section('content')
    <div class="container">
    @if($saved->isEmpty())
    <div class="row">
        <p class="text-center">No saved movies</p>
    </div>
    @else
        <div class="row justify-content-center">
        @foreach ($saved as $movie)
        <div class="col-sm-5 mt-3">
            <div class="card">
                <img height=305px width=275px src={{"/storage/images/movieImg/".$movie->movie_image}} class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/movie/{{$movie->id}}">{{$movie->title}}</a>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$movie->genre->name}}</h6>
                    <div>
                        <img style="float:left" width=18px height=18px src={{"/storage/images/star.png"}} alt="">
                        <p class="card-text">{{$movie->rating}}</p>
                    </div>
                    <br>
                    <p class="card-text">{{$movie->description}}</p>

                    @if(Auth::check() && Auth::user()->role == 'Member')
                       @if(! Auth::user()->hasMovieInSave($movie))
                           <div>
                               <form action="/home/{{$movie->id}}" method="post">
                                   @csrf
                                   <button type="submit" class="btn btn-primary">Save</button>
                               </form>
                           </div>
                       @else
                           <div>
                               <form action="/home/{{$movie->id}}" method="post">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" class="btn btn-danger">Unsave</button>
                               </form>
                           </div>
                       @endif
                   @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    </div>
@endsection
