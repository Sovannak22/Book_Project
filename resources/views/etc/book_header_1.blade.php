<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="/books" class="nav-link">
                        Books
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/stores" class="nav-link">
                        Stores
                    </a>
                </li>
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
                    {{-- @php
                    $cart_id=Auth::user()->cart;
                    $books = DB::table('carts')
                    ->join('book_cart','carts.id','book_cart.cart_id')
                    ->join('books','books.id','book_cart.book_id')
                    ->where('carts.id',$cart_id)
                    ->get();
                    $bookInCart = count($books);
                    @endphp  --}}
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{route('profile.index', Auth::user()->id}}" class="dropdown-item">Profile</a>
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
                        <a href="\cart" class="rounded mx-1 nav-link bg-success d-flex" style="">
                            <i class="fa fa-shopping-cart"></i>
                            <small class="mx-3">Cart</small>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php $store=Auth::user()->store; ?>
                        @if( count($store)>0)
                        <a href="/stores/{{Auth::user()->store->id}}" class="rounded mx-1 nav-link bg-primary d-flex" style="">
                            <i class="fa fa-balance-scale"></i>
                            <small class="ml-1">Your store</small>
                        </a>
                        @endif
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
