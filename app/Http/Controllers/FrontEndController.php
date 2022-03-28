<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appoinment;
use App\Models\Time_slot;
use App\Models\User;
use App\Models\Booking;
class FrontEndController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set('America/New_York');
        // If there is set date, find the doctors
        if (request('date')) {
            $formatDate = date('m-d-yy', strtotime(request('date')));
            $doctors = Appoinment::where('date', $formatDate)->get();
            return view('welcome', compact('doctors', 'formatDate'));
        };
        // Return all doctors avalable for today to the welcome page
        $doctors = Appoinment::where('appoinment_date', date('m-d-yy'))->get();
        return view('welcome', compact('doctors'));
        
    }
    public function show($doctorId, $date)
    {
        $appoinment = Appoinment::where('doctor_id', $doctorId)->where('appoinment_date', $date)->first();
        $times = Time_slot::where('appointment_id', $appointment->id)->get();
        $user = User::where('id', $doctorId)->first();
        $doctor_id = $doctorId;
        return view('appoinment', compact('times', 'date', 'user', 'doctor_id'));

    }
    public function myBookings()
    {
        $appoinments = Booking::latest()->where('user_id', $user->id)->get();
        return view('admin.bookings.index', compact('appointments'));
    }
}
