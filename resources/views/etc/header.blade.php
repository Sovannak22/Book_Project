<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
    <div class="container ">
        <a class="navbar-brand  text-success" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Search</button>
                </form>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
<<<<<<< HEAD

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img class="round-img" height="30px" width="30px" src="images/{{Auth::user() ->profile_img}}"
=======
                        
                        <a id="navbarDropdown " class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img class="round-img" height="30px" width="30px" src="storage/profile_img/{{ Auth::user()->profile_img}}"
>>>>>>> 1cf931eaf44dd3b6d26871206ff32ceae909f599
                                    alt="">
                                    {{-- style="border:solid black 2px;border-radius:25%" --}}
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
<<<<<<< HEAD
                        <a href="/books" class="nav-link mt-1" style="">
=======
                        <a href="{{ route('book.index') }}" class="nav-link mt-1" style="">
>>>>>>> 1cf931eaf44dd3b6d26871206ff32ceae909f599
                            <div class="" style="height:25px;border-left: solid #8c8c8c 0.1rem;border-right: solid #8c8c8c 0.1rem">
                                <p class=""><b>Book Store</b></p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link" style="">
                            <div class="">
                                <img width="25rem" height="25rem" src="{{asset('icon/gear.svg')}}" alt="">
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link" style="">
                            <div class="">
                                <img width="25rem" height="25rem" src="{{asset('icon/question-mark.svg')}}" alt="">
                            </div>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
