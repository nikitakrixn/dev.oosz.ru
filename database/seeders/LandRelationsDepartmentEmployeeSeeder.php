<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

class LandRelationsDepartmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $landRelationsDepartment = Department::where('name', 'Отдел земельных отношений и государственной регистрации прав')->first();

        $headOfDepartment = Position::where('name', 'Начальник отдела')->first();
        $chiefSpecialist = Position::where('name', 'Главный специалист')->first();

        $employees = [
            [
                'first_name' => 'Наталья',
                'last_name' => 'Кошелева',
                'middle_name' => 'Яковлевна',
                'position_id' => $headOfDepartment->id,
                'email' => 'koshelevany@oosz.ru',
            ],
            [
                'first_name' => 'Наталья',
                'last_name' => 'Чипизубова',
                'middle_name' => 'Геннадиевна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'chipizubovang@oosz.ru',
            ],
            [
                'first_name' => 'Павел',
                'last_name' => 'Иванов',
                'middle_name' => 'Николаевич',
                'position_id' => $chiefSpecialist->id,
                'email' => 'ivanovpn@oosz.ru',
            ],
            [
                'first_name' => 'Татьяна',
                'last_name' => 'Сецко',
                'middle_name' => 'Ивановна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'seckoti@oosz.ru',
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create([
                'first_name' => $employeeData['first_name'],
                'last_name' => $employeeData['last_name'],
                'middle_name' => $employeeData['middle_name'],
                'department_id' => $landRelationsDepartment->id,
                'position_id' => $employeeData['position_id'],
                'email' => $employeeData['email'],
            ]);
        }
    }
}