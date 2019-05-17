<?php

use App\Models\Project;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('project_categories')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('content');
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->enum('status', Project::$statuses)->default(Project::STATUS_INACTIVE);
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
        Schema::dropIfExists('projects');
    }
}