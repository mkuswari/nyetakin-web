<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('dashboard') }}"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Menu</span></li>
                @if (Auth::user()->role == 'admin')
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('users.index') }}"
                            aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                                class="hide-menu">Kelola Users</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                            href="{{ route('categories.index') }}" aria-expanded="false"><i data-feather="tag"
                                class="feather-icon"></i><span class="hide-menu">Kelola
                                Kategori</span></a></li>
                @endif
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('products.index') }}"
                        aria-expanded="false"><i data-feather="shopping-bag" class="feather-icon"></i><span
                            class="hide-menu">Kelola
                            Produk</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('portfolios.index') }}"
                        aria-expanded="false"><i data-feather="file" class="feather-icon"></i><span
                            class="hide-menu">Kelola
                            Portfolio</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
