<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

class FinanceReportingDepartmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $financeReportingDepartment = Department::where('name', 'Отдел отчетности и финансирования')->first();

        $headOfDepartment = Position::where('name', 'Начальник отдела')->first();
        $deputyHeadOfDepartment = Position::where('name', 'Заместитель начальника отдела')->first();
        $chiefSpecialist = Position::where('name', 'Главный специалист')->first();

        $employees = [
            [
                'first_name' => 'Наталья',
                'last_name' => 'Лаптева',
                'middle_name' => 'Вадимовна',
                'position_id' => $headOfDepartment->id,
                'email' => 'laptevanv@oosz.ru',
            ],
            [
                'first_name' => 'Светлана',
                'last_name' => 'Гаврина',
                'middle_name' => 'Сергеевна',
                'position_id' => $deputyHeadOfDepartment->id,
                'email' => 'gavrinass@oosz.ru',
            ],
            [
                'first_name' => 'Лариса',
                'last_name' => 'Умрихина',
                'middle_name' => 'Геннадьевна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'umrihinalg@oosz.ru',
            ],
            [
                'first_name' => 'Александр',
                'last_name' => 'Гилев',
                'middle_name' => 'Владимирович',
                'position_id' => $chiefSpecialist->id,
                'email' => 'gilevav@oosz.ru',
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create([
                'first_name' => $employeeData['first_name'],
                'last_name' => $employeeData['last_name'],
                'middle_name' => $employeeData['middle_name'],
                'department_id' => $financeReportingDepartment->id,
                'position_id' => $employeeData['position_id'],
                'email' => $employeeData['email'],
            ]);
        }
    }
}