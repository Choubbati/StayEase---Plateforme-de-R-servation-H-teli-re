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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();  // Clé primaire auto-incrémentée
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');  // Foreign key vers chambres (supprime si chambre supprimée)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Foreign key vers users (supprime si user supprimé)
            $table->date('date_debut');  // Date de check-in (format YYYY-MM-DD)
            $table->date('date_fin');  // Date de check-out (format YYYY-MM-DD)
            $table->enum('statut', ['en_attente', 'confirmée', 'annulée'])->default('en_attente');  // Statut de la réservation (ajuste selon besoin)
            $table->decimal('prix_total', 10, 2)->nullable();  // Prix total calculé (optionnel, pour US 4.4 paiement)
            $table->timestamps();
            $table->engine('InnoDB');
        });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
