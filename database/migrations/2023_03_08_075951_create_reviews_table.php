<?php

use App\Models\Resto;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('text',750);
            $table->unsignedInteger('rating')->default(0);
            $table->timestamps();
            $table->foreignIdFor(User::class,'user_id')->cascadeOnDelete();
            $table->foreignIdFor(Resto::class,'resto_id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
