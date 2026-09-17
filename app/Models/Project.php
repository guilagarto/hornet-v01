<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $guarded = [];

    /**
     * Um projeto sempre pertence a um único cliente.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Um projeto possui um histórico de muitas métricas mensais lançadas.
     */
    public function metrics(): HasMany
    {
        return $this->hasMany(ProjectMetric::class);
    }

    /**
     * Um projeto possui muitas metas registradas ao longo dos meses.
     */
    public function goals(): HasMany
    {
        return $this->hasMany(ProjectGoal::class);
    }
}
