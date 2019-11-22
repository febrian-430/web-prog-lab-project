@extends('master')

@section('title')
    Edit Genre
@endsection

@section('content')
<form action="/manage/genres/{{ $genre->id }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <table>
        <tr>
            <td>
                Genre:
            </td>
            <td>
                <input type="text" name="genre_name" value="{{ $genre->name }}">
            <td>
                {{$errors->first('genre_name')}}
            </td>
        </tr>
    </table>
    <button type="submit">Edit Genre</button>
    @isset($complete)
        {{$complete}}
    @endisset
</form>
@endsection
