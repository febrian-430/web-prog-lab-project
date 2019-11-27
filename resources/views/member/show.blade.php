@extends('master')

@section('title')
    Profile - {{$member->name}}
@endsection

@section('content')
    <div>
        {{$member->name}}
    </div>
    <div>
        {{$member->email}}
    </div>
    <div>
        {{$member->address}}
    </div>
    <div>
        <img width="100px" height="100px" src={{"storage/images/".$member->profile_picture}} alt="">
    </div>
    <div>
        <a href="/member/{{$member->id}}/edit"></a>
    </div>
@endsection
