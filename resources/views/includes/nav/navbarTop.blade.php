<nav class="navbar navbar-expand-md navbar-light bg-lancer shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{ url('/') }}">
            {{ config('app.name', 'Lancer') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto home-navs">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item home-navs">
                        <a href="{{url('/home')}}" class="nav-link text-white">
                            Home
                        </a>
                    </li>

                    <li class="nav-item dropdown ml-4 home-navs">
                        <a id="navbarDropdown" class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Categories
                        </a>

                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="navbarDropdown">
                            <ul class="nav nav-treeview home-navs">
                                <li class="nav-item">
                                    <router-link to="/manage/admin" class="nav-link">
                                        <p>Programming & Tech</p>
                                    </router-link>
                                </li>

                                <li class="nav-item">
                                    <router-link to="/manage/hotel" class="nav-link">
                                        <p>Graphics Design</p>
                                    </router-link>
                                </li>

                                <li class="nav-item">
                                    <router-link to="/manage/traveller" class="nav-link">
                                        <p>Digital Marketting</p>
                                    </router-link>
                                </li>

                                <li class="nav-item">
                                    <router-link to="/manage/transport" class="nav-link">
                                        <p>Video & Animation</p>
                                    </router-link>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <form action="#" class="d-none d-sm-block ml-4">
                        <div class="input-group search-box">
                            <input type="text" class="form-control lancer-search" placeholder="Search…">
                            <div class="input-group-prepend">
                                      <span class="input-group-text text-lancer-dark">
                                        <i class="mdi mdi mdi-magnify text-lancer-dark"></i>
                                      </span>
                            </div>
                        </div>
                    </form>
                    <notification></notification>
                    <li class="nav-item dropdown ml-2">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img class="img-bordered-sm img-sm rounded-circle" src="{{asset('storage/images/users/noimage.jpg')}}" alt="Profile image">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="navbarDropdown">
                            <ul>
                                @if(Auth::user()->role->name === 'client')
                                <li class="nav-item text-center text-dark">
                                    <a href="{{url('scrum/dashboard/profile')}}" class="dropdown-item">
                                        <p>Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item text-center text-dark">
                                    <a href="{{url('scrum/dashboard/all-project')}}" class="dropdown-item">
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                                @elseif (Auth::user()->role->name === 'freelancer')

                                <li class="nav-item text-center text-dark">
                                    <a href="{{url('freelancer/dashboard/profile')}}" class="dropdown-item">
                                        <p>Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item text-center text-dark">
                                    <a href="{{url('freelancer/dashboard/all-project')}}" class="dropdown-item">
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                                    @endif
                            </ul>
                            <a class="dropdown-item text-center" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


