<?php

namespace App\Http\Livewire\Blogs;
use App\Models\Blog;
use Livewire\Component;
use App\Events\UserLog;

class RecentBlog extends Component
{
    public $search, $title = 'All';
    public $content, $blog_id;

    public function recentBlogs (){
        $query = Blog::orderBy('id', 'desc')
            ->search($this->search);
            if($this->title != 'All') {
                $query->where('title', $this->title);
            }
            $recents = $query->get();
        return compact('recents');
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
            'title'                        =>      $this->title,
            'content'                      =>      $this->content,
        ]);
        $log_entry = auth()->user()->name . ' updated a blog';
        event(new UserLog($log_entry));

        return redirect('recent-blog')->with('message', ' Blog updated successfully');
    }

    public function delete($blogId) {
        $this->blogDelete = $blogId;
    }
    public function deleteBlog() {

        Blog::find($this->blogDelete)->delete();

        $log_entry = auth()->user()->name . ' deleted a blog';
        event(new UserLog($log_entry));

        return redirect('/my-blog')->with('message', ' Blog has been deleted successfully');
    }

    public function render()
    {
        return view('livewire.blogs.recent-blog', $this->recentBlogs());
    }
}
