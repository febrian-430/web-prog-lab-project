@extends('master')

@section('title')
    Insert Movie
@endsection

@section('content')
    <form action="/manage/movies/add" method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>
                    Title
                </td>
                <td>
                    <input type="text" name="title" id="title">
                </td>
                <td>{{$errors->first('title')}}</td>
            </tr>
            <tr>
                <td>>Genre</td>
                <td>
                    <select name="genre" id="genre">
                        <option value="" selected disabled hidden>Choose genre</option>
                        @foreach ($genres as $genre)
                           <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td>{{$errors->first('genre')}}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="description" id="description" cols="30" rows="10" ></textarea></td>
                <td>{{$errors->first('description')}}</td>
            </tr>
            <tr>
                <td>Rating</td>
                <td><input type="text" name="rating" id="rating" ></td>
                <td>{{$errors->first('rating')}}</td>
            </tr>
            <tr>
                <td>Picture</td>
                <td><input type="file" name="movie_image" id="movie_image"></td>
                <td>{{$errors->first('movie_image')}}</td>
            </tr>
        </table>
        <button type="submit">Insert Movie</button>
    </form>
@endsection
