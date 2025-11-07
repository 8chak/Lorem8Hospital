@extends('admin.template')
@section('content')
    <h2>Add Doctor</h2>
    <div class="row">
        <div class="col-12 col-sm-6">
            <form method="POST" action="{{ route('add_new_doctor') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Doctor's Name</label><br/>
                    <input required type="text" name="name" class="w-100"/>
                </div>
                <div class="form-group">
                    <label for="name">Phone Number</label><br/>
                    <input required type="text" name="number" class="w-100"/>
                </div>
                <div class="form-group">
                    <label for="name">Speciality Section</label><br/>
                    <input required type="text" name="speciality" class="w-100"/>
                </div>
                <div class="form-group">
                    <label for="name">Room Number</label><br/>
                    <input required type="text" name="room" class="w-100"/>
                </div>
                <div class="form-group">
                    <label for="name">Image</label><br/>
                    <input type="file" name="image" class=""/>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary text-center w-100 text-white" type="submit">Add Doctor</button>
                </div>
            </form>
        </div>
    </div>
@endsection