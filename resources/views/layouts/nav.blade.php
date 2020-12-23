<div class="col-md-4 col-lg-3">

    @if (Auth::user()->isAdmin())
        <div class="card mb-4 border-0 shadow">
            <div class="card-header border-0">
                <h5 class="m-0">{{ __('adminpanel.admin.menu-title') }}</h5>
            </div>

            <div class="card-body">

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
                </ul>

            </div>
        </div>
    @endif

    @if (Auth::user()->isAdmin() || Auth::user()->isUser())
        <div class="card mb-md-0 mb-5 border-0 shadow">
            <div class="card-header border-0">
                <h5 class="m-0">{{ __('adminpanel.user.menu-title') }}</h5>
            </div>

            <div class="card-body">

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
                        <a class="text-dark" href="#">{{ __('adminpanel.menu.territories') }}</a>
                    </li>
                </ul>

            </div>
        </div>
    @endif

</div>
