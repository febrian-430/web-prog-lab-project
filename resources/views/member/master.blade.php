@extends('master')

@section('title')
    Manage Members
@endsection

@section('content')
<table>
        <tr>
            <td>#</td>
            <td>Full name</td>
            <td>Email</td>
            <td>Role</td>
            <td>Gender</td>
            <td>Address</td>
            <td>Profile Picture</td>
            <td>DOB</td>
            <td>Action</td>
            
        </tr>
        @foreach ($members as $member)
        <tr>
            <td>{{$member->id}}</td>
            <td>{{$member->name}}</td>
            <td>{{$member->email}}</td>
            <td>{{$member->role}}</td>
            {{-- <td>{{$movie->movie_image}}</td> --}}
            <td>{{$member->gender}}</td>
            <td>{{$member->address}}</td>
            <td>
                <img width="100px" height="100px" src={{"storage/images/".$member->profile_picture}} alt="">
            </td>
            <td>{{$member->birthday}}</td>
            <td><button>Edit</button>
                <button>Delete</button></td>
        </tr>       
        @endforeach
    </table>
    {{$members->links()}}
@endsection