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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('numero_facture')->unique();
            $table->date('date_emission');
            $table->date('date_echeance');
            $table->float('montant_total');
            $table->text('description')->nullable();
            $table->foreignId('copropriete_id')->constrained('coproprietes');
            $table->foreignId('charge_id')->constrained('charges');
            $table->foreignId('etat_facture_id')->constrained('etat_factures');
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
        Schema::dropIfExists('factures');
    }
};
