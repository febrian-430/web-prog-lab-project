@extends('master')

@section('title')
    Saved Movies
@endsection

@section('content')

    @if($saved->isEmpty())
        <p>No saved movies</p>
    @else
        @foreach ($saved as $movie)
        <div class="card" style="width: 18rem;">
                <img src={{"/storage/images/movieImg/".$movie->movie_image}} class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">
                      <a href="/movie/{{$movie->id}}">{{$movie->title}}</a>
                  </h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{$movie->genre->name}}</h6>
                  <p class="card-text"><p>{{$movie->rating}}</p>
                  <p class="card-text"><p>{{$movie->description}}</p>

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
            <div>
        @endforeach
    @endif
@endsection
