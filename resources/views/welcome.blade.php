<x-site-layout>
    <x-slot:title>8ou80 — Soluções Digitais & Performance</x-slot:title>

    <style>
        .hero { max-width: 1000px; margin: 80px auto; padding: 0 20px; text-align: center; box-sizing: border-box; }
        .hero h1 { color: #0f172a; font-size: clamp(32px, 5vw, 48px); font-weight: 800; margin: 0 0 20px 0; line-height: 1.2; }
        .hero p { color: #64748b; font-size: clamp(16px, 2vw, 18px); line-height: 1.6; max-width: 700px; margin: 0 auto 40px auto; }
        .btn-cta { background: #0f172a; color: white; padding: 14px 28px; border-radius: 8px; font-weight: 600; text-decoration: none; display: inline-block; box-shadow: 0 4px 6px rgba(15,23,42,0.15); }
    </style>

    <div class="hero">
        <h1>Soluções Digitais Estratégicas de Alta Performance</h1>
        <p>Desenvolvemos ecossistemas web robustos, engenharia de tráfego analítico e automações focadas em métricas reais de faturamento para o seu negócio corporativo.</p>
        <a href="{{ route('fale.conosco') }}" class="btn-cta">Iniciar Mapeamento Estratégico</a>
    </div>
</x-site-layout>
