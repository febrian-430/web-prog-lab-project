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
            <td>{{$movie->postedBy}}</td>
            <td>{{$movie->genre->genre_name}}</td>
            <td>{{$movie->title}}</td>
            {{-- <td>{{$movie->movie_image}}</td> --}}
            <td>{{$movie->description}}</td>
            <td>{{$movie->rating}}</td>
            <<td><a href="/manage/movies/{{ $movie->id }}/edit">Edit</a>
                <form action="/manage/members/{{ $movie->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$movies->links()}}

    {{-- <script>
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
        </script> --}}
@endsection
