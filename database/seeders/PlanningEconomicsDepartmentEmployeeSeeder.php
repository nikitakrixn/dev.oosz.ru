<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

class PlanningEconomicsDepartmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planningEconomicsDepartment = Department::where('name', 'Планово-экономический отдел')->first();

        $headOfDepartment = Position::where('name', 'Начальник отдела')->first();
        $deputyHeadOfDepartment = Position::where('name', 'Заместитель начальника отдела')->first();
        $chiefSpecialist = Position::where('name', 'Главный специалист')->first();

        $employees = [
            [
                'first_name' => 'Кристина',
                'last_name' => 'Пономарева',
                'middle_name' => 'Алексеевна',
                'position_id' => $headOfDepartment->id,
                'email' => 'ponomarevaka@oosz.ru',
            ],
            [
                'first_name' => 'Наталья',
                'last_name' => 'Тимошенко',
                'middle_name' => 'Борисовна',
                'position_id' => $deputyHeadOfDepartment->id,
                'email' => 'timoshenkonb@oosz.ru',
            ],
            [
                'first_name' => 'Елена',
                'last_name' => 'Онищенко',
                'middle_name' => 'Андреевна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'onishchenkoea@oosz.ru',
            ],
            [
                'first_name' => 'Марина',
                'last_name' => 'Кичева',
                'middle_name' => 'Викторовна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'kichevamv@oosz.ru',
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create([
                'first_name' => $employeeData['first_name'],
                'last_name' => $employeeData['last_name'],
                'middle_name' => $employeeData['middle_name'],
                'department_id' => $planningEconomicsDepartment->id,
                'position_id' => $employeeData['position_id'],
                'email' => $employeeData['email'],
            ]);
        }
    }
}