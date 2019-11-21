@extends('master')

@section('title')
    Manage Genre
@endsection

@section('content')
<table>
        <tr>
            <td>#</td>
            <td>Genre</td>
            <td>Action</td>
        </tr>
        @foreach ($genres as $genre)
        <tr>
            <td>{{$genre->id}}</td>
            <td>{{$genre->genre_name}}</td>
            <td><button onclick="get()">Edit</button>
                <button onclick="get()">Delete</button></td>
        </tr>       
        @endforeach
    </table>

    <script>
        function get(){
            alert('a');
        }
    </script>
@endsection