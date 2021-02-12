<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            Schema::create('students', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id');
                $table->string('first_name', 75);
                $table->string('last_name', 75);
                $table->string('email', 150)->nullable();
                $table->string('phone', 20)->nullable();
                $table->string('cellphone', 20)->nullable();
                $table->float('class_price')->nullable();
                $table->smallInteger('class_duration')->nullable(); # minutes
                $table->time('class_hour')->nullable();
                $table->longText('notes')->nullable();
                $table->boolean('active')->default(true);

                $table->unique(['user_id', 'email'], 'uk_students_user_id_email');

                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
            });
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
