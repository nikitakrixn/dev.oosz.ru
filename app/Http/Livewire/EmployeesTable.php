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
    public $selectedEmployees = [];
    public $selectAll = false;
    public $filters = [
        'department_id' => '',
        'position_id' => '',
        'is_active' => '',
        'sed_praktika_access' => '',
        'ep_access' => '',
    ];

    public $createModal = false;
    public $editModal = false;
    public $editingEmployee = null;
    public $showDeleteModal = false;
    public $deleteEmployeeId = null;

    public $employee = [
        'first_name' => '',
        'last_name' => '',
        'middle_name' => '',
        'email' => '',
        'phone' => '',
        'department_id' => '',
        'position_id' => '',
        'is_active' => true,
        'sed_praktika_access' => false,
        'ep_access' => false,
    ];

    protected $rules = [
        'employee.first_name' => 'required|string|max:255',
        'employee.last_name' => 'required|string|max:255',
        'employee.middle_name' => 'nullable|string|max:255',
        'employee.email' => 'required|email|unique:employees,email',
        'employee.phone' => 'nullable|string|max:20',
        'employee.department_id' => 'required|exists:departments,id',
        'employee.position_id' => 'required|exists:positions,id',
        'employee.is_active' => 'boolean',
        'employee.sed_praktika_access' => 'boolean',
        'employee.ep_access' => 'boolean',
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

        $departments = Department::select('id', 'name')->distinct()->orderBy('name')->get();
        $positions = Position::select('id', 'name')->distinct()->orderBy('name')->get();

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

    public function openCreateModal()
    {
        $this->resetValidation();
        $this->reset('employee');
        $this->createModal = true;
    }

    public function openEditModal($employeeId)
    {
        $this->resetValidation();
        $this->editingEmployee = Employee::findOrFail($employeeId);
        $this->employee = $this->editingEmployee->toArray();
        $this->editModal = true;
    }

    public function createEmployee()
    {
        $this->validate();
        Employee::create($this->employee);
        $this->createModal = false;
        $this->reset('employee');
        session()->flash('message', 'Сотрудник успешно создан.');
    }

    public function updateEmployee()
    {
        $this->validate([
            'employee.email' => 'required|email|unique:employees,email,' . $this->editingEmployee->id,
        ]);
        $this->editingEmployee->update($this->employee);
        $this->editModal = false;
        session()->flash('message', 'Сотрудник успешно обновлен.');
    }

    public function deleteEmployee()
    {
        $employee = Employee::find($this->deleteEmployeeId);
        if ($employee) {
            $employee->delete();
            session()->flash('message', 'Сотрудник успешно удален.');
        }
        $this->showDeleteModal = false;
        $this->deleteEmployeeId = null;
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedEmployees = $this->employees->pluck('id')->map(fn($id) => (string) $id);
        } else {
            $this->selectedEmployees = [];
        }
    }

    public function confirmDelete($employeeId)
    {
        $this->deleteEmployeeId = $employeeId;
        $this->showDeleteModal = true;
    }

    public function deleteSelected()
    {
        $this->confirmDelete('selected');
    }
}
