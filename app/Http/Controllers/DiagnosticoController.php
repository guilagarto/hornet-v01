<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DiagnosticoMail;
use App\Models\Diagnostico;

class DiagnosticoController extends Controller
{
    public function index()
    {
        return view('fale_conosco');
    }

    public function processar(Request $request)
    {
        // 1. Validação estrita dos dados recebidos do formulário
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:20',
            'empresa' => 'nullable|string|max:255',
            'tipo_negocio' => 'required|string',
            'canal_venda' => 'required|string',
            'objetivo' => 'required|string',
            'possui_site' => 'required|string',
            'anuncia_google' => 'required|string',
            'recebe_contatos' => 'required|string',
            'google_perfil' => 'required|string',
            'conversao_representa' => 'required|string',
            'valor_medio' => 'required|string',
        ]);

        // 2. Regras de Negócio Objetivas para definição do Pacote
        $pacote_nome = 'Sob Medida';
        
        if ($dados['possui_site'] === 'Não' || $dados['objetivo'] === 'Criar um site' || $dados['objetivo'] === 'Melhorar presença digital') {
            $pacote_nome = 'Presença';
        } elseif ($dados['possui_site'] === 'Sim' && $dados['anuncia_google'] === 'Não' && $dados['objetivo'] === 'Conseguir mais clientes') {
            $pacote_nome = 'Atração';
        } elseif ($dados['possui_site'] === 'Sim' && $dados['anuncia_google'] === 'Sim' && ($dados['objetivo'] === 'Melhorar os resultados dos anúncios' || $dados['objetivo'] === 'Aumentar vendas')) {
            $pacote_nome = 'Crescimento';
        }

        // Mapeamento dos detalhes visuais de cada plano
        $pacotes = [
            'Presença' => [
                'titulo' => 'Pacote Presença 🟢',
                'cor' => '#10B981',
                'investimento' => 'Sob Consulta',
                'descricao' => 'Indicado porque você precisa estruturar ou modernizar sua base na internet para começar a atrair clientes.',
                'itens' => ['Site institucional', 'Página de serviços', 'Formulário de contato', 'WhatsApp integrado', 'Configuração básica de SEO', 'Google Analytics & Search Console']
            ],
            'Atração' => [
                'titulo' => 'Pacote Atração 🔵',
                'cor' => '#3B82F6',
                'investimento' => 'Sob Consulta',
                'descricao' => 'Indicado porque seu principal objetivo é gerar novos contatos e você já possui uma estrutura digital básica.',
                'itens' => ['Gestão Google Ads', 'Estruturação das campanhas', 'Pesquisa de palavras-chave', 'Criação dos anúncios', 'Configuração de conversões', 'Otimização periódica']
            ],
            'Crescimento' => [
                'titulo' => 'Pacote Crescimento 🟣',
                'cor' => '#8B5CF6',
                'investimento' => 'Sob Consulta',
                'descricao' => 'Indicado para quem já anuncia, possui site, mas quer extrair o máximo de performance cruzando dados reais de vendas.',
                'itens' => ['Gestão completa Google Ads', 'Landing page ou otimização existente', 'Rastreamento avançado de conversões', 'Dashboard de resultados', 'Análise profunda de KPIs']
            ],
            'Sob Medida' => [
                'titulo' => 'Pacote Sob Medida 🟡',
                'cor' => '#F59E0B',
                'investimento' => 'A combinar',
                'descricao' => 'Seu negócio possui necessidades muito específicas que exigem engenharia de software sob demanda.',
                'itens' => ['Sistemas Web customizados', 'Automações de processos', 'Portais complexos', 'Integrações de API customizadas']
            ]
        ];

        $pacote_sugerido = $pacotes[$pacote_nome];

        // 3. Montagem do Diagnóstico da Saúde da Empresa
        $saude = [
            'presenca' => $dados['possui_site'] === 'Não' ? '🟡 precisa de estrutura' : '🟢 Estruturado',
            'aquisicao' => $dados['anuncia_google'] === 'Não' ? '🔴 Baixo potencial atualmente' : '🟢 Ativo',
            'conversao' => ($dados['recebe_contatos'] === 'Praticamente nenhum' || $dados['recebe_contatos'] === 'Poucos') ? '🔴 Oportunidade crítica de melhoria' : '🟢 Saudável'
        ];

        // 4. SALVAR NO BANCO DE DADOS 🗄️
        $dados_para_salvar = $dados;
        $dados_para_salvar['pacote_sugerido'] = $pacote_nome;
        Diagnostico::create($dados_para_salvar);

        // 5. DISPARO DE E-MAILS 📨
        try {
            Mail::to($dados['email'])->send(new DiagnosticoMail($dados, $pacote_sugerido));
            Mail::to('seu-email-admin@8ou80.com.br')->send(new DiagnosticoMail($dados, $pacote_sugerido));
        } catch (\Exception $e) {
            logger('E-mail não pôde ser enviado agora. Erro: ' . $e->getMessage());
        }

        // 6. RENDERIZAR TELA DE RESULTADO
        return view('resultado', compact('dados', 'pacote_sugerido', 'saude'));
    }
}
