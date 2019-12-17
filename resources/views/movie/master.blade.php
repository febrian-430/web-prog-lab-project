@extends('master')

@section('title')
    Manage Movies
@endsection

@section('content')
    <div class="col-md-13  text-center">
        <a href="/manage/movies/add" class="btn btn-primary">Add movie</a>
    </div>
    <table class="table table-striped">
        <tr>
            <td>#</td>
            <td>Posted By</td>
            <td>Genre</td>
            <td>Title</td>
            <td>Picture</td>
            <td>Description</td>
            <td>Rating</td>
            <td>Action</td>
        </tr>
        @foreach ($movies as $movie)
        <tr>
            <td>{{$movie->id}}</td>
            <td>
                <a href="/member/{{$movie->addedBy->id}}">{{$movie->addedBy->name}}</a>
            </td>
            <td>{{$movie->genre->name}}</td>
            <td>
                <a href="/movie/{{$movie->id}}">{{$movie->title}}</a>
            </td>
            <td>
                <img height=300px width=300px src={{"/storage/images/movieImg/".$movie->movie_image}} alt="">
            </td>
            <td>{{$movie->description}}</td>
            <td>{{$movie->rating}}</td>
            <td><a href="/manage/movies/{{ $movie->id }}/edit" class="btn btn-success" style="float:left">Edit</a>
                <form action="/manage/movies/{{ $movie->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$movies->links()}}
@endsection
