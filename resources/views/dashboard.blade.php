<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Hornet.v01') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- SEÇÃO 3.1.1: GERENCIAMENTO DE EMPRESAS (MARKETING) -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">📈 3.1.1 Painel de Gerenciamento de Empresas (Marketing)</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <input type="text" placeholder="Nome da Empresa" class="border p-2 rounded">
                    <input type="number" placeholder="ROI" class="border p-2 rounded">
                    <input type="number" placeholder="Leads Captados" class="border p-2 rounded">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Adicionar Contrato</button>
                </div>
                <!-- Gráfico de Performance -->
                <div class="w-full max-w-2xl mx-auto">
                    <canvas id="marketingChart"></canvas>
                </div>
            </div>

            <!-- SEÇÃO 3.1.2: ADMINISTRATIVO FINANCEIRO DA EMPRESA -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">🏢 3.1.2 Painel Administrativo Financeiro de Clientes</h3>
                <p class="text-gray-600 mb-4">Acompanhamento de receita gerada por contratos fechados no painel anterior.</p>
                <div class="overflow-x-auto">
                    <table class="min-w-full min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Empresa</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Valor do Contrato</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Faturamento Mensal Estimado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Exemplo Corp Ltda</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">R$ 15.000,00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">R$ 2.500,00</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Ativo</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SEÇÃO 3.1.3: FINANCEIRO PESSOAL -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">💰 3.1.3 Painel Administrativo Financeiro Pessoal</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <select class="border p-2 rounded" id="mesSelecionado">
                        <option value="9">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                    </select>
                    <input type="number" id="inputEntrada" placeholder="Entradas (R$)" class="border p-2 rounded">
                    <input type="number" id="inputSaida" placeholder="Saídas (R$)" class="border p-2 rounded">
                    <button onclick="calcularFluxo()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Inserir Dados</button>
                </div>
                
                <!-- Resumo dos Saldos -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center font-semibold mb-4">
                    <div class="bg-green-50 p-4 rounded border border-green-200 text-green-700">Total Entradas: <span id="resEntradas">R$ 0,00</span></div>
                    <div class="bg-red-50 p-4 rounded border border-red-200 text-red-700">Total Saídas: <span id="resSaidas">R$ 0,00</span></div>
                    <div class="bg-blue-50 p-4 rounded border border-blue-200 text-blue-700">Saldo: <span id="resSaldo">R$ 0,00</span></div>
                </div>
            </div>

        </div>
    </div>

    <!-- Scripts de Gráficos e Lógica Rápida para a Apresentação -->
    <script src="https://jsdelivr.net"></script>
    <script>
        // Inicialização do gráfico de Marketing (3.1.1)
        const ctxMkt = document.getElementById('marketingChart').getContext('2d');
        new Chart(ctxMkt, {
            type: 'bar',
            data: {
                labels: ['Custo Captação', 'ROI Total', 'Média de Leads'],
                datasets: [{
                    label: 'Indicadores de Marketing (Média por Empresa)',
                    data: [150, 4.5, 320],
                    backgroundColor: ['#ef4444', '#10b981', '#3b82f6']
                }]
            }
        });

        // Lógica simples do Fluxo Pessoal (3.1.3) para rodar na hora da apresentação
        function calcularFluxo() {
            const entrada = parseFloat(document.getElementById('inputEntrada').value) || 0;
            const saida = parseFloat(document.getElementById('inputSaida').value) || 0;
            const saldo = entrada - saida;

            document.getElementById('resEntradas').innerText = 'R$ ' + entrada.toFixed(2);
            document.getElementById('resSaidas').innerText = 'R$ ' + saida.toFixed(2);
            document.getElementById('resSaldo').innerText = 'R$ ' + saldo.toFixed(2);
        }
    </script>
</x-app-layout>
