<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $departments = Khoa::all();
        return view("attendance.lists", compact("departments"));
    }
}
