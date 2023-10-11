<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * The Site model
 *
 * A class that represents a site with a name and URLs.
 */
class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'urls',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * In this case, 'urls' should be cast to 'array'
     *
     */
    protected $casts = [
        'urls' => 'json'
    ];

    public function checks(): HasMany
    {
        return $this->hasMany(Check::class);
    }
}
