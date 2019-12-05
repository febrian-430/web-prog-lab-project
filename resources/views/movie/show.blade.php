@extends('master')

@section('title')
    {{$movie->title}}
@endsection

@section('content')
    <div>
        <img height=30% width=30% src={{"/storage/images/movieImg/".$movie->movie_image}} alt="">
        <p>Title {{$movie->title}}</p>
        <p>Genre {{$movie->genre->name}}</p>
        <p>Description {{$movie->description}}</p>
        <p>Rating: {{$movie->rating}}</p>
        @if(Auth::user()->role == "Member")
        <div>
            @if(Auth::user()->hasMovieInSave($movie))
                <form action="/movie/{{$movie->id}}/unsave" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit">Unsave</button>
                </form>
            @else
                <form action="/movie/{{$movie->id}}/save" method="post">
                    @csrf
                    <button type="submit">Save</button>
                </form>
            @endif
        </div>
        @endif
    </div>

    <div id="comment-section">
        @if(! $comments->isEmpty())
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
        @else
            <div>No comment available</div>
        @endif
    </div>

    <div>
        <form action="/movie/{{$movie->id}}" method="post">
            @csrf
            <textarea name="comment" id="" cols="30" rows="10"></textarea>
            <p>{{$errors->first('comment')}}</p>
            <button type="submit">Post Comment</button>
        </form>
    </div>
@endsection
