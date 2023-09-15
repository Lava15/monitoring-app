<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * The Check model.
 *
 * This model represents checks within the system. Each check belongs to Site model and,
 * associated with different states represented by respective fields.
 */
class Check extends Model
{
    /**
     * The properties that are mass assignable.
     *
     * @var array
     *
     * @property int $site_id        The unique ID of the site.
     * @property string|null $result         The result data of the site.
     * @property int|null $status_code    The HTTP status code of the site.
     * @property float|null $frequency      The frequency data of the site.
     * @property float|null $response_time  The response time data of the site.
     * @property json|null $headers        The response headers.
     * @property string|null $error          The error message if any.
     * @property Carbon|null $completed_at   The date and time the site status was checked.
     */
    protected $fillable = [
        'site_id',
        'result',
        'status_code',
        'frequency',
        'response_time',
        'headers',
        'error',
        'completed_at',
    ];

    /**
     * Get the site that owns the current model instance.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}
