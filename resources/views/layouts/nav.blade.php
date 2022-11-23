<nav class="navbar text-bg-primary navbar-expand-lg sticky-top">
    <div class="container-fluid">
        <!-- logo -->
        <a class="navbar-brand" href="/">
            <img src="{{ Vite::asset('resources/template/image/logo blanc.png') }}" alt="">
        </a>
        <!-- list option -->
        <div class="justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
                @foreach ($lien as $l)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $l[1] }}">{{ $l[0] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
