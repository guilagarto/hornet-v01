<x-app-layout>
    <div class="leads-container" style="padding: 40px 20px; max-width: 1200px; margin: 0 auto; font-family: sans-serif; color: #333;">
        
        <!-- Cabeçalho Isolado da Nova Página -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; border-bottom: 1px solid #e5e7eb; padding-bottom: 20px;">
            <div>
                <h2 style="font-size: 24px; font-weight: bold; margin: 0; color: #111827;">Leads Capturados — Diagnóstico 8ou80</h2>
                <p style="margin: 5px 0 0 0; color: #6b7280; font-size: 14px;">Lista exclusiva de contatos e pacotes recomendados pelo sistema.</p>
            </div>
            <a href="{{ route('dashboard') }}" style="text-decoration: none; background-color: #4b5563; color: white; padding: 10px 20px; border-radius: 6px; font-weight: bold; font-size: 14px; transition: background 0.2s;" onmouseover="this.style.backgroundColor='#1f2937'" onmouseout="this.style.backgroundColor='#4b5563'">
                Voltar ao Painel
            </a>
        </div>

        <!-- Estrutura de Tabela para Listagem dos Dados do Banco -->
        <div style="background: white; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                <thead>
                    <tr style="background-color: #f9fafb; border-bottom: 1px solid #e5e7eb; color: #374151; font-weight: bold;">
                        <th style="padding: 15px;">Data/Hora</th>
                        <th style="padding: 15px;">Lead / Empresa</th>
                        <th style="padding: 15px;">Contatos</th>
                        <th style="padding: 15px;">Objetivo Comercial</th>
                        <th style="padding: 15px;">Plano Sugerido</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                        <tr style="border-bottom: 1px solid #e5e7eb; transition: background 0.1s;" onmouseover="this.style.backgroundColor='#f9fafb'" onmouseout="this.style.backgroundColor='transparent'">
                            <td style="padding: 15px; color: #6b7280;">
                                {{ $lead->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td style="padding: 15px;">
                                <strong style="color: #111827; display: block;">{{ $lead->nome }}</strong>
                                <span style="color: #6b7280; font-size: 12px;">{{ $lead->empresa ?? 'Sem Empresa' }} ({{ $lead->tipo_negocio }})</span>
                            </td>
                            <td style="padding: 15px;">
                                <span style="display: block; color: #111827;">{{ $lead->email }}</span>
                                <a href="https://whatsapp.com{{ preg_replace('/[^0-9]/', '', $lead->whatsapp) }}" target="_blank" style="color: #25D366; text-decoration: none; font-size: 13px; font-weight: 500;">
                                    💬 {{ $lead->whatsapp }}
                                </a>
                            </td>
                            <td style="padding: 15px; color: #374151;">
                                {{ $lead->objetivo }}
                            </td>
                            <td style="padding: 15px;">
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
