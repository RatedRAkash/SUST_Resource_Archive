<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->string('name');
            $table->string('email')->unique();

            $table->string('image')->nullable();
            $table->string('phone_number')->nullable();
            $table->Text('profession')->nullable();
            $table->longText('address')->nullable();

            $table->longText('website_link')->nullable();
            $table->longText('github_link')->nullable();
            $table->longText('twitter_link')->nullable();
            $table->longText('instagram_link')->nullable();
            $table->longText('facebook_link')->nullable();

            $table->timestamps();


        });
    }


    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
