<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKeywordsToSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seos', function (Blueprint $table) {
            $table->string('keywords')->nullable()->after('twitter_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seos', function (Blueprint $table) {
            $table->dropColumn('keywords');
        });
    }
}
