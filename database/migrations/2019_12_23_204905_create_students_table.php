<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('surname');
            $table->string('firstname');
            $table->string('othername')->nullable();
            $table->string('matricNumber');
            $table->string('jamb_reg')->nullable();
            $table->integer('category_id');
            $table->integer('faculty_id');
            $table->integer('department_id');
            $table->integer('programme_id');
            $table->integer('state_id')->nullable();
            $table->integer('localgovt_id')->nullable();
            $table->string('email',100)->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('entry_year');
            $table->string('entry_month')->nullable();
            $table->string('student_type')->nullable();;
            $table->string('image_url')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('degree')->nullable();
            $table->string('mode_of_entry')->nullable();
            $table->string('birthdate')->nullable();
             $table->string('marital_status')->nullable();
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
        Schema::dropIfExists('students');
    }
}
