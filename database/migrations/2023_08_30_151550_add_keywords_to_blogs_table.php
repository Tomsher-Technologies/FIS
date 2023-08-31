<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKeywordsToBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('seo_title')->nullable()->after('slug');
            $table->string('og_title')->nullable()->after('seo_title');
            $table->string('twitter_title')->nullable()->after('og_title');
            $table->string('seo_description')->nullable()->after('twitter_title');
            $table->string('og_description')->nullable()->after('seo_description');
            $table->string('twitter_description')->nullable()->after('og_description');
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
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('seo_title');
            $table->dropColumn('og_title');
            $table->dropColumn('twitter_title');
            $table->dropColumn('seo_description');
            $table->dropColumn('og_description');
            $table->dropColumn('twitter_description');
            $table->dropColumn('keywords');
        });
    }
}
