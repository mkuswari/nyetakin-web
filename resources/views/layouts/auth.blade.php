<!doctype html>
<html lang="zxx">

{{-- include head --}}
@include('layouts.components.auth.head')

<body>

    <!--================login_part Area =================-->
    <section class="login_part padding_top">
        <div class="container">
            {{-- load content --}}
            @yield('content')
            {{-- end of content --}}
        </div>
    </section>
    <!--================login_part end =================-->

    {{-- load scripts --}}
    @include('layouts.components.auth.scripts')
</body>

</html>
