<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAstrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('astros', function (Blueprint $table) {
            $table->increments('id');
        	$table->integer('astro_id');
        	$table->char('astro_name', 20);
        	$table->integer('all_score');
        	$table->Text('all_description');
        	$table->integer('love_score');
        	$table->Text('love_description');
        	$table->integer('career_score');
        	$table->Text('career_description');
        	$table->integer('money_score');
        	$table->Text('money_description');
        	$table->date('updated_at');
        	$table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('astros');
    }
}
