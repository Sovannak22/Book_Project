<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
    <div class="container ">
        <!-- <a class="navbar-brand  text-success" href="{{ url('/') }}">
            {{ config('app.name', 'Book Project') }}
        </a> -->
        <a class="navbar-brand  text-success" href="{{ url('/') }}">
            <!-- {{ config('app.name', 'Book Project') }} -->
            Book Project
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

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img class="round-img" height="35px" width="35px" style="margin-right: 5px;" src="images/{{Auth::user() ->profile_img}}"
                                    alt="">
                            
                            <span class="caret" style="font-size: 15pt;padding-top: 5px;"><b>{{ Auth::user()->name }}</b></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.index') }}">
                                {{ __('Profile') }}
                            </a>
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
                        <a href="/books" class="nav-link mt-1" style="">
                            <div class="" style="height:35px;border-left: solid #8c8c8c 0.1rem;border-right: solid #8c8c8c 0.1rem;padding-top: -1px;">
                                <p style="margin-left: 5px;margin-right: 5px;padding-top: 1px;font-size:12pt;"><b>Book Store</b></p>
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
