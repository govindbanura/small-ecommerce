        <div class="container-fluid">
            <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
                <div class="col-lg-6">
                    <a href="{{'/'}}" class="text-decoration-none">
                        <span class="h1 text-uppercase text-primary bg-dark px-2">Multi</span>
                        <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                    </a>
                </div>
                <div class="col-lg-6 col-6 text-right">
                    @guest
                    <div class="nav-item">
                        @if (Route::has('login'))
                                <a class="nav-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                                <a class="nav-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </div>
                    @else
                        <div class="nav-item dropdown">
                            <a href="#" id="navbarDropdown" class="dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
        <!-- Topbar End -->
