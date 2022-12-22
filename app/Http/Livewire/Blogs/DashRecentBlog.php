<?php

namespace App\Http\Livewire\Blogs;

use Livewire\Component;
use App\Models\Blog;

class DashRecentBlog extends Component
{
    public function recentBlogs (){
        $recents = Blog::orderBy('created_at', 'desc')
        ->limit(50)
        ->get();


        $allBlogs = Blog::count();
        return compact('recents', 'allBlogs');
    }
    public function render()
    {
        return view('livewire.blogs.dash-recent-blog', $this->recentBlogs());
    }
}
