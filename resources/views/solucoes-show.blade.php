<x-site-layout>
    <style>
        /* Container Principal Mobile-First */
        .show-wrapper { 
            max-width: 480px; 
            margin: 0 auto; 
            padding: 16px; 
            color: #1e293b; 
        }
        
        .btn-voltar-prod { 
            color: #4f46e5; 
            text-decoration: none; 
            font-weight: 700; 
            font-size: 14px; 
            display: inline-block; 
            margin-bottom: 16px; 
        }
        
        /* Box do Card com espaçamentos corrigidos */
        .box-plano { 
            background: #ffffff; 
            padding: 24px 20px; 
            border-radius: 16px; 
            border: 1px solid #e2e8f0; 
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
            text-align: left; /* Garante o alinhamento padrão à esquerda */
        }
        
        .main-title { 
            font-size: 22px; 
            font-weight: 800; 
            color: #0f172a; 
            margin-bottom: 12px; 
            line-height: 1.3;
        }
        
        .full-text { 
            font-size: 14px; 
            color: #475569; 
            line-height: 1.6; 
            margin-bottom: 24px; 
            text-align: justify; /* Melhora a leitura dos parágrafos no celular */
        }
        
        .list-title { 
            font-size: 13px; 
            font-weight: 700; 
            text-transform: uppercase; 
            color: #64748b; 
            margin-bottom: 12px; 
            letter-spacing: 0.5px;
        }
        
        /* Correção da Listagem Desalinhada */
        .features-list { 
            list-style: none; 
            padding: 0; 
            margin: 0 0 28px 0; 
            display: flex;
            flex-direction: column;
            gap: 10px; /* Cria espaçamento uniforme entre as linhas */
        }
        
        .features-list li { 
            font-size: 14px; 
            line-height: 1.4;
            color: #334155; 
            position: relative; 
            padding-left: 24px; /* Abre espaço para o emoji se alinhar */
            text-align: left;
        }
        
        .features-list li::before { 
            content: "⚡"; 
            position: absolute; 
            left: 0; 
            top: 0;
        }
        
        /* Botão Comercial WhatsApp Otimizado contra travamentos do Firefox */
                /* Botão Comercial WhatsApp Alinhado e Ajustado */
        .btn-whats-comprar { 
            display: block; 
            text-align: center; 
            background-color: #25d366; 
            color: #ffffff; 
            text-decoration: none; 
            padding: 14px 20px; 
            border-radius: 12px; 
            font-weight: 700; 
            font-size: 15px; 
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.2); 
            border: none; 
            width: 100%;
            box-sizing: border-box; /* CORREÇÃO CRUCIAL: Impede o botão de vazar e ficar torto */
            transition: background 0.2s;
        }

        .btn-whats-comprar:active {
            background-color: #1ebd54;
        }
    </style>

    <div class="show-wrapper">
        <a href="{{ route('solucoes') }}" class="btn-voltar-prod">← Voltar para Soluções</a>

        <div class="box-plano">
            <h1 class="main-title">{{ $plano->name }}</h1>
            
            <p class="full-text">
                {{ $plano->full_description }}
            </p>

            <h3 class="list-title">📦 O que está incluso no escopo</h3>
            <ul class="features-list">
                @foreach(explode("\n", $plano->features) as $feature)
                    @if(trim($feature))
                        <li>{{ trim($feature) }}</li>
                    @endif
                @endforeach
            </ul>

            @php
                // Montagem do link isolado padrão internacional
                $textoWhats = rawurlencode($plano->whatsapp_message);
                $urlWhats = "https://wa.me" . $textoWhats;
            @endphp

            <a href="{{ $urlWhats }}" target="_blank" class="btn-whats-comprar">
                💬 Contratar Solução via WhatsApp
            </a>
        </div>
    </div>
</x-site-layout>
