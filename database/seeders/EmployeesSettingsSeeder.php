<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')
            ->update([
                'sed_praktika_access' => true,
                'ep_access' => true,
            ]);

        $employeeIds = [2, 6, 12, 19, 21, 24, 25, 26, 30, 31, 53];
        Employee::whereIn('id', $employeeIds)
            ->update(['ep_access' => false]);
    }
}
