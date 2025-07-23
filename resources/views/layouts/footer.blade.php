<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigation</h5>

                <div>
                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->

        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>

                @role('Admin|SUPER_ADMIN')
                    @can('view admin dashboard')
                        <li class="nav-item">
                            <a href="" class="nav-link" id="sidebar-dashboard-link">
                                <i class="ph-house"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    @endcan

                    <li class="nav-item nav-item-submenu">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="ph-gear-six"></i>
                            <span>System Management</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="ph-note-blank me-2"></i> Public Assets
                                </a>
                            </li>

                            @can('manage services')
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="ph-briefcase me-2"></i> Services
                                    </a>
                                </li>
                            @endcan

                            @can('manage service features')
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="ph-puzzle-piece me-2"></i> Service Features
                                    </a>
                                </li>
                            @endcan

                            @can('manage technologies')
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="ph-lightbulb me-2"></i> Technologies
                                    </a>
                                </li>
                            @endcan

                            @can('manage reasons')
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="ph-info me-2"></i> Reasons
                                    </a>
                                </li>
                            @endcan

                            @can('manage menus')
                                <li class="nav-item">
                                    <a href="" class="nav-link" id="sidebar-menus-link">
                                        <i class="ph-list-bullets me-2"></i> Menus
                                    </a>
                                </li>
                            @endcan

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="ph-users me-2"></i> Users
                                </a>
                            </li>
                        </ul>
                    </li>

                    @can('manage projects')
                        <li class="nav-item nav-item-submenu">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="ph-note-blank"></i>
                                <span>Projects</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item">
                                    <a href="" class="nav-link">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Assets & Documentations</a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    <!-- Career -->
                    <li class="nav-item nav-item-submenu">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="ph-briefcase"></i>
                            <span>Career</span>
                        </a>
                        <ul class="nav-group-sub collapse">
                            <li class="nav-item"><a href="" class="nav-link">Job Categories</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Job Postings</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Create a Job</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Applications</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Career News</a></li>
                        </ul>
                    </li>
                @endrole

                @role('User')
                    @can('view user dashboard')
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="ph-house"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="ph-credit-card"></i>
                                <span>Billing & Payment History</span>
                            </a>
                        </li>
                    @endcan

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="ph-note-blank"></i>
                            <span>Public Assets</span>
                        </a>
                    </li>

                    @can('manage projects')
                        <li class="nav-item nav-item-submenu">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="ph-note-blank"></i>
                                <span>Projects</span>
                            </a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item"><a href="" class="nav-link">Projects</a></li>
                                <li class="nav-item"><a href="" class="nav-link">Assets & Documentations</a></li>
                            </ul>
                        </li>
                    @endcan
                @endrole

                @role('Developer')
                    @can('view developer dashboard')
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="ph-code"></i>
                                <span>Developer Dashboard</span>
                            </a>
                        </li>
                    @endcan

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="ph-note-blank"></i>
                            <span>Public Assets</span>
                        </a>
                    </li>
                @endrole

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentPath = window.location.pathname.replace(/\/$/, '');

        document.querySelectorAll('.sidebar .nav-link[href]').forEach(function (link) {
            const href = link.getAttribute('href');
            if (!href || href === 'javascript:void(0);') return;

            const linkPath = (new URL(href, window.location.origin)).pathname.replace(/\/$/, '');

            if (linkPath === currentPath) {
                link.classList.add('active');

                const navItemSubmenu = link.closest('.nav-item-submenu');
                if (navItemSubmenu) {
                    navItemSubmenu.classList.add('nav-item-open');

                    const navGroupSub = navItemSubmenu.querySelector('.nav-group-sub');
                    if (navGroupSub) {
                        navGroupSub.classList.add('show');
                    }

                    const parentMenuLink = navItemSubmenu.querySelector(':scope > .nav-link');
                    if (parentMenuLink) {
                        parentMenuLink.classList.add('active');
                    }
                }
            }
        });

        const careerPaths = [
            '{{ rtrim(route('admin.career.categories.index', [], false), '/') }}',
            '{{ rtrim(route('admin.career.jobs.index', [], false), '/') }}',
            '{{ rtrim(route('admin.career.applications.index', [], false), '/') }}',
            '{{ rtrim(route('admin.career.news.index', [], false), '/') }}'
        ];
        const path = window.location.pathname.replace(/\/$/, '');

        if (careerPaths.some(careerPath => path.startsWith(careerPath))) {
            const careerIcon = document.querySelector('.nav-item-submenu .nav-link i.ph-briefcase');
            if (careerIcon) {
                const careerNavItem = careerIcon.closest('.nav-item-submenu');
                const careerNavLink = careerNavItem.querySelector('.nav-link');
                const careerNavGroup = careerNavItem.querySelector('.nav-group-sub');

                careerNavItem.classList.add('nav-item-open');
                careerNavLink.classList.add('active');
                careerNavGroup.classList.add('show');
            }
        }
    });
</script> --}}
