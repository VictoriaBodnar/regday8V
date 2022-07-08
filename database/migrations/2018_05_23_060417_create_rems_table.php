<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rems', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('kod_rem');
            $table->integer('kod_seti')->default('0');
            $table->string('name_rem')->default('0');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::disableForeignKeyConstraints();
        //$table->dropForeign(['user_id']);
        Schema::dropIfExists('rems');

        /*DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('rems');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');*/
    }
}
