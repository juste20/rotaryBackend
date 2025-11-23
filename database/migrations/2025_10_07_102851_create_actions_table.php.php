<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // ajouté
            $table->text('description');
            $table->string('axis')->nullable(); 
            $table->string('partner')->nullable();
            $table->enum('status', ['planifiée', 'en cours', 'terminée', 'prévue'])->default('planifiée'); // ajouté
            $table->date('start_date')->nullable(); // ajouté
            $table->date('end_date')->nullable(); // ajouté
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('actions');
    }
};
