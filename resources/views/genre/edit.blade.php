@extends('master')

@section('title')
    Edit Genre
@endsection

@section('content')
<form action="/manage/genres/{{ $genre->id }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="container w-50">
        <div class="row justify-content-center">
            <div class="col-12 form-group">
                <label for="">Genre</label>
                <input class ="form-control" type="text" name="genre" id="genre" value = "{{$genre->name}}">
                <div class="invalid-feedback d-block">{{$errors->first('genre')}}</div>
            </div>
            <button type="submit" class="btn btn-success ml-1">Edit Genre</button>
        </div>
    </div>
</form>
@endsection

