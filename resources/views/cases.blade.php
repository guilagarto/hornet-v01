<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cases de Sucesso — Agência 8ou80</title>
    <style>
        body { font-family: 'Segoe UI', system-ui, sans-serif; background-color: #f8fafc; color: #1e293b; margin: 0; padding: 0; }
        .nav-bar { background: #0f172a; padding: 15px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .nav-brand { color: white; font-weight: 800; font-size: 20px; text-decoration: none; }
        .nav-links { display: flex; gap: 20px; }
        .nav-links a { color: #cbd5e1; text-decoration: none; font-size: 14px; font-weight: 600; transition: color 0.2s; }
        .nav-links a:hover { color: white; }
        .container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
        h1 { color: #0f172a; font-size: 36px; font-weight: 800; text-align: center; margin-bottom: 40px; }
        .case-row { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center; gap: 20px; }
        .case-info { flex: 2; }
        .case-info h3 { color: #0f172a; font-size: 22px; margin: 0 0 10px 0; }
        .case-info p { color: #64748b; font-size: 14px; line-height: 1.6; margin: 0; }
        .case-stat { background: #f0fdf4; border: 1px solid #bbf7d0; padding: 15px 25px; border-radius: 8px; text-align: center; min-width: 150px; }
        .case-stat span { font-size: 11px; text-transform: uppercase; font-weight: 700; color: #166534; }
        .case-stat h4 { font-size: 24px; margin: 5px 0 0 0; color: #166534; font-weight: 800; }
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
        <h1>Nossos Cases de Sucesso</h1>
        
        <div class="case-row">
            <div class="case-info">
                <h3>Mapeamento de Tráfego — Alfa Logística</h3>
                <p>Reestruturação completa de mídia paga focado em atração B2B. Redução drástica do CPL e otimização do funil comercial de prospecção.</p>
            </div>
            <div class="case-stat">
                <span>Redução de CAC</span>
                <h4>-34%</h4>
            </div>
        </div>

        <div class="case-row">
            <div class="case-info">
                <h3>Escalabilidade de Inbound — TechPrime</h3>
                <p>Implementação de rotinas de nutrição de leads integradas com estratégias de SEO orgânico, gerando fluxo estável de oportunidades qualificadas.</p>
            </div>
            <div class="case-stat">
                <span>Crescimento ROI</span>
                <h4>+210%</h4>
            </div>
        </div>
    </div>
</body>
</html>
