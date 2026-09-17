<x-app-layout>
    <div style="background-color: #f8fafc; padding: 40px; font-family: sans-serif; min-height: 100vh;">
        <div style="max-width: 1000px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
            
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #0f172a; padding-bottom: 15px; margin-bottom: 30px;">
                <h2 style="margin: 0; color: #0f172a;">📊 8ou80 — Central Analítica Isolada (Módulo Python)</h2>
                <a href="{{ route('dashboard') }}" style="background: #475569; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: bold;">➔ Voltar para Cadastros</a>
            </div>

            <p style="color: #4b5563; font-size: 15px; line-height: 1.6;">
                Este módulo roda de forma assíncrona. Sempre que esta página é carregada, o Laravel dispara um comando nativo no Linux executando o script <code>python_scripts/analise.py</code>, gerando gráficos sem travar a Dashboard principal.
            </p>

            <div style="margin-top: 30px; text-align: center; padding: 20px; border: 1px solid #e5e7eb; border-radius: 12px; background: #fafafa;">
                @if($graficoExiste)
                    <img src="{{ asset('grafico_python.png') }}?v={{ time() }}" alt="Gráfico de Performance Python" style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                @else
                    <div style="color: #9b1c1c; padding: 20px; font-style: italic;">
                        ⚠️ Certifique-se de que há métricas e metas lançadas para o mesmo projeto e mês na Dashboard para o motor Python cruzar os dados.
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
