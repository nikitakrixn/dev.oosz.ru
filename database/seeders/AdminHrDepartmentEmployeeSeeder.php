<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

class AdminHrDepartmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminHrDepartment = Department::where('name', 'Административно-хозяйственный отдел')->first();

        $headOfDepartment = Position::where('name', 'Начальник отдела')->first();
        $chiefSpecialist = Position::where('name', 'Главный специалист')->first();
        $seniorSpecialist = Position::where('name', 'Ведущий специалист')->first();
        $safetyEngineer = Position::where('name', 'Ведущий инженер по охране труда')->first();
        $driver = Position::where('name', 'Водитель автомобиля')->first();
        $cleaner = Position::where('name', 'Уборщик служебных помещений')->first();

        $employees = [
            [
                'first_name' => 'Валерий',
                'last_name' => 'Зубарев',
                'middle_name' => 'Александрович',
                'position_id' => $headOfDepartment->id,
                'email' => 'zubarevva@oosz.ru',
            ],
            [
                'first_name' => 'Михаил',
                'last_name' => 'Ильин',
                'middle_name' => 'Дмитриевич',
                'position_id' => $chiefSpecialist->id,
                'email' => 'ilinmd@oosz.ru',
            ],
            [
                'first_name' => 'Никита',
                'last_name' => 'Найдёнов',
                'middle_name' => 'Андреевич',
                'position_id' => $seniorSpecialist->id,
                'email' => 'naydenovna@oosz.ru',
            ],
            [
                'first_name' => 'Наталья',
                'last_name' => 'Фисуненко',
                'middle_name' => 'Владимировна',
                'position_id' => $seniorSpecialist->id,
                'email' => 'fisunenkonv@oosz.ru',
            ],
            [
                'first_name' => 'Елена',
                'last_name' => 'Иванова',
                'middle_name' => 'Геннадьевна',
                'position_id' => $safetyEngineer->id,
                'email' => 'kotovaeg@oosz.ru',
            ],
            [
                'first_name' => 'Андрей',
                'last_name' => 'Борзяк',
                'middle_name' => 'Александрович',
                'position_id' => $driver->id,
                'email' => 'borzykaa@oosz.ru',
            ],
            [
                'first_name' => 'Александр',
                'last_name' => 'Суима',
                'middle_name' => 'Викторович',
                'position_id' => $driver->id,
                'email' => 'saimav@oosz.ru',
            ],
            [
                'first_name' => 'Владимир',
                'last_name' => 'Бархатов',
                'middle_name' => 'Юрьевич',
                'position_id' => $driver->id,
                'email' => 'barhatova@oosz.ru',
            ],
            [
                'first_name' => 'Сергей',
                'last_name' => 'Луговик',
                'middle_name' => 'Викторович',
                'position_id' => $driver->id,
                'email' => 'lugoviksv@oosz.ru',
            ],
            [
                'first_name' => 'Елена',
                'last_name' => 'Евтушенко',
                'middle_name' => 'Анатольевна',
                'position_id' => $cleaner->id,
                'email' => 'evtushenkoa@oosz.ru',
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create([
                'first_name' => $employeeData['first_name'],
                'last_name' => $employeeData['last_name'],
                'middle_name' => $employeeData['middle_name'],
                'department_id' => $adminHrDepartment->id,
                'position_id' => $employeeData['position_id'],
                'email' => $employeeData['email'],
            ]);
        }
    }
}