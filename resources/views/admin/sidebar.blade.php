@php
    $menus = [
        (object)[
            "title" => "Dashboard",
            "path" => "dashboard",
            "icon" => "fas fa-tachometer-alt"
        ],
        (object)[
            "title" => "Kelola Buku",
            "path" => "kelolabuku",
            "icon" => "fas fa-book"
        ],
        (object)[
            "title" => "Pengguna",
            "path" => "pengguna",
            "icon" => "fas fa-users"
        ],
        (object)[
            "title" => "Buku Terlaris",
            "path" => "bukularis",
            "icon" => "fas fa-exchange-alt"
        ]
    ];
@endphp

<div class="sidebar text-white p-3" style="min-height: 100vh; width: 250px;">
    <div class="profile-section text-center mb-4">
        <div class="profile-img mb-2">
            <i class="fas fa-user fa-2x"></i>
        </div>
        <h6 class="mb-1">{{ Auth::user()->name }}</h6>
        <span class="badge bg-secondary">Administrator</span>
    </div>

    <div class="nav-section mb-2 text-uppercase small fw-bold">Main Navigation</div>
    <ul class="nav flex-column">
    @foreach ($menus as $menu)
        <li class="nav-item">
            <a href="{{ url($menu->path) }}"
               class="nav-link text-white {{ request()->is($menu->path) ? 'bg-secondary' : '' }}">
                <i class="{{ $menu->icon }} me-2"></i> {{ $menu->title }}
            </a>
        </li>
    @endforeach

    {{-- Logout button in same style --}}
    <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="nav-link text-danger border-0 bg-transparent w-100 text-start">
                <i class="fas fa-sign-out-alt me-2 text-danger"></i> Logout
            </button>
        </form>
    </li>
</ul>

</div>
