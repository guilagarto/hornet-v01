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
        public function index(Request $request)
    {
        // 1. Busca Clientes e Projetos para alimentar os filtros laterais e seletores
        $clients = Client::orderBy('name', 'asc')->get();
        $projects = Project::with('client')->orderBy('name', 'asc')->get();

        // 2. Captura filtros de busca do painel analítico (Padrão: Primeiro projeto se houver)
        $selectedProjectId = $request->get('project_id', $projects->first()?->id);
        $selectedYear = $request->get('year', 2026);
        $selectedMonth = $request->get('month', 9);

        // 3. Inicializa variáveis de transporte de dados limpas
        $activeProject = null;
        $metric = null;
        $goal = null;
        $alerts = [];
        $cumprimentoMetas = ['receita' => 0, 'leads' => 0, 'clientes' => 0];

        if ($selectedProjectId) {
            $activeProject = Project::find($selectedProjectId);
            
            // Busca os dados brutos históricos daquele período específico
            $metric = ProjectMetric::where('project_id', $selectedProjectId)
                ->where('year', $selectedYear)
                ->where('month', $selectedMonth)
                ->where('channel', 'all')
                ->first();

            // Busca as metas estipuladas para o mesmo período
            $goal = ProjectGoal::where('project_id', $selectedProjectId)
                ->where('year', $selectedYear)
                ->where('month', $selectedMonth)
                ->first();

            // 4. MOTOR ALGORÍTMICO DE DIAGNÓSTICO AUTOMÁTICO (Item 8)
            if ($metric && $goal) {
                // Cálculo de percentual de cumprimento de metas
                $cumprimentoMetas['receita'] = $goal->goal_revenue > 0 ? ($metric->revenue_generated / $goal->goal_revenue) * 100 : 0;
                $cumprimentoMetas['leads'] = $goal->goal_leads > 0 ? ($metric->leads / $goal->goal_leads) * 100 : 0;
                $cumprimentoMetas['clientes'] = $goal->goal_clients > 0 ? ($metric->clients_acquired / $goal->goal_clients) * 100 : 0;

                // Regra de Alerta 1: Custo por Lead (CPL) vs Meta
                if ($metric->leads > 0 && $goal->goal_leads > 0) {
                    $cplAtual = $metric->investment_total / $metric->leads;
                    // Se as oportunidades caíram em relação à conversão de leads
                    if ($metric->lead_conversion_rate < 15) {
                        $alerts[] = [
                            'type' => 'danger',
                            'message' => 'Anomalia no Funil: O volume de Leads aumentou, mas a taxa de conversão para Oportunidades caiu abaixo de 15%.'
                        ];
                    }
                }

                // Regra de Alerta 2: Estouro de CAC em relação ao teto máximo configurado
                if ($metric->cac > $goal->max_cac && $goal->max_cac > 0) {
                    $alerts[] = [
                        'type' => 'danger',
                        'message' => 'Estouro de Custo: O CAC atual (R$ ' . number_format($metric->cac, 2, ',', '.') . ') ultrapassou o teto máximo estipulado pela gerência (R$ ' . number_format($goal->max_cac, 2, ',', '.') . ').'
                    ];
                }

                // Regra de Alerta 3: Retorno sobre o investimento abaixo da meta
                if ($metric->roi < $goal->min_roi) {
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => 'Desempenho Crítico: O ROI obtido no ciclo (' . number_format($metric->roi, 1) . '%) está abaixo da meta mínima exigida (' . number_format($goal->min_roi, 1) . '%).'
                    ];
                }

                // Regra de Alerta 4: Crescimento saudável ou cumprimento acima de 100%
                if ($cumprimentoMetas['receita'] >= 100) {
                    $alerts[] = [
                        'type' => 'success',
                        'message' => 'Sucesso Operacional: A meta de faturamento alocada para o período foi totalmente superada (' . number_format($cumprimentoMetas['receita'], 1) . '% de cumprimento).'
                    ];
                }
            }
        }

        return view('dashboard', compact(
            'clients', 'projects', 'activeProject', 'metric', 'goal', 
            'alerts', 'cumprimentoMetas', 'selectedProjectId', 'selectedYear', 'selectedMonth'
        ));
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
