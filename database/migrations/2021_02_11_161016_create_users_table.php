<?php
# https://laravel.com/docs/8.x/migrations#available-column-types

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('email', 150)->unique();
                $table->string('first_name', 75);
                $table->string('last_name', 75);
                $table->string('password', 255);
                $table->string('phone', 20)->nullable();
                $table->string('cellphone', 20)->nullable();
                $table->boolean('confirmed')->default(false);
                $table->boolean('active')->default(true);
                $table->timestamp('created_at');
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
        Schema::dropIfExists('users');
    }
}
