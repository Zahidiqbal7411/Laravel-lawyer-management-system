<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lawyer management System')</title>

    @include('layouts.header')
    @yield('styles')
</head>
<body>
    
        @include('layouts.navbar')
    @include('layouts.sidebar')


    

    <main>
        @yield('contents')
    </main>

    @yield('scripts')
    @include('layouts.footer')

</body>
</html>
