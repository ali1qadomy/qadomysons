<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Atlantis Lite - Bootstrap 4 Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    @include('partial.style')
    @yield('userstyle')
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            @include('partial.header')
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            @include('partial.navheader')
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        @include('partial.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                @yield('content')
            </div>
            @include('partial.footer')
        </div>

    </div>
    @include('partial.script')
</body>

</html>
