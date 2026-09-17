<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectMetric;
use App\Models\ProjectGoal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Renderiza a Dashboard trazendo os dados relacionais salvos no banco
    public function index()
    {
        $clients = Client::orderBy('name', 'asc')->get();
        $projects = Project::with('client')->orderBy('name', 'asc')->get();

        // Estrutura base de dados Python simulada temporariamente para retrocompatibilidade visual
        $dadosPython = [
            "marketing" => ["empresa" => "8ou80 Consultoria", "roi" => 0.0, "leads" => 0, "custo_captacao" => 0.0],
            "clientes" => ["valor_contrato" => 0.0, "faturamento_estimado_mensal" => 0.0, "status" => "Planejamento"],
            "pessoal" => [
                "setembro" => ["entradas" => 0, "saidas" => 0, "saldo" => 0],
                "outubro"  => ["entradas" => 0, "saidas" => 0, "saldo" => 0],
                "novembro" => ["entradas" => 0, "saidas" => 0, "saldo" => 0]
            ]
        ];

        return view('dashboard', compact('clients', 'projects', 'dadosPython'));
    }

    // Gravação de Clientes (Requisito 2)
    public function storeClient(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'segment' => 'required|string|max:255',
            'responsible' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'start_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        Client::create($validated);
        return redirect()->route('dashboard')->with('success', 'Cliente corporativo cadastrado com sucesso!');
    }

    // Gravação de Projetos (Requisito 3)
    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date_predicted' => 'nullable|date',
            'monthly_investment' => 'required|numeric|min:0',
            'status' => 'required|in:active,planning,paused,completed',
            'services_contracted' => 'required|string',
            'objectives' => 'nullable|string',
        ]);

        Project::create($validated);
        return redirect()->route('dashboard')->with('success', 'Projeto estratégico vinculado com sucesso!');
    }

    // 🔥 GRAVAÇÃO DE MÉTRICAS PERIÓDICAS BRUTAS (Requisito 4)
    public function storeMetric(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'year' => 'required|integer',
            'month' => 'required|integer|between:1,12',
            'channel' => 'required|string|max:255',
            
            // Bloco I: Investimento
            'investment_total' => 'required|numeric|min:0',
            'investment_paid_media' => 'required|numeric|min:0',
            
            // Bloco II: Aquisição
            'visitors' => 'required|integer|min:0',
            'leads' => 'required|integer|min:0',
            'leads_qualified' => 'required|integer|min:0',
            'opportunities' => 'required|integer|min:0',
            'clients_acquired' => 'required|integer|min:0',
            
            // Bloco III: Marketing
            'reach' => 'required|integer|min:0',
            'impressions' => 'required|integer|min:0',
            'clicks' => 'required|integer|min:0',
            'engagement' => 'required|integer|min:0',
            'followers' => 'required|integer|min:0',
            
            // Bloco IV: Faturamento
            'revenue_generated' => 'required|numeric|min:0',
            'sales_count' => 'required|integer|min:0',
            'ticket_manual' => 'nullable|numeric|min:0',
        ]);

        // updateOrCreate evita duplicidade se a administração lançar o mesmo mês/canal duas vezes
        ProjectMetric::updateOrCreate(
            [
                'project_id' => $validated['project_id'],
                'year' => $validated['year'],
                'month' => $validated['month'],
                'channel' => $validated['channel']
            ],
            $validated
        );

        return redirect()->route('dashboard')->with('success', 'Métricas do período registradas e KPIs computados com sucesso!');
    }

    // 🔥 GRAVAÇÃO DE METAS POR PERÍODO (Requisito 7)
    public function storeGoal(Request $request)
{
    // Converte o mês de setembro para o número 9 caso o formulário envie o texto
    if ($request->input('month') === 'Setembro' || $request->input('month') == '9') {
        $request->merge(['month' => 9]);
    }

    $validated = $request->validate([
        'project_id' => 'required|exists:projects,id',
        'year' => 'required|integer',
        'month' => 'required|integer|between:1,12',
        'goal_revenue' => 'required|numeric|min:0',
        'goal_leads' => 'required|integer|min:0',
        'goal_clients' => 'required|integer|min:0',
        'max_cac' => 'required|numeric|min:0',
        'min_roi' => 'required|numeric',
        'min_roas' => 'required|numeric|min:0',
    ]);

        ProjectGoal::updateOrCreate(
            [
                'project_id' => $validated['project_id'],
                'year' => $validated['year'],
                'month' => $validated['month']
            ],
            $validated
        );

        return redirect()->route('dashboard')->with('success', 'Metas estratégicas do período salvas com sucesso!');
    }
}
