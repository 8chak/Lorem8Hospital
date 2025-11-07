@extends('admin.template')
@section('content')
    <h1>Appointments</h1>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Department</th>
            <th>Number</th>
            <th>Message</th>
            <th>Status</th>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->full_name }}</td>
                <td>{{ $appointment->email }}</td>
                <td>{{ $appointment->date }}</td>
                <td>{{ $appointment->speciality }}</td>
                <td>{{ $appointment->number }}</td>
                <td>{{ $appointment->message }}</td>
                <td>
                    <form method="POST" action="{{ route('appointmentUpdate', $appointment->id) }}">
                    @method('PUT')
                    @csrf
                        <select name="status" id="status">
                            <option value="applied" @selected($appointment->status->value == 'applied')>Applied</option>
                            <option value="approved" @selected($appointment->status->value == 'approved')>Approved</option>
                            <option value="cancelled" @selected($appointment->status->value == 'cancelled')>Cancelled</option>
                        </select>
                        <button type="submit" class="btn btn-primary">update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection