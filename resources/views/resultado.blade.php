<x-app-layout>
    <div class="resultado-container" style="padding: 40px 20px; max-width: 800px; margin: 0 auto; font-family: sans-serif; color: #333;">
        <h2 style="font-size: 28px; margin-bottom: 10px;">Seu Diagnóstico 8ou80</h2>
        <p style="font-size: 16px; line-height: 1.6; margin-bottom: 30px;">
            Olá, <strong>{{ $dados['nome'] }}</strong>! Analisamos as respostas do seu negócio e identificamos as principais oportunidades para a <strong>{{ $dados['empresa'] ?? 'sua empresa' }}</strong>.
        </p>

        <!-- Saúde da Empresa -->
        <div class="saude-box" style="background-color: #f9fafb; border: 1px solid #e5e7eb; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
            <h3 style="margin-top: 0; margin-bottom: 15px; font-size: 18px;">Sua situação atual:</h3>
            <ul style="list-style: none; padding: 0; margin: 0; font-size: 16px; line-height: 2;">
                <li><strong>Presença digital:</strong> {{ $saude['presenca'] }}</li>
                <li><strong>Aquisição:</strong> {{ $saude['aquisicao'] }}</li>
                <li><strong>Potencial de conversão:</strong> {{ $saude['conversao'] }}</li>
            </ul>
        </div>

        <!-- Card do Pacote Recomendado -->
        <div class="pacote-card" style="border: 2px solid {{ $pacote_sugerido['cor'] }}; padding: 30px; border-radius: 12px; margin-bottom: 40px; background-color: #fff;">
            <span style="text-transform: uppercase; font-size: 12px; font-weight: bold; letter-spacing: 1px; color: #6b7280;">Solução sugerida para você:</span>
            <h2 style="margin-top: 5px; color: #111827; font-size: 24px;">{{ $pacote_sugerido['titulo'] }}</h2>
            <p style="font-size: 16px; line-height: 1.6; color: #4b5563; margin-bottom: 20px;">{{ $pacote_sugerido['descricao'] }}</p>

            <h4 style="font-size: 16px; margin-bottom: 10px;">Você receberá:</h4>
            <ul style="list-style: none; padding: 0; margin-bottom: 25px; line-height: 1.8;">
                @foreach($pacote_sugerido['itens'] as $item)
                    <li style="color: #1f2937;">✓ {{ $item }}</li>
                @endforeach
            </ul>

            <div style="font-size: 16px; border-top: 1px solid #e5e7eb; padding-top: 15px;">
                <strong>Investimento estimado:</strong> {{ $pacote_sugerido['investimento'] }}
            </div>
        </div>

        <!-- Botão de Ação -->
        <div>
            <a href="https://whatsapp.com! Acabei de fazer meu Diagnóstico Digital na 8ou80 e o sistema sugeriu o {{ urlencode($pacote_sugerido['titulo']) }}" 
               target="_blank" 
               style="display: block; text-align: center; background-color: #111827; color: #fff; padding: 15px 30px; font-weight: bold; text-decoration: none; border-radius: 6px; font-size: 16px; transition: background 0.2s;"
               onmouseover="this.style.backgroundColor='#1f2937'"
               onmouseout="this.style.backgroundColor='#111827'">
                Quero conversar com a 8ou80
            </a>
        </div>
    </div>
</x-app-layout>
