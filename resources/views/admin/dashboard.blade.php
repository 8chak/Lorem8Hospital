@extends('admin.template')
@section('content')
    <h2>Dashboard</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
