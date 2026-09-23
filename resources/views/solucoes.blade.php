<x-site-layout>
    <style>
        .solucoes-wrapper { max-width: 600px; margin: 0 auto; padding: 20px 16px; }
        .card-plano { background: white; border-radius: 16px; padding: 20px; border: 1px solid #e2e8f0; margin-bottom: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02); }
        .plano-title { font-size: 18px; font-weight: 800; color: #0f172a; margin-bottom: 6px; }
        .plano-desc { font-size: 14px; color: #4b5563; line-height: 1.5; margin-bottom: 16px; }
        .btn-ver-mais { display: block; text-align: center; background-color: #0f172a; color: white; text-decoration: none; padding: 12px; font-weight: bold; border-radius: 8px; font-size: 14px; }
    </style>

    <div class="solucoes-wrapper">
        <h1 style="font-size: 24px; font-weight: 800; text-align: center; margin-bottom: 4px;">Nossas Soluções</h1>
        <p style="text-align: center; font-size: 14px; color: #64748b; margin-bottom: 24px;">Escolha a estrutura ideal para tracionar sua empresa.</p>

        @foreach($planos as $plano)
            <div class="card-plano">
                <h2 class="plano-title">{{ $plano->name }}</h2>
                <p class="plano-desc">{{ $plano->short_description }}</p>
                <a href="{{ route('solucoes.show', $plano->slug) }}" class="btn-ver-mais">Ver Descrição Completa</a>
            </div>
        @endforeach
    </div>
</x-site-layout>
