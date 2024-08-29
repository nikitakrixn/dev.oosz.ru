<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

class ProcurementDepartmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $procurementDepartment = Department::where('name', 'Отдел комплектации и закупок')->first();

        $headOfDepartment = Position::where('name', 'Начальник отдела')->first();
        $deputyHeadOfDepartment = Position::where('name', 'Заместитель начальника отдела')->first();
        $chiefSpecialist = Position::where('name', 'Главный специалист')->first();

        $employees = [
            [
                'first_name' => 'Галина',
                'last_name' => 'Урайкина',
                'middle_name' => 'Павловна',
                'position_id' => $headOfDepartment->id,
                'email' => 'uraykinagp@oosz.ru',
            ],
            [
                'first_name' => 'Елена',
                'last_name' => 'Родимова',
                'middle_name' => 'Ивановна',
                'position_id' => $deputyHeadOfDepartment->id,
                'email' => 'rodimovaei@oosz.ru',
            ],
            [
                'first_name' => 'Евгения',
                'last_name' => 'Братишко',
                'middle_name' => 'Витальевна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'bratishkoev@oosz.ru',
            ],
            [
                'first_name' => 'Любовь',
                'last_name' => 'Сироткина',
                'middle_name' => 'Ивановна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'sirotkinali@oosz.ru',
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create([
                'first_name' => $employeeData['first_name'],
                'last_name' => $employeeData['last_name'],
                'middle_name' => $employeeData['middle_name'],
                'department_id' => $procurementDepartment->id,
                'position_id' => $employeeData['position_id'],
                'email' => $employeeData['email'],
            ]);
        }
    }
}