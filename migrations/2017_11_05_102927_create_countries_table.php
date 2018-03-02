<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->json('name')->nullable();
            $table->json('tags')->nullable();
            $table->json('domain_prefixes')->nullable();
            $table->string('alpha_two_code', 3)->nullable();
            $table->string('alpha_three_code', 4)->nullable();
            $table->json('calling_codes')->nullable();
            $table->json('capital')->nullable();
            $table->json('alt_spellings')->nullable();
            $table->json('region')->nullable();
            $table->json('sub_region')->nullable();
            $table->integer('population')->nullable();
            $table->float('lat')->nullable();
            $table->float('long')->nullable();
            $table->json('demonym')->nullable();
            $table->float('area', 15, 5)->nullable();
            $table->float('gini')->nullable();
            $table->json('timezones')->nullable();
            $table->json('borders')->nullable();
            $table->string('native_name', 60)->nullable();
            $table->smallInteger('numeric_code')->nullable();
            $table->json('currencies')->nullable();
            $table->json('languages')->nullable();
            $table->json('translations')->nullable();
            $table->string('flag')->nullable();
            $table->json('regional_blocs')->nullable();
            $table->string('cioc', 4)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
