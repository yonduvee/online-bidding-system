<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'winner_id',
        'category_id',
        'title',
        'slug',
        'description',
        'starting_price',
        'current_price',
        'bid_increment',
        'start_time',
        'end_time',
        'closed_at',
        'status',
        'rejection_reason',
    ];

    protected function casts(): array
    {
        return [
            'starting_price' => 'decimal:2',
            'current_price' => 'decimal:2',
            'bid_increment' => 'decimal:2',
            'start_time' => 'datetime',
            'end_time' => 'datetime',
            'closed_at' => 'datetime',
        ];
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    public function winner(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'winner_id'
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            Category::class
        );
    }

    public function images(): HasMany
    {
        return $this->hasMany(
            AuctionImage::class
        )->orderBy('sort_order');
    }

    public function bids(): HasMany
    {
        return $this->hasMany(
            Bid::class
        );
    }
    public function highestBid(): HasOne
{
    return $this->hasOne(Bid::class)
        ->ofMany('amount', 'max');
}
}