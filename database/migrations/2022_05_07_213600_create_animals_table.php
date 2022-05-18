<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('specie');
            $table->string('scientific_name');
            $table->string('image_url');
            $table->foreignId('animal_class_id')->references('id')->on('animal_classes');
            $table->text('description');
            $table->text('references')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('animals');
    }
}
