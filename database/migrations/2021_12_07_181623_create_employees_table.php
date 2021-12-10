<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('employee_id');
            $table->string('name_refix');
            $table->string('first_name');
            $table->string('middle_initial');
            $table->string('last_name');
            $table->string('gender',1);
            $table->string('email');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('mothers_maiden_name');
            $table->date('date_of_birth');
            $table->date('date_of_joining');
            $table->unsignedDouble('salary');
            $table->string('ssn');
            $table->string('phone');
            $table->string('city',50);
            $table->string('state',2);
            $table->unsignedMediumInteger('zip');

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
        Schema::dropIfExists('employees');
    }
}
