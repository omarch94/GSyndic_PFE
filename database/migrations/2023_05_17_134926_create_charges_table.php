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
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->string('designation')->unique();
            $table->date('date');
            $table->float('montant');
            $table->text('description')->nullable();
            $table->foreignId('type_charge_id')->constrained('type_charges');
            $table->foreignId('statut_charge_id')->constrained('statut_charges');
            $table->foreignId('copropriete_id')->constrained('coproprietes');
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
        Schema::dropIfExists('charges');
    }
};
