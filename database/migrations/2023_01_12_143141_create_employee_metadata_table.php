<?php

use App\Models\Designation;
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
        Schema::create('employee_metadata', function (Blueprint $table) {
            $table->bigIncrements('metadata_id');
            $table->string('bloodgroup',5);
            $table->string('contact',11);
            $table->string('address',50);
            $table->string('date_of_birth',50);
            $table->string('age',10);
            $table->string('salary',50);
            $table->string('joining_date',20);
            $table->string('city',20);
            // $table->foreignId('designation_id')->constrained('designations');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('department_id')->on('departments');
            // $table->foreignId('department_id')->constrained('departments');
            // $table->unsignedBigInteger('designation_id');

            // $table->foreign('designation_id')->references('id')->on('designation');
            // $table->foreignId(column:'designation_id')->nullable()->constrained(table:'Designation');
            // $table->unsignedBigInteger('designation_id');
            // $table->foreign('designation_id')->references('designation_id')->on('designations');
            // $table->integer(column:'designation_id');
           
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
        Schema::dropIfExists('employee_metadata');
    }
};
