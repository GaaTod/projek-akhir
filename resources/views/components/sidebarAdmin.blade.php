<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard.admin') }}">
            <span class="align-middle">Sistem Informasi Alumni</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('dashboard.admin') }}">
                    <i class="bi bi-house"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('user-admin') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('user-admin') }}">
                    <i class="bi bi-people"></i>
                    <span class="align-middle">Users</span>
                </a>
            </li>

            <li class="sidebar-header">Menu</li>

            <li class="sidebar-item">
                <a class="sidebar-link d-flex align-items-center {{ request()->routeIs('dataAlumni-admin') || request()->routeIs('angkatan.index') ? 'active' : '' }}"
                    data-bs-toggle="collapse" href="#dataAlumni" role="button"
                    aria-expanded="{{ request()->routeIs('dataAlumni-admin') || request()->routeIs('angkatan.index') ? 'true' : 'false' }}"
                    aria-controls="dataAlumni">
                    <i class="bi bi-database me-2"></i>
                    <span>Data Alumni</span>
                    <i class="bi bi-caret-down-fill ms-auto"></i>
                </a>

                <ul class="collapse list-unstyled ps-4 {{ request()->routeIs('dataAlumni-admin') || request()->routeIs('angkatan.index') ? 'show' : '' }}"
                    id="dataAlumni">
                    <li class="sidebar-item {{ request()->routeIs('dataAlumni-admin') ? 'active' : '' }}">
                        <a href="{{ route('dataAlumni-admin') }}"
                            class="sidebar-link {{ request()->routeIs('dataAlumni-admin') ? 'active' : '' }}">
                            Biodata
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('angkatan.index') ? 'active' : '' }}">
                        <a href="{{ route('angkatan.index') }}"
                            class="sidebar-link {{ request()->routeIs('angkatan.index') ? 'active' : '' }}">
                            Angkatan
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item {{ request()->routeIs('dataForum-admin') ? 'active' : '' }}">
                <a href="{{ route('dataForum-admin') }}"
                    class="sidebar-link {{ request()->routeIs('dataForum-admin') ? 'active' : '' }}">
                    <i class="bi bi-database me-2"></i>
                    Forum
                </a>
            </li>
        </ul>
    </div>
</nav>
