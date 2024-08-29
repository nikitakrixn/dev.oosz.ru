<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

class BudgetDepartmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $budgetDepartment = Department::where('name', 'Сметный отдел')->first();

        $headOfDepartment = Position::where('name', 'Начальник отдела')->first();
        $chiefSpecialist = Position::where('name', 'Главный специалист')->first();

        $employees = [
            [
                'first_name' => 'Андрей',
                'last_name' => 'Голованев',
                'middle_name' => 'Александрович',
                'position_id' => $headOfDepartment->id,
                'email' => 'golovanevaa@oosz.ru',
            ],
            [
                'first_name' => 'Алия',
                'last_name' => 'Ахмедьярова',
                'middle_name' => 'Айнабаевна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'akhmedyarovaaa@oosz.ru',
            ],
            [
                'first_name' => 'Ольга',
                'last_name' => 'Корнилова',
                'middle_name' => 'Владимировна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'kornilovaov@oosz.ru',
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create([
                'first_name' => $employeeData['first_name'],
                'last_name' => $employeeData['last_name'],
                'middle_name' => $employeeData['middle_name'],
                'department_id' => $budgetDepartment->id,
                'position_id' => $employeeData['position_id'],
                'email' => $employeeData['email'],
            ]);
        }
    }
}