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
            <td><button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button></td>
        </tr>
        @endforeach
    </table>
    {{$movies->links()}}

    <script>
            $(document).ready(function(){
                $('.edit-btn').click(function(){
                    var row = $(this).closest('tr');
                    var id = row.find('td:eq(0)').text();
                    window.location.replace('movies/' + id + '/edit');
                });

                $('.delete-btn').click(function(){
                    var row = $(this).closest('tr');
                    var id = row.find('td:eq(0)').text();
                    window.location.replace('movies/' + id + '/delete');
                });

            });
        </script>
@endsection
