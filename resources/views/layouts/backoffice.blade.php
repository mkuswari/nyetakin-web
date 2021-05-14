<!DOCTYPE html>
<html dir="ltr" lang="en">

{{-- include head --}}
@include('layouts.components.backoffice.head')

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        {{-- include topbar --}}
        @include('layouts.components.backoffice.topbar')
        {{-- end of topbar --}}

        {{-- include sidebar --}}
        @include('layouts.components.backoffice.sidebar')
        {{-- end of sidebar --}}
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">@yield('title')</h3>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                {{-- content --}}
                @yield('content')
                {{-- end of content --}}
            </div>

            {{-- include footer --}}
            @include('layouts.components.backoffice.footer')
            {{-- end of footer --}}
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->

    {{-- include scripts --}}
    @include('layouts.components.backoffice.scripts')
    {{-- end of scripts --}}
</body>

</html>
