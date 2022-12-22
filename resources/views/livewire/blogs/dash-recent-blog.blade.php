<div class="container">
    <div class="post-body">
        <div class="offset-1" style="height: 48vh; overflow:auto; overflow-x: hidden;">
            <span>Total Blogs: <span class="all-posts px-2">{{ $allBlogs }}</span></span>
            @foreach ($recents as $recent)
            <div class="row">
                <span class="name mt-3"> {{ $recent->user->name }} <span class="time">has a blog</span></span>
                <span class="time">at {{ $recent->created_at->format('g:i A') }} </span>
            </div>
            @endforeach
            @if($recents->isEmpty())
            <div class="text-gray-500">
                <h5 class="text-center mt-3">Recent blog is empty</h5>
            </div>
            @endif
        </div>
    </div>
</div>


<style>
    .all-posts {
        background-color: rgb(85, 123, 226);
        border-radius: 50%;
        color: rgb(0, 0, 0);
    }
</style>
