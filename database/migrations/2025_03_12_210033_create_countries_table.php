<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('capital');
            $table->bigInteger('population');
            $table->string('region');
            $table->string('subregion')->nullable();
            $table->string('flag_url')->nullable();
            $table->string('currency')->nullable();
            $table->string('language')->nullable();
            $table->string('motto')->nullable(); // Devise
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
};