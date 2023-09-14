<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetting2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting2s', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('banner_text1')->nullable();
            $table->string('banner_text2')->nullable();
            $table->string('banner1_text3')->nullable();
            $table->string('developer')->nullable();
            $table->string('happyclient')->nullable();
            $table->string('completeproject')->nullable();
            $table->string('runningproject')->nullable();
            $table->string('testimonial_img')->nullable();
            $table->text('about_details')->nullable();




          

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
        Schema::dropIfExists('setting2s');
    }
}
