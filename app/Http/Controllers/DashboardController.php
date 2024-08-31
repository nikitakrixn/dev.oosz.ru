<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $employeeCount = Employee::count();
        return view('pages.dashboard', [ 'employeeCount' => $employeeCount ]);
    }
}
