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
                <!-- Dashboard for Admin -->


                @role('Admin|SUPER_ADMIN')
                    @can('view admin dashboard')
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link" id="sidebar-dashboard-link">
                                <i class="ph-house"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    @endcan



                   



                 


                    {{-- Roles & Permissions dropdown (keep) --}}
                    {{-- @canany(['manage roles', 'manage permissions', 'assign roles', 'assign permissions'])
                        <li class="nav-item nav-item-submenu" id="sidebar-roles-permissions">
                            <a href="javascript:void(0);" class="nav-link" id="sidebar-roles-link">
                                <i class="ph-layout"></i>
                                <span>Roles Permissions</span>
                            </a>
                            <ul class="nav-group-sub collapse" id="sidebar-roles-submenu">
                                @can('manage roles')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.roles.index') }}" class="nav-link"
                                            id="sidebar-roles-item">Roles</a>
                                    </li>
                                @endcan
                                @can('manage permissions')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.permissions.index') }}" class="nav-link"
                                            id="sidebar-permissions-item">Permissions</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany --}}


                @endrole



















            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>


