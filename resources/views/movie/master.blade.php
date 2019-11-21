@extends('master')

@section('title')
    Manage Movies
@endsection

@section('content')
    <table>
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
            <td>{{$movie->postedBy->name}}</td>
            <td>{{$movie->genre->genre_name}}</td>
            <td>{{$movie->title}}</td>
            {{-- <td>{{$movie->movie_image}}</td> --}}
            <td>{{$movie->description}}</td>
            <td>{{$movie->rating}}</td>
            <td><button>Edit</button>
                <button>Delete</button></td>
        </tr>       
        @endforeach
    </table>
    {{$movies->links()}}
@endsection