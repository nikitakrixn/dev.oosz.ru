<?php

namespace Database\Seeders;

use EmployeesTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DepartmentSeeder::class,
            PositionSeeder::class,
            ManagementDepartmentEmployeeSeeder::class,
            LegalDepartmentEmployeeSeeder::class,
            FinanceReportingDepartmentEmployeeSeeder::class,
            BudgetDepartmentEmployeeSeeder::class,
            ProductionDepartmentEmployeeSeeder::class,
            SpecialWorksDepartmentEmployeeSeeder::class,
            TechnicalDepartmentEmployeeSeeder::class,
            ProcurementDepartmentEmployeeSeeder::class,
            LandRelationsDepartmentEmployeeSeeder::class,
            PlanningEconomicsDepartmentEmployeeSeeder::class,
            AdminHrDepartmentEmployeeSeeder::class,
            EmployeesSettingsSeeder::class,
        ]);
    }
}
