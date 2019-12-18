@extends('master')

@section('title')
    {{$movie->title}}
@endsection

@section('content')
    <div class = "container">
    <div class="row mt-4">
        <img class="float-left col-6"  src={{"/storage/images/movieImg/".$movie->movie_image}} alt="">
        <div class="col-6">
            <h2 class="w-50 card-title">{{$movie->title}}</h2>
            @if(Auth::check() && Auth::user()->role == "Member")
            <div>
                @if(Auth::user()->hasMovieInSave($movie))
                    <form action="/movie/{{$movie->id}}/unsave" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="float-right btn btn-danger">Unsave</button>
                    </form>
                @else
                    <form action="/movie/{{$movie->id}}/save" method="post">
                        @csrf
                        <button type="submit" class="float-right btn btn-primary">Save</button>
                    </form>
                @endif
            </div>
            @endif
            <h6 class="card-subtitle text-muted pt-0">{{$movie->genre->name}}</h6>
            <div class="card-text mt-2"style="display:flex; align-items:center; flex-wrap:wrap;">
                <img style="float:left" width=18px height=18px src={{"/storage/images/star.png"}} alt="">
                <p class="card-text">{{$movie->rating}}</p>
            </div>
            <p class="card-text mt-2">{{$movie->description}}</p>
            <p>Posted at {{$movie->created_at}}</p>
        </div>

    </div>


    <div class="row form-group">
        <form action="/movie/{{$movie->id}}" method="post" class="col-12 mt-2">
            @csrf
            <textarea class="form-control col-12" name="comment" id="" cols="30" rows="10"></textarea>
            <div class="invalid-feedback d-block">{{$errors->first('comment')}}</div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    </div>

    <div class="row">
        @if(! $comments->isEmpty())
            @foreach ($comments as $comment)
                <div class = "col-12">
                    <div class="float-left mr-4"><img class="rounded border" width="55" height = "55" src={{"/storage/images/memberImg/".$comment->postedBy->profile_picture}} alt=""></div>
                    <h4><a href="/member/{{$comment->postedBy->id}}">{{$comment->postedBy->name}}</a></p>
                    @if(Auth::check() && $comment->postedBy->id == Auth::user()->id)
                    <div style="margin-top:-15px">
                        <form action="/movie/{{$movie->id}}/{{$comment->id}}/delete" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="float-right btn btn-danger">Delete</button>
                        </form>
                    </div>
                    @endif
                    <h6 style="margin-top: -10px;">Posted at {{$comment->created_at}}</h6>
                    <p>{{$comment->content}}</p>


                </div>
            @endforeach
        @else
            <div>No comment available</div>
        @endif
    </div>
</div>
@endsection
