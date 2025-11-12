<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('axis')->nullable(); 
            $table->string('partner')->nullable();
            $table->date('action_date')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('actions');
    }
};
