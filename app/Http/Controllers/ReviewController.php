<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class ReviewController extends Controller
{
    public function showReviews($id)
{
    $doctor = Doctor::findOrFail($id);
    $reviews=Review::get();
    return view('admin.reviwes.index', compact('doctor','reviews'));
}
   
}
