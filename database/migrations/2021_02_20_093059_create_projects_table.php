<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('project_name');
            $table->text('project_description')->nullable();
            $table->text('project_abstract')->nullable();

            $table->string('document_url')->nullable();
            $table->string('image');
            $table->string('link_to_dataset')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
