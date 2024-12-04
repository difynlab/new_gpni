<div data-component="sidebar">
    <div class="sidebar">
        <div class="p-2">
            <a href="{{ route('backend.dashboard.index') }}">
                <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->logo) }}" alt="Logo" class="logo">
            </a>
        </div>
        

        <div class="gradient-line"></div>

        <ul class="list-group flex-column d-inline-block first-menu">
            <li class="list-group-item pl-3 py-2">
                <a href="{{ route('backend.dashboard.index') }}">
                    <img src="{{ asset('storage/backend/sidebar/dashboard.png') }}" alt="Icon">
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="list-group-item pl-3 py-2">
                <a href="#">
                    <img src="{{ asset('storage/backend/sidebar/page.png') }}" alt="Icon">
                    <span class="align-middle">Pages</span>
                </a>
            
                <ul class="list-group flex-column d-inline-block submenu">
                    <li class="list-group-item pl-4">
                        <a href="{{ route('backend.pages.index') }}" class="dropdown-item link">
                            <img src="{{ asset('storage/backend/sidebar/page.png') }}" alt="Icon">
                            <span>Pages</span>
                        </a>
                    </li>

                    <li class="list-group-item pl-4">
                        <a href="{{ route('backend.conferences.index') }}" class="dropdown-item link">
                            <img src="{{ asset('storage/backend/sidebar/conference.png') }}" alt="Icon">
                            <span>Conferences</span>
                        </a>
                    </li>


                    <li class="list-group-item pl-4">
                        <a href="#" class="">
                            <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                            Articles
                        </a>

                        <ul class="list-group flex-column d-inline-block sub-submenu">
                            <li class="list-group-item pl-4">
                                <a href="{{ route('backend.article-categories.index') }}">Article Categories</a>
                            </li>

                            <li class="list-group-item pl-4">
                                <a href="{{ route('backend.articles.index') }}">Articles</a>
                            </li>
                        </ul>
                    </li> 
                </ul>
            </li>
        </ul>
    </div>
</div>