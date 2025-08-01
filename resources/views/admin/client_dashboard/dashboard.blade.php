@extends('layouts.app')

@section('content')
    <style>
        .quick-action-btn img {
            transition: transform 0.3s ease;
        }

        .quick-action-btn:hover img {
            transform: scale(1.2);
        }
    </style>
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Home - <span class="fw-normal">Dashboard</span>
                </h4>

                <a href="#page_header"
                    class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                    data-bs-toggle="collapse">
                </a>
            </div>
        </div>
    </div>

    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Statistics cards -->
        <div class="row">
            <div class="col-xl-3">
                <div class="card card-body bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-fill">
                            <h3 class="mb-0">24</h3>
                            <span class="text-white-50">Total Users</span>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="ph-folder-simple fs-1 opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card card-body bg-success text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-fill">
                            <h3 class="mb-0">$45,289</h3>
                            <span class="text-white-50">Total cases</span>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="ph-currency-dollar fs-1 opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card card-body bg-warning text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-fill">
                            <h3 class="mb-0">156</h3>
                            <span class="text-white-50">Total Schedules</span>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="ph-newspaper fs-1 opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card card-body bg-info text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-fill">
                            <h3 class="mb-0">1,234</h3>
                            <span class="text-white-50">Total Users</span>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="ph-users fs-1 opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Statistics cards -->
        <div class="row">
            <div class="col-xl-3">
                <div class="card card-body bg-danger text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-fill">
                            <h3 class="mb-0">89</h3>
                            <span class="text-white-50">Active Services</span>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="ph-gear-six fs-1 opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card card-body bg-secondary text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-fill">
                            <h3 class="mb-0">342</h3>
                            <span class="text-white-50">Total Comments</span>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="ph-chat-circle fs-1 opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card card-body bg-dark text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-fill">
                            <h3 class="mb-0">67</h3>
                            <span class="text-white-50">Technologies</span>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="ph-code fs-1 opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card card-body bg-purple text-white">
                    <div class="d-flex align-items-center">
                        <div class="flex-fill">
                            <h3 class="mb-0">15</h3>
                            <span class="text-white-50">Team Members</span>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="ph-user-circle fs-1 opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Action Buttons -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-6 mb-3 text-center">
                                <a href="{{ route(getPrefix().'client-details.create') }}"
                                    class="d-flex flex-column align-items-center justify-content-center quick-action-btn">
                                    <img src="{{ asset('assets/img/icons/icons-short.png') }}" alt="" width="80"
                                        height="80">
                                    <span class="fs-5 mt-2 fw-bold text-dark">Your Profile</span>
                                </a>
                            </div>
                            <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-6 mb-3 text-center">
                                <a href=""
                                    class="d-flex flex-column align-items-center justify-content-center quick-action-btn">
                                    <img src="{{ asset('assets/img/icons/icons-short.png') }}" alt="" width="80"
                                        height="80">
                                    <span class="fs-5 mt-2 fw-bold text-dark">View Cases</span>
                                </a>
                            </div>
                            <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-6 mb-3 text-center">
                                <a href=""
                                    class="d-flex flex-column align-items-center justify-content-center quick-action-btn">
                                    <img src="{{ asset('assets/img/icons/icons-short.png') }}" alt="" width="80"
                                        height="80">
                                    <span class="fs-5 mt-2 fw-bold text-dark">View Schedules</span>
                                </a>
                            </div>
                              {{-- <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-6 mb-3 text-center">
                                <a href=""
                                    class="d-flex flex-column align-items-center justify-content-center quick-action-btn">
                                    <img src="{{ asset('assets/img/icons/icons-short.png') }}" alt="" width="80"
                                        height="80">
                                    <span class="fs-5 mt-2 fw-bold text-dark">Specialization</span>
                                </a>
                            </div>
                              <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-6 mb-3 text-center">
                                <a href=""
                                    class="d-flex flex-column align-items-center justify-content-center quick-action-btn">
                                    <img src="{{ asset('assets/img/icons/icons-short.png') }}" alt="" width="80"
                                        height="80">
                                    <span class="fs-5 mt-2 fw-bold text-dark">hearing</span>
                                </a>
                            </div>
                             <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-6 mb-3 text-center">
                                <a href=""
                                    class="d-flex flex-column align-items-center justify-content-center quick-action-btn">
                                    <img src="{{ asset('assets/img/icons/icons-short.png') }}" alt="" width="80"
                                        height="80">
                                    <span class="fs-5 mt-2 fw-bold text-dark">documents</span>
                                </a>
                            </div> --}}
                             <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-6 mb-3 text-center">
                                <a href=""
                                    class="d-flex flex-column align-items-center justify-content-center quick-action-btn">
                                    <img src="{{ asset('assets/img/icons/icons-short.png') }}" alt="" width="80"
                                        height="80">
                                    <span class="fs-5 mt-2 fw-bold text-dark">appointments</span>
                                </a>
                            </div>
                             {{-- <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-6 mb-3 text-center">
                                <a href=""
                                    class="d-flex flex-column align-items-center justify-content-center quick-action-btn">
                                    <img src="{{ asset('assets/img/icons/icons-short.png') }}" alt="" width="80"
                                        height="80">
                                    <span class="fs-5 mt-2 fw-bold text-dark">invoices</span>
                                </a>
                            </div>
                             <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-6 mb-3 text-center">
                                <a href=""
                                    class="d-flex flex-column align-items-center justify-content-center quick-action-btn">
                                    <img src="{{ asset('assets/img/icons/icons-short.png') }}" alt="" width="80"
                                        height="80">
                                    <span class="fs-5 mt-2 fw-bold text-dark">payments</span>
                                </a>
                            </div> --}}

                             <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-6 mb-3 text-center">
                                <a href=""
                                    class="d-flex flex-column align-items-center justify-content-center quick-action-btn">
                                    <img src="{{ asset('assets/img/icons/icons-short.png') }}" alt="" width="80"
                                        height="80">
                                    <span class="fs-5 mt-2 fw-bold text-dark">reviews</span>
                                </a>
                            </div>
                             <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-6 mb-3 text-center">
                                <a href=""
                                    class="d-flex flex-column align-items-center justify-content-center quick-action-btn">
                                    <img src="{{ asset('assets/img/icons/icons-short.png') }}" alt="" width="80"
                                        height="80">
                                    <span class="fs-5 mt-2 fw-bold text-dark">notifications</span>
                                </a>
                            </div>
                           
                    </div>
                </div>
            </div>
        </div>
     
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-xl-12">

                <!-- section 1 line 2 card -->
                <!-- Marketing campaigns -->
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="mb-0">Client Project Details</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>Client</th>
                                    <th>Progress</th>
                                    <th>Time Spent</th>
                                    <th>Status</th>
                                    <th>Chat</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="d-block me-3">
                                                    <img src="" class="rounded-circle"
                                                        width="36" height="36" alt="">
                                                </a>
                                                <div>
                                                    <a href="#"
                                                        class="text-body fw-semibold"></a>
                                                    <div class="progress mt-2" style="height: 8px; width: 120px;">
                                                        <div class="progress-bar progress-bar-striped bg-success"
                                                            role="progressbar" style="width: %"
                                                            aria-valuenow=""
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="text-muted">N/A</span></td>
                                        <td><span class="text-success"><i class="ph-trend-up me-2"></i> %</span></td>
                                        <td><span class="badge bg-primary bg-opacity-10 text-primary"></span></td>
                                        <td><span class="badge bg-primary bg-opacity-10 text-primary"></span></td>
                                        <td><a href="" class=" bg-primary bg-opacity-10 text-primary">Chat</a></td>
                                    </tr>

                             

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /marketing campaigns -->
                <!-- Support tickets -->
                {{-- <div class="card">
                    <div class="card-header d-sm-flex align-items-sm-center py-sm-0">
                        <h5 class="py-sm-2 my-sm-1">Support tickets</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 50px">Due</th>
                                    <th style="width: 300px;">User</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-light">
                                    <td colspan="3">Active tickets</td>
                                    <td class="text-end">
                                        <span class="badge bg-primary rounded-pill">24</span>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="text-center">
                                        <h6 class="mb-0">40</h6>
                                        <div class="fs-sm text-muted lh-1">hours</div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="#"
                                                class="d-inline-flex align-items-center justify-content-center bg-warning text-white lh-1 rounded-pill w-40px h-40px me-3">
                                                <span class="letter-icon"></span>
                                            </a>
                                            <div>
                                                <a href="#" class="text-body fw-semibold letter-icon-title">Robert
                                                    Hauber</a>
                                                <div class="d-flex align-items-center text-muted fs-sm">
                                                    <span class="bg-warning rounded-pill p-1 me-2"></span>
                                                    High
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-body">
                                            <div class="fw-semibold">[#1184] Round grid column gutter operations</div>
                                            <span class="text-muted">Left rounds up, right rounds down. should keep
                                                everything...</span>
                                        </a>
                                    </td>
                                </tr>

                                <tr class="table-light">
                                    <td colspan="3">Resolved tickets</td>
                                    <td class="text-end">
                                        <span class="badge bg-success rounded-pill">42</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <i class="ph-check text-success"></i>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="#"
                                                class="d-inline-flex align-items-center justify-content-center bg-success text-white lh-1 rounded-pill w-40px h-40px me-3">
                                                <span class="letter-icon"></span>
                                            </a>
                                            <div>
                                                <a href="#" class="text-body fw-semibold letter-icon-title">Alan
                                                    Macedo</a>
                                                <div class="d-flex align-items-center text-muted fs-sm">
                                                    <span class="bg-danger rounded-pill p-1 me-2"></span>
                                                    Blocker
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-body">
                                            <div>[#1046] Avoid some unnecessary HTML string</div>
                                            <span class="text-muted">Rather than building a string of HTML and then parsing
                                                it...</span>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td colspan="3">Closed tickets</td>
                                    <td class="text-end">
                                        <span class="badge bg-danger rounded-pill">37</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">
                                        <i class="ph-checks text-danger"></i>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="d-inline-block me-3">
                                                <img src="../../../assets/images/demo/users/face8.jpg"
                                                    class="rounded-circle" width="40" height="40" alt="">
                                            </a>
                                            <div>
                                                <a href="#" class="text-body fw-semibold">Mitchell Sitkin</a>
                                                <div class="d-flex align-items-center text-muted fs-sm">
                                                    <span class="bg-warning rounded-pill p-1 me-2"></span>
                                                    High
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-body">
                                            <div>[#1040] Account for static form controls in form group</div>
                                            <span class="text-muted">Resizes control label's font-size and account for the
                                                standard...</span>
                                        </a>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
              
            </div> --}}
            <!-- Latest posts and Blog comments in one row -->
            {{-- <div class="col-xl-12">
                <div class="row">
                    <!-- Latest posts card -->
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Latest posts</h5>
                            </div>
                            <div class="card-body pb-0"> --}}
                                <!-- Blog post section 1 -->
                                {{-- <div class="d-sm-flex align-items-sm-start mb-3">
                                    <a href="#" class="d-inline-block position-relative me-sm-3 mb-3 mb-sm-0">
                                        <img src="../../../assets/images/demo/flat/1.png" class="flex-shrink-0 rounded"
                                            height="100" alt="">
                                        <div
                                            class="d-inline-flex bg-dark bg-opacity-50 text-white position-absolute start-50 top-50 translate-middle rounded-pill p-2">
                                            <i class="ph-play"></i>
                                        </div>
                                        <span
                                            class="bg-dark bg-opacity-50 text-white fs-xs lh-1 rounded-1 position-absolute bottom-0 start-0 p-1 ms-2 mb-2">12:25</span>
                                    </a>

                                    <div class="flex-fill">
                                        <h6 class="mb-1"><a href="#">Up unpacked friendly</a></h6>
                                        <ul class="list-inline list-inline-bullet text-muted mb-2">
                                            <li class="list-inline-item"><a href="#" class="text-body">Video
                                                    tutorials</a></li>
                                        </ul>
                                        The him father parish looked has sooner. Attachment frequently terminated son
                                        hello...
                                    </div>
                                </div> --}}

                                <!-- Blog post section 2 -->
                                {{-- <div class="d-sm-flex align-items-sm-start mb-3">
                                    <a href="#" class="d-inline-block position-relative me-sm-3 mb-3 mb-sm-0">
                                        <img src="../../../assets/images/demo/flat/21.png" class="flex-shrink-0 rounded"
                                            height="100" alt="">
                                        <div
                                            class="d-inline-flex bg-dark bg-opacity-50 text-white position-absolute start-50 top-50 translate-middle rounded-pill p-2">
                                            <i class="ph-play"></i>
                                        </div>
                                        <span
                                            class="bg-dark bg-opacity-50 text-white fs-xs lh-1 rounded-1 position-absolute bottom-0 start-0 p-1 ms-2 mb-2">47:25</span>
                                    </a>

                                    <div class="flex-fill">
                                        <h6 class="mb-1"><a href="#">It allowance prevailed</a></h6>
                                        <ul class="list-inline list-inline-bullet text-muted mb-2">
                                            <li class="list-inline-item"><a href="#" class="text-body">Video
                                                    tutorials</a></li>
                                        </ul>
                                        Alteration literature to or an sympathize mr imprudence. Of is ferrars subject
                                        enjoyed...
                                    </div>
                                </div> --}}
                                <!-- Blog post section 3 -->
                                {{-- <div class="d-sm-flex align-items-sm-start mb-3">
                                    <a href="#" class="d-inline-block position-relative me-sm-3 mb-3 mb-sm-0">
                                        <img src="../../../assets/images/demo/flat/12.png" class="flex-shrink-0 rounded"
                                            height="100" alt="">
                                        <div
                                            class="d-inline-flex bg-dark bg-opacity-50 text-white position-absolute start-50 top-50 translate-middle rounded-pill p-2">
                                            <i class="ph-play"></i>
                                        </div>
                                        <span
                                            class="bg-dark bg-opacity-50 text-white fs-xs lh-1 rounded-1 position-absolute bottom-0 start-0 p-1 ms-2 mb-2">47:25</span>
                                    </a>

                                    <div class="flex-fill">
                                        <h6 class="mb-1"><a href="#">Case read they must</a></h6>
                                        <ul class="list-inline list-inline-bullet text-muted mb-2">
                                            <li class="list-inline-item"><a href="#" class="text-body">Video
                                                    tutorials</a></li>
                                        </ul>
                                        On it differed repeated wandered required in. Then girl neat why yet knew rose
                                        spot...
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Blog comments card -->
                    {{-- <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Blog Comments</h5>
                                <span class="badge bg-primary rounded-pill">3</span>
                            </div>
                            <div class="card-body"> --}}
                                <!-- Comment section 1 -->
                                {{-- <div class="d-flex mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="../../../assets/images/demo/users/face1.jpg" class="rounded-circle"
                                            width="40" height="40" alt="">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h6 class="mb-1">John Doe</h6>
                                            <small class="text-muted">2 hours ago</small>
                                        </div>
                                        <p class="mb-1">Great article! This really helped me understand the concept
                                            better.</p>
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-sm btn-light me-2">Reply</button>
                                            <button class="btn btn-sm btn-light">Like</button>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Comment section 2 -->
                                {{-- <div class="d-flex mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="../../../assets/images/demo/users/face2.jpg" class="rounded-circle"
                                            width="40" height="40" alt="">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h6 class="mb-1">Jane Smith</h6>
                                            <small class="text-muted">5 hours ago</small>
                                        </div>
                                        <p class="mb-1">I have a question about the implementation. Could you provide
                                            more details?</p>
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-sm btn-light me-2">Reply</button>
                                            <button class="btn btn-sm btn-light">Like</button>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Comment section 3 -->
                                {{-- <div class="d-flex mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="../../../assets/images/demo/users/face3.jpg" class="rounded-circle"
                                            width="40" height="40" alt="">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h6 class="mb-1">Mike Johnson</h6>
                                            <small class="text-muted">1 day ago</small>
                                        </div>
                                        <p class="mb-1">Thanks for sharing this valuable information!</p>
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-sm btn-light me-2">Reply</button>
                                            <button class="btn btn-sm btn-light">Like</button>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Show all button -->
                                {{-- <div class="text-center mt-3">
                                    <button class="btn btn-primary">Show All Comments</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


            <!-- /dashboard content -->

        </div>
        <!-- /content area -->
    @endsection
