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

            $table->string('project_or_thesis')->nullable();
            $table->string('workspace_type')->nullable();
            $table->string('privacy_settings')->nullable();


            $table->string('paper_pdf_url')->nullable();
            $table->string('presentation_slide_url')->nullable();
            $table->string('link_to_dataset')->nullable();
            $table->string('image')->nullable();

            $table->integer('project_access_table_id')->nullable();
            $table->integer('partner_id')->nullable();
            $table->integer('supervisor_id')->nullable();

            $table->integer('average_rating')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
