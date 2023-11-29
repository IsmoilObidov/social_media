<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="/" class="text-nowrap logo-img">
                <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Main</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('/') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-home"></i>
                        </span>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('new_post') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-file-plus"></i>
                        </span>
                        <span class="hide-menu">New post</span>
                    </a>
                </li>
            </ul>

            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Chat</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('chat') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-brand-twitch"></i>
                        </span>
                        <span class="hide-menu">Chat</span>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->


</aside>
