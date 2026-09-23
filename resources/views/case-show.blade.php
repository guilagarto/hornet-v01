<x-site-layout>
    <style>
        .case-container { max-width: 650px; margin: 0 auto; padding: 20px 16px; color: #1f2937; }
        .btn-voltar { color: #0f172a; text-decoration: none; font-weight: bold; font-size: 14px; display: inline-block; margin-bottom: 20px; }
        .case-header h1 { font-size: 26px; font-weight: 800; margin-bottom: 8px; color: #0f172a; }
        .case-header p { font-size: 15px; color: #4b5563; margin-bottom: 20px; }
        
        .metrics-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 24px; }
        .metric-card { background-color: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 12px; padding: 12px; text-align: center; }
        .metric-label { font-size: 11px; text-transform: uppercase; font-weight: 700; color: #166534; display: block; margin-bottom: 4px; }
        .metric-val { font-size: 20px; font-weight: 800; color: #166534; }
        
        .section-block { margin-bottom: 24px; }
        .section-block h2 { font-size: 18px; font-weight: 700; margin-bottom: 10px; color: #0f172a; border-left: 4px solid #0f172a; padding-left: 8px; }
        .section-block p { font-size: 15px; color: #374151; line-height: 1.6; }
        .btn-cta { display: block; text-align: center; background-color: #0f172a; color: white; text-decoration: none; padding: 14px; font-weight: bold; border-radius: 10px; font-size: 16px; margin-top: 30px; }
    </style>

    <div class="case-container">
        <a href="{{ route('cases') }}" class="btn-voltar">← Voltar para Cases</a>

        <header class="case-header">
            <h1>{{ $project->name }}</h1>
            <p>Status do Projeto: <span style="color: #16a34a; font-weight: bold; text-transform: uppercase;">{{ $project->status }}</span></p>
        </header>

        <!-- Grid de Métricas reais puxadas da tabela project_metrics -->
        <h2 style="font-size: 14px; color: #4b5563; margin-bottom: 8px; font-weight: 700;">📈 Resultados Obtidos</h2>
        <div class="metrics-grid">
            <div class="metric-card">
                <span class="metric-label">Visitantes</span>
                <span class="metric-val">{{ number_format($project->metrics->first()->visitors ?? 0, 0, ',', '.') }}</span>
            </div>
            <div class="metric-card">
                <span class="metric-label">Leads Totais</span>
                <span class="metric-val">{{ $project->metrics->first()->leads ?? 0 }}</span>
            </div>
            <div class="metric-card">
                <span class="metric-label">Leads Qualificados</span>
                <span class="metric-val">{{ $project->metrics->first()->leads_qualified ?? 0 }}</span>
            </div>
            <div class="metric-card">
                <span class="metric-label">Oportunidades</span>
                <span class="metric-val">{{ $project->metrics->first()->opportunities ?? 0 }}</span>
            </div>
        </div>

        <div class="section-block">
            <h2>📋 Escopo Contratado</h2>
            <p>{{ $project->services_contracted }}</p>
        </div>

        <div class="section-block">
            <h2>🎯 Objetivos Almejados</h2>
            <p>{{ $project->objectives }}</p>
        </div>

        <div class="section-block">
            <h2>📅 Período do Projeto</h2>
            <p>Início: {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</p>
        </div>

        <a href="/fale-conosco" class="btn-cta">Quero alavancar meus resultados</a>
    </div>
</x-site-layout>
