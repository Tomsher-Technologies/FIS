<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="iconsminds-shop-4"></i>
                        <span>Dashboards</span>
                    </a>
                </li>





                @if (auth()->user()->can('manage-users'))
                    <li class="{{ request()->routeIs('users*') ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="simple-icon-user"></i> Users
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">


        </div>
    </div>
</div>
