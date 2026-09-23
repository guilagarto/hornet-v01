<x-site-layout>
    <style>
        .show-wrapper { max-width: 600px; margin: 0 auto; padding: 20px 16px; color: #1f2937; }
        .btn-voltar-prod { color: #4f46e5; text-decoration: none; font-weight: bold; font-size: 14px; display: inline-block; margin-bottom: 16px; }
        .box-plano { background: white; padding: 24px; border-radius: 16px; border: 1px solid #e2e8f0; }
        .main-title { font-size: 22px; font-weight: 800; color: #0f172a; margin-bottom: 12px; }
        .full-text { font-size: 15px; color: #374151; line-height: 1.6; margin-bottom: 20px; }
        .list-title { font-size: 14px; font-weight: 700; text-transform: uppercase; color: #64748b; margin-bottom: 10px; }
        .features-list { list-style: none; padding: 0; margin-bottom: 24px; }
        .features-list li { font-size: 14px; margin-bottom: 8px; position: relative; padding-left: 22px; color: #4b5563; }
        .features-list li::before { content: "⚡"; position: absolute; left: 0; color: #4f46e5; }
        
        /* Botão Comercial WhatsApp */
        .btn-whats-comprar { display: flex; align-items: center; justify-content: center; gap: 8px; background-color: #25d366; color: white; text-decoration: none; padding: 14px; border-radius: 10px; font-weight: bold; font-size: 16px; box-shadow: 0 4px 10px rgba(37, 211, 102, 0.2); }
    </style>

    <div class="show-wrapper">
        <a href="{{ route('solucoes') }}" class="btn-voltar-prod">← Voltar para Soluções</a>


        <div class="box-plano">
            <h1 class="main-title">{{ $plano->name }}</h1>
            
            <p class="full-text">
                {{ $plano->full_description }}
            </p>

            <h3 class="list-title">📦 O que está incluso no escopo:</h3>
            <ul class="features-list">
                <!-- Converte a string de quebras de linha em itens físicos de lista HTML -->
                @foreach(explode("\n", $plano->features) as $feature)
                    @if(trim($feature))
                        <li>{{ $feature }}</li>
                    @endif
                @endforeach
            </ul>

            <!-- Botão Dinâmico que gera o link do WhatsApp com o texto customizado do plano -->
            <!-- Substitua o número 5562999999999 pelo telefone comercial da 8ou80 -->
            <a href="https://whatsapp.com{{ urlencode($plano->whatsapp_message) }}" target="_blank" class="btn-whats-comprar">
                💬 Contratar Solução via WhatsApp
            </a>
        </div>
    </div>
</x-site-layout>
