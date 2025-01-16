<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('type'); //dépôt, retrait, rembourcement
            $table->decimal('amount', 15, 2); //monatnt
            $table->date('transaction_date');
            $table->string('status'); //En attente, validé, Rejeté
            $table->string('method_payment'); //Mobile money
            $table->string('reference')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
