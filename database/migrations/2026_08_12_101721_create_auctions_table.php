<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();

            // Seller
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Category
            $table->foreignId('category_id')
                ->constrained('categories')
                ->restrictOnDelete();

            $table->string('title');

            $table->string('slug')->unique();

            $table->text('description');

            $table->decimal('starting_price', 12, 2);

            $table->decimal('current_price', 12, 2);

            $table->decimal('bid_increment', 12, 2)
                ->default(1.00);

            $table->dateTime('start_time');

            $table->dateTime('end_time');

            $table->enum('status', [
                'pending',
                'scheduled',
                'active',
                'ended',
                'rejected',
                'cancelled'
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};