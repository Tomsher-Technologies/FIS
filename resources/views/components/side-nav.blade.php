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
                @if (auth()->user()->can('manage-businesses'))
                    <li class="{{ request()->routeIs('admin.businesses*') ? 'active' : '' }}">
                        <a href="#businesses">
                            <i class="simple-icon-wallet"></i> Businesses
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
                @if (auth()->user()->can('manage-gallery'))
                    <li class="{{ request()->routeIs('admin.gallery*') ? 'active' : '' }}">
                        <a href="{{ route('admin.gallery') }}">
                            <i class="simple-icon-picture"></i> Gallery
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
                @if (auth()->user()->can('manage-pages'))
                    <li class="{{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings.index') }}">
                            <i class="simple-icon-settings"></i> Settings
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('manage-settings'))
                    <li class="{{ request()->routeIs('admin.page*') ? 'active' : '' }}">
                        <a href="#pages">
                            <i class="simple-icon-notebook"></i> Page Settings
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
    <div class="sub-menu default-transition">
        <div class="scroll ps">
            <ul class="list-unstyled" data-link="businesses">
                <li class="{{ (request()->routeIs('admin.businesses.index') ||  request()->routeIs('admin.businesses.create')) ? 'active' : '' }}">
                    <a href="{{ route('admin.businesses.index') }}">
                        <i class="simple-icon-rocket"></i> <span class="d-inline-block">Agencies/Catalogue/Materials</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.businesses.index') }}">
                        <i class="simple-icon-pie-chart"></i> <span class="d-inline-block">Production</span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled" data-link="pages">
                <li class="{{ (request()->routeIs('admin.page.privacy') ||  request()->routeIs('admin.page.privacy')) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.privacy') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Privacy Policy & Terms</span>
                    </a>
                </li>
                <li class="{{ (request()->routeIs('admin.page.faq') ||  request()->routeIs('admin.page.faq-create') ||  request()->routeIs('admin.page.faq-settings')) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.faq') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Help & FAQ</span>
                    </a>
                </li>
                <li class="{{ (request()->routeIs('admin.page.about-us') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.about-us') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">About Us</span>
                    </a>
                </li>
                <li class="{{ (request()->routeIs('admin.page.history')) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.history') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">History And Evolution</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.mission-vision') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.mission-vision') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Mission & Vision</span>
                    </a>
                </li>
                <li class="{{ (request()->routeIs('admin.page.awards')) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.awards') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Awards & Accolades</span>
                    </a>
                </li>
            </ul>
            
        </div>
    </div>

</div>
