<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

class AdminController extends Controller
{
    
    public function addDoctor() {
        return view('admin.add_doctor');
    }

    public function addNewDoctor(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'speciality' => 'required|string|max:255',
            'room' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);
        
        // Handle image upload
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('doctors', 'public');
        //     $validated['image'] = $imagePath;
        // }
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $filename);
            $validated['image'] = $filename;
        }
        
        // Create the doctor
        Doctor::create($validated);
        
        // Redirect with success message
        return redirect()->route('dashboard')->with('success', 'Doctor added successfully!');
    }
    public function showPanel() {
        return view('admin.main-panel');
    }
    public function doctorsList() {
        $doctors = Doctor::all();
        return view('admin.doctors-list', compact('doctors'));
    }
    public function deleteDoctor($id) {
        try {
            $doctor = Doctor::findOrFail($id);
            $doctor->delete(); // Use delete(), not softDelete()
            
            return redirect()->back()->with('success', 'Doctor deleted successfully.');
            
        } catch (\Exception $e) {
            \Log::error('Doctor deletion failed: ' . $e->getMessage());
            
            return redirect()->back()->with('error', 'Failed to delete doctor.');
        }
    }
    public function editDoctor($id) {
        $doctor = Doctor::findOrFail($id);
        return view('admin.edit_doctor', compact('doctor'));
    }
    public function updateDoctor(Request $request, $id) {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'speciality' => 'required|string|max:255',
            'room' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('doctors', 'public');
            $validated['image'] = $imagePath;
        }

        try {
            $doctor = Doctor::findOrFail($id);
            $doctor->update($validated);
        } catch (\Exception $e) {
            \Log::error('Doctor update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update doctor.');
        }
        
        // Redirect with success message
        return redirect()->route('dashboard')->with('success', 'Doctor updated successfully!');
    }
    //
    public function viewAppointments(){
        $appointments = Appointment::all();
        return view('admin.appointments', compact('appointments'));
    }

    public function updateAppointment(Request $request, $id){
        // dd('Appointment Updated');
        $request->validate([
            'status' => 'required|in:applied,approved,cancelled'
        ]);

        $appointment = Appointment::findOrFail($id);

        $appointment->status = $request->status;

        $appointment->save();

        return redirect()->back()->with('success', 'appointment status updated');

    }
}
