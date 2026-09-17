<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Renderiza a Dashboard trazendo os dados reais salvos no banco
    public function index()
    {
        // Puxa todos os clientes e projetos reais do banco MySQL para listar nos seletores
        $clients = Client::orderBy('name', 'asc')->get();
        $projects = Project::with('client')->orderBy('name', 'asc')->get();

        // Array simulado mantido temporariamente para as abas de métricas até criarmos seus respectivos cruds
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

    // Processa e salva o Cadastro do Cliente (Requisito 2)
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

    // Processa e salva o Cadastro do Projeto (Requisito 3)
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
}
