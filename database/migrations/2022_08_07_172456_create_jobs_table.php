<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();
            $table->string('company_name')->nullable();
            $table->integer('vacancy')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('type')->nullable();
            $table->integer('salary_range')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
