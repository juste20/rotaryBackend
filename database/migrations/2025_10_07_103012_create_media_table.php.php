<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('path');                   // chemin du fichier
            $table->string('type')->default('image'); // type de média
            $table->string('title')->nullable();      // titre du média
            $table->text('description')->nullable();  // description du média
            $table->unsignedBigInteger('uploaded_by')->nullable(); // id de l'utilisateur qui a uploadé
            $table->string('caption')->nullable();    // légende du média
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('media');
    }
};
