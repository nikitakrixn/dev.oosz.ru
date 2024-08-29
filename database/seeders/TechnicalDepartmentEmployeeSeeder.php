<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

class TechnicalDepartmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technicalDepartment = Department::where('name', 'Технический отдел')->first();

        $headOfDepartment = Position::where('name', 'Начальник отдела')->first();
        $deputyHeadOfDepartment = Position::where('name', 'Заместитель начальника отдела')->first();
        $chiefSpecialist = Position::where('name', 'Главный специалист')->first();

        $employees = [
            [
                'first_name' => 'Елена',
                'last_name' => 'Ларина',
                'middle_name' => 'Андреевна',
                'position_id' => $headOfDepartment->id,
                'email' => 'larinaea@oosz.ru',
            ],
            [
                'first_name' => 'Алена',
                'last_name' => 'Кицелюк',
                'middle_name' => 'Евгеньевна',
                'position_id' => $deputyHeadOfDepartment->id,
                'email' => 'kicelyukae@oosz.ru',
            ],
            [
                'first_name' => 'Владимир',
                'last_name' => 'Шевелев',
                'middle_name' => 'Викторович',
                'position_id' => $chiefSpecialist->id,
                'email' => 'shevelevvv@oosz.ru',
            ],
            [
                'first_name' => 'Тамара',
                'last_name' => 'Беляева',
                'middle_name' => 'Александровна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'belyaevata@oosz.ru',
            ],
            [
                'first_name' => 'Никита',
                'last_name' => 'Гавриличев',
                'middle_name' => 'Дмитриевич',
                'position_id' => $chiefSpecialist->id,
                'email' => 'gavrilichevnd@oosz.ru',
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create([
                'first_name' => $employeeData['first_name'],
                'last_name' => $employeeData['last_name'],
                'middle_name' => $employeeData['middle_name'],
                'department_id' => $technicalDepartment->id,
                'position_id' => $employeeData['position_id'],
                'email' => $employeeData['email'],
            ]);
        }
    }
}