@extends('master')

@section('title')
    Manage Movies
@endsection

@section('content')
    @isset($notification)
        <div>{{ $notification }}</div>
    @endisset

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
            <td>{{$movie->addedBy->name}}</td>
            <td>{{$movie->genre->genre_name}}</td>
            <td>{{$movie->title}}</td>
            <td>
                <img src={{"/storage/app/public/images/movieImg/".$movie->movie_image}} alt="">
            </td>
            <td>{{$movie->description}}</td>
            <td>{{$movie->rating}}</td>
            <<td><a href="/manage/movies/{{ $movie->id }}/edit">Edit</a>
                <form action="/manage/movies/{{ $movie->id }}" method="post">
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
