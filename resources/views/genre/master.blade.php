@extends('master')

@section('title')
    Manage Genre
@endsection

@section('content')
<table class = "genre-table">
        <tr>
            <th>#</th>
            <th>Genre</th>
            <th>Action</th>
        </tr>
        @foreach ($genres as $genre)
        <tr>
            <td>{{$genre->id}}</td>
            <td>{{$genre->genre_name}}</td>
            <td><a href="/manage/genres/{{ $genre->id }}/edit">Edit</a>
                <form action="/manage/genres/{{ $genre->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
</table>

@endsection
