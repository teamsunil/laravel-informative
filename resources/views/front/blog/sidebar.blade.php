<div class="sidebar-wrap">
    {{-- Search Widget --}}
    <div class="sidebar-widget search card p-4 mb-3 border-0">
        <form action="{{ route('blogs.listing') }}" method="GET">
            <input type="text" class="form-control" name="search" placeholder="search" value="{{ request('search') }}">
            <button type="submit" class="btn btn-main btn-small d-block mt-2">search</button>
        </form>
    </div>

    {{-- Author Widget (optional, make dynamic if you have author info) --}}
    @if(isset($author))
    <div class="sidebar-widget card border-0 mb-3">
        <img src="{{ $author->avatar ?? asset('images/blog/blog-author.jpg') }}" alt="" class="img-fluid">
        <div class="card-body p-4 text-center">
            <h5 class="mb-0 mt-4">{{ $author->name }}</h5>
            <p>{{ $author->role ?? '' }}</p>
            <p>{{ $author->bio ?? '' }}</p>
            {{-- Socials --}}
            <ul class="list-inline author-socials">
                @if($author->facebook)<li class="list-inline-item mr-3"><a href="{{ $author->facebook }}"><i class="fab fa-facebook-f text-muted"></i></a></li>@endif
                @if($author->twitter)<li class="list-inline-item mr-3"><a href="{{ $author->twitter }}"><i class="fab fa-twitter text-muted"></i></a></li>@endif
                @if($author->linkedin)<li class="list-inline-item mr-3"><a href="{{ $author->linkedin }}"><i class="fab fa-linkedin-in text-muted"></i></a></li>@endif
            </ul>
        </div>
    </div>
    @endif

    {{-- Latest Posts --}}
    <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
        <h5>Latest Posts</h5>
        @foreach($latestBlogs as $latest)
            <div class="media border-bottom py-3">
                <a href="{{ route('blogs.detail', $latest->slug) }}">
                    <img class="mr-4" src="{{ $latest->image ? asset('storage/' . $latest->image) : asset('images/blog/default.jpg') }}" alt="{{ $latest->title }}" width="70">
                </a>
                <div class="media-body">
                    <h6 class="my-2"><a href="{{ route('blogs.detail', $latest->slug) }}">{{ $latest->title }}</a></h6>
                    <span class="text-sm text-muted">{{ $latest->created_at->format('d M Y') }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>