@extends('admin.template')
@section('content')
    <h1>Blog Posts</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <th class="mr-4">Author</th>
            <th class="mr-4">Title</th>
            <th class="mr-4">Passage</th>
            <th class="mr-4">Date</th>
            <th class="mr-4">Action</th>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr class="p-2">
                <td class="mr-4">{{$blog->writer}}</td>
                <td class="mr-4">{{$blog->title}}</td>
                <td class="mr-4">
                    <a href="{{ route('blogs.show', $blog->id) }}">{{Str::limit($blog->passage, 50)}}</a>
                </td>
                <td class="mr-4">{{$blog->created_at}}</td>
                <td class="mr-4">
                    <a href="{{ route('blogs.edit', $blog->id) }} " class="btn btn-success">edit</a>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="post" class="d-inline">
                        @method('DELETE') @csrf 
                        <button  onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger ml-2">delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection