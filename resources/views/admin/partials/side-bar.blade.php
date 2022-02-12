<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>

                <li class=" {{ request()->routeIs('admin') ?'active':'' }}">
                    <a href="{{ route('admin') }}"><i class="la la-dashboard"></i> <span> Dashboard</span></span></a>
                </li>

                <li class="{{ request()->routeIs('category.*') ?'active':'' }}">
                    <a href="{{ route('category.index') }}"><i class="la la-list"></i> <span> Category</span></span></a>
                </li>

                <li class="{{ request()->routeIs('news.*') ?'active':'' }}">
                    <a href="{{ route('news.index') }}"><i class="la la-newspaper-o"></i> <span> News</span></span></a>
                </li>

                <li class="{{ request()->routeIs('theme.*') ?'active':'' }}">
                    <a href="{{ route('theme.index') }}"><i class="la la-newspaper-o"></i> <span> Theme Setting</span></span></a>
                </li>

                <li class="{{ request()->routeIs('promo.*') ?'active':'' }}">
                    <a href="{{ route('promo.index') }}"><i class="la la-newspaper-o"></i> <span> Promotion Setting</span></span></a>
                </li>

                <li class="{{ request()->routeIs('social.*') ?'active':'' }}">
                    <a href="{{ route('social.index') }}"><i class="la la-newspaper-o"></i> <span> Social Site Setting</span></span></a>
                </li>

                <li class="{{ request()->routeIs('about.*') ?'active':'' }}">
                    <a href="{{ route('about.index') }}"><i class="la la-newspaper-o"></i> <span> About Page</span></span></a>
                </li>

            </ul>
        </div>
    </div>
</div>
