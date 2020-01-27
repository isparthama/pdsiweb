<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('output', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('slug');
            $table->text('template');
            $table->boolean('active')->default(true);
            $table->string('created_by',100);
            $table->string('updated_by',100)->nullable();
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
        Schema::dropIfExists('output');
    }
}
