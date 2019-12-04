@extends('master')

@section('title')
    Inbox
@endsection

@section('content')
    @if($messages->isEmpty())
        <div>No message</div>
    @else
        @foreach ($messages as $message)
            <img src="" alt="">
            <p><a href="/member/{{$message->sender->id}}">{{$message->sender->name}}</a></p>
            <p>Posted at {{$message->created_at}}</p>
            Message: {{$message->message}}
            <div>
                <form action="/inbox/{{$message->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">
                        Remove
                    </button>
                </form>
            </div>
        @endforeach
    {{$messages->links()}}
    @endif
@endsection
