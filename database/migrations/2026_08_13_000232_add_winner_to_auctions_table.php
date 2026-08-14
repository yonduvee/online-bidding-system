<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('auctions', function (Blueprint $table) {

            $table->foreignId('winner_id')
                ->nullable()
                ->after('user_id')
                ->constrained('users')
                ->nullOnDelete();

            $table->dateTime('closed_at')
                ->nullable()
                ->after('end_time');
        });
    }

    public function down(): void
    {
        Schema::table('auctions', function (Blueprint $table) {

            $table->dropForeign(['winner_id']);

            $table->dropColumn([
                'winner_id',
                'closed_at',
            ]);
        });
    }
};