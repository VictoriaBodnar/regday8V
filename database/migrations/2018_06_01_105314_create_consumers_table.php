<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->bigInteger('kod_consumer')->unique();
            $table->string('name_consumer',150)->unique();
            $table->integer('kod_grp')->default('0');
            $table->integer('kod_seti')->default('0');
            $table->integer('rem_id')->unsigned();
            $table->integer('otr_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('restrict');
            $table->foreign('rem_id')
                  ->references('id')->on('rems')
                  ->onDelete('restrict');
            $table->foreign('otr_id')
                  ->references('id')->on('otrs')
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
        Schema::dropIfExists('consumers');
    }
}
