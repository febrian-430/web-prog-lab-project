@extends('master')

@section('title')
    Add New Genre
@endsection

@section('content')
    <form action="/manage/genres/add" method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>
                    Genre:
                </td>
                <td>
                    <input type="text" name="genre_name">
                </td>
                <td>
                    {{$errors->first('genre_name')}}
                </td>
            </tr>
        </table>
        <button type="submit">Add Genre</button>
        @isset($complete)
            {{$complete}}
        @endisset
    </form>
@endsection
