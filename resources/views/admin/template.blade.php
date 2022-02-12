@include('admin.partials.header')

<body>
<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    @include('admin.partials.nav-bar')
    <!-- /Header -->

    <!-- Sidebar -->
    @include('admin.partials.side-bar')
    <!-- /Sidebar -->

    <!-- Page Wrapper -->

    @yield('main-content')
    <!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
@include('admin.partials.footer')
