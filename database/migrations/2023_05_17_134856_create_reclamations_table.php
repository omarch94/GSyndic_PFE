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
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->string('designation')->unique();
            $table->date('date_reclamation');
            $table->text('description')->nullable();
            $table->foreignId('type_reclamation_id')->constrained('type_reclamations');
            $table->foreignId('statut_reclamation_id')->constrained('statut_reclamations');
            $table->foreignId('copropriete_id')->constrained('coproprietes');
            $table->foreignId('canal_id')->constrained('canals');
            $table->foreignId('utilisateur_id')->constrained('users');
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
        Schema::dropIfExists('reclamations');
    }
};
