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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('store_id')->nullable();
            $table->string('name')->require();
            $table->unsignedBigInteger('isbn');
            $table->unsignedDecimal('bookvalue', 8, 2);
            $table->timestamps();

            //
            $table->index(['user_id', 'store_id', 'created_at']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
