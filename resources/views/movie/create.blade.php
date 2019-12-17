@extends('master')

@section('title')
    Insert Movie
@endsection

@section('content')
    <form action="/manage/movies/add" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container w-50">
            <div class="row justify-content-center">
                <div class="col-12 form-group">
                    <label for="">Title</label>
                    <input class="form-control" type="text" name="title" id="title">
                    <div class="invalid-feedback d-block">{{$errors->first('title')}}</div>
                </div>

                <div class="col-12 form-group">
                    <label for="">Genre</label>
                    <select name="genre" id="genre" class="custom-select">
                        <option value="" selected disabled hidden>Genre</option>
                        @foreach ($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback d-block">{{$errors->first('genre')}}</div>
                </div>

                <div class="col-12 form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                    <div class="invalid-feedback d-block">{{$errors->first('description')}}</div>
                </div>

                <div class="col-12 form-group">
                    <label for="">Rating</label>
                    <input class="form-control" type="text" name="rating" id="rating">
                    <div class="invalid-feedback d-block">{{$errors->first('rating')}}</div>
                </div>

                <div class="col-12 form-group">
                    <label for="">Movie Image</label>
                    <input class="form-control-file" type="file" name="movie_image" id="movie_image">
                    <div class="invalid-feedback d-block">{{$errors->first('movie_image')}}</div>
                </div>
        </table>
        <button type="submit" class="btn btn-primary">Add movie</button>
    </form>
@endsection
