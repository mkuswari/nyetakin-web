<!doctype html>
<html lang="zxx">

{{-- include head --}}
@include('layouts.components.frontoffice.head')

<body>

    {{-- include sweet alert --}}
    @include('sweetalert::alert')

    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    {{-- include navbar --}}
                    @include('layouts.components.frontoffice.navbar')
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner" action="{{ url('product') }}">
                    <input type="text" class="form-control" id="search_input" name="keyword" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    {{-- load content --}}
    @yield('content')
    {{-- end of content --}}

    {{-- include footer --}}
    @include('layouts.components.frontoffice.footer')

    {{-- include scripts --}}
    @include('layouts.components.frontoffice.scripts')
</body>

</html>
