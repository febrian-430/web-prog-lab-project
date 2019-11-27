@extends('master')

@section('title')
    Register
@endsection

@section('content')
    <form action="/manage/members/{{ $member->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <table id = "update-form">
            <tr>
                <td>Fullname </td>
                <td><input type="text" name="name" value = "{{$member->name}}" "></td>
                <td>{{$errors->first('name')}}</td>
            </tr>
            <tr>
                <td>Email </td>
                <td><input type="email" name="email" value="{{ $member->email }}"></td>
                <td>{{$errors->first('email')}}</td>
            </tr>
            <tr>
                <td>
                    Role
                </td>
                <td>
                    <select name="role" id="role">
                        <option value="" selected disabled hidden>Choose role</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Member">Member</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Password </td>
                <td><input type="password" name="password" value="{{ $member->password }}"></td>
                <td>{{$errors->first('password')}}</td>
            </tr>
            <tr>
                <td>Confirm Password </td>
                <td><input type="password" name="password_confirmation" ></td>
                <td>{{$errors->first('password_confirmation')}}</td>
            </tr>
            <tr>
                <td>Gender </td>
                <td><input type="radio" name="gender" value="Male"  > Male
                    <input type="radio" name="gender" value="Female" > Female
                </td>
                <td>{{$errors->first('gender')}}</td>
            </tr>
            <tr>
                <td>Address </td>
                <td><textarea name="address" cols="30" rows="10" value="{{ $member->address }}"></textarea>
                </td>
                <td>{{$errors->first('address')}}</td>
            </tr>
            <tr>
                <td>Date of Birth </td>
                <td><input type="date" name="birthday" value="{{ $member->birthday }}">
                </td>
                <td>{{$errors->first('birthday')}}</td>
            </tr>
            <tr>
                <td>Profile Picture</td>
                <td><img width="100px" height="100px" src={{"/storage/images/memberImg/".$member->profile_picture}} alt=""></td>
                {{-- <td>{{ HTML::image('storage/images/memberImg/'.$member->profile_picture, 'profile_picture') }}</td> --}}
                <td><input type="file" name="profile_picture"></td>
                <td>{{$errors->first('profile_picture')}}</td>
            </tr>
        </table>

        <input type="submit" value="Update">

        @isset($success)
            {{$success}}
        @endisset

    </form>
