<?php

namespace App\Http\Livewire\Blogs;

use Livewire\Component;
use App\Events\UserLog;
use App\Models\Blog;

class CreateBlog extends Component
{
    public $title, $content, $post_id;

    public function addBlog() {
        $this->validate([
            'content'  =>  ['required', 'string', 'max:255'],
        ]);

        $blog = Blog::create([
            'user_id'                 =>      auth()->user()->id,
            'title'                   =>      $this->title,
            'content'                 =>      $this->content
        ]);
        $log_entry = $blog->user->name . ' added a blog';
        event(new UserLog($log_entry));

        return redirect('/create-blog')->with('message', 'Posted');
    }   
    public function loadBlog() {
        $blogs = Blog::where ('user_id', auth()->user()->id)
        ->orderBy('id', 'desc')
        ->limit(50)
        ->get();

        return compact('blogs');
    }
    public function render()
    {
        return view('livewire.blogs.create-blog', $this->loadBlog());
    }
}
