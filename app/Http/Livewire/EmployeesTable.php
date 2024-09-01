<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class EmployeesTable extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.employees-table',
            [
                'employees' => Employee::with('position', 'department')->paginate(10),
            ]);
    }
}
