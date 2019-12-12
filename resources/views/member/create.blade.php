@extends('master')

@section('title')
    Register
@endsection

@section('content')
    <form action="/manage/members/add" method="post" enctype="multipart/form-data">
        @csrf
        <table id = "register-form">
            <tr>
                <td>Fullname </td>
                <td><input type="text" name="name" value="{{old('name')}}"></td>
                <td>{{$errors->first('name')}}</td>
            </tr>
            <tr>
                <td>Email </td>
                <td><input type="email" name="email" value="{{old('email')}}"></td>
                <td>{{$errors->first('email')}}</td>
            </tr>
            <tr>
                <td>Password </td>
                <td><input type="password" name="password"></td>
                <td>{{$errors->first('password')}}</td>
            </tr>
            <tr>
                <td>Confirm Password </td>
                <td><input type="password" name="password_confirmation"></td>
                <td>{{$errors->first('password_confirmation')}}</td>
            </tr>
            <tr>
                <td>Gender </td>
                <td><input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female"> Female
                </td>
                <td>{{$errors->first('gender')}}</td>
            </tr>
            <tr>
                <td>Address </td>
                <td><textarea name="address" cols="30" rows="10">{{ old('address') }}</textarea>
                </td>
                <td>{{$errors->first('address')}}</td>
            </tr>
            <tr>
                <td>Date of Birth </td>
                <td><input type="date" name="birthday" value="{{old('birthday')}}">
                </td>
                <td>{{$errors->first('birthday')}}</td>
            </tr>
            <tr>
                <td>Profile Picture</td>
                <td><input type="file" name="profile_picture"></td>
                <td>{{$errors->first('profile_picture')}}</td>
            </tr>
        </table>

        <input type="submit" value="Add user">

    </form>
@endsection
