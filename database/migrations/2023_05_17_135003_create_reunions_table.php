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
        Schema::create('reunions', function (Blueprint $table) {
            $table->id();
            $table->string('sujet');
            $table->date('date');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->text('description')->nullable();
            $table->string('proces_verbal')->nullable()->unique();
            $table->foreignId('immeuble_id')->constrained('immeubles');
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
        Schema::dropIfExists('reunions');
    }
};
