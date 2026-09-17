<x-site-layout>
    <x-slot:title>Fale Conosco — Agência 8ou80</x-slot:title>

    <style>
        .container { max-width: 600px; margin: 50px auto; padding: 30px; background: white; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; box-sizing: border-box; width: calc(100% - 40px); }
        h1 { color: #0f172a; font-size: 28px; font-weight: 800; margin: 0 0 10px 0; text-align: center; }
        p { color: #64748b; font-size: 14px; text-align: center; margin-bottom: 30px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; margin-bottom: 20px; }
        .form-group label { font-size: 13px; font-weight: 600; color: #334155; }
        .form-group input, .form-group textarea { border: 1px solid #cbd5e1; padding: 10px 14px; border-radius: 8px; font-size: 14px; color: #1e293b; background: white; width: 100%; box-sizing: border-box; }
        .form-group input:focus, .form-group textarea:focus { border-color: #0f172a; outline: none; }
        .btn-send { background: #0f172a; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: 600; cursor: pointer; font-size: 14px; text-align: center; width: 100%; }
        .btn-send:hover { background: #1e293b; }
    </style>

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
</x-site-layout>
