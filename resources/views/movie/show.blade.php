@extends('master')

@section('title')
    {{$movie->title}}
@endsection

@section('content')
    <div>
        <img src="" alt="">
        <p>Title {{$movie->title}}</p>
        <p name='ayaya'></p>
        <p>Description {{$movie->description}}</p>
        <div>
            <form action="" method="post">
                <button type="submit" id="saveBtn">SAVE</button>
            </form>
        </div>
        <p>Rating: {{$movie->rating}}</p>
    </div>
    <table>
        @foreach ($comments as $comment)
            <div>
                <p>Comment by <a href="/member/{{$comment->postedBy->id}}">{{$comment->postedBy->name}}</a></p>
                <p>{{$comment->content}}</p>
                <p>Posted at {{$comment->created_at}}</p>
                @if($comment->postedBy->id == Auth::user()->id)
                <div>
                    <form action="/movie/{{$movie->id}}/{{$comment->id}}/delete" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </div>
                @endif
            </div>
        @endforeach
    </table>

    <div>
        <form action="/movie/{{$movie->id}}" method="post">
            @csrf
            <textarea name="comment" id="" cols="30" rows="10"></textarea>
            <p>{{$errors->first('comment')}}</p>
            <button type="submit">Post Comment</button>
        </form>
    </div>
@endsection
