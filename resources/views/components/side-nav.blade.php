<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="iconsminds-shop-4"></i>
                        <span>Dashboards</span>
                    </a>
                </li>
                @if (auth()->user()->can('manage-product'))
                    <li class="{{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                        <a href="{{ route('admin.products.index') }}">
                            <i class="simple-icon-star"></i> Products
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('manage-careers'))
                    <li class="{{ request()->routeIs('admin.career*') ? 'active' : '' }}">
                        <a href="{{ route('admin.career.index') }}">
                            <i class="simple-icon-briefcase"></i> Career
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('manage-blog'))
                    <li class="{{ request()->routeIs('admin.blog*') ? 'active' : '' }}">
                        <a href="{{ route('admin.blog.index') }}">
                            <i class="simple-icon-paper-plane"></i> Blogs
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('manage-clients'))
                    <li class="{{ request()->routeIs('admin.clients*') ? 'active' : '' }}">
                        <a href="{{ route('admin.clients.index') }}">
                            <i class="simple-icon-people"></i> Clients
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('manage-banner'))
                    <li class="{{ request()->routeIs('admin.banner*') ? 'active' : '' }}">
                        <a href="{{ route('admin.banner.index') }}">
                            <i class="simple-icon-picture"></i> Banners
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('manage-users'))
                    <li class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="simple-icon-user"></i> Users
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('manage-settings'))
                    <li class="{{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings.index') }}">
                            <i class="simple-icon-settings"></i> Settings
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
