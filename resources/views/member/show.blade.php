@extends('master')

@section('title')
    Profile - {{$member->name}}
@endsection

@section('content')
    <div class="container py-2 my-2">
        <div class= "row justify-content-center">
            <div class="float-left"><img class="rounded border" width="175px" height = "175px" src={{"/storage/images/memberImg/".$member->profile_picture}} alt=""></div>
            <div class="col-6">
                <h3 class="font-weight-bold">{{$member->name}}</h3>
                <h5 class="card-subtitle mt-2 mb-2">{{$member->email}}</h5>
                <p>{{$member->address}}</p>
                @if($member->id == Auth::user()->id)
                    <a class="btn btn-success mt-4" href="/profile/edit">Update Profile</a>
            </div>

            {{-- <div>
                <a class="btn btn-success" href="/profile/edit">Update Profile</a>
            </div> --}}
        </div>
    </div>
            @else
            </div>
        </div>
    </div>
            <div class="row justify-content-center">
                <div class="col-md-5 form-group">
                    <form action="/member/{{$member->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <textarea class="form-control" name="message" id="" cols="30" rows="10"></textarea>
                        <button class="btn btn-primary mt-1" type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
