<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $employeeCount = Employee::count();
        $employeeHaveEP = Employee::where('ep_access', '!=', 0)->count();
        return view('pages.dashboard', [ 
            'employeeCount' => $employeeCount,
            'employeeHaveEP' => $employeeHaveEP
        ]);
    }
}
