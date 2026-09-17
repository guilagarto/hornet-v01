<x-app-layout>
    <!-- PARTE 1 DE 4: Estilização do Ecossistema Interno e Estrutura de Navegação -->
    <style>
        .hornet-body { background-color: #f8fafc; font-family: 'Segoe UI', system-ui, sans-serif; padding: 30px; color: #1e293b; }
        .main-container { max-width: 1400px; margin: 0 auto; display: flex; flex-direction: column; gap: 24px; }
        
        /* Cabeçalho Executivo Administrativo */
        .exec-header { display: flex; justify-content: space-between; align-items: center; background: #ffffff; padding: 20px 30px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border-left: 6px solid #0f172a; }
        .exec-title { font-size: 24px; font-weight: 800; color: #0f172a; margin: 0; }
        .agency-badge { background-color: #f1f5f9; color: #334155; padding: 6px 14px; border-radius: 20px; font-size: 13px; font-weight: 600; letter-spacing: 0.5px; border: 1px solid #e2e8f0; }
        
        /* Grid Principal de Navegação */
        .workspace-grid { display: grid; grid-template-cols: 290px 1fr; gap: 24px; margin-top: 10px; }
        .sidebar-menu { background: #ffffff; border-radius: 12px; padding: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); display: flex; flex-direction: column; gap: 8px; height: fit-content; }
        .menu-item { display: flex; align-items: center; gap: 12px; padding: 12px 16px; border-radius: 8px; color: #475569; font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.2s; border: none; background: transparent; text-align: left; font-size: 14px; width: 100%; }
        .menu-item:hover { background: #f8fafc; color: #0f172a; }
        .menu-item.active { background: #0f172a; color: #ffffff; }

        /* Painel Centralizado de Conteúdo */
        .content-panel { background: #ffffff; border-radius: 12px; padding: 30px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); min-height: 550px; }
        .section-title { font-size: 20px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0; display: flex; align-items: center; gap: 10px; }
        .section-desc { font-size: 14px; color: #64748b; margin: 0 0 24px 0; }

        /* Grid de Formulários e Inputs Modernos */
        .form-grid { display: grid; grid-template-cols: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-bottom: 24px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group.full-width { grid-column: 1 / -1; }
        .form-group label { font-size: 13px; font-weight: 600; color: #334155; }
        .form-group input, .form-group select, .form-group textarea { border: 1px solid #cbd5e1; padding: 10px 14px; border-radius: 8px; font-size: 14px; color: #1e293b; background-color: #ffffff; transition: border 0.15s; width: 100%; box-sizing: border-box; }
        .form-group input:focus, .form-group select:focus { border-color: #0f172a; outline: none; box-shadow: 0 0 0 2px rgba(15,23,42,0.05); }
        
        .btn-submit { background: #0f172a; color: #ffffff; border: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; cursor: pointer; transition: background 0.2s; font-size: 14px; display: inline-flex; align-items: center; gap: 8px; width: fit-content; }
        .btn-submit:hover { background: #1e293b; }

        .tab-content { display: none; }
    </style>

    <div class="hornet-body">
        <div class="main-container">
            
            <div class="exec-header">
                <h2 class="exec-title">💼 Módulo Interno Administrativo — Agência 8ou80</h2>
                <span class="agency-badge">Painel de Gestão MVP</span>
            </div>
                        <!-- Filtro Global de Análise Gerencial -->
            <div style="background: white; padding: 15px 24px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); display: flex; align-items: center; gap: 20px;">
                <form action="{{ route('dashboard') }}" method="GET" style="display: flex; gap: 15px; width: 100%; align-items: center;">
                    <div style="flex: 2;">
                        <select name="project_id" onchange="this.form.submit()" style="border: 1px solid #cbd5e1; padding: 8px 12px; border-radius: 8px; width: 100%; font-size: 14px; font-weight: 600;">
                            <option value="">-- Selecione o Projeto para Analisar Métricas --</option>
                            @foreach($projects as $p)
                                <option value="{{ $p->id }}" {{ $selectedProjectId == $p->id ? 'selected' : '' }}>
                                    💼 {{ $p->client->name }} ➔ {{ $p->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex: 1;">
                        <select name="month" onchange="this.form.submit()" style="border: 1px solid #cbd5e1; padding: 8px 12px; border-radius: 8px; width: 100%; font-size: 14px;">
                            <option value="9" {{ $selectedMonth == 9 ? 'selected' : '' }}>Setembro</option>
                            <option value="10" {{ $selectedMonth == 10 ? 'selected' : '' }}>Outubro</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-submit" style="padding: 8px 16px;">🔍 Filtrar Ciclo</button>
                </form>
            </div>

            <div class="workspace-grid">
                
                <!-- Menu Lateral Unificado -->
                <div class="sidebar-menu">
                    <button class="menu-item active" onclick="switchTab('tab-clientes')">📁 2. Cadastro de Clientes</button>
                    <button class="menu-item" onclick="switchTab('tab-projetos')">🚀 3. Cadastro de Projetos</button>
                    <button class="menu-item" onclick="switchTab('tab-metricas')">📊 4. Entrada de Métricas</button>
                    <button class="menu-item" onclick="switchTab('tab-metas')">🎯 7. Sistema de Metas</button>
                    <button class="menu-item" onclick="switchTab('tab-dashboard')">🖥️ 6. Dashboard & KPIs</button>
                    <button class="menu-item" onclick="switchTab('tab-diagnostico')">⚠️ 8. Diagnósticos</button>
                    <button class="menu-item" onclick="switchTab('tab-relatorios')">📋 9. Relatórios</button>
                </div>
                
                <div class="content-panel">
                    
                    <!-- Feedback de Sucesso do Framework -->
                    @if(session('success'))
                        <div style="background-color: #d1fae5; color: #065f46; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-weight: 600; border: 1px solid #a7f3d0;">
                            ✅ {{ session('success') }}
                        </div>
                    @endif
                    <!-- PARTE 2 DE 4: FORMULÁRIOS DE CLIENTES E PROJETOS CONECTADOS AO CONTROLLER -->
                    
                    <!-- REQUISITO 2: CADASTRO DE CLIENTE -->
                    <div id="tab-clientes" class="tab-content">
                        <h3 class="section-title">📁 Cadastro de Cliente Corporativo</h3>
                        <p class="section-desc">Insira as informações cadastrais básicas da empresa parceira da 8ou80. O cliente final não possui acesso a esta área.</p>
                        <form action="{{ route('admin.clients.store') }}" method="POST">
                            @csrf
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Nome da Empresa</label>
                                    <input type="text" name="name" placeholder="Ex: Alfa Transportes Ltda" required>
                                </div>
                                <div class="form-group">
                                    <label>Segmento de Atuação</label>
                                    <input type="text" name="segment" placeholder="Ex: Logística / E-commerce" required>
                                </div>
                                <div class="form-group">
                                    <label>Responsável na Empresa (Ponto de Contato)</label>
                                    <input type="text" name="responsible" placeholder="Ex: João Silva" required>
                                </div>
                                <div class="form-group">
                                    <label>Contato Direto (E-mail ou WhatsApp)</label>
                                    <input type="text" name="contact" placeholder="Ex: joao@alfa.com" required>
                                </div>
                                <div class="form-group">
                                    <label>Status do Cliente</label>
                                    <select name="status">
                                        <option value="active">Ativo (Em Operação)</option>
                                        <option value="inactive">Inativo / Encerrado</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Data de Início do Contrato</label>
                                    <input type="date" name="start_date" required>
                                </div>
                                <div class="form-group full-width">
                                    <label>Observações Estratégicas da Agência</label>
                                    <textarea name="notes" rows="3" placeholder="Particularidades sobre o tom de voz da marca, restrições contratuais ou histórico comercial..."></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit">Salvar Cliente no Banco</button>
                        </form>
                    </div>

                    <!-- REQUISITO 3: CADASTRO DE PROJETO -->
                    <div id="tab-projetos" class="tab-content">
                        <h3 class="section-title">🚀 Cadastro de Projeto Estratégico</h3>
                        <p class="section-desc">Vincule e configure uma nova operação ou campanha para um cliente corporativo ativo da 8ou80.</p>
                        <form action="{{ route('admin.projects.store') }}" method="POST">
                            @csrf
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Selecione o Cliente Responsável</label>
                                    <select name="client_id" required>
                                        <option value="">-- Escolha um Cliente Ativo --</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nome Descritivo do Projeto</label>
                                    <input type="text" name="name" placeholder="Ex: Performance e Tráfego Black Friday" required>
                                </div>
                                <div class="form-group">
                                    <label>Data de Início das Operações</label>
                                    <input type="date" name="start_date" required>
                                </div>
                                <div class="form-group">
                                    <label>Data Prevista de Encerramento</label>
                                    <input type="date" name="end_date_predicted">
                                </div>
                                <div class="form-group">
                                    <label>Investimento Mensal do Contrato (R$)</label>
                                    <input type="number" name="monthly_investment" step="0.01" placeholder="Ex: 4500.00" required>
                                </div>
                                <div class="form-group">
                                    <label>Status Atual da Demanda</label>
                                    <select name="status">
                                        <option value="active">Ativo (Em Execução)</option>
                                        <option value="planning">Em Planejamento Técnico</option>
                                        <option value="paused">Pausado temporariamente</option>
                                        <option value="completed">Concluído / Entregue</option>
                                    </select>
                                </div>
                                <div class="form-group full-width">
                                    <label>Serviços e Escopo Contratados</label>
                                    <textarea name="services_contracted" rows="2" placeholder="Ex: Gestão de anúncios (Google e Meta Ads), SEO On-page e Otimização de Funil."></textarea>
                                </div>
                                <div class="form-group full-width">
                                    <label>Objetivos de Negócio da Operação</label>
                                    <textarea name="objectives" rows="2" placeholder="Ex: Alavancar o faturamento em 30% e diminuir o Custo por Lead (CPL) do setor logístico."></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit">Salvar Projeto Estratégico</button>
                        </form>
                    </div>
                    <!-- PARTE 3 DE 4: REQUISITO 4 - ENTRADA DE MÉTRICAS MENSAL POR PERÍODO -->
                    <div id="tab-metricas" class="tab-content">
                        <h3 class="section-title">📊 Auditoria Mensal e Lançamento de Dados Brutos</h3>
                        <p class="section-desc">Insira as informações brutas colhidas nos canais. O sistema guardará o histórico cronológico para gerar os KPIs automáticos.</p>
                        <form action="{{ route('admin.metrics.store') }}" method="POST">
                            @csrf
                            <!-- Seleção de Contexto Cronológico -->
                            <div class="form-grid" style="border-bottom: 1px dashed #cbd5e1; padding-bottom: 20px; margin-bottom: 25px;">
                                <div class="form-group">
                                    <label>Selecione o Projeto Alvo</label>
                                    <select name="project_id" required>
                                        <option value="">-- Escolha o Projeto --</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }} ({{ $project->client->name }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ano de Referência</label>
                                    <select name="year" required>
                                        <option value="2026" selected>2026</option>
                                        <option value="2027">2027</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mês de Análise</label>
                                    <select name="month" required>
                                        <option value="1">Janeiro</option><option value="2">Fevereiro</option><option value="3">Março</option>
                                        <option value="4">Abril</option><option value="5">Maio</option><option value="6">Junho</option>
                                        <option value="7">Julho</option><option value="8">Agosto</option><option value="9" selected>Setembro</option>
                                        <option value="10">Outubro</option><option value="11">Novembro</option><option value="12">Dezembro</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Canal / Origem de Tráfego</label>
                                    <select name="channel" required>
                                        <option value="all" selected>Geral Consolidado (All)</option>
                                        <option value="google_ads">Google Ads</option>
                                        <option value="meta_ads">Meta Ads (Facebook/Instagram)</option>
                                        <option value="organic">Orgânico / SEO</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Blocos de Input de Dados Brutos -->
                            <div style="display: grid; grid-template-cols: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
                                <!-- Coluna Esquerda: Financeiro Base e Funil -->
                                <div>
                                    <h4 style="font-size: 15px; font-weight: 700; margin: 0 0 15px 0; color: #1e3a8a; border-bottom: 2px solid #e2e8f0; padding-bottom: 5px;">⚗️ Bloco I: Investimento</h4>
                                    <div class="form-grid" style="grid-template-cols: 1fr; gap: 15px; margin-bottom: 25px;">
                                        <div class="form-group">
                                            <label>Investimento Total em Marketing (R$)</label>
                                            <input type="number" name="investment_total" step="0.01" value="0.00" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Investimento Específico em Mídia Paga (R$)</label>
                                            <input type="number" name="investment_paid_media" step="0.01" value="0.00" required>
                                        </div>
                                    </div>

                                    <h4 style="font-size: 15px; font-weight: 700; margin: 0 0 15px 0; color: #10b981; border-bottom: 2px solid #e2e8f0; padding-bottom: 5px;">🏁 Bloco II: Aquisição e Funil</h4>
                                    <div class="form-grid" style="grid-template-cols: 1fr 1fr; gap: 15px;">
                                        <div class="form-group"><label>Visitantes Únicos</label><input type="number" name="visitors" value="0" required></div>
                                        <div class="form-group"><label>Leads Captados</label><input type="number" name="leads" value="0" required></div>
                                        <div class="form-group"><label>Leads Qualificados</label><input type="number" name="leads_qualified" value="0" required></div>
                                        <div class="form-group"><label>Oportunidades</label><input type="number" name="opportunities" value="0" required></div>
                                        <div class="form-group full-width"><label>Clientes Adquiridos</label><input type="number" name="clients_acquired" value="0" required></div>
                                    </div>
                                </div>

                                <!-- Coluna Direita: Redes Sociais e Conversão Comercial -->
                                <div>
                                    <h4 style="font-size: 15px; font-weight: 700; margin: 0 0 15px 0; color: #b45309; border-bottom: 2px solid #e2e8f0; padding-bottom: 5px;">📣 Bloco III: Métricas de Marketing</h4>
                                    <div class="form-grid" style="grid-template-cols: 1fr 1fr; gap: 15px; margin-bottom: 25px;">
                                        <div class="form-group"><label>Alcance</label><input type="number" name="reach" value="0" required></div>
                                        <div class="form-group"><label>Impressões</label><input type="number" name="impressions" value="0" required></div>
                                        <div class="form-group"><label>Cliques</label><input type="number" name="clicks" value="0" required></div>
                                        <div class="form-group"><label>Engajamento</label><input type="number" name="engagement" value="0" required></div>
                                        <div class="form-group full-width"><label>Novos Seguidores</label><input type="number" name="followers" value="0" required></div>
                                    </div>

                                    <h4 style="font-size: 15px; font-weight: 700; margin: 0 0 15px 0; color: #4338ca; border-bottom: 2px solid #e2e8f0; padding-bottom: 5px;">💵 Bloco IV: Faturamento Atribuído</h4>
                                    <div class="form-grid" style="grid-template-cols: 1fr; gap: 15px;">
                                        <div class="form-group"><label>Receita Gerada no Ciclo (R$)</label><input type="number" name="revenue_generated" step="0.01" value="0.00" required></div>
                                        <div class="form-group"><label>Número Total de Vendas</label><input type="number" name="sales_count" value="0" required></div>
                                        <div class="form-group"><label>Ticket Médio Manual (Opcional, R$)</label><input type="number" name="ticket_manual" step="0.01" placeholder="Vazio para cálculo automático"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit" style="margin-top: 25px;">Registrar Dados Mensais</button>
                        </form>
                    </div>
                    <!-- PARTE 4 DE 4: SISTEMA DE METAS, DIAGNÓSTICOS, RELATÓRIOS E ENGINE DE ABAS -->
                    
                    <!-- REQUISITO 7: SISTEMA DE METAS -->
                    <div id="tab-metas" class="tab-content">
                        <h3 class="section-title">🎯 Configuração de Metas de Performance</h3>
                        <p class="section-desc">Defina as metas e limiares operacionais para cada ciclo. O motor de cálculo medirá o percentual de cumprimento em relação aos dados brutos lançados.</p>
                        <form action="{{ route('admin.goals.store') }}" method="POST">
                            @csrf
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Selecione o Projeto</label>
                                    <select name="project_id" required>
                                        <option value="">-- Escolha o Projeto --</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }} ({{ $project->client->name }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ano Alvo</label>
                                    <select name="year"><option value="2026">2026</option><option value="2027">2027</option></select>
                                </div>
                                <div class="form-group">
                                    <label>Mês Alvo</label>
                                    <select name="month">
                                        <option value="1">Janeiro</option><option value="2">Fevereiro</option><option value="3">Março</option>
                                        <option value="4">Abril</option><option value="5">Maio</option><option value="6">Junho</option>
                                        <option value="7">Julho</option><option value="8">Agosto</option><option value="9" selected>Setembro</option>
                                        <option value="10">Outubro</option><option value="11">Novembro</option><option value="12">Dezembro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-grid">
                                <div class="form-group"><label>Meta de Receita Global (R$)</label><input type="number" name="goal_revenue" step="0.01" placeholder="Ex: 50000.00"></div>
                                <div class="form-group"><label>Meta de Geração de Leads</label><input type="number" name="goal_leads" placeholder="Ex: 300"></div>
                                <div class="form-group"><label>Meta de Clientes Adquiridos</label><input type="number" name="goal_clients" placeholder="Ex: 12"></div>
                                <div class="form-group"><label>CAC Máximo Tolerável (R$)</label><input type="number" name="max_cac" step="0.01" placeholder="Ex: 120.00"></div>
                                <div class="form-group"><label>ROI Mínimo Esperado (%)</label><input type="number" name="min_roi" step="0.1" placeholder="Ex: 200.0"></div>
                                <div class="form-group"><label>ROAS Mínimo Desejado</label><input type="number" name="min_roas" step="0.1" placeholder="Ex: 4.0"></div>
                            </div>
                            <button type="submit" class="btn-submit">Gravar Objetivos de Período</button>
                        </form>
                    </div>

                    <!-- REQUISITO 6: DASHBOARD DO PROJETO -->
                                        <!-- PARTE 2: REQUISITO 6 - CENTRAL DE KPIS, EVOLUÇÃO E FUNIL REAL -->
                    <div id="tab-dashboard" class="tab-content">
                        <h3 class="section-title">🖥️ Central de KPIs, Evolução & Funil</h3>
                        <p class="section-desc">Visão consolidada dos resultados analíticos computados pelo sistema em tempo real contra as metas da 8ou80.</p>

                        @if($metric)
                            <!-- Grid de Cards de Alta Gestão -->
                            <div style="display: grid; grid-template-cols: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
                                <div style="background: #f0fdf4; border: 1px solid #bbf7d0; padding: 20px; border-radius: 12px; text-center: left;">
                                    <span style="font-size: 11px; text-transform: uppercase; color: #166534; font-weight: 700; tracking-wider: 0.5px;">Receita Gerada</span>
                                    <h4 style="font-size: 22px; font-weight: 800; color: #166534; margin: 5px 0 0 0;">R$ {{ number_format($metric->revenue_generated, 2, ',', '.') }}</h4>
                                </div>
                                <div style="background: #eff6ff; border: 1px solid #bfdbfe; padding: 20px; border-radius: 12px; text-center: left;">
                                    <span style="font-size: 11px; text-transform: uppercase; color: #1e40af; font-weight: 700; tracking-wider: 0.5px;">Clientes Adquiridos</span>
                                    <h4 style="font-size: 22px; font-weight: 800; color: #1e40af; margin: 5px 0 0 0;">{{ $metric->clients_acquired }}</h4>
                                </div>
                                <div style="background: #fffbeb; border: 1px solid #fde68a; padding: 20px; border-radius: 12px; text-center: left;">
                                    <span style="font-size: 11px; text-transform: uppercase; color: #92400e; font-weight: 700; tracking-wider: 0.5px;">CAC Real Computado</span>
                                    <h4 style="font-size: 22px; font-weight: 800; color: #92400e; margin: 5px 0 0 0;">R$ {{ number_format($metric->cac, 2, ',', '.') }}</h4>
                                </div>
                                <div style="background: #faf5ff; border: 1px solid #e9d5ff; padding: 20px; border-radius: 12px; text-center: left;">
                                    <span style="font-size: 11px; text-transform: uppercase; color: #6b21a8; font-weight: 700; tracking-wider: 0.5px;">ROAS Atual</span>
                                    <h4 style="font-size: 22px; font-weight: 800; color: #6b21a8; margin: 5px 0 0 0;">{{ number_format($metric->roas, 1, ',', '.') }}x</h4>
                                </div>
                                <div style="background: #fef2f2; border: 1px solid #fca5a5; padding: 20px; border-radius: 12px; text-center: left;">
                                    <span style="font-size: 11px; text-transform: uppercase; color: #991b1b; font-weight: 700; tracking-wider: 0.5px;">ROI Líquido</span>
                                    <h4 style="font-size: 22px; font-weight: 800; color: #991b1b; margin: 5px 0 0 0;">{{ number_format($metric->roi, 1, ',', '.') }}%</h4>
                                </div>
                            </div>

                            <!-- Comparativo de Metas e Gráficos -->
                            <div style="display: grid; grid-template-cols: 1fr 1fr; gap: 30px; margin-top: 20px;">
                                <!-- Painel de Cumprimento Técnico -->
                                <div style="border: 1px solid #e2e8f0; padding: 24px; border-radius: 12px; background: #ffffff;">
                                    <h4 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 20px 0;">🎯 Acompanhamento de Metas de Período</h4>
                                    
                                    <div style="margin-bottom: 15px;">
                                        <div style="display:flex; justify-content:space-between; font-size:13px; font-weight:600; margin-bottom:5px;">
                                            <span>Meta de Receita</span>
                                            <span>{{ number_format($cumprimentoMetas['receita'], 1) }}%</span>
                                        </div>
                                        <div style="width:100%; background:#f1f5f9; height:10px; border-radius:5px; overflow:hidden;">
                                            <div style="width: {{ min($cumprimentoMetas['receita'], 100) }}%; background:#10b981; height:100%;"></div>
                                        </div>
                                    </div>

                                    <div style="margin-bottom: 15px;">
                                        <div style="display:flex; justify-content:space-between; font-size:13px; font-weight:600; margin-bottom:5px;">
                                            <span>Meta de Leads</span>
                                            <span>{{ number_format($cumprimentoMetas['leads'], 1) }}%</span>
                                        </div>
                                        <div style="width:100%; background:#f1f5f9; height:10px; border-radius:5px; overflow:hidden;">
                                            <div style="width: {{ min($cumprimentoMetas['leads'], 100) }}%; background:#3b82f6; height:100%;"></div>
                                        </div>
                                    </div>

                                    <div>
                                        <div style="display:flex; justify-content:space-between; font-size:13px; font-weight:600; margin-bottom:5px;">
                                            <span>Meta de Clientes</span>
                                            <span>{{ number_format($cumprimentoMetas['clientes'], 1) }}%</span>
                                        </div>
                                        <div style="width:100%; background:#f1f5f9; height:10px; border-radius:5px; overflow:hidden;">
                                            <div style="width: {{ min($cumprimentoMetas['clientes'], 100) }}%; background:#f59e0b; height:100%;"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Box de Renderização Gráfica -->
                                <div style="border: 1px solid #e2e8f0; padding: 24px; border-radius: 12px; background: #faf5ff; text-align: center;">
                                    <h4 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 15px 0;">📊 Funil de Conversão Comercial</h4>
                                    <div style="display:flex; flex-direction:column; gap:8px; max-width:320px; margin: 0 auto;">
                                        <div style="background:#0f172a; color:white; padding:8px; border-radius:6px; font-size:12px; font-weight:700;">👥 Visitantes: {{ $metric->visitors }}</div>
                                        <div style="background:#1e293b; color:white; padding:8px; border-radius:6px; font-size:12px; font-weight:700; width:85%; margin:0 auto;">🎯 Leads: {{ $metric->leads }} ({{ number_format($metric->conversion_visitor_to_lead, 1) }}%)</div>
                                        <div style="background:#334155; color:white; padding:8px; border-radius:6px; font-size:12px; font-weight:700; width:70%; margin:0 auto;">💼 Oportunidades: {{ $metric->opportunities }} ({{ number_format($metric->conversion_lead_to_opportunity, 1) }}%)</div>
                                        <div style="background:#10b981; color:white; padding:8px; border-radius:6px; font-size:12px; font-weight:700; width:55%; margin:0 auto;">🤝 Clientes: {{ $metric->clients_acquired }} ({{ number_format($metric->conversion_opportunity_to_client, 1) }}%)</div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div style="background: #f8fafc; padding: 40px; border-radius: 12px; text-align: center; border: 2px dashed #cbd5e1; color: #64748b;">
                                ℹ️ Nenhuma métrica ou dado bruto cadastrado para este projeto no ciclo selecionado. Acesse a aba "4. Entrada de Métricas" para alimentar o sistema.
                            </div>
                        @endif
                    </div>


                    <!-- REQUISITO 8: DIAGNÓSTICO AUTOMÁTICO -->
                                        <!-- PARTE 3: REQUISITO 8 - CENTRAL DE ALERTAS E VARREDURA DE PERFORMANCE -->
                                       <!-- REQUISITO 8: CENTRAL DE ALERTAS E DIAGNÓSTICO AUTOMÁTICO -->
                    <div id="tab-diagnostico" class="tab-content">
                        <h3 class="section-title">⚠️ Central de Alertas e Varredura Algorítmica</h3>
                        <p class="section-desc">Auditorias lógicas automáticas realizadas com base no cruzamento de dados históricos reais cadastrados no MySQL.</p>
                        
                        @if(isset($alerts) && count($alerts) > 0)
                            <div style="display: flex; flex-direction: column; gap: 15px;">
                                @foreach($alerts as $alert)
                                    <div style="padding: 16px 20px; border-radius: 8px; font-size: 14px; font-weight: 600; line-height: 1.5; display: flex; align-items: center; gap: 12px; border: 1px solid; 
                                        {{ $alert['type'] == 'danger' ? 'background-color: #fef2f2; color: #991b1b; border-color: #fca5a5;' : '' }}
                                        {{ $alert['type'] == 'warning' ? 'background-color: #fffbeb; color: #92400e; border-color: #fde68a;' : '' }}
                                        {{ $alert['type'] == 'success' ? 'background-color: #f0fdf4; color: #166534; border-color: #bbf7d0;' : '' }}">
                                        <span>{{ $alert['type'] == 'danger' ? '🚨' : ($alert['type'] == 'warning' ? '⚠️' : '✨') }}</span>
                                        <div>{{ $alert['message'] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div style="background: #f8fafc; padding: 40px; border-radius: 12px; text-align: center; border: 2px dashed #cbd5e1; color: #64748b;">
                                🔍 Nenhuma anomalia operacional detectada. O projeto está operando dentro dos limiares normais ou não possui metas/métricas cruzadas para este ciclo.
                            </div>
                        @endif
                    </div>



                    <!-- REQUISITO 9: RELATÓRIOS -->
                                        <!-- REQUISITO 9: EMISSÃO DE RELATÓRIOS CONSOLIDADOS -->
                    <div id="tab-relatorios" class="tab-content">
                        <h3 class="section-title">📋 Emissão de Relatórios Gerenciais</h3>
                        <p class="section-desc">Compilação executiva gerencial pronta para auditoria e acompanhamento estratégico interno.</p>
                        
                        @if($metric)
                            <div style="border: 1px solid #cbd5e1; border-radius: 12px; padding: 24px; background: #ffffff;">
                                <div style="display:flex; justify-content:space-between; border-bottom: 2px solid #0f172a; padding-bottom:10px; margin-bottom:20px;">
                                    <h4 style="margin:0; font-size:18px; font-weight:800; color:#0f172a;">Sumário Executivo: {{ $activeProject?->name }}</h4>
                                    <span style="font-weight:700; color:#64748b;">Ciclo: {{ $selectedMonth }}/{{ $selectedYear }}</span>
                                </div>
                                <div style="display:grid; grid-template-cols: 1fr 1fr; gap:20px; font-size:14px;">
                                    <p><strong>Cliente Corporativo:</strong> {{ $activeProject?->client?->name }}</p>
                                    <p><strong>CPL Calculado:</strong> R$ {{ number_format($metric->cpl, 2, ',', '.') }}</p>
                                    <p><strong>Faturamento Obtido:</strong> R$ {{ number_format($metric->revenue_generated, 2, ',', '.') }}</p>
                                    <p><strong>CAC Apurado:</strong> R$ {{ number_format($metric->cac, 2, ',', '.') }}</p>
                                    <p><strong>ROAS Mídia Paga:</strong> {{ number_format($metric->roas, 1) }}x</p>
                                    <p><strong>ROI Final:</strong> {{ number_format($metric->roi, 1) }}%</p>
                                </div>
                                <button onclick="window.print()" class="btn-submit" style="margin-top:20px; background:#475569;">🖨️ Imprimir Relatório Executivo</button>
                            </div>
                        @else
                            <div style="background: #f8fafc; padding: 40px; border-radius: 12px; text-align: center; border: 2px dashed #cbd5e1; color: #64748b;">
                                🖨️ Escolha um projeto ativo com dados mensais lançados para emitir o relatório consolidado.
                            </div>
                        @endif
                    </div>


                </div> <!-- Fecha .content-panel -->
            </div> <!-- Fecha .workspace-grid -->
            
        </div> <!-- Fecha .main-container -->
    </div> <!-- Fecha .hornet-body -->

    <!-- Engenharia JavaScript Nativa de Controle de Exibição das Abas -->
    <script>
        function switchTab(tabId) {
            // Seleciona e esconde rigidamente todos os containers de conteúdo
            document.querySelectorAll('.tab-content').forEach(function(el) {
                el.style.display = 'none';
            });
            
            // Localiza todos os botões laterais e limpa a marcação de seleção ativa
            document.querySelectorAll('.menu-item').forEach(function(el) {
                el.classList.remove('active');
            });
            
            // Aplica a exibição de bloco exclusivamente na aba alvo clicada
            const selectedContent = document.getElementById(tabId);
            if (selectedContent) {
                selectedContent.style.display = 'block';
            }
            
            // Identifica o botão clicado no evento atual e insere o estilo escuro ativo
            if (event && event.currentTarget) {
                event.currentTarget.classList.add('active');
            }
        }

        // Script de inicialização automática ao carregar a janela do navegador
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.tab-content').forEach(function(el, idx) {
                // Força apenas a primeiríssima aba (Cadastro de Clientes) a iniciar como visível
                if (idx === 0) {
                    el.style.display = 'block';
                } else {
                    el.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>
