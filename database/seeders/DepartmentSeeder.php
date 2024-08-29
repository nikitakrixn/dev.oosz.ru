<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(['name' => 'Управление']);
        Department::create(['name' => 'Отдел правовой работы']);
        Department::create(['name' => 'Отдел отчетности и финансирования']);
        Department::create(['name' => 'Сметный отдел']);
        Department::create(['name' => 'Производственный отдел']);
        Department::create(['name' => 'Технический отдел']);
        Department::create(['name' => 'Отдел комплектации и закупок']);
        Department::create(['name' => 'Административно-хозяйственный отдел']);
        Department::create(['name' => 'Отдел земельных отношений и государственной регистрации прав']);
        Department::create(['name' => 'Планово-экономический отдел']);
        Department::create(['name' => 'Отдел специальных работ']);
    }
}
