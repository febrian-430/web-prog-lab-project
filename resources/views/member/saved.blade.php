@extends('master')

@section('title')
    Saved Movies
@endsection

@section('content')

    @if($saved->isEmpty())
        <p>No saved movies</p>
    @else
        @foreach ($saved as $movie)
            <div>
                <p>{{$movie->title}}</p>
                <p>{{$movie->genre->genre_name}}</p>
                <p>{{$movie->description}}</p>
                <p>{{$movie->rating}}</p>
                <div>
                    @if(Auth::user()->hasMovieInSave($movie))
                        <form action="/saved/{{$movie->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Unsave</button>
                        </form>

                    @else
                        <form action="/saved/{{$movie->id}}" method="post">
                            @csrf
                            <button type="submit">Save</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
@endsection
