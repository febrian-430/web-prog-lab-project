@extends('master')

@section('title')
    Register
@endsection

@section('content')
    <form action="/profile" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="container w-50">
            <div class="row justify-content-center">
                <div class="col-md-12 form-group">
                    <label>Fullname </label>
                    <input class = "form-control" type="text" name="name" value="{{$member->name}}" >
                    <div class="invalid-feedback d-block">{{$errors->first('name')}}</div>
                </div>
                <div class="col-md-12 form-group w-50">
                    <label for="">Email</label>
                    <input class = "form-control" type="email" name="email" value="{{$member->email}}">
                    <div class="invalid-feedback d-block">{{$errors->first('email')}}</div>
                </div>
                <div class="col-md-12 form-group w-50">
                    <label for="">Role</label>
                    <select name="role" id="role" class="custom-select">
                        <option value="Administrator" {{$member->role == "Administrator" ? 'selected' : ''}}>Administrator</option>
                        <option value="Member" {{$member->role == "Member" ? 'selected' : ''}}>Member</option>
                    </select>
                </div>
                <div class="col-md-12 form-group w-50">
                    <label for="">Password</label>
                    <input class = "form-control" type="password" name="password" value="{{old('password')}}">
                    <div class="invalid-feedback d-block">{{$errors->first('password')}}</div>
                </div>
                <div class="col-md-12 form-group w-50">
                    <label for="">Confirm Password</label>
                    <input class = "form-control" type="password" name="password_confirmation">
                    <div class="invalid-feedback d-block">{{$errors->first('password_confirmation')}}</div>
                </div>
                <div class="col-md-12">
                    <label for="">Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadioMale" value="Male" {{ $member->gender == "Male" ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineRadioMale">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadioFemale" value="Female" {{ $member->gender == "Female" ? 'checked' : '' }} >
                        <label class="form-check-label" for="inlineRadioFemale">Female</label>
                    </div>

                    <div class="invalid-feedback d-block">{{$errors->first('gender')}}</div>
                </div>
                <div class="col-md-12 form-group">
                    <label for="">Address</label>
                    <textarea class="form-control" name="address" cols="30" rows="10">{{$member->address}}</textarea>

                    <div class="invalid-feedback d-block">{{$errors->first('address')}}</div>
                </div>
                <div class="col-md-12 form-group">
                    Date of Birth
                    <input type="date" name="birthday" value={{$member->birthday}}>

                    <div class="invalid-feedback d-block">{{$errors->first('birthday')}}</div>
                </div>
                <div class="col-md-12 form-group">
                    <label for="">Profile Picture</label>
                    <input class="form-control-file" type="file" name="profile_picture">
                    <div class="invalid-feedback d-block">{{$errors->first('profile_picture')}}</div>
                </div>
            </div>
         <input type="submit" class="btn btn-success" value="Update Profile">
        </div>
        </form>
@endsection
