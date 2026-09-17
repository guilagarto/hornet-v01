<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrar — Agência 8ou80</title>
    <!-- Estilização Interna Blindada Corporativa (Independente de Compilador ou Internet) -->
    <style>
        body { background-color: #f8fafc; font-family: 'Segoe UI', system-ui, sans-serif; color: #1e293b; margin: 0; padding: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center; box-sizing: border-box; }
        .login-card { background: #ffffff; width: 100%; max-width: 420px; padding: 40px; border-radius: 12px; box-shadow: 0 4px 6px rgba(15,23,42,0.05), 0 1px 3px rgba(0,0,0,0.03); border: 1px solid #e2e8f0; box-sizing: border-box; }
        .brand-section { text-align: center; margin-bottom: 32px; }
        .brand-logo { font-size: 24px; font-weight: 900; color: #0f172a; text-decoration: none; display: inline-block; margin-bottom: 6px; }
        .brand-subtitle { font-size: 13px; color: #64748b; margin: 0; font-weight: 500; }
        .form-group { display: flex; flex-direction: column; gap: 6px; margin-bottom: 20px; }
        .form-group label { font-size: 11px; font-weight: 700; uppercase; text-transform: uppercase; letter-spacing: 0.5px; color: #475569; }
        .form-group input { border: 1px solid #cbd5e1; padding: 11px 14px; border-radius: 8px; font-size: 14px; color: #1e293b; width: 100%; box-sizing: border-box; background: #ffffff; transition: border-color 0.15s; }
        .form-group input:focus { border-color: #0f172a; outline: none; }
        .remember-box { display: flex; align-items: center; gap: 8px; margin-bottom: 24px; }
        .remember-box label { font-size: 14px; color: #334155; font-weight: 500; cursor: pointer; }
        .btn-login-submit { background: #0f172a; color: #ffffff; border: none; padding: 14px; border-radius: 8px; font-weight: 700; cursor: pointer; font-size: 14px; width: 100%; text-align: center; box-shadow: 0 1px 2px rgba(0,0,0,0.05); transition: background 0.2s; }
        .btn-login-submit:hover { background: #1e293b; }
        .footer-link { text-align: center; margin-top: 24px; border-top: 1px solid #f1f5f9; padding-top: 16px; }
        .footer-link a { font-size: 12px; font-weight: 700; color: #64748b; text-decoration: none; transition: color 0.15s; }
        .footer-link a:hover { color: #0f172a; }
        .error-alert { background-color: #fef2f2; border: 1px solid #fca5a5; color: #991b1b; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-size: 13px; font-weight: 600; list-style: none; }
        .error-alert ul { margin: 0; padding: 0; list-style: none; }
    </style>
</head>
<body>

    <div class="login-card">
        
        <!-- Topo com Identidade Visual -->
        <div class="brand-section">
            <a href="{{ route('home') }}" class="brand-logo">🐝 8ou80</a>
            <p class="brand-subtitle">Módulo Interno Administrativo</p>
        </div>

        <!-- Alertas Nativos de Erro do Framework (Senha Incorreta, etc) -->
        @if ($errors->any())
            <div class="error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário Estruturado -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- E-mail -->
            <div class="form-group">
                <label for="email">E-mail Corporativo</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="seu@email.com">
            </div>

            <!-- Senha -->
            <div class="form-group">
                <label for="password">Senha de Acesso</label>
                <input id="password" type="password" name="password" required placeholder="••••••••">
            </div>

            <!-- Lembrar Me -->
            <div class="remember-box">
                <input id="remember_me" type="checkbox" name="remember" style="width: auto; cursor: pointer;">
                <label for="remember_me">Lembrar de mim</label>
            </div>

            <!-- Botão Entrar -->
            <button type="submit" class="btn-login-submit">
                Entrar no Sistema
            </button>
        </form>

        <!-- Link Voltar -->
        <div class="footer-link">
            <a href="{{ route('home') }}">➔ Voltar para a Página Inicial</a>
        </div>
    </div>

</body>
</html>
