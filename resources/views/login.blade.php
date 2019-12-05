@extends('master')

@section('title')
    <div>Login</div>

@endsection

@section('content')
    <form action="/login" method="post">
        @csrf
        <table>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email"></td>
                <td>{{$errors->first('email')}}</td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password"></td>
                <td>{{$errors->first('password')}}</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="rememberMe">Remember Me</td>
            </tr>
        </table>
        <input type="button" value="Login">
    </form>
@endsection
