@extends('master')

@section('title')
    Manage Genre
@endsection

@section('content')
<a href="/manage/genres/add">Add genre</a>
<table class = "genre-table">
        <tr>
            <th>#</th>
            <th>Genre</th>
            <th>Action</th>
        </tr>
        @foreach ($genres as $genre)
        <tr>
            <td>{{$genre->id}}</td>
            <td>{{$genre->name}}</td>
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
