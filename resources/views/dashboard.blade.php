<x-app-layout>
    <!-- PARTE 1: Configuração Visual e Painel de Marketing -->
    <link href="https://jsdelivr.net" rel="stylesheet">

    <x-slot name="header">
        <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
            <h2 class="font-bold text-2xl text-indigo-900 leading-tight">
                🚀 Sistema Hornet.v01 — Painel Executivo
            </h2>
            <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider">
                Ambiente de Produção
            </span>
        </div>
    </x-slot>

    <div class="py-6 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- SEÇÃO 3.1.1: GERENCIAMENTO DE EMPRESAS (MARKETING) -->
            <div class="bg-white overflow-hidden shadow-lg rounded-xl p-6 border-t-4 border-indigo-600">
                <div class="flex items-center space-x-2 mb-6">
                    <span class="text-2xl">📈</span>
                    <h3 class="text-xl font-bold text-gray-800">3.1.1 Painel de Gestão de Marketing & Contratos</h3>
                </div>

                <!-- Formulário estilizado -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8 bg-gray-50 p-4 rounded-xl border">
                    <input type="text" placeholder="Nome da Empresa" value="{{ $dadosPython['marketing']['empresa'] ?? '' }}" class="border border-gray-300 p-2.5 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm">
                    <input type="text" placeholder="Métrica de ROI" value="ROI: {{ $dadosPython['marketing']['roi'] ?? '' }}" class="border border-gray-300 p-2.5 rounded-lg bg-gray-100 block w-full shadow-sm" readonly>
                    <input type="text" placeholder="Leads" value="{{ $dadosPython['marketing']['leads'] ?? '' }} Leads Captados" class="border border-gray-300 p-2.5 rounded-lg bg-gray-100 block w-full shadow-sm" readonly>
                    <button class="bg-indigo-600 text-white font-medium px-4 py-2.5 rounded-lg hover:bg-indigo-700 transition duration-150 shadow-md">
                        ➕ Novo Contrato
                    </button>
                </div>

                <!-- Gráfico de Performance -->
                <div class="bg-gray-50 p-6 rounded-xl border max-w-2xl mx-auto shadow-inner">
                    <h4 class="text-center font-semibold text-gray-600 mb-4">Análise Visual de Performance (Mapeamento Analítico)</h4>
                    <canvas id="marketingChart" class="max-h-80"></canvas>
                </div>
            </div>
            <!-- SEÇÃO 3.1.2: ADMINISTRATIVO FINANCEIRO DA EMPRESA -->
            <div class="bg-white overflow-hidden shadow-lg rounded-xl p-6 border-t-4 border-green-500">
                <div class="flex items-center space-x-2 mb-6">
                    <span class="text-2xl">🏢</span>
                    <h3 class="text-xl font-bold text-gray-800">3.1.2 Painel Financeiro Corporativo (Acompanhamento ADM)</h3>
                </div>
                
                <div class="overflow-hidden border border-gray-200 rounded-xl shadow-sm">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Cliente/Empresa</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Valor Global Contrato</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Faturamento Mensal Alocado</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Status Operacional</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $dadosPython['marketing']['empresa'] ?? 'Sem empresa' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 font-medium">R$ {{ number_format($dadosPython['clientes']['valor_contrato'] ?? 0, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-bold">R$ {{ number_format($dadosPython['clientes']['faturamento_estimado_mensal'] ?? 0, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-800 shadow-sm">
                                        {{ $dadosPython['clientes']['status'] ?? 'Inativo' }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SEÇÃO 3.1.3: FINANCEIRO PESSOAL (CÁLCULO AUTOMÁTICO DE MESES) -->
            <div class="bg-white overflow-hidden shadow-lg rounded-xl p-6 border-t-4 border-yellow-500">
                <div class="flex items-center space-x-2 mb-6">
                    <span class="text-2xl">💰</span>
                    <h3 class="text-xl font-bold text-gray-800">3.1.3 Gestão Financeira Pessoal & Fluxo Parcelado</h3>
                </div>
                
                <div class="mb-6 bg-gray-50 p-4 rounded-xl border flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="w-full md:w-1/3">
                        <label class="block text-sm font-bold text-gray-600 mb-1">Selecione o Mês Base:</label>
                        <select class="border border-gray-300 p-2.5 rounded-lg w-full bg-white shadow-sm focus:ring-yellow-500" id="mesSelect" onchange="atualizarPainelPessoal()">
                            <option value="setembro" selected>📅 Setembro (Mês Atual)</option>
                            <option value="outubro">⏭️ Outubro (Projeção Parcelada)</option>
                            <option value="novembro">⏭️ Novembro (Projeção Parcelada)</option>
                        </select>
                    </div>
                    <div class="text-sm text-gray-500 max-w-md italic text-center md:text-right">
                        *Lógica inteligente: Lançamentos parcelados migram automaticamente para os meses subsequentes de forma automatizada.
                    </div>
                </div>
                
                <!-- Cards de Resumo de Saldos -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 font-semibold">
                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl border border-green-200 text-green-800 shadow-sm flex flex-col justify-between">
                        <span class="text-xs uppercase tracking-wider text-green-600 font-bold">Total Entradas</span>
                        <span id="pessoalEntradas" class="text-2xl font-extrabold mt-2">R$ 0,00</span>
                    </div>
                    <div class="bg-gradient-to-br from-red-50 to-red-100 p-6 rounded-xl border border-red-200 text-red-800 shadow-sm flex flex-col justify-between">
                        <span class="text-xs uppercase tracking-wider text-red-600 font-bold">Total Saídas</span>
                        <span id="pessoalSaidas" class="text-2xl font-extrabold mt-2">R$ 0,00</span>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-100 p-6 rounded-xl border border-blue-200 text-blue-800 shadow-sm flex flex-col justify-between">
                        <span class="text-xs uppercase tracking-wider text-blue-600 font-bold">Saldo Consolidado</span>
                        <span id="pessoalSaldo" class="text-2xl font-extrabold mt-2">R$ 0,00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Gráficos e Inteligência de Telas -->
    <script src="https://jsdelivr.net"></script>
    <script>
        // Transforma o array estruturado do PHP em um objeto interpretado pelo Javascript
        const dadosPython = @json($dadosPython);

        // Captura as métricas simuladas vindas do backend
        const roiDoPython = dadosPython?.marketing?.roi || 0;
        const leadsDoPython = dadosPython?.marketing?.leads || 0;
        const cpaDoPython = dadosPython?.marketing?.custo_captacao || 0;

        // Inicialização e renderização do Gráfico da Seção 3.1.1
        const ctxMkt = document.getElementById('marketingChart').getContext('2d');
        new Chart(ctxMkt, {
            type: 'bar',
            data: {
                labels: ['Custo de Captação (CPA)', 'Métrica de ROI', 'Volume de Leads'],
                datasets: [{
                    label: 'Indicadores do Motor Analítico',
                    data: [cpaDoPython, roiDoPython * 10, leadsDoPython / 10], // Escalonado esteticamente para o gráfico
                    backgroundColor: ['#f59e0b', '#10b981', '#3b82f6'],
                    borderRadius: 8,
                    borderWidth: 0
                }]
            },
            options: { 
                responsive: true,
                scales: { y: { beginAtZero: true, display: false } },
                plugins: { legend: { display: false } }
            }
        });

        // Função responsável pelo cálculo dinâmico da Seção 3.1.3 (Troca de Meses)
        function atualizarPainelPessoal() {
            const mes = document.getElementById('mesSelect').value;
            const dadosMes = dadosPython?.pessoal?.[mes] || { entradas: 0, saidas: 0, saldo: 0 };

            document.getElementById('pessoalEntradas').innerText = 'R$ ' + dadosMes.entradas.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
            document.getElementById('pessoalSaidas').innerText = 'R$ ' + dadosMes.saidas.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
            document.getElementById('pessoalSaldo').innerText = 'R$ ' + dadosMes.saldo.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
        }

        // Executa automaticamente a primeira renderização do mês atual ao carregar a página
        document.addEventListener("DOMContentLoaded", atualizarPainelPessoal);
    </script>
</x-app-layout>
