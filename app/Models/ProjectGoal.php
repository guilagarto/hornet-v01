<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectGoal extends Model
{
    // Libera a gravação em massa
    protected $guarded = [];

    /**
     * Uma meta pertence a um projeto específico.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
