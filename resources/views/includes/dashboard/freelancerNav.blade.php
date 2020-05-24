<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <router-link to="/freelancer/dashboard/all-project" class="nav-link text-white">

                    ALL PROJECTS

            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/freelancer/dashboard/in-progress" class="nav-link text-white">

                    IN PROGRESS

            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/freelancer/dashboard/completed" class="nav-link text-white">
                <p>
                    COMPLETED
                </p>
            </router-link>
        </li>

        <li class="nav-item">
            <router-link to="/freelancer/dashboard/all-jobs" class="nav-link text-white">
                <p>
                    BROWSE JOBS
                </p>
            </router-link>
        </li>

        <li class="nav-item">
            <router-link to="/freelancer/dashboard/submit-jobs" class="nav-link text-white">
                <p>
                    SUBMIT JOBS
                </p>
            </router-link>
        </li>

        <li class="nav-item">
            <router-link to="/freelancer/dashboard/profile" class="nav-link text-white">
                <p>
                    PROFILE
                </p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/password/update" class="nav-link text-white">
                <p>
                    PASSWORD UPDATE

                </p>
            </router-link>
        </li>


        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                <p>
                    {{ __('LOGOUT') }}
                </p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
