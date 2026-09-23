<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Client;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $client = Client::first() ?? Client::create(['name' => 'Agência 8ou80']);

        // Remove registros antigos com títulos similares para evitar duplicidade nos testes
        Project::where('services_contracted', 'LIKE', '%Plano Start%')
               ->orWhere('services_contracted', 'LIKE', '%Growth%')
               ->orWhere('services_contracted', 'LIKE', '%Scale%')
               ->orWhere('services_contracted', 'LIKE', '%Site Profissional%')
               ->delete();

        // 1. Plano Inicial (Recorrente)
        Project::create([
            'client_id' => $client->id,
            'name' => 'Plano Start Marketing',
            'services_contracted' => 'Gestão de Tráfego Pago essencial e configuração de canais de conversão.',
            'objectives' => '[TIPO_RECORRENTE] Ideal para negócios locais que querem começar a receber os primeiros contatos diários pela internet.',
            'start_date' => now()->format('Y-m-d'),
            'monthly_investment' => 0.00,
            'status' => 'active' // Mantido estritamente dentro das opções válidas do ENUM do seu banco
        ]);

        // 2. Plano Intermediário (Recorrente)
        Project::create([
            'client_id' => $client->id,
            'name' => 'Plano Growth Performance',
            'services_contracted' => 'Tráfego Pago Avançado, Otimização de Landing Pages e Funil de Nutrição de Leads.',
            'objectives' => '[TIPO_RECORRENTE] Perfeito para empresas que já anunciam e precisam escalar o volume de vendas diminuindo o custo por lead (CPL).',
            'start_date' => now()->format('Y-m-d'),
            'monthly_investment' => 0.00,
            'status' => 'active'
        ]);

        // 3. Plano Avançado (Recorrente)
        Project::create([
            'client_id' => $client->id,
            'name' => 'Plano Scale Business',
            'services_contracted' => 'Consultoria de Inside Sales, CRM integration, SEO estrutural e Escopo completo de Growth Marketing.',
            'objectives' => '[TIPO_RECORRENTE] Domínio completo do ecossistema digital para médias e grandes empresas que buscam liderança de mercado.',
            'start_date' => now()->format('Y-m-d'),
            'monthly_investment' => 0.00,
            'status' => 'active'
        ]);

        // 4. Projeto do Site (Avulso)
        Project::create([
            'client_id' => $client->id,
            'name' => 'Desenvolvimento de Site Profissional (Mobile-First)',
            'services_contracted' => 'Criação de site ultra rápido, design otimizado para celulares, painel administrativo dinâmico e integração com WhatsApp.',
            'objectives' => '[TIPO_AVULSO] Sua empresa com uma identidade visual de alto nível e estrutura técnica preparada para campanhas no Google e Meta.',
            'start_date' => now()->format('Y-m-d'),
            'monthly_investment' => 0.00,
            'status' => 'active'
        ]);
    }
}
