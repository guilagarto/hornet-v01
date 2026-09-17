<x-app-layout>
    <style>
        .dashboard-body { background-color: #f3f4f6; font-family: sans-serif; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; display: flex; flex-direction: column; gap: 30px; }
        .header-panel { display: flex; justify-content: space-between; align-items: center; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
        .header-title { font-size: 24px; font-weight: bold; color: #1e1b4b; margin: 0; }
        .badge { background-color: #e0e7ff; color: #4338ca; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; text-transform: uppercase; }
        .card { background: white; padding: 24px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-top: 4px solid #4f46e5; }
        .card.financeiro { border-top-color: #10b981; }
        .card.pessoal { border-top-color: #f59e0b; }
        .card-title { font-size: 18px; font-weight: bold; color: #1f2937; margin: 0 0 20px 0; display: flex; align-items: center; gap: 10px; }
        .grid-inputs { display: grid; grid-template-cols: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-bottom: 20px; }
        .grid-inputs input, .grid-inputs select { border: 1px solid #d1d5db; padding: 10px; border-radius: 8px; font-size: 14px; width: 100%; box-sizing: border-box; }
        .btn-add { background: #4f46e5; color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; cursor: pointer; transition: background 0.2s; }
        .btn-add:hover { background: #4338ca; }
        .chart-box { background: #f9fafb; padding: 20px; border-radius: 12px; border: 1px solid #e5e7eb; max-width: 500px; margin: 0 auto; text-align: center; }
        .custom-table { width: 100%; border-collapse: collapse; margin-top: 10px; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
        .custom-table th, .custom-table td { padding: 14px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        .custom-table th { background-color: #f9fafb; font-size: 12px; font-weight: bold; color: #6b7280; text-transform: uppercase; }
        .custom-table td { font-size: 14px; color: #374151; }
        .status-badge { background: #d1fae5; color: #065f46; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: bold; }
        .grid-summary { display: grid; grid-template-cols: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
        .summary-box { padding: 20px; border-radius: 12px; border: 1px solid #e5e7eb; display: flex; flex-direction: column; gap: 5px; }
        .summary-box.green { background: #f0fdf4; border-color: #bbf7d0; color: #166534; }
        .summary-box.red { background: #fef2f2; border-color: #fca5a5; color: #991b1b; }
        .summary-box.blue { background: #eff6ff; border-color: #bfdbfe; color: #1e40af; }
        .summary-title { font-size: 12px; text-transform: uppercase; font-weight: bold; opacity: 0.8; }
        .summary-val { font-size: 24px; font-weight: 800; }
    </style>

    <div class="dashboard-body">
        <div class="container">
            
            <div class="header-panel">
                <h2 class="header-title">🚀 Sistema Hornet.v01 — Painel Executivo</h2>
                <span class="badge">Ambiente Estável</span>
            </div>
            
            <!-- 3.1.1 MARKETING -->
            <div class="card">
                <h3 class="card-title">📈 3.1.1 Painel de Gestão de Marketing & Contratos</h3>
                <div class="grid-inputs">
                    <input type="text" placeholder="Empresa" value="{{ $dadosPython['marketing']['empresa'] ?? '' }}">
                    <input type="text" value="ROI: {{ $dadosPython['marketing']['roi'] ?? '' }}" readonly style="background:#f3f4f6;">
                    <input type="text" value="{{ $dadosPython['marketing']['leads'] ?? '' }} Leads Captados" readonly style="background:#f3f4f6;">
                    <button class="btn-add">➕ Novo Contrato</button>
                </div>
                <div class="chart-box">
                    <span style="font-size:14px; font-weight:bold; color:#6b7280; display:block; margin-bottom:15px;">Mapeamento Analítico do Motor</span>
                    <canvas id="marketingChart" style="max-height: 250px;"></canvas>
                </div>
            </div>

            <!-- 3.1.2 FINANCEIRO CORPORATIVO -->
            <div class="card financeiro">
                <h3 class="card-title">🏢 3.1.2 Painel Financeiro Corporativo (Acompanhamento ADM)</h3>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Cliente / Empresa</th>
                            <th>Valor Global Contrato</th>
                            <th>Faturamento Mensal Alocado</th>
                            <th>Status Operacional</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-weight:bold;">{{ $dadosPython['marketing']['empresa'] ?? 'Sem dados' }}</td>
                            <td>R$ {{ number_format($dadosPython['clientes']['valor_contrato'] ?? 0, 2, ',', '.') }}</td>
                            <td style="color:#10b981; font-weight:bold;">R$ {{ number_format($dadosPython['clientes']['faturamento_estimado_mensal'] ?? 0, 2, ',', '.') }}</td>
                            <td><span class="status-badge">{{ $dadosPython['clientes']['status'] ?? 'Inativo' }}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- 3.1.3 FINANCEIRO PESSOAL -->
            <div class="card pessoal">
                <h3 class="card-title">💰 3.1.3 Gestão Financeira Pessoal & Fluxo Parcelado</h3>
                <div class="grid-inputs" style="grid-template-cols: 1fr 2fr; align-items: end;">
                    <div>
                        <label style="font-size:12px; font-weight:bold; color:#4b5563; display:block; margin-bottom:5px;">Mês Base:</label>
                        <select id="mesSelect" onchange="atualizarPainelPessoal()">
                            <option value="setembro" selected>📅 Setembro</option>
                            <option value="outubro">⏭️ Outubro</option>
                            <option value="novembro">⏭️ Novembro</option>
                        </select>
                    </div>
                    <div style="font-size:13px; color:#6b7280; font-style:italic; padding-bottom:12px;">
                        *Lançamentos parcelados migram automaticamente para os meses subsequentes de forma automatizada.
                    </div>
                </div>
                
                <div class="grid-summary">
                    <div class="summary-box green">
                        <span class="summary-title">Total Entradas</span>
                        <span id="pessoalEntradas" class="summary-val">R$ 0,00</span>
                    </div>
                    <div class="summary-box red">
                        <span class="summary-title">Total Saídas</span>
                        <span id="pessoalSaidas" class="summary-val">R$ 0,00</span>
                    </div>
                    <div class="summary-box blue">
                        <span class="summary-title">Saldo Consolidado</span>
                        <span id="pessoalSaldo" class="summary-val">R$ 0,00</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://jsdelivr.net"></script>
    <script>
        const dadosPython = @json($dadosPython);

        // Renderização do gráfico nativo (Sem depender do Tailwind)
        const ctxMkt = document.getElementById('marketingChart').getContext('2d');
        new Chart(ctxMkt, {
            type: 'bar',
            data: {
                labels: ['CPA (Captação)', 'Métrica de ROI', 'Leads (/10)'],
                datasets: [{
                    data: [
                        dadosPython?.marketing?.custo_captacao || 0, 
                        (dadosPython?.marketing?.roi || 0) * 10, 
                        (dadosPython?.marketing?.leads || 0) / 10
                    ],
                    backgroundColor: ['#f59e0b', '#10b981', '#3b82f6'],
                    borderRadius: 6
                }]
            },
            options: { 
                responsive: true,
                scales: { y: { beginAtZero: true, display: false } },
                plugins: { legend: { display: false } }
            }
        });

        // Alternância rápida de meses do Financeiro Pessoal
        function atualizarPainelPessoal() {
            const mes = document.getElementById('mesSelect').value;
            const dadosMes = dadosPython?.pessoal?.[mes] || { entradas: 0, saidas: 0, saldo: 0 };

            document.getElementById('pessoalEntradas').innerText = 'R$ ' + dadosMes.entradas.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
            document.getElementById('pessoalSaidas').innerText = 'R$ ' + dadosMes.saidas.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
            document.getElementById('pessoalSaldo').innerText = 'R$ ' + dadosMes.saldo.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
        }
        document.addEventListener("DOMContentLoaded", atualizarPainelPessoal);
    </script>
</x-app-layout>
