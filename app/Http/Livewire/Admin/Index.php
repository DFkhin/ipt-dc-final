<?php

namespace App\Http\Livewire\Admin;

use App\Models\Log;
use App\Models\User;
use App\Models\Blog;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public function index() {
        $allBlogs = Blog::count();
        $blogs = Blog::where('user_id', auth()->user()->id)->count();
        $logs = Log::count();
        $permissions = Permission::count();
        $roles = Role::count();
        $users = User::count();

        return compact('allBlogs', 'logs', 'blogs', 'permissions', 'roles', 'users');
    }
    public function render()
    {
        return view('livewire.admin.index', $this->index());
    }
}
