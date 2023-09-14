<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontendsettings', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('phone');
            $table->string('openingtime');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('youtube');
            $table->string('linkdin');
            $table->string('copyright');
            $table->string('developed');
            $table->string('term_conditios');
            $table->string('privacy_policy');
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
        Schema::dropIfExists('frontendsettings');
    }
}
