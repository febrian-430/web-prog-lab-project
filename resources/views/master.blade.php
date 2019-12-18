<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
    crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/home">BMDb</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/home">Home<span class="sr-only">(current)</span></a>
                </li>
                @if(Auth::user())
                    @if(Auth::user()->role == "Member")
                    <li class="nav-item">
                        <a class="nav-link" href="/inbox">Inbox</a>
                    </li>
                    @endif
                    @if(Auth::user()->role == "Member")
                    <li class="nav-item">
                      <a class="nav-link" href="/saved">Saved Movie</a>
                    </li>
                    @elseif(Auth::user()->role == "Administrator")
                        <li class="nav-item dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Manage
                                <span class="caret"></span></button>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/manage/movies">Movies</a></li>
                            <li><a class="dropdown-item" href="/manage/members">Members</a></li>
                            <li><a class="dropdown-item" href="/manage/genres">Genres</a></li>
                          </ul>
                        </li>
                    @endif
                @endif
              </ul>
              @if(Auth::user())
              <div class="form-inline my-2 my-lg-0">
                <label class="nav-link" id="datetime">{{ date('Y-m-d H:i:s') }}</label>
            </div>
              <div class="form-inline my-2 my-lg-0">
                    <a class="btn btn-outline-primary my-2 my-sm-0 m-3" href="/profile">Profile</a>
              </div>
                <div class="form-inline my-2 my-lg-0">
                      <form  action="/logout" method="post">
                          @csrf
                          <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
                      </form>
                </div>
              @else

              <div class="form-inline my-2 my-lg-0 ">
                    <a class="btn btn-outline-success my-2 my-sm-0 m-3" href="/register">Register</a>
                </div>

                <div class="form-inline my-2 my-lg-0">
                    <a class="btn btn-primary my-2 my-sm-0" href="/login">Login</a>
                </div>

              @endif
            </div>
          </nav>

        @isset($notification)
            <div class="alert alert-success pb-0 mb-0" role="alert"><p class="text-center">{{$notification}}</p></div>
        @endisset
        {{-- notif for redirect return --}}
        @if (session('status'))
        <div class="alert alert-success pb-0 mb-0 " role="alert">
            <p class="text-center">{{ session('status') }}</p>
        </div>
        @elseif (session('danger'))
        <div class="alert alert-danger pb-0 mb-0 " role="alert">
            <p class="text-center">{{ session('danger') }}</p>
        </div>
        @endif


    @yield('content')
</body>
</html>
