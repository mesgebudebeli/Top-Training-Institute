<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assignment extends Model
{
    protected $fillable = ['course_id', 'title', 'description', 'file', 'due_date'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
