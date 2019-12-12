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
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/home">BMDb</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="/home">Home<span class="sr-only">(current)</span></a>
                </li>
                @if(Auth::user())
                    <li class="nav-item">
                            <a class="nav-link" href="/inbox">Inbox</a>
                    </li>
                    @if(Auth::user()->role == "Member")
                    <li class="nav-item">
                      <a class="nav-link" href="/saved">Saved Movie</a>
                    </li>
                    @elseif(Auth::user()->role == "Administrator")
                        <li class="nav-item dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage
                          </button>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Movies</a>
                            <a class="dropdown-item" href="#">Members</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Genres</a>
                          </div>
                        </li>
                    @endif
                @endif
              </ul>
              @if(Auth::user())
                <div class="form-inline my-2 my-lg-0">
                      <form  action="/logout" method="post">
                          @csrf
                          <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Logout</button>
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
            <div class="alert alert-dark" role="alert">{{$notification}}</div>
        @endisset

    {{-- displaying status for comment, because redirect --}}

        @if (session('status'))
        <div class="alert alert-dark" role="alert">
            {{ session('status') }}
        </div>
        @endif


    @yield('content')
    FOOTER
</body>
</html>
