@extends('admin.template')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('allNews') }}">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12 col-sm-8">
            <img src="{{ $blog->image_url }}" alt="Photo-Lorem-Hospital" class="w-100"/>
        </div>
    </div>
    <div class="text-gray">By {{ $blog->writer }} | {{ $blog->created_at->format('M d, Y') }} | {{ $blog->category }} | comments</div>
    <h1>{{ $blog->title }}</h1>
    <p>{{ $blog->passage }}</p>
    <div class="mb-2">
        <span>Tags:</span>
        @foreach($blog->tags_array as $tag)
            <span class="ml-2">{{ $tag }}</span>
        @endforeach
    </div>
    <div>
        <a href="{{ route('blogs.edit', $blog->id) }} " class="badge bg-secondary text-black rounded mr-2">Edit</a>
        <form action="{{ route('blogs.destroy', $blog->id) }}" method="post" class="d-inline">
            @method('DELETE') @csrf <button type="submit" class="badge bg-secondary text-black rounded mr-2">Delete</button>
        </form>
    </div>
@endsection