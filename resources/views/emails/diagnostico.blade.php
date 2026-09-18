# Diagnóstico Digital Executado - 8ou80

Olá **{{ $dados['nome'] }}**, segue o resumo do mapeamento estratégico realizado para a empresa **{{ $dados['empresa'] ?? 'Não informada' }}**.

### Dados do Lead:
- **WhatsApp:** {{ $dados['whatsapp'] }}
- **E-mail:** {{ $dados['email'] }}

---

### Proposta Comercial Recomendada:
## {{ $pacote_sugerido['titulo'] }}

**Diagnóstico:**
{{ $pacote_sugerido['descricao'] }}

**O que inclui:**
@foreach($pacote_sugerido['itens'] as $item)
- {{ $item }}
@endforeach

**Investimento:** {{ $pacote_sugerido['investimento'] }}

---
Nossa equipe entrará em contato em breve para detalhar este plano estratégico.
