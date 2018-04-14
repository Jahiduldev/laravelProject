    <!-- Menu Bar -->
    <div class="menu-bar light">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="{{ route('homePage') }}" title="Home">Home</a></li>
                    @foreach($pages as $page)
                    <li><a href="{{ route('pagePage', $page->page_slug) }}" title="{{ $page->page_name }}">{{ $page->page_name }}</a></li>
                    @endforeach
                    <li><a href="{{ route('galleryPage') }}" title="Categories">Gallery</a></li>
                    <li><a href="{{ route('contactUsPage') }}" title="Contact Us">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <form class="search-here">
        <input type="text" placeholder="search your keyword" />
        <i class="fa fa-close"></i>
    </form>
    <!-- Menu Bar -->