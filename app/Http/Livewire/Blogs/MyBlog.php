<?php

namespace App\Http\Livewire\Blogs;
use App\Models\Blog;
use Livewire\Component;
use App\Events\UserLog;

class MyBlog extends Component
{
    public $title, $content, $post_id;

    public function loadBlog() {
        $blogs = Blog::where ('user_id', auth()->user()->id)
        ->orderBy('id', 'desc')
        ->limit(50)
        ->get();

        return compact('blogs');
    }
    public function editBlogs(int $blog_id) {
        $blog = Blog::find($blog_id);
        if($blog){
            $this->blog_id = $blog->id;
            $this->title = $blog->title;
            $this->content = $blog->content;
        }else{
            return redirect()->to('my-blog');
        }
    }
    public function updateBlogs() {
        $this->validate([
            'content'                      =>          ['required', 'string', 'max:255'],
        ]);

        Blog::where('id', $this->blog_id)->update([
            'user_id'                 =>      auth()->user()->id,
            'title'                      =>      $this->title,
            'content'                     =>      $this->content,
        ]);
        $log_entry = auth()->user()->name .  ' updated a blog';
        event(new UserLog($log_entry));

        return redirect('my-blog')->with('message', ' Blog updated successfully');
    }

    public function delete($blogId) {
        $this->blogDelete = $blogId;
    }
    public function deleteBlog() {

        Blog::find($this->blogDelete)->delete();

        $log_entry = auth()->user()->name . ' deleted a blog';
        event(new UserLog($log_entry));

        return redirect('/my-blog')->with('message', 'Blog has been deleted successfully');
    }


    public function render()
    {
        return view('livewire.blogs.my-blog', $this->loadBlog());
    }
}
