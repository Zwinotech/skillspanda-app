<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('details')->nullable();
            $table->decimal('price', 5, 2);
            $table->string('graphic');
            $table->string('brochure')->nullable();
            $table->string('video')->nullable();
            $table->string('difficulty')->nullable();
            $table->string('runtime')->nullable();
            $table->bigInteger('facilitator_id')->references('id')->on('users')->constrained()->cascadeOnDelete();
            $table->bigInteger('course_category_id')->references('id')->on('course_categories')->constrained()->cascadeOnDelete();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->enum('status', ['published', 'unpublished', 'draft'])->default('published');
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
        Schema::dropIfExists('courses');
    }
};
