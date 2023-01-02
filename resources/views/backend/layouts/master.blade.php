<!DOCTYPE html>
<html lang="en">
 @include('backend.layouts.partials.header')
    <body class="sb-nav-fixed">
        @include('backend.layouts.partials.navbar')
        <div id="layoutSidenav">
            @include('backend.layouts.partials.sidebar')
            <div id="layoutSidenav_content">
                @include('alert.message')
                @yield('content')
                @include('backend.layouts.partials.footer')
            </div>
        </div>
        @include('backend.layouts.partials.script')
    </body>
</html>
