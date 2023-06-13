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
        Schema::create('coproprietes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('adresse')->unique();
            $table->string('code_postal');
            $table->foreignId('ville_id')->constrained('villes');
            $table->float('interface');
            $table->integer('nb_lots');
            $table->date('date_creation');
            $table->date('date_modification')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('immeuble_id')->constrained('immeubles');
            $table->foreignId('coproprietaire_id')->constrained('users');
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
        Schema::dropIfExists('coproprieres');
    }
};
