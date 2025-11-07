@extends('admin.template')
@section('content')
    <h1>Doctors List</h1>
    <table class="table table-striped">
        <thead>
            <th class="mr-4">Name</th>
            <th class="mr-4">Phone</th>
            <th class="mr-4">Speciality</th>
            <th class="mr-4">Room</th>
            <th class="mr-4">Action</th>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr class="p-2">
                <td class="mr-4">{{$doctor->name}}</td>
                <td class="mr-4">{{$doctor->number}}</td>
                <td class="mr-4">{{$doctor->speciality}}</td>
                <td class="mr-4">{{$doctor->room}}</td>
                <td class="mr-4">{{$doctor->created_at}}</td>
                <td class="mr-4">
                    <a href="{{ route('edit_doctor', $doctor->id) }} " class="btn btn-success">edit</a>
                    <form action="{{ route('delete_doctor', $doctor->id) }}" method="post" class="d-inline">
                        @csrf
                        <button  onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger ml-2">delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection