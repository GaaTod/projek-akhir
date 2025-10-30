<nav class="navbar navbar-expand navbar-light navbar-bg px-3">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ms-auto align-items-center">
            <!-- Notifikasi -->
            <li class="nav-item">
                <a class="nav-link btn btn-light rounded shadow-sm mx-1" href="#">
                    <i class="bi bi-bell-fill fs-5 fw-bold"></i>
                </a>
            </li>
            <!-- Logout -->
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link btn btn-light rounded shadow-sm mx-1" href="route('logout')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        <i class="bi bi-box-arrow-right fs-5 fw-bold"></i>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</nav>
