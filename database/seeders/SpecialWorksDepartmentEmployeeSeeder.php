<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

class SpecialWorksDepartmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialWorksDepartment = Department::where('name', 'Отдел специальных работ')->first();

        $chiefSpecialist = Position::where('name', 'Главный специалист')->first();

        $employees = [
            [
                'first_name' => 'Махаббат',
                'last_name' => 'Темербекова',
                'middle_name' => 'Досмукановна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'temerbekovamd@oosz.ru',
            ],
            [
                'first_name' => 'Елена',
                'last_name' => 'Мацук',
                'middle_name' => 'Александровна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'matsukea@oosz.ru',
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create([
                'first_name' => $employeeData['first_name'],
                'last_name' => $employeeData['last_name'],
                'middle_name' => $employeeData['middle_name'],
                'department_id' => $specialWorksDepartment->id,
                'position_id' => $employeeData['position_id'],
                'email' => $employeeData['email'],
            ]);
        }
    }
}