<nav class="main-header navbar navbar-expand navbar-white bg-lancer">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>


    <!-- Right navbar links -->
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
                        <li class="nav-item mt-2">
                            <router-link to="/manage/admin" class="nav-link text-dark">
                                <p>Programming & Tech</p>
                            </router-link>
                        </li>

                        <li class="nav-item mt-2">
                            <router-link to="/manage/hotel" class="nav-link text-dark">
                                <p>Graphics Design</p>
                            </router-link>
                        </li>

                        <li class="nav-item mt-2">
                            <router-link to="/manage/traveller" class="nav-link text-dark">
                                <p>Digital Marketting</p>
                            </router-link>
                        </li>

                        <li class="nav-item mt-2">
                            <router-link to="/manage/transport" class="nav-link text-dark">
                                <p>Video & Animation</p>
                            </router-link>
                        </li>

                    </ul>
                </div>
            </li>
           {{-- <form action="#" class="d-none d-sm-block ml-4">
                <div class="input-group search-box">
                    <input type="text" class="form-control lancer-search" placeholder="Search…">
                    <div class="input-group-prepend">
                                      <span class="input-group-text text-lancer-dark">
                                        <i class="mdi mdi mdi-magnify text-lancer-dark"></i>
                                      </span>
                    </div>
                </div>
            </form>--}}
        <!-- SEARCH FORM -->
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

                        @if(Auth::user()->role->name === 'client')

                                <a href="{{url('scrum/dashboard/profile')}}" class="dropdown-item text-center">
                                    <p>Profile</p>
                                </a>


                                <a href="{{url('scrum/dashboard/all-project')}}" class="dropdown-item text-center">
                                    <p>Dashboard</p>
                                </a>

                        @elseif (Auth::user()->role->name === 'freelancer')


                                <a href="{{url('freelancer/dashboard/profile')}}" class="dropdown-item text-center">
                                    <p>Profile</p>
                                </a>


                                <a href="{{url('freelancer/dashboard/all-project')}}" class="dropdown-item text-center">
                                    <p>Dashboard</p>
                                </a>

                        @endif

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
</nav>
<!-- /.navbar -->
