<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('inventory_number');
            $table->foreignId('responsible_person_id')->nullable()->constrained('employees');
            $table->string('account_number')->nullable();
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('cost', 10, 2);
            $table->string('location')->nullable();
            $table->integer('remaining_quantity');
            $table->enum('status', ['active', 'disposed'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
