<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectMetric extends Model
{
    protected $guarded = [];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    // CPL = investimento_total ÷ leads
    public function getCplAttribute(): float
    {
        return $this->leads > 0 ? (float)($this->investment_total / $this->leads) : 0.0;
    }

    // Taxa de conversão de leads = oportunidades ÷ leads
    public function getLeadConversionRateAttribute(): float
    {
        return $this->leads > 0 ? (float)(($this->opportunities / $this->leads) * 100) : 0.0;
    }

    // CAC = investimento_total ÷ clientes adquiridos
    public function getCacAttribute(): float
    {
        return $this->clients_acquired > 0 ? (float)($this->investment_total / $this->clients_acquired) : 0.0;
    }

    // Ticket médio = receita ÷ clientes adquiridos (ou usa o manual se houver)
    public function getTicketMediumAttribute(): float
    {
        if ($this->ticket_manual > 0) return (float)$this->ticket_manual;
        return $this->clients_acquired > 0 ? (float)($this->revenue_generated / $this->clients_acquired) : 0.0;
    }

    // ROAS = receita ÷ investimento em mídia paga
    public function getRoasAttribute(): float
    {
        return $this->investment_paid_media > 0 ? (float)($this->revenue_generated / $this->investment_paid_media) : 0.0;
    }

    // ROI = (receita - investimento_total) ÷ investimento_total × 100
    public function getRoiAttribute(): float
    {
        return $this->investment_total > 0 ? (float)((($this->revenue_generated - $this->investment_total) / $this->investment_total) * 100) : 0.0;
    }

    // Conversões do Funil
    public function getConversionVisitorToLeadAttribute(): float
    {
        return $this->visitors > 0 ? (float)(($this->leads / $this->visitors) * 100) : 0.0;
    }

    public function getConversionLeadToOpportunityAttribute(): float
    {
        return $this->leads > 0 ? (float)(($this->opportunities / $this->leads) * 100) : 0.0;
    }

    public function getConversionOpportunityToClientAttribute(): float
    {
        return $this->opportunities > 0 ? (float)(($this->clients_acquired / $this->opportunities) * 100) : 0.0;
    }
}
