<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'isbn',
        'bookvalue',
    ];

    protected $hidden = ['pivot'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'bookvalue' => 'decimal:2',
    ];

    /**
     * Get the Store that owns the book.
     */
    public function store(): BelongsToMany
    {
        return $this->belongsToMany(Store::class);
    }
}
