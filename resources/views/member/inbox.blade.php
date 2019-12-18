@extends('master')

@section('title')
    Inbox
@endsection

@section('content')
    @if($messages->isEmpty())
        <p class="text-center mt-4">No message</p>
    @else
    <div class="container mt-2">
        @foreach ($messages as $message)
        <div class="row justify-content-around" >
            <div class="col-8 border mt-3" style="width:2rem;">
                <img class="float-left mr-3" style="margin-left:-0.5rem; margin-top:0.5rem" height="100px" width="100px" src={{"/storage/images/memberImg/".$message->sender->profile_picture}} alt="">
                <h4 class="ml-4 mt-3"><a href="/member/{{$message->sender->id}}">{{$message->sender->name}}</a></h4>
                <form action="/inbox/{{$message->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger float-right" style="margin-top: -2.1rem">
                        Remove
                    </button>
                </form>
                <h6 class="ml-4 mt-1">Posted at {{$message->created_at}}</h6>
                <br>
                <p class="mt-2">{{$message->message}}</p>
            </div>
        </div>
        @endforeach
        <div class = "col-12" style="display:flex; flex-direction:row; justify-content: center; margin-top:25px;">{{ $messages->links() }}</div>
    </div>
    @endif
@endsection
