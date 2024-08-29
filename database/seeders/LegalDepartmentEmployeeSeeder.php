<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

class LegalDepartmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $legalDepartment = Department::where('name', 'Отдел правовой работы')->first();

        $headOfDepartment = Position::where('name', 'Начальник отдела')->first();
        $deputyHeadOfDepartment = Position::where('name', 'Заместитель начальника отдела')->first();
        $chiefSpecialist = Position::where('name', 'Главный специалист')->first();

        $employees = [
            [
                'first_name' => 'Яна',
                'last_name' => 'Лотош',
                'middle_name' => 'Александровна',
                'position_id' => $headOfDepartment->id,
                'email' => 'lotoshya@oosz.ru',
            ],
            [
                'first_name' => 'Нелли',
                'last_name' => 'Курбацкая',
                'middle_name' => 'Николаевна',
                'position_id' => $deputyHeadOfDepartment->id,
                'email' => 'kurbackayann@oosz.ru',
            ],
            [
                'first_name' => 'Наталья',
                'last_name' => 'Катковская',
                'middle_name' => 'Николаевна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'katkovskayann@oosz.ru',
            ],
            [
                'first_name' => 'Гульмаржан',
                'last_name' => 'Жумабаева',
                'middle_name' => 'Даулетжановна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'zhumabaevagd@oosz.ru',
            ],
            [
                'first_name' => 'Мария',
                'last_name' => 'Калашникова',
                'middle_name' => 'Валерьевна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'kalashnikovamv@oosz.ru',
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create([
                'first_name' => $employeeData['first_name'],
                'last_name' => $employeeData['last_name'],
                'middle_name' => $employeeData['middle_name'],
                'department_id' => $legalDepartment->id,
                'position_id' => $employeeData['position_id'],
                'email' => $employeeData['email'],
            ]);
        }
    }
}
