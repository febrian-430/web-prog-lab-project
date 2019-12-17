@extends('master')

@section('title')
    Home
@endsection

@section('content')
        <div class="container">
                @if($movies->isEmpty())
                    <p>No movies</p>
                @else

                        <form class="input-group">
                            <input name ="search" class="form-control" type="text" placeholder="Search by title or genre" aria-label="Search">
                            <span><button class="btn btn-outline-success my-sm-0" type="input">Search</button></span>
                        </form>
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                        @foreach ($movies as $movie)

                        <div class="card m-3" style="width: 30rem;">
                                <img src={{"/storage/images/movieImg/".$movie->movie_image}} class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">
                                      <a href="/movie/{{$movie->id}}">{{$movie->title}}</a>
                                  </h5>
                                  <h6 class="card-subtitle mb-2 text-muted">{{$movie->genre->name}}</h6>
                                  <div>
                                    <img style="float:left" width=18px height=18px src={{"/storage/images/star.png"}} alt="">
                                    <p class="card-text">{{$movie->rating}}</p>
                                </div>
                                <br>
                                <p class="card-text">{{$movie->description}}</p>

                                  @if(Auth::check() && Auth::user()->role == 'Member')
                                    @if(! Auth::user()->hasMovieInSave($movie))
                                        <div>
                                            <form action="/home/{{$movie->id}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </form>
                                        </div>
                                    @else
                                        <div>
                                            <form action="/home/{{$movie->id}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Unsave</button>
                                            </form>
                                        </div>
                                    @endif
                                @endif
                                </div>
                              </div>
                        @endforeach
                        {{$movies->links()}}
                        </div>
                    </div>
                @endif
            </div>
@endsection
