@extends('master')

@section('title')
    Home
@endsection

@section('content')
        <div class="container">
                @if($movies->isEmpty())
                    <div class="text-center mt-2"><p>No result</p></div>
                @else

                        <form class="input-group">
                            <input name ="search" class="form-control mt-3" type="text" placeholder="Search by title or genre" aria-label="Search">
                            <span class="mt-3"><button class="btn btn-outline-success my-sm-0" type="input">Search</button></span>
                        </form>
                    <div class="row justify-content-center">
                        <div class="border-primary">
                        @foreach ($movies as $movie)

                        <div class="card col-12 m-3 p-0" style="width: 55rem;">
                                <img width="400px" height="600px" src={{"/storage/images/movieImg/".$movie->movie_image}} class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">
                                      <a href="/movie/{{$movie->id}}">{{$movie->title}}</a>
                                  </h5>
                                @if(Auth::check() && Auth::user()->role == 'Member')
                                    @if(! Auth::user()->hasMovieInSave($movie))
                                        <div>
                                            <form action="/home/{{$movie->id}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary float-right" style="margin-top: -2.5rem;">Save</button>
                                            </form>
                                        </div>
                                    @else
                                        <div>
                                            <form action="/home/{{$movie->id}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger float-right" style="margin-top: -2.5rem;">Unsave</button>
                                            </form>
                                        </div>
                                    @endif
                                @endif
                                  <h6 class="card-subtitle mb-2 text-muted">{{$movie->genre->name}}</h6>
                                  <div style="display:flex; align-items:center; flex-wrap:wrap;">
                                    <img style="float:left" width=18px height=18px src={{"/storage/images/star.png"}} alt="">
                                    <p class="card-text">{{$movie->rating}}</p>
                                </div>
                                <br>
                                <p class="card-text">{{$movie->description}}</p>



                                </div>
                              </div>
                        @endforeach
                        <div class = "col-12" style="display:flex; flex-direction:row; justify-content: center; margin-top:25px;">{{ $movies->links() }}</div>
                        </div>
                    </div>
                @endif
            </div>
@endsection
