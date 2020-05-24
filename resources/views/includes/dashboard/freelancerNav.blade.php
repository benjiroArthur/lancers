<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <router-link to="/dashboard/freelancer/all-project" class="nav-link">
                <p>
                    ALL PROJECTS
                </p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/dashboard/freelancer/in-progress" class="nav-link">
                <p>
                    IN PROGRESS
                </p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/dashboard/freelancer/completed" class="nav-link">
                <p>
                    COMPLETED
                </p>
            </router-link>
        </li>

        <li class="nav-item">
            <router-link to="/dashboard/freelancer/profile" class="nav-link">
                <p>
                    PROFILE
                </p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/password/update" class="nav-link">
                <p>
                    Password Update

                </p>
            </router-link>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                <p>
                    {{ __('Logout') }}
                </p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
