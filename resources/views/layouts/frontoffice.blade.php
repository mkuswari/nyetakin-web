<!DOCTYPE html>
<html lang="zxx">

{{-- include head --}}
@include('layouts.components.frontoffice.head')

<body>

    {{-- include navbar --}}
    @include('layouts.components.frontoffice.navbar')

    {{-- content --}}
    @yield('content')

    {{-- include footer --}}
    @include('layouts.components.frontoffice.footer')


    {{-- include scripts --}}
    @include('layouts.components.frontoffice.scripts')
</body>

</html>
