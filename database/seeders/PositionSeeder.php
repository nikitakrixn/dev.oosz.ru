<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;
use App\Models\Department;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $managementDepartment = Department::where('name', 'Управление')->first();
        $legalDepartment = Department::where('name', 'Отдел правовой работы')->first();
        $financeDepartment = Department::where('name', 'Отдел отчетности и финансирования')->first();
        $budgetDepartment = Department::where('name', 'Сметный отдел')->first();
        $productionDepartment = Department::where('name', 'Производственный отдел')->first();
        $technicalDepartment = Department::where('name', 'Технический отдел')->first();
        $procurementDepartment = Department::where('name', 'Отдел комплектации и закупок')->first();
        $adminDepartment = Department::where('name', 'Административно-хозяйственный отдел')->first();
        $landDepartment = Department::where('name', 'Отдел земельных отношений и государственной регистрации прав')->first();
        $planningDepartment = Department::where('name', 'Планово-экономический отдел')->first();
        $specialWorksDepartment = Department::where('name', 'Отдел специальных работ')->first();

        Position::create(['name' => 'Директор ', 'department_id' => $managementDepartment->id]);
        Position::create(['name' => 'Заместитель директора (главный инженер)', 'department_id' => $managementDepartment->id]);
        Position::create(['name' => 'Заместитель директора по имущественным вопросам', 'department_id' => $managementDepartment->id]);
        Position::create(['name' => 'Заместитель директора по финансово-экономическим вопросам', 'department_id' => $managementDepartment->id]);
        Position::create(['name' => 'Заместитель директора по производству', 'department_id' => $managementDepartment->id]);
        Position::create(['name' => 'Ведущий документовед', 'department_id' => $managementDepartment->id]);
        Position::create(['name' => 'Главный специалист', 'department_id' => $managementDepartment->id]);
        Position::create(['name' => 'Начальник отдела', 'department_id' => $legalDepartment->id]);
        Position::create(['name' => 'Заместитель начальника отдела', 'department_id' => $legalDepartment->id]);
        Position::create(['name' => 'Главный специалист', 'department_id' => $legalDepartment->id]);
        Position::create(['name' => 'Начальник отдела', 'department_id' => $financeDepartment->id]);
        Position::create(['name' => 'Заместитель начальника отдела', 'department_id' => $financeDepartment->id]);
        Position::create(['name' => 'Главный специалист', 'department_id' => $financeDepartment->id]);
        Position::create(['name' => 'Начальник отдела', 'department_id' => $budgetDepartment->id]);
        Position::create(['name' => 'Главный специалист', 'department_id' => $budgetDepartment->id]);
        Position::create(['name' => 'Начальник отдела', 'department_id' => $productionDepartment->id]);
        Position::create(['name' => 'Заместитель начальника отдела', 'department_id' => $productionDepartment->id]);
        Position::create(['name' => 'Главный специалист', 'department_id' => $productionDepartment->id]);
        Position::create(['name' => 'Ведущий инженер', 'department_id' => $productionDepartment->id]);
        Position::create(['name' => 'Начальник отдела', 'department_id' => $technicalDepartment->id]);
        Position::create(['name' => 'Заместитель начальника  отдела', 'department_id' => $technicalDepartment->id]);
        Position::create(['name' => 'Главный специалист', 'department_id' => $technicalDepartment->id]);
        Position::create(['name' => 'Начальник отдела', 'department_id' => $procurementDepartment->id]);
        Position::create(['name' => 'Заместитель начальника отдела', 'department_id' => $procurementDepartment->id]);
        Position::create(['name' => 'Главный специалист', 'department_id' => $procurementDepartment->id]);
        Position::create(['name' => 'Начальник отдела', 'department_id' => $adminDepartment->id]);
        Position::create(['name' => 'Главный специалист', 'department_id' => $adminDepartment->id]);
        Position::create(['name' => 'Ведущий специалист', 'department_id' => $adminDepartment->id]);
        Position::create(['name' => 'Ведущий инженер по охране труда', 'department_id' => $adminDepartment->id]);
        Position::create(['name' => 'Водитель автомобиля', 'department_id' => $adminDepartment->id]);
        Position::create(['name' => 'Уборщик служебных помещений', 'department_id' => $adminDepartment->id]);
        Position::create(['name' => 'Начальник отдела', 'department_id' => $landDepartment->id]);
        Position::create(['name' => 'Главный специалист', 'department_id' => $landDepartment->id]);
        Position::create(['name' => 'Начальник отдела', 'department_id' => $planningDepartment->id]);
        Position::create(['name' => 'Заместитель начальника отдела', 'department_id' => $planningDepartment->id]);
        Position::create(['name' => 'Главный специалист', 'department_id' => $planningDepartment->id]);
        Position::create(['name' => 'Начальник отдела', 'department_id' => $specialWorksDepartment->id]);
        Position::create(['name' => 'Главный специалист', 'department_id' => $specialWorksDepartment->id]);
    }
}
