<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use App\Models\Lops;
use App\Models\SinhViens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $studentCount = SinhViens::all()->count();
        $departmentCount = Khoa::all()->count();
        $classCount = Lops::all()->count();
        return View::make("dashboard.index", compact("studentCount", "departmentCount", "classCount"));
    }
}