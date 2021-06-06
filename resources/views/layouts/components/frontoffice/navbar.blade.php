<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{ url('/') }}"> <img src="{{ asset('frontoffice/img/logo.png') }}" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="menu_icon"><i class="fas fa-bars"></i></span>
    </button>

    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/category') }}">Kategori</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/product') }}">Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/portfolio') }}">Portfolio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/designer') }}">Desainer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/contact') }}">Kontak</a>
            </li>
        </ul>
    </div>
    @guest
        <a href="{{ route('login') }}" class="btn btn-danger px-4" style="border-radius: 20px;">Login</a>
    @else
        <div class="hearer_icon d-flex">
            <a href="{{ route('home') }}"><i class="fas fa-user"></i></a>
            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
            <a href="{{ route('wishlist') }}"><i class="ti-heart"></i></a>
            <a href="{{ route('cart') }}"><i class="fas fa-cart-plus"></i><sup><span
                        class="badge badge-danger">{{ App\Models\Cart::countUserCart() }}</span></sup></a>
        </div>

        {{-- logout form --}}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    @endguest
</nav>
