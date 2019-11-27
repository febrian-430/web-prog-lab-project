@extends('master')

@section('title')
    Manage Members
@endsection

@section('content')
@isset($notification)
    <div>{{$notification}}</div>
@endisset
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
            <td>{{$member->gender}}</td>
            <td>{{$member->address}}</td>
            <td>
                <img width="100px" height="100px" src={{"storage/images/".$member->profile_picture}} alt="">
            </td>
            <td>{{$member->birthday}}</td>
            <<td><a href="/manage/members/{{ $member->id }}/edit">Edit</a>
                <form action="/manage/members/{{ $member->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$members->links()}}

    {{-- <script>
            $(document).ready(function(){
                $('.edit-btn').click(function(){
                    var row = $(this).closest('tr');
                    var id = row.find('td:eq(0)').text();
                    window.location.replace('members/' + id + '/edit');
                });

                $('.delete-btn').click(function(){
                    var row = $(this).closest('tr');
                    var id = row.find('td:eq(0)').text();
                    window.location.replace('members/' + id + '/delete');
                });

            });
        </script> --}}
@endsection
