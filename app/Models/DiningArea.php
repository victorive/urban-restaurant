<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DiningArea extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function restaurants(): BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class);
    }

    public function tables(): HasMany
    {
        return $this->hasMany(Table::class);
    }
}
