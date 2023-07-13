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
    /**
     * The properties that are mass assignable.
     *
     * @var array
     *
     * @property string $name The name of the site.
     * @property array $urls The URLs of the site.
     */
    protected $fillable = [
        'name',
        'urls',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * In this case, 'urls' should be cast to 'array'
     *
     * @var array
     */
    protected $casts = [
        'urls' => 'array'
    ];

    /**
     * Get the checks associated with the Site.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function checks(): HasMany
    {
        return $this->hasMany(
            related: Check::class
        );
    }
}
