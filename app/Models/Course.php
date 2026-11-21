<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    protected $fillable = [
        'instructor_id',
        'title',
        'description',
        'level',
        'duration_weeks',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    /**
     * Each course belongs to one instructor.
     */
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }
}
