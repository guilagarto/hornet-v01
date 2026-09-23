<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectMetric;
use App\Models\Client;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Cria um cliente genérico de teste para não quebrar a chave estrangeira (client_id)
        $client = Client::first() ?? Client::create(['name' => 'Clientes Diversos']);

        // ---- CASE 1: PÁ-PUM ----
        $papum = Project::create([
            'client_id' => $client->id,
            'name' => 'Pá-pum — Plataforma de Profissionais',
            'services_contracted' => 'Desenvolvimento Web Mobile-First, Chat Real-Time e Funil de Captação',
            'objectives' => 'Criar um ecossistema ágil para contratação de prestadores com blog nativo focado em SEO.',
            'start_date' => '2026-09-01',
            'status' => 'active'
        ]);

        ProjectMetric::create([
            'project_id' => $papum->id,
            'year' => 2026,
            'month' => 9,
            'channel' => 'all',
            'investment_total' => 0.00,
            'visitors' => 1400,
            'leads' => 520, // Esse número vai estampar na lista principal!
            'leads_qualified' => 390,
            'opportunities' => 180
        ]);

        // ---- CASE 2: ALFA LOGÍSTICA ----
        $alfa = Project::create([
            'client_id' => $client->id,
            'name' => 'Mapeamento de Tráfego — Alfa Logística',
            'services_contracted' => 'Reestruturação completa de mídia paga focado em atração B2B.',
            'objectives' => 'Redução drástica do CPL e otimização do funil comercial de prospecção.',
            'start_date' => '2026-08-15',
            'status' => 'active'
        ]);

        ProjectMetric::create([
            'project_id' => $alfa->id,
            'year' => 2026,
            'month' => 9,
            'channel' => 'all',
            'investment_total' => 5000.00,
            'visitors' => 3200,
            'leads' => 480,
            'leads_qualified' => 360,
            'opportunities' => 200
        ]);

        // ---- CASE 3: TECHPRIME ----
        $tech = Project::create([
            'client_id' => $client->id,
            'name' => 'Escalabilidade de Inbound — TechPrime',
            'services_contracted' => 'Implementação de rotinas de nutrição de leads integradas com estratégias de SEO orgânico.',
            'objectives' => 'Gerar fluxo estável de oportunidades qualificadas para o time de vendas.',
            'start_date' => '2026-07-01',
            'status' => 'active'
        ]);

        ProjectMetric::create([
            'project_id' => $tech->id,
            'year' => 2026,
            'month' => 9,
            'channel' => 'all',
            'investment_total' => 2500.00,
            'visitors' => 8900,
            'leads' => 1250,
            'leads_qualified' => 840,
            'opportunities' => 410
        ]);

        // ---- CASE 4: VITALITY ----
        $vitality = Project::create([
            'client_id' => $client->id,
            'name' => 'Performance de E-commerce — Vitality',
            'services_contracted' => 'Gestão de tráfego pago (Meta Ads e Google Ads) voltada para conversão direta.',
            'objectives' => 'Aumentar a taxa de conversão do carrinho e expandir o Retorno Sobre Investimento (ROI).',
            'start_date' => '2026-06-10',
            'status' => 'active'
        ]);

        ProjectMetric::create([
            'project_id' => $vitality->id,
            'year' => 2026,
            'month' => 9,
            'channel' => 'all',
            'investment_total' => 12000.00,
            'visitors' => 25000,
            'leads' => 3400,
            'leads_qualified' => 2100,
            'opportunities' => 980
        ]);
    }
}
