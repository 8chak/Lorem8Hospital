@extends('admin.template')
@section('content')
    <h2>Create Post</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-12 col-sm-8">
            <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="writer">Author's Name</label><br/>
                    <input required type="text" name="writer" class="w-100"/>
                </div>

                <div class="form-group">
                    <label for="title">Title</label><br/>
                    <input required type="text" name="title" class="w-100"/>
                </div>
                <div class="form-group">
                    <textarea required name="passage" class="w-100" rows="10">write your article...</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label><br/>
                    <input type="file" name="image" class=""/>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <input required placeholder="tags" type="text" name="tags" class="w-100"/>
                    </div>
                    <div class="col-6">
                        <input required placeholder="category" type="text" name="category" class="w-100"/>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary text-center w-100 text-white" type="submit">Add Article</button>
                </div>
            </form>
        </div>
    </div>
@endsection