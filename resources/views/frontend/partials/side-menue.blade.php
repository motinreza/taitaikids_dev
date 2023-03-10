<div class="menu-wrapper" id="side_nav">
    <a href="{{ route('home') }}">
        <div class="logo">
            {{-- <img src="{{asset('assets/images/default/site-logo.png')}}"
                    alt="Babycare" title="Babycare" height="60px"> --}}
            <h1> {{ $site_info->name }}</h1>
        </div>
    </a>
    <div class="menu-nav">
        <nav class="nav">
            <ul class="responsive-menu w-100">
                @foreach ($categories as $category)
                    <li class="has-child">
                        {{-- <i class="fa-solid fa-child"></i> --}}
                        <a href="{{ route('category', [$category->id]) }}"
                            class="{{ Request::is("category-product/$category->id") ? 'active' : '' }}">
                            <span>{{ $category->title }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
    <div class="overlay"></div>
</div>
