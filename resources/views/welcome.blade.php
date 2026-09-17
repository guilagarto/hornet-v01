<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hornet v01</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: min-content;
            height: 100vh;
            margin: 0;
        }
        .card {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
            text-align: center;
            max-width: 500px;
            width: 90%;
        }
        .logo { font-size: 48px; margin-bottom: 10px; }
        h1 { color: #1e3a8a; font-size: 32px; margin: 0 0 10px 0; font-weight: 800; }
        p { color: #4b5563; font-size: 16px; line-height: 1.5; margin-bottom: 30px; }
        .btn-container { display: flex; justify-content: center; gap: 15px; }
        .btn-primary {
            background-color: #4f46e5;
            color: #ffffff;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
            box-shadow: 0 2px 5px rgba(79, 70, 229, 0.3);
        }
        .btn-primary:hover { background-color: #4338ca; }
        .btn-secondary {
            border: 1px solid #d1d5db;
            color: #374151;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-secondary:hover { background-color: #f9fafb; }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">🐝</div>
        <h1>Sistema Hornet v01</h1>
        <p>Plataforma de gestão integrada de marketing analítico, acompanhamento de contratos comerciais e controle de fluxo financeiro pessoal.</p>
        
        @if (Route::has('login'))
            <div class="btn-container">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-primary">Acessar Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn-primary">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-secondary">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body>
</html>
