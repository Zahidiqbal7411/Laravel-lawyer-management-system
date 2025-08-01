@extends('layouts.app')


@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    User Pages - <span class="fw-normal">Tabbed Profile</span>
                </h4>

                <a href="#page_header"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>

            <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
                    <div class="dropdown w-100 w-sm-auto">
                        <a href="#" class="d-flex align-items-center text-body lh-1 dropdown-toggle py-sm-2"
                            data-bs-toggle="dropdown" data-bs-display="static">
                            <img src="../../../assets/images/brands/tesla.svg" class="w-32px h-32px me-2" alt="">
                            <div class="me-auto me-lg-1">
                                <div class="fs-sm text-muted mb-1">Customer</div>
                                <div class="fw-semibold">Tesla Motors Inc</div>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-lg-end w-100 w-lg-auto wmin-300 wmin-sm-350 pt-0">
                            <div class="d-flex align-items-center p-3">
                                <h6 class="fw-semibold mb-0">Customers</h6>
                                <a href="#" class="ms-auto">
                                    View all
                                    <i class="ph-arrow-circle-right ms-1"></i>
                                </a>
                            </div>
                            <a href="#" class="dropdown-item active py-2">
                                <img src="../../../assets/images/brands/tesla.svg" class="w-32px h-32px me-2"
                                    alt="">
                                <div>
                                    <div class="fw-semibold">Tesla Motors Inc</div>
                                    <div class="fs-sm text-muted">42 users</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item py-2">
                                <img src="../../../assets/images/brands/debijenkorf.svg" class="w-32px h-32px me-2"
                                    alt="">
                                <div>
                                    <div class="fw-semibold">De Bijenkorf</div>
                                    <div class="fs-sm text-muted">49 users</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item py-2">
                                <img src="../../../assets/images/brands/klm.svg" class="w-32px h-32px me-2" alt="">
                                <div>
                                    <div class="fw-semibold">Royal Dutch Airlines</div>
                                    <div class="fs-sm text-muted">18 users</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item py-2">
                                <img src="../../../assets/images/brands/shell.svg" class="w-32px h-32px me-2"
                                    alt="">
                                <div>
                                    <div class="fw-semibold">Royal Dutch Shell</div>
                                    <div class="fs-sm text-muted">54 users</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item py-2">
                                <img src="../../../assets/images/brands/bp.svg" class="w-32px h-32px me-2" alt="">
                                <div>
                                    <div class="fw-semibold">BP plc</div>
                                    <div class="fs-sm text-muted">23 users</div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="vr d-none d-sm-block flex-shrink-0 my-2 mx-3"></div>

                    <div class="d-inline-flex mt-3 mt-sm-0">
                        <a href="#" class="status-indicator-container ms-1">
                            <img src="../../../assets/images/demo/users/face24.jpg" class="w-32px h-32px rounded-pill"
                                alt="">
                            <span class="status-indicator bg-warning"></span>
                        </a>
                        <a href="#" class="status-indicator-container ms-1">
                            <img src="../../../assets/images/demo/users/face1.jpg" class="w-32px h-32px rounded-pill"
                                alt="">
                            <span class="status-indicator bg-success"></span>
                        </a>
                        <a href="#" class="status-indicator-container ms-1">
                            <img src="../../../assets/images/demo/users/face3.jpg" class="w-32px h-32px rounded-pill"
                                alt="">
                            <span class="status-indicator bg-danger"></span>
                        </a>
                        <a href="#" class="btn btn-outline-primary btn-icon w-32px h-32px rounded-pill ms-3">
                            <i class="ph-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="#" class="breadcrumb-item">User pages</a>
                    <span class="breadcrumb-item active">Tabbed profile</span>
                </div>

                <a href="#breadcrumb_elements"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>

            <div class="collapse d-lg-block ms-lg-auto" id="breadcrumb_elements">
                <div class="d-lg-flex mb-2 mb-lg-0">
                    <a href="#" class="d-flex align-items-center text-body py-2">
                        <i class="ph-lifebuoy me-2"></i>
                        Support
                    </a>

                    <div class="dropdown ms-lg-3">
                        <a href="#" class="d-flex align-items-center text-body dropdown-toggle py-2"
                            data-bs-toggle="dropdown">
                            <i class="ph-gear me-2"></i>
                            <span class="flex-1">Settings</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end w-100 w-lg-auto">
                            <a href="#" class="dropdown-item">
                                <i class="ph-shield-warning me-2"></i>
                                Account security
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-chart-bar me-2"></i>
                                Analytics
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ph-lock-key me-2"></i>
                                Privacy
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="ph-gear me-2"></i>
                                All settings
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Inner container -->
        <div class="d-lg-flex align-items-lg-start">

            <!-- Left sidebar component -->
            <div class="sidebar sidebar-component sidebar-expand-lg bg-transparent shadow-none me-lg-3">

                <!-- Sidebar content -->
                <div class="sidebar-content">

                    <!-- Navigation -->
                    <div class="card">
                        <div class="sidebar-section-body text-center">
                            <div class="card-img-actions d-inline-block mb-3">
                                <img class="img-fluid rounded-circle" src="{{ asset($user->profile) }}"
                                    width="150" height="150" alt="">
                                {{-- <div class="card-img-actions-overlay card-img rounded-circle">
                                    <a href="#" class="btn btn-outline-white btn-icon rounded-pill">
                                        <i class="ph-pencil"></i>
                                    </a>
                                </div> --}}
                            </div>

                            <h6 class="mb-0">{{ $user->name }}</h6>
                            <span class="text-muted">{{ $user->getRoleNames()->first() }}</span>
                        </div>

                        <ul class="nav nav-sidebar">
                            <li class="nav-item">
                                <a href="#profile" class="nav-link active" data-bs-toggle="tab">
                                    <i class="ph-user me-2"></i>
                                    My profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#schedule" class="nav-link" data-bs-toggle="tab">
                                    <i class="ph-calendar me-2"></i>
                                    Schedule
                                    <span class="fs-sm fw-normal text-muted ms-auto">02:56pm</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#inbox" class="nav-link" data-bs-toggle="tab">
                                    <i class="ph-envelope me-2"></i>
                                    Inbox
                                    <span class="badge bg-secondary rounded-pill ms-auto">29</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#orders" class="nav-link" data-bs-toggle="tab">
                                    <i class="ph-shopping-cart me-2"></i>
                                    Orders
                                    <span class="badge bg-secondary rounded-pill ms-auto">16</span>
                                </a>
                            </li>
                            <li class="nav-item-divider"></li>
                           <li class="nav-item">
                                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ph-sign-out me-2"></i>
                                    Logout
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </ul>
                    </div>
                    <!-- /navigation -->


                    <!-- Online users -->
                    {{-- <div class="card">
                        <div class="sidebar-section-header d-flex border-bottom">
                            <span class="fw-semibold">Online users</span>
                            <div class="ms-auto">
                                <span class="badge bg-success rounded-pill">49</span>
                            </div>
                        </div>

                        <div class="sidebar-section-body">
                            <div class="hstack gap-3 mb-3">
                                <img src="../../../assets/images/demo/users/face1.jpg" class="rounded-circle"
                                    width="40" height="40" alt="">

                                <div class="flex-fill">
                                    <a href="#" class="fw-semibold">James Alexander</a>
                                    <div class="fs-sm text-muted">Santa Ana, CA.</div>
                                </div>

                                <div class="bg-success border-success rounded-pill p-1"></div>
                            </div>

                            <div class="hstack gap-3 mb-3">
                                <img src="../../../assets/images/demo/users/face2.jpg" class="rounded-circle"
                                    width="40" height="40" alt="">

                                <div class="flex-fill">
                                    <a href="#" class="fw-semibold">Jeremy Victorino</a>
                                    <div class="fs-sm text-muted">Dowagiac, MI.</div>
                                </div>

                                <div class="bg-danger border-danger rounded-pill p-1"></div>
                            </div>

                            <div class="hstack gap-3 mb-3">
                                <img src="../../../assets/images/demo/users/face3.jpg" class="rounded-circle"
                                    width="40" height="40" alt="">

                                <div class="flex-fill">
                                    <a href="#" class="fw-semibold">Margo Baker</a>
                                    <div class="fs-sm text-muted">Kasaan, AK.</div>
                                </div>

                                <div class="bg-success border-success rounded-pill p-1"></div>
                            </div>

                            <div class="hstack gap-3 mb-3">
                                <img src="../../../assets/images/demo/users/face4.jpg" class="rounded-circle"
                                    width="40" height="40" alt="">

                                <div class="flex-fill">
                                    <a href="#" class="fw-semibold">Beatrix Diaz</a>
                                    <div class="fs-sm text-muted">Neenah, WI.</div>
                                </div>

                                <div class="bg-warning border-warning rounded-pill p-1"></div>
                            </div>

                            <div class="hstack gap-3">
                                <img src="../../../assets/images/demo/users/face5.jpg" class="rounded-circle"
                                    width="40" height="40" alt="">

                                <div class="flex-fill">
                                    <a href="#" class="fw-semibold">Richard Vango</a>
                                    <div class="fs-sm text-muted">Grapevine, TX.</div>
                                </div>

                                <div class="bg-secondary border-secondary rounded-pill p-1"></div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-between align-items-center py-2">
                            <a href="#" class="text-body">All users</a>

                            <div>
                                <a href="#" class="text-body" data-bs-popup="tooltip" title="Conference room">
                                    <i class="ph-chats"></i>
                                </a>
                                <a href="#" class="text-body ms-2" data-bs-popup="tooltip" title="Settings">
                                    <i class="ph-gear"></i>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /online users -->


                    <!-- Latest connections -->
                    {{-- <div class="card">
                        <div class="sidebar-section-header d-flex border-bottom">
                            <span class="fw-semibold">Latest connections</span>
                            <div class="ms-auto">
                                <span class="badge bg-success rounded-pill">+32</span>
                            </div>
                        </div>

                        <div class="list-group list-group-borderless py-2">
                            <div class="list-group-item text-muted">Office staff</div>

                            <a href="#" class="list-group-item list-group-item-action hstack gap-3">
                                <img src="../../../assets/images/demo/users/face1.jpg" class="rounded-circle"
                                    width="40" height="40" alt="">

                                <div class="flex-fill">
                                    <div class="fw-semibold">James Alexander</div>
                                    <span class="text-muted">UI/UX expert</span>
                                </div>

                                <div class="bg-success rounded-pill p-1"></div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action hstack gap-3">
                                <img src="../../../assets/images/demo/users/face2.jpg" class="rounded-circle"
                                    width="40" height="40" alt="">

                                <div class="flex-fill">
                                    <div class="fw-semibold">Jeremy Victorino</div>
                                    <span class="text-muted">Senior designer</span>
                                </div>

                                <div class="bg-danger rounded-pill p-1"></div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action hstack gap-3">
                                <img src="../../../assets/images/demo/users/face6.jpg" class="rounded-circle"
                                    width="40" height="40" alt="">

                                <div class="flex-fill">
                                    <div class="fw-semibold">Jordana Mills</div>
                                    <span class="text-muted">Sales consultant</span>
                                </div>

                                <div class="bg-secondary rounded-pill p-1"></div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action hstack gap-3">
                                <img src="../../../assets/images/demo/users/face9.jpg" class="rounded-circle"
                                    width="40" height="40" alt="">

                                <div class="flex-fill">
                                    <div class="fw-semibold">William Miles</div>
                                    <span class="text-muted">SEO expert</span>
                                </div>

                                <div class="bg-success rounded-pill p-1"></div>
                            </a>

                            <div class="list-group-item text-muted">Partners</div>

                            <a href="#" class="list-group-item list-group-item-action hstack gap-3">
                                <img src="../../../assets/images/demo/users/face3.jpg" class="rounded-circle"
                                    width="40" height="40" alt="">

                                <div class="flex-fill">
                                    <div class="fw-semibold">Margo Baker</div>
                                    <span class="text-muted">Google</span>
                                </div>

                                <div class="bg-success rounded-pill p-1"></div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action hstack gap-3">
                                <img src="../../../assets/images/demo/users/face4.jpg" class="rounded-circle"
                                    width="40" height="40" alt="">

                                <div class="flex-fill">
                                    <div class="fw-semibold">Beatrix Diaz</div>
                                    <span class="text-muted">Facebook</span>
                                </div>

                                <div class="bg-warning rounded-pill p-1"></div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action hstack gap-3">
                                <img src="../../../assets/images/demo/users/face5.jpg" class="rounded-circle"
                                    width="40" height="40" alt="">

                                <div class="flex-fill">
                                    <div class="fw-semibold">Richard Vango</div>
                                    <span class="text-muted">Microsoft</span>
                                </div>

                                <div class="bg-secondary rounded-pill p-1"></div>
                            </a>
                        </div>
                    </div> --}}
                    <!-- /latest connections -->

                </div>
                <!-- /sidebar content -->

            </div>
            <!-- /left sidebar component -->


            <!-- Right content -->
            <div class="tab-content flex-fill">
                <div class="tab-pane fade active show" id="profile">

                    <!-- Sales stats -->
                    {{-- <div class="card">
                        <div class="card-header d-sm-flex">
                            <h5 class="mb-0">Weekly statistics</h5>
                            <div class="mt-2 mt-sm-0 ms-auto">
                                <span>
                                    <i class="ph-clock-counter-clockwise me-1"></i>
                                    Updated 2 hours ago
                                </span>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="tornado_negative_stack"></div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /sales stats -->


                    <!-- Profile info -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Profile information</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route(getPrefix() . 'user-profiles.update',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Full name</label>
                                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="number" name="phone" value="{{ $user->phone }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Company</label>
                                            <input type="text" name="company" value="{{ $user->company }}" class="form-control">
                                        </div>
                                    </div>
                                </div>





                                <div class="row">


                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Upload profile image</label>
                                            <input type="file" name="profile" class="form-control">
                                            <div class="form-text text-muted">Accepted formats: gif, png, jpg. Max file
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                   <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Project Description</label>

                                            <!-- Project Description Textarea -->
                                            <textarea class="form-control" name="project_description" rows="4" placeholder="Enter project description here..." >{{ $user->project_description }}</textarea>

                                            @error('project_description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /profile info -->


                    <!-- Account settings -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Account settings</h5>
                        </div>

                        <div class="card-body">

                           <form action="{{ route(getPrefix() . 'user-profile.password_update', Auth::user()->id) }}" method="POST">
    @csrf
    @method('POST')

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">New password</label>
                <input type="password" name="password" placeholder="Enter new password" class="form-control">
                @error('password')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Repeat password</label>
                <input type="password" name="password_confirmation" placeholder="Repeat new password" class="form-control">
                @error('password_confirmation')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>

                        </div>
                    </div>
                    <!-- /account settings -->

                </div>

                <div class="tab-pane fade" id="schedule">

                    <!-- Available hours -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Available hours</h5>
                        </div>

                        <div class="card-body">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="available_hours"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /available hours -->


                    <!-- Schedule -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">My schedule</h5>
                        </div>

                        <div class="card-body">
                            <div class="my-schedule"></div>
                        </div>
                    </div>
                    <!-- /schedule -->

                </div>

                <div class="tab-pane fade" id="inbox">

                    <!-- My inbox -->
                    <div class="card">
                        <div class="card-header d-flex">
                            <h5 class="mb-0">My Inbox</h5>

                            <div class="ms-auto">
                                <span class="badge bg-primary">25 today</span>
                            </div>
                        </div>

                        <!-- Action toolbar -->
                        <div class="card-body d-flex align-items-start flex-wrap border-bottom">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light btn-icon btn-checkbox-all">
                                    <input type="checkbox" class="form-check-input">
                                </button>
                                <button type="button" class="btn btn-light btn-icon dropdown-toggle"
                                    data-bs-toggle="dropdown"></button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Select all</a>
                                    <a href="#" class="dropdown-item">Select read</a>
                                    <a href="#" class="dropdown-item">Select unread</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">Clear selection</a>
                                </div>
                            </div>

                            <div class="d-inline-flex hstack gap-2 gap-lg-3 ms-3">
                                <button type="button" class="btn btn-primary">
                                    <i class="ph-pencil"></i>
                                    <span class="d-none d-lg-inline-block ms-2">Compose</span>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light">
                                        <i class="ph-trash"></i>
                                        <span class="d-none d-lg-inline-block ms-2">Delete</span>
                                    </button>
                                    <button type="button" class="btn btn-light">
                                        <i class="ph-warning-octagon"></i>
                                        <span class="d-none d-lg-inline-block ms-2">Spam</span>
                                    </button>
                                </div>
                            </div>

                            <div
                                class="d-inline-flex align-items-center hstack gap-2 gap-lg-3 w-100 w-lg-auto mt-2 mt-lg-0 ms-lg-auto">
                                <div><span class="fw-semibold">1-50</span> of <span class="fw-semibold">528</span></div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-light btn-icon disabled">
                                        <i class="ph-arrow-left"></i>
                                    </button>
                                    <button type="button" class="btn btn-light btn-icon">
                                        <i class="ph-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-light btn-icon dropdown-toggle"
                                        data-bs-toggle="dropdown">
                                        <i class="ph-gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" class="dropdown-item">Action</a>
                                        <a href="#" class="dropdown-item">Another action</a>
                                        <a href="#" class="dropdown-item">Something else here</a>
                                        <a href="#" class="dropdown-item">One more line</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /action toolbar -->


                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-inbox">
                                <tbody>
                                    <tr class="unread">
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-muted opacity-25"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <img src="../../../assets/images/brands/spotify.svg" class="rounded-circle"
                                                width="32" height="32" alt="">
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">Spotify</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject">On Tower-hill, as you go down
                                                &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">To the London docks, you may have seen a
                                                crippled beggar (or KEDGER, as the sailors say) holding a painted board
                                                before him, representing the tragic scene in which he lost his leg</span>
                                        </td>
                                        <td class="table-inbox-attachment">
                                            <i class="ph-paperclip text-muted"></i>
                                        </td>
                                        <td class="table-inbox-time">
                                            11:09 pm
                                        </td>
                                    </tr>

                                    <tr class="unread">
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-muted opacity-25"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <div class="bg-warning text-white lh-1 rounded-pill p-1">
                                                <span class="letter-icon fs-sm"></span>
                                            </div>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">James Alexander</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject"><span
                                                    class="badge bg-success align-top me-2">Promo</span> There are three
                                                whales and three boats &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">And one of the boats (presumed to contain
                                                the missing leg in all its original integrity) is being crunched by the jaws
                                                of the foremost whale</span>
                                        </td>
                                        <td class="table-inbox-attachment">
                                            <i class="ph-paperclip text-muted"></i>
                                        </td>
                                        <td class="table-inbox-time">
                                            10:21 pm
                                        </td>
                                    </tr>

                                    <tr class="unread">
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-warning"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <div class="bg-primary text-white lh-1 rounded-pill p-1">
                                                <span class="letter-icon fs-sm"></span>
                                            </div>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">Nathan Jacobson</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject">Any time these ten years, they tell me, has
                                                that man held up &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">That picture, and exhibited that stump to an
                                                incredulous world. But the time of his justification has now come. His three
                                                whales are as good whales as were ever published in Wapping, at any rate;
                                                and his stump</span>
                                        </td>
                                        <td class="table-inbox-attachment"></td>
                                        <td class="table-inbox-time">
                                            8:37 pm
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-warning"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <div class="bg-pink text-white lh-1 rounded-pill p-1">
                                                <span class="letter-icon fs-sm"></span>
                                            </div>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">Margo Baker</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject">Throughout the Pacific, and also in
                                                Nantucket, and New Bedford &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">and Sag Harbor, you will come across lively
                                                sketches of whales and whaling-scenes, graven by the fishermen themselves on
                                                Sperm Whale-teeth, or ladies' busks wrought out of the Right
                                                Whale-bone</span>
                                        </td>
                                        <td class="table-inbox-attachment"></td>
                                        <td class="table-inbox-time">
                                            4:28 am
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-muted opacity-25"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <img src="../../../assets/images/brands/dribbble.svg" class="rounded-circle"
                                                width="32" height="32" alt="">
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">Dribbble</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject">The whalemen call the numerous little
                                                ingenious contrivances &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">They elaborately carve out of the rough
                                                material, in their hours of ocean leisure. Some of them have little boxes of
                                                dentistical-looking implements</span>
                                        </td>
                                        <td class="table-inbox-attachment"></td>
                                        <td class="table-inbox-time">
                                            Dec 5
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-muted opacity-25"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <div class="bg-indigo text-white lh-1 rounded-pill p-1">
                                                <span class="letter-icon fs-sm"></span>
                                            </div>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">Hanna Dorman</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject">Some of them have little boxes of
                                                dentistical-looking implements &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">Specially intended for the skrimshandering
                                                business. But, in general, they toil with their jack-knives alone; and, with
                                                that almost omnipotent tool of the sailor</span>
                                        </td>
                                        <td class="table-inbox-attachment">
                                            <i class="ph-paperclip text-muted"></i>
                                        </td>
                                        <td class="table-inbox-time">
                                            Dec 5
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-muted opacity-25"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <img src="../../../assets/images/brands/twitter.svg" class="rounded-circle"
                                                width="32" height="32" alt="">
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">Twitter</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject"><span
                                                    class="badge bg-indigo align-top me-2">Order</span> Long exile from
                                                Christendom &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">And civilization inevitably restores a man
                                                to that condition in which God placed him, i.e. what is called
                                                savagery</span>
                                        </td>
                                        <td class="table-inbox-attachment"></td>
                                        <td class="table-inbox-time">
                                            Dec 4
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-warning"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <div class="bg-teal text-white lh-1 rounded-pill p-1">
                                                <span class="letter-icon fs-sm"></span>
                                            </div>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">Vanessa Aurelius</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject">Your true whale-hunter is as much a savage as
                                                an Iroquois &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">I myself am a savage, owning no allegiance
                                                but to the King of the Cannibals; and ready at any moment to rebel against
                                                him. Now, one of the peculiar characteristics of the savage in his domestic
                                                hours</span>
                                        </td>
                                        <td class="table-inbox-attachment">
                                            <i class="ph-paperclip text-muted"></i>
                                        </td>
                                        <td class="table-inbox-time">
                                            Dec 4
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-muted opacity-25"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <div class="bg-purple text-white lh-1 rounded-pill p-1">
                                                <span class="letter-icon fs-sm"></span>
                                            </div>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">William Brenson</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject">An ancient Hawaiian war-club or spear-paddle
                                                &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">In its full multiplicity and elaboration of
                                                carving, is as great a trophy of human perseverance as a Latin lexicon. For,
                                                with but a bit of broken sea-shell or a shark's tooth</span>
                                        </td>
                                        <td class="table-inbox-attachment">
                                            <i class="ph-paperclip text-muted"></i>
                                        </td>
                                        <td class="table-inbox-time">
                                            Dec 4
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-muted opacity-25"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <img src="../../../assets/images/brands/facebook.svg" class="rounded-circle"
                                                width="32" height="32" alt="">
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">Facebook</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject">As with the Hawaiian savage, so with the
                                                white sailor-savage &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">With the same marvellous patience, and with
                                                the same single shark's tooth, of his one poor jack-knife, he will carve you
                                                a bit of bone sculpture, not quite as workmanlike</span>
                                        </td>
                                        <td class="table-inbox-attachment"></td>
                                        <td class="table-inbox-time">
                                            Dec 3
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-warning"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <div class="bg-success text-white lh-1 rounded-pill p-1">
                                                <span class="letter-icon fs-sm"></span>
                                            </div>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">Vicky Barna</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject"><span
                                                    class="badge bg-pink align-top me-2">Track</span> Achilles's shield
                                                &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">Wooden whales, or whales cut in profile out
                                                of the small dark slabs of the noble South Sea war-wood, are frequently met
                                                with in the forecastles of American whalers. Some of them are done with much
                                                accuracy</span>
                                        </td>
                                        <td class="table-inbox-attachment"></td>
                                        <td class="table-inbox-time">
                                            Dec 2
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-muted opacity-25"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <img src="../../../assets/images/brands/youtube.svg" class="rounded-circle"
                                                width="32" height="32" alt="">
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">Youtube</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject">At some old gable-roofed country houses
                                                &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">You will see brass whales hung by the tail
                                                for knockers to the road-side door. When the porter is sleepy, the
                                                anvil-headed whale would be best. But these knocking whales are seldom
                                                remarkable as faithful essays</span>
                                        </td>
                                        <td class="table-inbox-attachment">
                                            <i class="ph-paperclip text-muted"></i>
                                        </td>
                                        <td class="table-inbox-time">
                                            Nov 30
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-muted opacity-25"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <div class="bg-warning text-white lh-1 rounded-pill p-1">
                                                <span class="letter-icon fs-sm"></span>
                                            </div>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">Tony Gurrano</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject">On the spires of some old-fashioned churches
                                                &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">You will see sheet-iron whales placed there
                                                for weather-cocks; but they are so elevated, and besides that are to all
                                                intents and purposes so labelled with "HANDS OFF!" you cannot examine
                                                them</span>
                                        </td>
                                        <td class="table-inbox-attachment"></td>
                                        <td class="table-inbox-time">
                                            Nov 28
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-muted opacity-25"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <div class="bg-info text-white lh-1 rounded-pill p-1">
                                                <span class="letter-icon fs-sm"></span>
                                            </div>
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">Barbara Walden</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject">In bony, ribby regions of the earth
                                                &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">Where at the base of high broken cliffs
                                                masses of rock lie strewn in fantastic groupings upon the plain, you will
                                                often discover images as of the petrified forms</span>
                                        </td>
                                        <td class="table-inbox-attachment"></td>
                                        <td class="table-inbox-time">
                                            Nov 28
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="table-inbox-checkbox">
                                            <input type="checkbox" class="form-check-input">
                                        </td>
                                        <td class="table-inbox-star">
                                            <a href="#">
                                                <i class="ph-star text-warning"></i>
                                            </a>
                                        </td>
                                        <td class="table-inbox-image">
                                            <img src="../../../assets/images/brands/amazon.svg" class="rounded-circle"
                                                width="32" height="32" alt="">
                                        </td>
                                        <td class="table-inbox-name">
                                            <a href="mail_read.html">
                                                <div class="letter-icon-title text-body">Amazon</div>
                                            </a>
                                        </td>
                                        <td class="text-truncate">
                                            <span class="table-inbox-subject">Here and there from some lucky point of view
                                                &nbsp;-&nbsp;</span>
                                            <span class="text-muted fw-normal">You will catch passing glimpses of the
                                                profiles of whales defined along the undulating ridges. But you must be a
                                                thorough whaleman, to see these sights; and not only that, but if you wish
                                                to return to such a sight again</span>
                                        </td>
                                        <td class="table-inbox-attachment">
                                            <i class="ph-paperclip text-muted"></i>
                                        </td>
                                        <td class="table-inbox-time">
                                            Nov 27
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /table -->

                    </div>
                    <!-- /my inbox -->

                </div>

                <div class="tab-pane fade" id="orders">

                    <!-- Orders history -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Orders history (static table)</h5>
                        </div>

                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product name</th>
                                        <th>Size</th>
                                        <th>Colour</th>
                                        <th>Article number</th>
                                        <th>Units</th>
                                        <th>Price</th>
                                        <th class="text-center" style="width: 20px;"><i class="ph-dots-three"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-light">
                                        <td colspan="7" class="fw-semibold">New orders</td>
                                        <td class="text-end">
                                            <span class="badge bg-secondary rounded-pill">24</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0" style="width: 45px;">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/1.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Fathom Backpack</a>
                                            <div class="d-inline-flex align-items-center text-muted fs-sm">
                                                <span class="bg-secondary rounded-pill p-1 me-1"></span>
                                                Processing
                                            </div>
                                        </td>
                                        <td>34cm x 29cm</td>
                                        <td>Orange</td>
                                        <td>
                                            <a href="#">1237749</a>
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 79.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/2.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Mystery Air Long Sleeve T
                                                Shirt</a>
                                            <div class="d-inline-flex align-items-center text-muted fs-sm">
                                                <span class="bg-secondary rounded-pill p-1 me-1"></span>
                                                Processing
                                            </div>
                                        </td>
                                        <td>L</td>
                                        <td>Process Red</td>
                                        <td>
                                            <a href="#">345634</a>
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 38.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/3.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Women's Prospect Backpack</a>
                                            <div class="d-inline-flex align-items-center text-muted fs-sm">
                                                <span class="bg-secondary rounded-pill p-1 me-1"></span>
                                                Processing
                                            </div>
                                        </td>
                                        <td>46cm x 28cm</td>
                                        <td>Neu Nordic Print</td>
                                        <td>
                                            <a href="#">5739584</a>
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 60.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/4.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Overlook Short Sleeve T
                                                Shirt</a>
                                            <div class="d-inline-flex align-items-center text-muted fs-sm">
                                                <span class="bg-secondary rounded-pill p-1 me-1"></span>
                                                Processing
                                            </div>
                                        </td>
                                        <td>M</td>
                                        <td>Gray Heather</td>
                                        <td>
                                            <a href="#">434450</a>
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 35.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="table-light">
                                        <td colspan="7" class="fw-semibold">Shipped orders</td>
                                        <td class="text-end">
                                            <span class="badge bg-success rounded-pill">42</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/5.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Infinite Ride Liner</a>
                                            <span class="fs-sm text-muted">10.04.2022</span>
                                        </td>
                                        <td>43</td>
                                        <td>Black</td>
                                        <td>
                                            <a href="#">34739</a>
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 210.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/6.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Custom Snowboard</a>
                                            <span class="fs-sm text-muted">09.04.2022</span>
                                        </td>
                                        <td>151</td>
                                        <td>Black/Blue</td>
                                        <td>
                                            <a href="#">5574832</a>
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 600.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/7.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Kids' Day Hiker 20L
                                                Backpack</a>
                                            <span class="fs-sm text-muted">08.04.2022</span>
                                        </td>
                                        <td>24cm x 29cm</td>
                                        <td>Figaro Stripe</td>
                                        <td>
                                            <a href="#">6684902</a>
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 55.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/8.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Lunch Sack</a>
                                            <span class="fs-sm text-muted">07.04.2022</span>
                                        </td>
                                        <td>24cm x 20cm</td>
                                        <td>Junk Food Print</td>
                                        <td>
                                            <a href="#">5574829</a>
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 20.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/9.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Cambridge Jacket</a>
                                            <span class="fs-sm text-muted">06.04.2022</span>
                                        </td>
                                        <td>XL</td>
                                        <td>Nomad/Railroad</td>
                                        <td>
                                            <a href="#">475839</a>
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 175.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/10.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Covert Jacket</a>
                                            <span class="fs-sm text-muted">05.04.2022</span>
                                        </td>
                                        <td>XXL</td>
                                        <td>Mocha/Glacier Sierra</td>
                                        <td>
                                            <a href="#">589439</a>
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 126.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="table-light">
                                        <td colspan="7" class="fw-semibold">Cancelled orders</td>
                                        <td class="text-end">
                                            <span class="badge bg-danger rounded-pill">9</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/11.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Day Hiker Pinnacle 31L
                                                Backpack</a>
                                            <span class="fs-sm text-muted">04.04.2022</span>
                                        </td>
                                        <td>42cm x 26.5cm</td>
                                        <td>Blotto Ripstop</td>
                                        <td>
                                            <a href="#">5849305</a>
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 130.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/12.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Kids' Gromlet Backpack</a>
                                            <span class="fs-sm text-muted">03.04.2022</span>
                                        </td>
                                        <td>22cm x 20cm</td>
                                        <td>Slime Camo Print</td>
                                        <td>
                                            <a href="#">4438495</a>
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 35.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/13.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Tinder Backpack</a>
                                            <span class="fs-sm text-muted">02.04.2022</span>
                                        </td>
                                        <td>42cm x 26cm</td>
                                        <td>Dark Tide Twill</td>
                                        <td>
                                            <a href="#">4759383</a>
                                        </td>
                                        <td>2</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 180.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pe-0">
                                            <a href="#">
                                                <img src="../../../assets/images/demo/products/14.jpeg" height="60"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block fw-semibold">Almighty Snowboard Boot</a>
                                            <span class="fs-sm text-muted">01.04.2022</span>
                                        </td>
                                        <td>45</td>
                                        <td>Multiweave</td>
                                        <td>
                                            <a href="#">34432</a>
                                        </td>
                                        <td>1</td>
                                        <td>
                                            <h6 class="mb-0">&euro; 370.00</h6>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-truck me-2"></i>
                                                        Track parcel
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-file-arrow-down me-2"></i>
                                                        Download invoice
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-wallet me-2"></i>
                                                        Payment details
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="ph-warning-circle me-2"></i>
                                                        Report problem
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /orders history -->

                </div>
            </div>
            <!-- /right content -->

        </div>
        <!-- /inner container -->

    </div>
    <!-- /content area -->

    @if(auth()->user()->hasRole('User'))
        @if(isset($user->projects) && $user->projects->count())
            @foreach($user->projects as $project)
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Subscription for: {{ $project->title }}</h5>
                    </div>
                    <div class="card-body">
                        @php
                            $current = $project->subscriptions->sortByDesc('created_at')->first();
                        @endphp
                        @if($current)
                            <div class="mb-3">
                                <strong>Status:</strong>
                                @if($current->status == 'pending_approval')
                                    <span class="badge bg-warning text-dark">Pending Approval</span>
                                @elseif($current->status == 'approved')
                                    <span class="badge bg-info text-dark">Approved - Awaiting Payment</span>
                                @elseif($current->status == 'active')
                                    <span class="badge bg-success">Active</span>
                                @elseif($current->status == 'expired')
                                    <span class="badge bg-danger">Expired</span>
                                    <a href="{{ route('user.projects.subscriptions.create', $project) }}" class="btn btn-warning">Renew</a>
                                @endif
                            </div>
                            <div class="mb-3">
                                <strong>Plan:</strong> {{ $current->type }}<br>
                                <strong>Period:</strong> {{ $current->start_date ? \Carbon\Carbon::parse($current->start_date)->format('M d, Y') : '-' }} - {{ $current->end_date ? \Carbon\Carbon::parse($current->end_date)->format('M d, Y') : '-' }}
                            </div>
                            @if($current->status == 'approved' && optional($current->invoice)->status != 'paid')
                                <a href="#" class="btn btn-primary">Pay Now</a>
                            @endif
                        @endif
                        <hr>
                        <h6>Subscription History</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>Plan</th>
                                        <th>Period</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($project->subscriptions->sortByDesc('created_at') as $sub)
                                        <tr>
                                            <td>{{ $sub->type }}</td>
                                            <td>{{ $sub->start_date ? \Carbon\Carbon::parse($sub->start_date)->format('M d, Y') : '-' }} - {{ $sub->end_date ? \Carbon\Carbon::parse($sub->end_date)->format('M d, Y') : '-' }}</td>
                                            <td>
                                                <span class="badge bg-{{ $sub->status == 'active' ? 'success' : ($sub->status == 'expired' ? 'danger' : ($sub->status == 'pending_approval' ? 'warning text-dark' : ($sub->status == 'approved' ? 'info text-dark' : 'secondary'))) }}">
                                                    {{ ucfirst(str_replace('_', ' ', $sub->status)) }}
                                                </span>
                                            </td>
                                            <td>${{ number_format($sub->price, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="4" class="text-center text-muted">No subscription history.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    @endif
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#3085d6'
                }).then(() => {
                    // Clear from session via reload (if needed)
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                });
            @endif
        });
    </script>
@endsection
