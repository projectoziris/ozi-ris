<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'OZI-RIS')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    {{-- ✅ Navbar --}}
    @include('layouts.partials.navbar')

    {{-- ✅ Sidebar --}}
    @include('layouts.partials.sidebar')

    {{-- ✅ Content Wrapper --}}
    <div class="content-wrapper">
        <section class="content-header px-3 pt-3">
            <div class="container-fluid">
                <h1 class="mb-0">@yield('header')</h1>
            </div>
        </section>

        <section class="content px-3 pb-3">
            <div class="container-fluid">
            @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

                @yield('content')
            </div>
        </section>
    </div>

    {{-- ✅ Footer --}}
    @include('layouts.partials.footer')

</div>
@stack('scripts')
</body>
</html>
