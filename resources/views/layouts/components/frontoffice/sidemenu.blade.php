<div class="card mb-3 shadow border-0">
    <div class="card-body">
        <div class="user-session text-center">
            @if (Auth::user()->avatar)
                <img src="{{ asset('uploads/avatars/' . Auth::user()->avatar) }}" alt="user" class="rounded-circle"
                    width="70" style="border: 2px solid #EBFDFF">
            @else
                <img src="{{ asset('uploads/avatars/default/placeholder.jpg') }}" alt="user" class="rounded-circle"
                    width="70" style="border: 2px solid #EBFDFF">
            @endif
            <p>Hai, {{ Auth::user()->name }}</p>
            <small class="text-muted">{{ Auth::user()->email }}</small>
        </div>
        <hr>
        <div class="single_footer_part">
            <h5>Main Menu</h5>
            <a href="">
                <div class="panel-link">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </div>
            </a>
            <a href="{{ route('profile') }}">
                <div class="panel-link">
                    <i class="fa fa-user-cog"></i>
                    <span>Profile Saya</span>
                </div>
            </a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="panel-link text-danger">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Logout</span>
                </div>
            </a>
        </div>
    </div>
</div>
