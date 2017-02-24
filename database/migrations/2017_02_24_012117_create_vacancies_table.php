<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('vacancy_id');
            $table->integer('user_id');
            $table->string('title');
            $table->integer('category_id');
            $table->integer('country_id');
            $table->string('city');
            $table->integer('education_type_id');
            $table->integer('employment_id');
            $table->integer('salary')->nullable();
            $table->integer('currency_id')->nullable();
            $table->integer('experience_type_id');
            $table->integer('age_min')->nullable();
            $table->integer('age_max')->nullable();
            $table->string('description');
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
        Schema::dropIfExists('vacancies');
    }
}
