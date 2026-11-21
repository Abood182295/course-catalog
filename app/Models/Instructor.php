<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instructor extends Model
{
    protected $fillable = ['name', 'email', 'bio'];

    /**
     * One instructor teaches many courses.
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
