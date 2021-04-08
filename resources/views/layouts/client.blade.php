<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $title }} | Client Area - {{ config('app.company_name') }}</title>
        @include('layouts.styles')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed @if(config('app.dark_mode')) dark-mode @endif">
        <div class="wrapper">
            <!-- Navbar -->
            @include('layouts.client.nav')

            <!-- Main Sidebar Container -->
            @include('layouts.client.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                @include('layouts.client.header')

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        @unless ($secure)
                            @include('layouts.store.secure')
                        @endunless
                        @include('layouts.store.announcement')
                        @include('layouts.client.alert')
                        @include('layouts.store.messages')
                        @yield('content')
                    </div>
                </div>
            </div>

            <!-- Main Footer -->
            @include('layouts.client.footer')
        </div>

        @include('layouts.scripts')
    </body>
</html>
