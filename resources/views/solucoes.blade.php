<x-site-layout>
    <x-slot:title>Soluções — Agência 8ou80</x-slot:title>

    <style>
        .container { max-width: 1100px; margin: 50px auto; padding: 0 20px; text-align: center; box-sizing: border-box; }
        h1 { color: #0f172a; font-size: clamp(28px, 4vw, 36px); font-weight: 800; margin-bottom: 10px; }
        .grid { display: grid; grid-template-cols: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin-top: 40px; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; text-align: left; }
        .card h3 { color: #0f172a; font-size: 20px; margin: 0 0 10px 0; }
        .card p { color: #64748b; font-size: 14px; line-height: 1.6; margin: 0; }
    </style>

    <div class="container">
        <h1>Nossas Soluções Digitais</h1>
        <p style="color: #64748b;">Estratégias analíticas desenhadas para acelerar o crescimento do seu negócio.</p>
        <div class="grid">
            <div class="card">
                <h3>🚀 Gestão de Tráfego Pago</h3>
                <p>Campanhas otimizadas no Google Ads e Meta Ads focadas no menor Custo por Aquisição (CAC) e máximo retorno sobre investimento (ROAS).</p>
            </div>
            <div class="card">
                <h3>Development Web</h3>
                <p>Criação de Landing Pages de alta conversão, e-commerces e plataformas corporativas velozes estruturadas com foco em UX/UI.</p>
            </div>
            <div class="card">
                <h3>📈 Inteligência Analítica</h3>
                <p>Modelagem de dados de funil integrados para auditoria gerencial contínua, extraindo KPIs reais das ações de marketing da sua empresa.</p>
            </div>
        </div>
    </div>
</x-site-layout>
