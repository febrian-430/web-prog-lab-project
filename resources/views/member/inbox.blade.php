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
        <div class="row justify-content-around">
            <div class="col-5">
                <img class="float-left" height="100px" width="100px" src={{"/storage/images/memberImg/".$message->sender->profile_picture}} alt="">
                <h4 class="ml-4"><a href="/member/{{$message->sender->id}}">{{$message->sender->name}}</a></h4>
                <h6 class="ml-4">Posted at {{$message->created_at}}</h6>
                <br>
                <p>Message: {{$message->message}}</p>
            </div>
            <div>
                <form action="/inbox/{{$message->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger float-right">
                        Remove
                    </button>
                </form>
            </div>
        </div>
        @endforeach
        <div class = "col-12" style="display:flex; flex-direction:row; justify-content: center; margin-top:25px;">{{ $messages->links() }}</div>
    </div>
    @endif
@endsection
