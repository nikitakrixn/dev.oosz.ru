<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

class ManagementDepartmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $managementDepartment = Department::where('name', 'Управление')->first();

        $directorPosition = Position::where('name', 'Директор')->first();
        $deputyDirectorChiefEngineer = Position::where('name', 'Заместитель директора (главный инженер)')->first();
        $deputyDirectorPropertyIssues = Position::where('name', 'Заместитель директора по имущественным вопросам')->first();
        $deputyDirectorFinanceEconomics = Position::where('name', 'Заместитель директора по финансово-экономическим вопросам')->first();
        $deputyDirectorProduction = Position::where('name', 'Заместитель директора по производству')->first();
        $leadingDocumentalist = Position::where('name', 'Ведущий документовед')->first();
        $chiefSpecialist = Position::where('name', 'Главный специалист')->first();

        $employees = [
            [
                'first_name' => 'Андрей',
                'last_name' => 'Бобровников',
                'middle_name' => 'Викторович',
                'position_id' => $directorPosition->id,
                'email' => 'bobrovnikovav@oosz.ru',
            ],
            [
                'first_name' => 'Александр',
                'last_name' => 'Терещенко',
                'middle_name' => 'Михайлович',
                'position_id' => $deputyDirectorChiefEngineer->id,
                'email' => 'tereshchenkoam@oosz.ru',
            ],
            [
                'first_name' => 'Ольга',
                'last_name' => 'Хорзова',
                'middle_name' => 'Ивановна',
                'position_id' => $deputyDirectorPropertyIssues->id,
                'email' => 'horzovaoi@oosz.ru',
            ],
            [
                'first_name' => 'Татьяна',
                'last_name' => 'Боякова',
                'middle_name' => 'Геннадьевна',
                'position_id' => $deputyDirectorFinanceEconomics->id,
                'email' => 'boyakovatg@oosz.ru',
            ],
            [
                'first_name' => 'Константин',
                'last_name' => 'Штеблау',
                'middle_name' => 'Иванович',
                'position_id' => $deputyDirectorProduction->id,
                'email' => 'shteblauki@oosz.ru',
            ],
            [
                'first_name' => 'Светлана',
                'last_name' => 'Кислова',
                'middle_name' => 'Борисовна',
                'position_id' => $leadingDocumentalist->id,
                'email' => 'kislovasb@oosz.ru',
            ],
            [
                'first_name' => 'Инна',
                'last_name' => 'Урих',
                'middle_name' => 'Владиславовна',
                'position_id' => $chiefSpecialist->id,
                'email' => 'urihiv@oosz.ru',
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create([
                'first_name' => $employeeData['first_name'],
                'last_name' => $employeeData['last_name'],
                'middle_name' => $employeeData['middle_name'],
                'department_id' => $managementDepartment->id,
                'position_id' => $employeeData['position_id'],
                'email' => $employeeData['email'],
            ]);
        }
    }
}
