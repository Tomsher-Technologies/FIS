<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('heading')->nullable();
            $table->text('sub_heading')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('has_image')->default(false);
            $table->string('image')->nullable();
            $table->boolean('has_btn')->default(false);
            $table->string('btn_text')->nullable();
            $table->string('btn_link')->nullable();
            $table->foreignId('pages_id')->constrained('pages');
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
        Schema::dropIfExists('modules');
    }
}
