@extends('master')

@section('title')
    Profile - {{$member->name}}
@endsection

@section('content')
    <div>
        Name: {{$member->name}}
    </div>
    <div>
        Email: {{$member->email}}
    </div>
    <div>
        Address: {{$member->address}}
    </div>
    <div>
        <img width="100px" height="100px" src={{"storage/images/".$member->profile_picture}} alt="">
    </div>
    @if ($member->id == Auth::user()->id)
        <div>
            <a href="/member/{{$member->id}}/edit">Update Profile</a>
        </div>
    @endif


    @if($member->id != Auth::user()->id)
        <div>
            <form action="/member/{{$member->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <textarea name="message" id="" cols="30" rows="10" value="Enter message here..."></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    @endif

@endsection
