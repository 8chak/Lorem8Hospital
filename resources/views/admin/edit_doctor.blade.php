@extends('admin.template')
@section('content')
    <h2>Edit Doctor</h2>
    <div class="row">
        <div class="col-12 col-sm-6">
            <form method="POST" action="{{ route('update_doctor', $doctor->id) }}" enctype="multipart/form-data">
            @method('PUT')    
            @csrf
                <div class="form-group">
                    <label for="name">Doctor's Name</label><br/>
                    <input required type="text" name="name" class="w-100" value="{{ $doctor->name }}"/>
                </div>
                <div class="form-group">
                    <label for="name">Phone Number</label><br/>
                    <input required type="text" name="number" class="w-100" value="{{ $doctor->number }}"/>
                </div>
                <div class="form-group">
                    <label for="name">Speciality Section</label><br/>
                    <input required type="text" name="speciality" class="w-100" value="{{ $doctor->speciality }}"/>
                </div>
                <div class="form-group">
                    <label for="name">Room Number</label><br/>
                    <input required type="text" name="room" class="w-100" value="{{ $doctor->room }}"/>
                </div>
                <div class="form-group">
                    <label for="name">Image</label>
                    <img height="100" src="{{$doctor->image_url}}" class="m-3 p-3"alt="doctor.jpg"><br/>
                    <input type="file" name="image" class=""/>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary text-center w-100 text-white" type="submit">Update Doctor</button>
                </div>
            </form>
        </div>
    </div>
@endsection