@extends('master')

@section('title')
    {{$movie->title}} - Edit
@endsection

@section('content')
<form action="/manage/movies/{{$movie->id}}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="container w-50">
        <div class="row justify-content-center">
            <div class="col-12 form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ old('title') ? old('title') : $movie->title}}">
                <div class="invalid-feedback d-block">{{$errors->first('title')}}</div>
            </div>

            <div class="col-12 form-group">
                <label for="genre">Genre</label>
                <select name="genre" id="genre" class="custom-select">
                    <option value="" selected disabled hidden>Genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{$genre->id}}" {{$movie->genre->name == $genre->name ? 'selected' : ''}}>{{$genre->name}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback d-block">{{$errors->first('genre')}}</div>
            </div>

            <div class="col-12 form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') ? old('description') : $movie->description}}</textarea>
                <div class="invalid-feedback d-block">{{$errors->first('description')}}</div>
            </div>

            <div class="col-12 form-group">
                <label for="rating">Rating</label>
                <input class="form-control" type="text" name="rating" id="rating" value="{{ old('rating') ? old('rating') : $movie->rating}}">
                <div class="invalid-feedback d-block">{{$errors->first('rating')}}</div>
            </div>

            <div class="col-12 form-group">
                <label for="">Movie Image</label>
                <input class="form-control-file" type="file" name="movie_image" id="movie_image">
                <div class="invalid-feedback d-block">{{$errors->first('movie_image')}}</div>
            </div>
    </table>
    <button type="submit" class="btn btn-success">Edit movie</button>
</form>
@endsection
