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
                                <a href="{{ route(getPrefix().'cases.create') }}"
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
               

        </div>
        <!-- /content area -->
    @endsection
