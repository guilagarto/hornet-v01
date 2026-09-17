<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Agência 8ou80' }}</title>
    <style>
        body { font-family: 'Segoe UI', system-ui, sans-serif; background-color: #f8fafc; color: #1e293b; margin: 0; padding: 0; min-height: 100vh; display: flex; flex-direction: column; }
        .main-content { flex: 1; }

        /* 👑 HEADER CORPORATIVO SEGURO */
        .nav-bar { background: #0f172a; padding: 15px 40px; display: flex; justify-content: space-between; align-items: center; position: relative; z-index: 50; }
        .nav-brand { color: white; font-weight: 800; font-size: 22px; text-decoration: none; display: flex; align-items: center; gap: 8px; }
        
        /* Links para Desktop */
        .nav-links-desktop { display: flex; gap: 24px; align-items: center; }
        .nav-links-desktop a { color: #cbd5e1; text-decoration: none; font-size: 14px; font-weight: 600; transition: color 0.2s; }
        .nav-links-desktop a:hover { color: white; }
        
        .btn-auth-primary { background: #3b82f6; color: white !important; padding: 8px 16px; border-radius: 6px; }
        .btn-auth-secondary { border: 1px solid #cbd5e1; padding: 7px 15px; border-radius: 6px; }

        /* 📱 MENU MOBILE DROPDOWN (BLINDADO) */
        .menu-toggle-btn { display: none; background: transparent; border: none; color: white; font-size: 24px; cursor: pointer; }
        .nav-links-mobile { display: none; width: 100%; background: #1e293b; position: absolute; top: 100%; left: 0; padding: 20px; box-sizing: border-box; flex-direction: column; gap: 15px; border-bottom: 3px solid #3b82f6; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .nav-links-mobile a { color: #cbd5e1; text-decoration: none; font-size: 16px; font-weight: 600; padding: 8px 0; border-bottom: 1px solid #334155; }

        /* 🖨️ FOOTER CORPORATIVO UNIFICADO */
        .site-footer { background: #0f172a; padding: 30px 20px; text-align: center; border-top: 1px solid #1e293b; margin-top: auto; }
        .footer-text { color: #94a3b8; font-size: 13px; font-weight: 500; margin: 0; }

        /* Media Query para Telas de Celular */
        @media (max-width: 768px) {
            .nav-bar { padding: 15px 20px; }
            .nav-links-desktop { display: none; }
            .menu-toggle-btn { display: block; }
            .nav-links-mobile.active { display: flex; }
        }
    </style>
</head>
<body>

    <!-- Header Unificado -->
    <nav class="nav-bar">
        <a href="{{ route('home') }}" class="nav-brand">🐝 8ou80</a>
        
        <!-- Menu Desktop -->
        <div class="nav-links-desktop">
            <a href="{{ route('solucoes') }}">Soluções</a>
            <a href="{{ route('cases') }}">Cases</a>
            <a href="{{ route('blog') }}">Blog</a>
            <a href="{{ route('fale.conosco') }}">Fale Conosco</a>
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-auth-primary">Painel ➔</a>
            @else
                <a href="{{ route('login') }}" class="btn-auth-secondary">Entrar</a>
            @endauth
        </div>

        <!-- Botão Hambúrguer para Celular -->
        <button class="menu-toggle-btn" onclick="toggleMobileMenu()">☰</button>

        <!-- Menu Mobile Dropdown -->
        <div id="mobileMenu" class="nav-links-mobile">
            <a href="{{ route('solucoes') }}">Soluções</a>
            <a href="{{ route('cases') }}">Cases</a>
            <a href="{{ route('blog') }}">Blog</a>
            <a href="{{ route('fale.conosco') }}">Fale Conosco</a>
            @auth
                <a href="{{ url('/dashboard') }}" style="color: #3b82f6;">Acessar Painel ➔</a>
            @else
                <a href="{{ route('login') }}">Entrar</a>
            @endauth
        </div>
    </nav>

    <!-- Conteúdo Dinâmico das Páginas -->
    <main class="main-content">
        {{ $slot }}
    </main>

    <!-- Footer Unificado -->
    <footer class="site-footer">
        <p class="footer-text">&copy; {{ date('Y') }} Agência 8ou80. Todos os direitos reservados. Módulo Institucional MVP.</p>
    </footer>

    <!-- Script de Controle do Dropdown Mobile -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
        }
    </script>
</body>
</html>
