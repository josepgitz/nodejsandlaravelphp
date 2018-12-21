<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentRegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_regs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('sname');
            $table->string('lname');
            $table->timestamp("start_year");
            $table->string('gender');
            $table->string('country');
            $table->string('county');
            $table->string('admission_level');
            $table->integer('kcpe_marks');
            $table->string('parent_name');
            $table->string('parent_mobile');
            $table->string('parent_email');
            $table->timestamp("date_of_birth")->nullable();
            $table->integer('Birth_cert_no');
            $table->boolean('disabled')->default(0);
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
        Schema::dropIfExists('student_regs');
    }
}
