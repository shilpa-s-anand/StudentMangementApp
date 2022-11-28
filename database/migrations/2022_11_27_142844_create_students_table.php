<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Modules\Students\Models\Student;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


     protected $student_table;

     public function __construct() {

       $this->student_table = (new Student)->getTable();

     }


    public function up()
    {
        Schema::create($this->student_table, function (Blueprint $table) {
          $table->increments('id');
          $table->string('first_name', 50);
          $table->string('last_name', 50);
          $table->date('dob');
          $table->enum('gender', ['M','F','O']);
          $table->unsignedTinyInteger('reporting_teacher');
          $table->unsignedTinyInteger('status')->comment("1-active,2-disabled");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->student_table);
    }
}
