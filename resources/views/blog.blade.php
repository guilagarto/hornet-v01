<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Corporativo — Agência 8ou80</title>
    <style>
        body { font-family: 'Segoe UI', system-ui, sans-serif; background-color: #f8fafc; color: #1e293b; margin: 0; padding: 0; }
        .nav-bar { background: #0f172a; padding: 15px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .nav-brand { color: white; font-weight: 800; font-size: 20px; text-decoration: none; }
        .nav-links { display: flex; gap: 20px; }
        .nav-links a { color: #cbd5e1; text-decoration: none; font-size: 14px; font-weight: 600; transition: color 0.2s; }
        .nav-links a:hover { color: white; }
        .container { max-width: 900px; margin: 50px auto; padding: 0 20px; }
        h1 { color: #0f172a; font-size: 36px; font-weight: 800; text-align: center; margin-bottom: 40px; }
        .post { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; margin-bottom: 30px; }
        .post-date { font-size: 12px; color: #94a3b8; font-weight: 600; text-transform: uppercase; }
        .post h2 { color: #0f172a; font-size: 24px; margin: 5px 0 12px 0; font-weight: 700; }
        .post p { color: #475569; font-size: 15px; line-height: 1.6; margin: 0; }
    </style>
</head>
<body>
    <div class="nav-bar">
        <a href="{{ route('home') }}" class="nav-brand">🐝 8ou80</a>
        <div class="nav-links">
            <a href="{{ route('solucoes') }}">Soluções</a>
            <a href="{{ route('cases') }}">Cases</a>
            <a href="{{ route('blog') }}">Blog</a>
            <a href="{{ route('fale.conosco') }}">Fale Conosco</a>
        </div>
    </div>
    <div class="container">
        <h1>Insights & Estratégias Digitais</h1>
        
        <div class="post">
            <span class="post-date">17 de Setembro, 2026</span>
            <h2>Como Auditar os KPIs de Marketing Corretamente</h2>
            <p>Compreender a diferença exata entre métricas de vaidade e dados brutos de faturamento gerados por canais de tráfego pago é o primeiro passo para otimizar as tomadas de decisão gerenciais da sua empresa...</p>
        </div>

        <div class="post">
            <span class="post-date">10 de Setembro, 2026</span>
            <h2>A Importância de Controlar o CAC no Cenário Atual</h2>
            <p>Manter o custo por cliente adquirido (CAC) sob controle rígido em relação ao Ticket Médio e ao Lifetime Value (LTV) dita se a operação comercial de uma agência digital está escalando de forma estável ou queimando caixa...</p>
        </div>
    </div>
</body>
</html>
