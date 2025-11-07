<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Appointment;


class UserController extends Controller
{
    public function index() {

        $doctors = Doctor::all();
        return view('home', compact('doctors'));

    }

    public function allDoctors() {

        $doctors = Doctor::all();
        return view('doctorsPage', compact('doctors'));

    }

    public function dashboardType() {
        $user = Auth::user();
        if($user->userType === 'admin'){
            return view('admin.dashboard');
        }else{
            return view('dashboard');
        }
    }

    public function requestAppointment(Request $request) {
        // dd('appointment');
        $appointment = $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'date' => 'required|date|after_or_equal:today',
        'speciality' => 'nullable|string|max:255',
        'number' => 'required|string|max:20',
        'message' => 'required|string|max:1000',
        ]);

        try {
        Appointment::create($appointment);
        
        return redirect()->route('home')->with('success', 'Your appointment request was made successfully.');
        
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Appointment creation failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create appointment. Please try again.');
        }
    }
}
