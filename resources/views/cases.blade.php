<x-site-layout>
    <x-slot:title>Cases de Sucesso — Agência 8ou80</x-slot:title>

    <style>
        .container { max-width: 1100px; margin: 50px auto; padding: 0 20px; box-sizing: border-box; }
        h1 { color: #0f172a; font-size: clamp(28px, 4vw, 36px); font-weight: 800; text-align: center; margin-bottom: 40px; }
        .case-row { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap; }
        .case-info { flex: 2; min-width: 260px; }
        .case-info h3 { color: #0f172a; font-size: 22px; margin: 0 0 10px 0; }
        .case-info p { color: #64748b; font-size: 14px; line-height: 1.6; margin: 0; }
        .case-stat { background: #f0fdf4; border: 1px solid #bbf7d0; padding: 15px 25px; border-radius: 8px; text-align: center; min-width: 150px; width: 100%; max-width: 180px; box-sizing: border-box; }
        .case-stat span { font-size: 11px; text-transform: uppercase; font-weight: 700; color: #166534; }
        .case-stat h4 { font-size: 24px; margin: 5px 0 0 0; color: #166534; font-weight: 800; }
        
        @media (max-width: 768px) {
            .case-stat { max-width: 100%; }
        }
    </style>

   <div class="container">
    <h1>Nossos Cases de Sucesso</h1>

    @forelse($projects as $project)
        <!-- Mudamos para passar o ID do projeto no parâmetro da rota -->
        <a href="{{ route('cases.show', $project->id) }}" style="text-decoration: none; color: inherit; display: block;">
            <div class="case-row">
                <div class="case-info">
                    <h3>{{ $project->name }}</h3>
                    <p>Serviços: <strong>{{ $project->services_contracted }}</strong></p>
                    <p style="font-size: 13px; color: #64748b; margin-top: 4px;">Objetivos: {{ $project->objectives }}</p>
                </div>
                
                <!-- Exibe um destaque de performance real com os dados da sua tabela project_metrics -->
                <div class="case-stat">
                    <span>Leads Coletados</span>
                    <h4>+{{ $project->metrics->first()->leads ?? 0 }}</h4>
                </div>
            </div>
        </a>
    @empty
        <p style="text-align: center; color: #64748b; margin-top: 20px;">Nenhum case publicado no momento.</p>
    @endforelse
</div>


</x-site-layout>
