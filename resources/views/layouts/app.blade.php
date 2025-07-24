<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lawyer management System')</title>

    @include('layouts.header')
    @yield('styles')
    <style>
        .main-content {
            margin-left: 280px;
        }
    </style>
</head>

<body>


    <div class="layout-container">
        @include('layouts.navbar')
        @include('layouts.sidebar')

        <main class="main-content">
            @yield('contents')
        </main>
    </div>


    @include('layouts.footer')
    @yield('scripts')

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

</body>

</html>
