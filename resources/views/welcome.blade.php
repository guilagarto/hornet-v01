<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>8ou80 — Soluções Digitais & Marketing Analítico</title>
    <style>
        body { font-family: 'Segoe UI', system-ui, sans-serif; background-color: #f8fafc; color: #1e293b; margin: 0; padding: 0; }
        
        /* Menu de Navegação Superior */
        .nav-bar { background: #0f172a; padding: 15px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .nav-brand { color: white; font-weight: 800; font-size: 22px; text-decoration: none; display: flex; align-items: center; gap: 8px; }
        .nav-links { display: flex; gap: 24px; align-items: center; }
        .nav-links a { color: #cbd5e1; text-decoration: none; font-size: 14px; font-weight: 600; transition: color 0.2s; }
        .nav-links a:hover { color: white; }
        
        /* Botões de Acesso */
        .btn-auth-primary { background: #3b82f6; color: white !important; padding: 8px 16px; border-radius: 6px; transition: background 0.2s; }
        .btn-auth-primary:hover { background: #2563eb; }
        .btn-auth-secondary { border: 1px solid #cbd5e1; padding: 7px 15px; border-radius: 6px; }

        /* Hero Section */
        .hero { max-width: 1000px; margin: 100px auto; padding: 0 20px; text-align: center; }
        .hero h1 { color: #0f172a; font-size: 48px; font-weight: 800; margin: 0 0 20px 0; line-height: 1.2; }
        .hero p { color: #64748b; font-size: 18px; line-height: 1.6; max-width: 700px; margin: 0 auto 40px auto; }
        
        .cta-container { display: flex; justify-content: center; gap: 15px; }
        .btn-cta { background: #0f172a; color: white; padding: 14px 28px; border-radius: 8px; font-weight: 600; text-decoration: none; box-shadow: 0 4px 6px rgba(15,23,42,0.15); transition: background 0.2s; }
        .btn-cta:hover { background: #1e293b; }
    </style>
</head>
<body>
    
    <!-- Menu Institucional -->
    <div class="nav-bar">
        <a href="{{ route('home') }}" class="nav-brand">🐝 8ou80</a>
        <div class="nav-links">
            <a href="{{ route('solucoes') }}">Soluções</a>
            <a href="{{ route('cases') }}">Cases</a>
            <a href="{{ route('blog') }}">Blog</a>
            <a href="{{ route('fale.conosco') }}">Fale Conosco</a>
            
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-auth-primary">Acessar Painel ➔</a>
                @else
                    <a href="{{ route('login') }}" class="btn-auth-secondary">Entrar</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-auth-primary">Cadastrar</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <!-- Seção Hero Central -->
    <div class="hero">
        <h1>Soluções Digitais Estratégicas de Alta Performance</h1>
        <p>Desenvolvemos ecossistemas web robustos, engenharia de tráfego analítico e automações focadas em métricas reais de faturamento para o seu negócio corporativo.</p>
        <div class="cta-container">
            <a href="{{ route('fale.conosco') }}" class="btn-cta">Iniciar Mapeamento Estratégico</a>
        </div>
    </div>

</body>
</html>
