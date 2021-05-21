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
            $table->string('project_name');
            $table->integer('user_id');
            $table->integer('category_id');

            $table->longText('project_description')->nullable();
            $table->longText('project_abstract')->nullable();

            $table->string('paper_pdf_url')->nullable();
            $table->string('presentation_slide_url')->nullable();
            $table->string('link_to_dataset')->nullable();
            $table->string('image');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
