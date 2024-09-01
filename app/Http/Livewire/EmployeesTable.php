<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use Livewire\WithPagination;

class EmployeesTable extends Component
{

    use WithPagination;

    public $search = '';
    public $departmentId = null;
    public $positionId = null;
    public $sortField = 'last_name';
    public $sortDirection = 'asc';
    public $filters = [
        'department_id' => '',
        'position_id' => '',
        'is_active' => '',
        'sed_praktika_access' => '',
        'ep_access' => '',
    ];

    public function render()
    {
        $employees = Employee::query()
        ->when($this->search, function ($query) {
            $query->where(function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        })
        ->when($this->filters['department_id'], function ($query) {
            $query->where('department_id', $this->filters['department_id']);
        })
        ->when($this->filters['position_id'], function ($query) {
            $query->where('position_id', $this->filters['position_id']);
        })
        ->when($this->filters['is_active'] !== '', function ($query) {
            $query->where('is_active', $this->filters['is_active']);
        })
        ->when($this->filters['sed_praktika_access'] !== '', function ($query) {
            $query->where('sed_praktika_access', $this->filters['sed_praktika_access']);
        })
        ->when($this->filters['ep_access'] !== '', function ($query) {
            $query->where('ep_access', $this->filters['ep_access']);
        })
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate(10);

        $departments = Department::all();
        $positions = Position::all();

        return view('livewire.employees-table', [
            'employees' => $employees,
            'departments' => $departments,
            'positions' => $positions,
        ]);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function resetFilters()
    {
        $this->reset('filters');
    }
}
