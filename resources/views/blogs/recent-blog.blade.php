@extends('base')

@extends('navbar')

@section('title', 'Recent Blogs')

@section('content')
    <div>
        <livewire:blogs.recent-blog/>
    </div>
@endsection
