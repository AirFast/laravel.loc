<div class="col-md-4 col-lg-3">

    @if (Auth::user()->isAdmin())
        <div class="card mb-4 border-0 shadow">
            <div class="menu-btn card-header border-0 d-flex flex-row justify-content-between">
                <h5 class="m-0">{{ __('adminpanel.admin.menu-title') }}</h5>
                <span class="menu-btn-icon-open">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </span>
                <span class="menu-btn-icon-close d-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                      <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                    </svg>
                </span>
            </div>

            <div class="card-body d-none">

                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="text-dark"
                           href="{{ route('admin.settings.index', app()->getLocale()) }}">{{ __('adminpanel.menu.settings') }}</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="text-dark"
                           href="{{ route('admin.users.index', app()->getLocale()) }}">{{ __('adminpanel.menu.users') }}</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="text-dark"
                           href="{{ route('admin.territories.index', app()->getLocale()) }}">{{ __('adminpanel.menu.territories') }}</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="text-dark"
                           href="{{ route('admin.territories.statistic', app()->getLocale()) }}">{{ __('adminpanel.territories.statistics') }}</a>
                    </li>
                </ul>

            </div>
        </div>
    @endif

    @if (Auth::user()->isAdmin() || Auth::user()->isUser())
        <div class="card mb-md-0 mb-5 border-0 shadow">
            <div class="menu-btn card-header border-0 d-flex flex-row justify-content-between">
                <h5 class="m-0">{{ __('adminpanel.user.menu-title') }}</h5>
                <span class="menu-btn-icon-open">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </span>
                <span class="menu-btn-icon-close d-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                      <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                    </svg>
                </span>
            </div>

            <div class="card-body d-none">

                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="text-dark"
                           href="{{ route('user.index', app()->getLocale()) }}">{{ __( 'adminpanel.menu.user' ) }}</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="text-dark"
                           href="{{ route('user.stand.index', app()->getLocale()) }}">{{ __('adminpanel.menu.schedule') }}</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="text-dark" href="{{ route('user.territories.index', app()->getLocale()) }}">{{ __('adminpanel.menu.territories') }}</a>
                    </li>
                </ul>

            </div>
        </div>
    @endif

</div>
