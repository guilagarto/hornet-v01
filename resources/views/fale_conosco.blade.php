<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fale Conosco — Agência 8ou80</title>
    <style>
        body { font-family: 'Segoe UI', system-ui, sans-serif; background-color: #f8fafc; color: #1e293b; margin: 0; padding: 0; }
        .nav-bar { background: #0f172a; padding: 15px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .nav-brand { color: white; font-weight: 800; font-size: 20px; text-decoration: none; }
        .nav-links { display: flex; gap: 20px; }
        .nav-links a { color: #cbd5e1; text-decoration: none; font-size: 14px; font-weight: 600; transition: color 0.2s; }
        .nav-links a:hover { color: white; }
        .container { max-width: 600px; margin: 50px auto; padding: 30px; background: white; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; }
        h1 { color: #0f172a; font-size: 28px; font-weight: 800; margin: 0 0 10px 0; text-align: center; }
        p { color: #64748b; font-size: 14px; text-align: center; margin-bottom: 30px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; margin-bottom: 20px; }
        .form-group label { font-size: 13px; font-weight: 600; color: #334155; }
        .form-group input, .form-group textarea { border: 1px solid #cbd5e1; padding: 10px 14px; border-radius: 8px; font-size: 14px; }
        .btn-send { background: #0f172a; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: 600; cursor: pointer; font-size: 14px; text-align: center; }
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
        <h1>Fale Conosco</h1>
        <p>Inicie o mapeamento estratégico da sua empresa com o time corporativo da 8ou80.</p>
        <form onsubmit="alert('Obrigado! Mensagem institucional enviada com sucesso.'); return false;">
            <div class="form-group">
                <label>Nome Completo</label>
                <input type="text" placeholder="Ex: Lucas Ramos" required>
            </div>
            <div class="form-group">
                <label>E-mail Corporativo</label>
                <input type="email" placeholder="Ex: lucas@empresa.com" required>
            </div>
            <div class="form-group">
                <label>Mensagem / Briefing Inicial</label>
                <textarea rows="4" placeholder="Conte-nos brevemente sobre seus objetivos de faturamento e canais digitais atuais..." required></textarea>
            </div>
            <button type="submit" class="btn-send">Enviar Mensagem Estratégica</button>
        </form>
    </div>
</body>
</html>
