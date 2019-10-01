<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMathLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('math_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('endpoint');
            $table->string('num1');
            $table->string('num2')->nullable();
            $table->string('response')->nullable();
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
        Schema::dropIfExists('math_logs');
    }
}
