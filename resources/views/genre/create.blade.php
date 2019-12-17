@extends('master')

@section('title')
    Add New Genre
@endsection

@section('content')
    <form action="/manage/genres/add" method="post" enctype="application/x-www-form-urlencoded">
        @csrf
        <div class="container w-50">
            <div class="row justify-content-center">
                <div class="col-12 form-group">
                    <label for="">Genre</label>
                    <input class ="form-control" type="text" name="genre" id="genre" value = "{{old('genre')}}">
                    <div class="invalid-feedback d-block">{{$errors->first('genre')}}</div>
                </div>
                <button type="submit" class="btn btn-primary">Add Genre</button>
            </div>
        </div>
    </form>
@endsection
