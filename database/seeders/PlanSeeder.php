<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;
use Illuminate\Support\Str;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        Plan::truncate(); // Limpa antes de rodar

        Plan::create([
            'name' => 'Plano Start Marketing',
            'slug' => Str::slug('Plano Start Marketing'),
            'short_description' => 'Ideal para negócios locais que querem começar a receber os primeiros contatos diários pela internet.',
            'full_description' => 'O Plano Start foi desenhado estrategicamente para empresas e profissionais autônomos que precisam validar seu canal de vendas digital rápido e sem alto custo.',
            'features' => "Configuração de Conta Google/Meta\nCriação de 2 Campanhas de Anúncios\nRelatório Mensal de Resultados\nSuporte via WhatsApp Comercial",
            'price' => 0.00,
            'whatsapp_message' => 'Olá! Gostaria de saber mais sobre o Plano Start Marketing.'
        ]);

        Plan::create([
            'name' => 'Plano Growth Performance',
            'slug' => Str::slug('Plano Growth Performance'),
            'short_description' => 'Perfeito para empresas que já anunciam e precisam escalar o volume de vendas diminuindo o custo por lead (CPL).',
            'full_description' => 'Neste escopo avançado, nosso time atua na otimização cirúrgica de funis, testes A/B de páginas e segmentações complexas para tracionar o crescimento.',
            'features' => "Gestão de Tráfego Avançada (Google + Meta)\nOtimização de Landing Pages Existentes\nInstalação de Pixels e APIs de Conversão\nReunião Quinzenal de Alinhamento",
            'price' => 0.00,
            'whatsapp_message' => 'Olá! Tenho interesse no Plano Growth Performance e gostaria de fazer uma análise.'
        ]);

        Plan::create([
            'name' => 'Plano Scale Business',
            'slug' => Str::slug('Plano Scale Business'),
            'short_description' => 'Domínio completo do ecossistema digital para médias e grandes empresas que buscam liderança de mercado.',
            'full_description' => 'Uma estrutura de Growth Marketing completa dedicada à sua empresa, englobando rotinas de inbound, integração com CRM e inteligência comercial.',
            'features' => "Consultoria Estratégica de Growth\nConfiguração e Integração com CRM de Vendas\nAuditoria Completa de Processo Comercial\nSuporte Premium Dedicado",
            'price' => 0.00,
            'whatsapp_message' => 'Olá! Preciso de uma estratégia robusta e quero agendar uma reunião sobre o Plano Scale Business.'
        ]);

        Plan::create([
            'name' => 'Desenvolvimento de Site Profissional',
            'slug' => Str::slug('Desenvolvimento de Site Profissional'),
            'short_description' => 'Sua empresa com uma identidade visual de alto nível e estrutura técnica preparada para campanhas no Google e Meta.',
            'full_description' => 'Desenvolvemos sites ultra rápidos utilizando o conceito mobile-first. Estrutura otimizada para SEO e com painel intuitivo para você gerenciar seu conteúdo.',
            'features' => "Design 100% Exclusivo e Otimizado para Celular\nPainel Administrativo Próprio (Laravel)\nIntegração Direta com Botão do WhatsApp\nOtimização de Velocidade (PageSpeed Score Alto)",
            'price' => 0.00,
            'whatsapp_message' => 'Olá! Quero fazer o orçamento para o Desenvolvimento de um Site Profissional com vocês.'
        ]);
    }
}
