<x-app-layout>
    <!-- CSS Isolado para Forçar Empilhamento Total no Mobile 📱 -->
    <style>
        .leads-page-container {
            padding: 20px 15px;
            max-width: 1200px;
            margin: 0 auto;
            font-family: sans-serif;
            color: #333;
            box-sizing: border-box;
            width: 100% !important;
        }
        .leads-table-wrapper {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            width: 100% !important;
            box-sizing: border-box;
        }
        .responsive-leads-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }
        .responsive-leads-table th, 
        .responsive-leads-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e5e7eb;
        }
        .responsive-leads-table thead tr {
            background-color: #f9fafb;
            color: #374151;
            font-weight: bold;
        }

        /* 📱 ESTILOS EXCLUSIVOS PARA MOBILE (EMPILHAMENTO COMPLETO UM EM CIMA DO OUTRO) */
        @media (max-width: 768px) {
            /* Força a tabela inteira, o corpo e as linhas a virarem blocos 100% de largura */
            .responsive-leads-table, 
            .responsive-leads-table tbody, 
            .responsive-leads-table tr, 
            .responsive-leads-table td { 
                display: block !important; 
                width: 100% !important;
                box-sizing: border-box !important;
            }
            
            /* Remove o cabeçalho original em formato de colunas lado a lado */
            .responsive-leads-table thead {
                display: none !important;
            }
            
            /* Cada registro vira um bloco quadrado bem delimitado e empilhado */
            .responsive-leads-table tbody tr {
                margin-bottom: 20px !important;
                border: 1px solid #d1d5db !important;
                border-radius: 8px !important;
                background: #ffffff !important;
                padding: 10px !important;
                box-shadow: 0 2px 4px rgba(0,0,0,0.02);
            }
            
            /* Cada célula fica EXATAMENTE UMA EM CIMA DA OUTRA sem cortar nada */
            .responsive-leads-table td {
                text-align: left !important;
                padding: 10px 8px !important;
                border-bottom: 1px solid #f3f4f6 !important;
            }
            
            .responsive-leads-table td:last-child {
                border-bottom: none !important;
            }
            
            /* Injeta um rótulo em negrito em cima do campo para o usuário saber o que é */
            .responsive-leads-table td::before {
                content: attr(data-label) ":";
                display: block !important;
                font-weight: bold !important;
                text-transform: uppercase;
                font-size: 11px;
                color: #4b5563;
                margin-bottom: 4px;
            }
        }
    </style>

    <div class="leads-page-container">
        
        <!-- Cabeçalho Flexível -->
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 15px; margin-bottom: 25px; border-bottom: 1px solid #e5e7eb; padding-bottom: 20px;">
            <div style="flex: 1; min-width: 250px;">
                <h2 style="font-size: clamp(20px, 4vw, 24px); font-weight: bold; margin: 0; color: #111827;">Leads Capturados — Diagnóstico 8ou80</h2>
                <p style="margin: 5px 0 0 0; color: #6b7280; font-size: 13px;">Lista exclusiva de contatos e pacotes recomendados pelo sistema.</p>
            </div>
            <a href="{{ route('dashboard') }}" style="text-decoration: none; background-color: #4b5563; color: white; padding: 10px 16px; border-radius: 6px; font-weight: bold; font-size: 13px; display: inline-block; text-align: center;">
                Voltar ao Painel
            </a>
        </div>

        <!-- Wrapper da Tabela -->
        <div class="leads-table-wrapper">
            <table class="responsive-leads-table">
                <thead>
                    <tr>
                        <th>Data/Hora</th>
                        <th>Lead / Empresa</th>
                        <th>Contatos</th>
                        <th>Objetivo Comercial</th>
                        <th>Plano Sugerido</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                        <tr style="transition: background 0.1s;">
                            <!-- O segredo está no 'data-label', ele vira o título do campo no celular -->
                            <td data-label="Data/Hora" style="color: #6b7280;">
                                {{ $lead->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td data-label="Lead / Empresa">
                                <strong style="color: #111827; display: block; word-break: break-word;">{{ $lead->nome }}</strong>
                                <span style="color: #6b7280; font-size: 12px; display: block; word-break: break-word;">{{ $lead->empresa ?? 'Sem Empresa' }} ({{ $lead->tipo_negocio }})</span>
                            </td>
                            <td data-label="Contatos">
                                <span style="display: block; color: #111827; word-break: break-all;">{{ $lead->email }}</span>
                                <a href="https://whatsapp.com{{ preg_replace('/[^0-9]/', '', $lead->whatsapp) }}" target="_blank" style="color: #25D366; text-decoration: none; font-size: 13px; font-weight: 500; display: inline-block; margin-top: 4px;">
                                    💬 {{ $lead->whatsapp }}
                                </a>
                            </td>
                            <td data-label="Objetivo Comercial" style="color: #374151; word-break: break-word;">
                                {{ $lead->objetivo }}
                            </td>
                            <td data-label="Plano Sugerido">
                                @php
                                    $badgeColor = match($lead->pacote_sugerido) {
                                        'Presença' => ['bg' => '#e6f4ea', 'text' => '#137333'],
                                        'Atração' => ['bg' => '#e8f0fe', 'text' => '#1a73e8'],
                                        'Crescimento' => ['bg' => '#f3e8ff', 'text' => '#7c3aed'],
                                        default => ['bg' => '#fef3c7', 'text' => '#d97706'],
                                    };
                                @endphp
                                <span style="background-color: {{ $badgeColor['bg'] }}; color: {{ $badgeColor['text'] }}; padding: 6px 12px; border-radius: 50px; font-weight: bold; font-size: 12px; display: inline-block;">
                                    {{ $lead->pacote_sugerido }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <!-- No mobile, essa linha de vazio também se ajusta normalmente -->
                            <td colspan="5" style="padding: 40px; text-align: center; color: #6b7280;">
                                Nenhum diagnóstico cadastrado no sistema ainda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
