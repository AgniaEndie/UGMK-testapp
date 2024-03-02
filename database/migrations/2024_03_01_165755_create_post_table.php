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
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid("id")->primary(); //Java's default uuid length
            $table->string('name')->default("")->unique();
            $table->string("itemType")->default("");
            $table->string('measureName')->default("")->nullable();
            $table->string('quantity')->default("")->nullable();
            $table->string('price')->default("");
            $table->string('costPrice')->default("");
            $table->string('sumPrice')->default("");
            $table->string('tax')->default("");
            $table->string('taxPercent')->default("");
            $table->string('discount')->default("");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
