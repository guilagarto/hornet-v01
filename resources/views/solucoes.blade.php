<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Soluções — Agência 8ou80</title>
    <style>
        body { font-family: 'Segoe UI', system-ui, sans-serif; background-color: #f8fafc; color: #1e293b; margin: 0; padding: 0; }
        .nav-bar { background: #0f172a; padding: 15px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .nav-brand { color: white; font-weight: 800; font-size: 20px; text-decoration: none; }
        .nav-links { display: flex; gap: 20px; }
        .nav-links a { color: #cbd5e1; text-decoration: none; font-size: 14px; font-weight: 600; transition: color 0.2s; }
        .nav-links a:hover { color: white; }
        .container { max-width: 1100px; margin: 50px auto; padding: 0 20px; text-align: center; }
        h1 { color: #0f172a; font-size: 36px; font-weight: 800; margin-bottom: 10px; }
        .grid { display: grid; grid-template-cols: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin-top: 40px; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; text-align: left; }
        .card h3 { color: #0f172a; font-size: 20px; margin: 0 0 10px 0; }
        .card p { color: #64748b; font-size: 14px; line-height: 1.6; margin: 0; }
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
        <h1>Nossas Soluções Digitais</h1>
        <p style="color: #64748b; font-size: 16px;">Estratégias de alta performance desenhadas sob medida para acelerar o crescimento do seu negócio.</p>
        <div class="grid">
            <div class="card">
                <h3>🚀 Gestão de Tráfego Pago</h3>
                <p>Campanhas otimizadas no Google Ads e Meta Ads focadas no menor Custo por Aquisição (CAC) e máximo retorno sobre investimento (ROAS).</p>
            </div>
            <div class="card">
                <h3>🖥️ Desenvolvimento Web</h3>
                <p>Criação de Landing Pages de alta conversão, e-commerces e plataformas corporativas velozes estruturadas com foco em UX/UI.</p>
            </div>
            <div class="card">
                <h3>📈 Inteligência Analítica</h3>
                <p>Modelagem de dados de funil integrados para auditoria gerencial contínua, extraindo KPIs reais das ações de marketing da sua empresa.</p>
            </div>
        </div>
    </div>
</body>
</html>
