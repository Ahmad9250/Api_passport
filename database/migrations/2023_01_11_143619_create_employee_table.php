<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id',10);
            $table->string('name',20);
            $table->string('email',20);
            $table->unsignedBigInteger('employee_metadata_id');
            $table->foreign('employee_metadata_id')->references('metadata_id')->on('employee_metadata');
            // $table->unsignedBigInteger('department_id');
            // $table->foreign('department_id')->references('department_id')->on('department');
            // $table->foreignId('department_id')->constrained('department');
            // $table->foreignId('employee_metadata_id')->constrained('employee_metadata');
            // $table->foreignId('department_id')->constrained('departments');
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
};
