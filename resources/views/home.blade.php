@extends('master')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                @if($movies->isEmpty())
                    <p>No movies</p>
                @else
                    <div>
                        <form action="">
                            <input type="text" name="search" id="search" placeholder="Search movie by title or genre">
                            <button type="input">Search</button>
                        </form>
                    </div>
                    @foreach ($movies as $movie)
                        <div>
                            <a href="/movie/{{$movie->id}}">
                                <p>{{$movie->title}}</p>
                            </a>
                            <p>{{$movie->genre->name}}</p>
                            <p>{{$movie->description}}</p>
                            <p>{{$movie->rating}}</p>

                            @if(Auth::check() && Auth::user()->role == 'Member')
                                @if(! Auth::user()->hasMovieInSave($movie))
                                    <div>
                                        <form action="/home/{{$movie->id}}" method="post">
                                            @csrf
                                            <button type="submit">Save</button>
                                        </form>
                                    </div>
                                @else
                                    <div>
                                        <form action="/home/{{$movie->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit">Unsave</button>
                                        </form>
                                    </div>
                                @endif
                            @endif
                        </div>
                    @endforeach
                    {{$movies->links()}}
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
