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
        Position::create(['name' => 'Директор']);
        Position::create(['name' => 'Заместитель директора (главный инженер)']);
        Position::create(['name' => 'Заместитель директора по имущественным вопросам']);
        Position::create(['name' => 'Заместитель директора по финансово-экономическим вопросам']);
        Position::create(['name' => 'Заместитель директора по производству']);
        Position::create(['name' => 'Ведущий документовед']);
        Position::create(['name' => 'Главный специалист']);
        Position::create(['name' => 'Начальник отдела']);
        Position::create(['name' => 'Заместитель начальника отдела']);
        Position::create(['name' => 'Ведущий инженер']);
        Position::create(['name' => 'Ведущий специалист']);
        Position::create(['name' => 'Ведущий инженер по охране труда']);
        Position::create(['name' => 'Водитель автомобиля']);
        Position::create(['name' => 'Уборщик служебных помещений']);
    }
}
