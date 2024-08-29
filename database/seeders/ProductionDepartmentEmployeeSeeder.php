<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

class ProductionDepartmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productionDepartment = Department::where('name', 'Производственный отдел')->first();

        $headOfDepartment = Position::where('name', 'Начальник отдела')->first();
        $chiefSpecialist = Position::where('name', 'Главный специалист')->first();

        $employees = [
            [
                'first_name' => 'Дмитрий',
                'last_name' => 'Данилов',
                'middle_name' => 'Александрович',
                'position_id' => $headOfDepartment->id,
                'email' => 'danilovda@oosz.ru',
            ],
            [
                'first_name' => 'Андрей',
                'last_name' => 'Власенко',
                'middle_name' => 'Викторович',
                'position_id' => $chiefSpecialist->id,
                'email' => 'vlasenkoav@oosz.ru',
            ],
            [
                'first_name' => 'Наталья',
                'last_name' => 'Ващенко',
                'middle_name' => 'Александровна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'vashchenkona@oosz.ru',
            ],
            [
                'first_name' => 'Вадим',
                'last_name' => 'Колосов',
                'middle_name' => 'Александрович',
                'position_id' => $chiefSpecialist->id,
                'email' => 'kolosovva@oosz.ru',
            ],
            [
                'first_name' => 'Дарья',
                'last_name' => 'Волковенко',
                'middle_name' => 'Денисовна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'volkovenkodd@oosz.ru',
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create([
                'first_name' => $employeeData['first_name'],
                'last_name' => $employeeData['last_name'],
                'middle_name' => $employeeData['middle_name'],
                'department_id' => $productionDepartment->id,
                'position_id' => $employeeData['position_id'],
                'email' => $employeeData['email'],
            ]);
        }
    }
}