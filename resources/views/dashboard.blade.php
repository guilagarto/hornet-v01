<x-app-layout>
    <!-- PARTE 1 DE 3: Estilização Geral e Topo com Menu de Usuário Autenticado -->
        <!-- NOVO BLOCO DE ESTILIZAÇÃO INTEGRALMENTE RESPONSIVO -->
    <style>
        .hornet-body { background-color: #f8fafc; font-family: 'Segoe UI', system-ui, sans-serif; padding: 15px; color: #1e293b; min-height: 100vh; box-sizing: border-box; }
        .main-container { max-width: 1400px; margin: 0 auto; display: flex; flex-direction: column; gap: 20px; }
        
        /* Topo Administrativo com Dados do Usuário Adaptável */
        .admin-top-bar { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; background: #ffffff; padding: 15px 20px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border-bottom: 3px solid #e2e8f0; }
        .admin-brand { font-size: 18px; font-weight: 800; color: #0f172a; margin: 0; display: flex; align-items: center; gap: 8px; }
        .user-menu-box { display: flex; align-items: center; flex-wrap: wrap; gap: 15px; }
        .user-badge { display: flex; align-items: center; gap: 8px; background: #f1f5f9; padding: 6px 14px; border-radius: 20px; border: 1px solid #e2e8f0; font-size: 13px; font-weight: 600; color: #334155; }
        .status-dot { width: 8px; height: 8px; background-color: #10b981; border-radius: 50%; display: inline-block; }
        
        .btn-logout-trigger { background: transparent; border: none; color: #ef4444; font-size: 13px; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 4px; padding: 6px 12px; border-radius: 6px; transition: background 0.2s; white-space: nowrap; }
        .btn-logout-trigger:hover { background: #fef2f2; }

        /* Filtro de Ciclo Responsivo */
        .filter-panel { background: white; padding: 15px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
        .filter-form { display: flex; gap: 12px; width: 100%; align-items: center; flex-wrap: wrap; }
        .filter-select-wide { flex: 2; min-width: 200px; }
        .filter-select-small { flex: 1; min-width: 120px; }
        
        /* Grid Mutável: PC = 2 Colunas | Celular = 1 Coluna Unificada */
        .workspace-grid { display: grid; grid-template-cols: 280px 1fr; gap: 20px; margin-top: 5px; }
        .sidebar-menu { background: #ffffff; border-radius: 12px; padding: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); display: flex; flex-direction: column; gap: 6px; height: fit-content; }
        .menu-item { display: flex; align-items: center; gap: 12px; padding: 12px 16px; border-radius: 8px; color: #475569; font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.2s; border: none; background: transparent; text-align: left; font-size: 14px; width: 100%; box-sizing: border-box; }
        .menu-item:hover { background: #f8fafc; color: #0f172a; }
        .menu-item.active { background: #0f172a; color: #ffffff; }
        
        .content-panel { background: #ffffff; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); min-height: 500px; box-sizing: border-box; }
        .section-title { font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0; }
        .section-desc { font-size: 13px; color: #64748b; margin: 0 0 20px 0; }
        
        .form-grid { display: grid; grid-template-cols: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; margin-bottom: 20px; }
        .form-group { display: flex; flex-direction: column; gap: 4px; }
        .form-group.full-width { grid-column: 1 / -1; }
        .form-group label { font-size: 12px; font-weight: 600; color: #334155; }
        .form-group input, .form-group select, .form-group textarea { border: 1px solid #cbd5e1; padding: 10px 12px; border-radius: 8px; font-size: 14px; color: #1e293b; box-sizing: border-box; width: 100%; }
        
        .btn-submit { background: #0f172a; color: #ffffff; border: none; padding: 12px 20px; border-radius: 8px; font-weight: 600; cursor: pointer; font-size: 14px; width: fit-content; }
        .tab-content { display: none; }

        /* 🔥 REGRA DE OURO DA RESPONSIVIDADE: MEDIA QUERY PARA CELULAR */
        @media (max-width: 768px) {
            .workspace-grid { grid-template-cols: 1fr; } /* Transforma o menu lateral e o painel em uma coluna só */
            .admin-top-bar { flex-direction: column; align-items: flex-start; }
            .user-menu-box { width: 100%; justify-content: space-between; }
            .filter-form { flex-direction: column; align-items: stretch; }
            .filter-select-wide, .filter-select-small, .btn-submit { width: 100% !important; }
        }
    </style>


    <div class="hornet-body">
        <div class="main-container">
            
            <!-- Menu Executivo de Topo com Nome e Logout -->
            <div class="admin-top-bar">
                <div class="admin-brand">💼 Módulo Administrativo — 8ou80</div>
                <div class="user-menu-box">
                    <div class="user-badge">
                        <span class="status-dot"></span>
                        <span>Usuário: {{ Auth::user()->name }}</span>
                    </div>
                    <!-- Formulário e Gatilho do Sair (Logout) Oficial do Laravel Breeze -->
                    <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                        @csrf
                        <button type="submit" class="btn-logout-trigger">🚪 Sair (Logout)</button>
                    </form>
                </div>
            </div>

            <!-- Filtro Global de Análise Gerencial -->
            <div class="filter-panel">
                <form action="{{ route('dashboard') }}" method="GET" style="display: flex; gap: 15px; width: 100%; align-items: center; margin:0;">
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
                    <button type="submit" class="btn-submit" style="padding: 8px 16px; background:#475569;">🔍 Filtrar</button>
                </form>
            </div>

            <div class="workspace-grid">
                <div class="sidebar-menu">
                    <button class="menu-item active" onclick="switchTab('tab-clientes')">📁 1. Cadastro de Clientes</button>
                    <button class="menu-item" onclick="switchTab('tab-projetos')">🚀 2. Cadastro de Projetos</button>
                    <button class="menu-item" onclick="switchTab('tab-metricas')">📊 3. Entrada de Métricas</button>
                    <button class="menu-item" onclick="switchTab('tab-metas')">🎯 4. Sistema de Metas</button>
                    <button class="menu-item" onclick="switchTab('tab-dashboard')">🖥️ 5. Dashboard & KPIs</button>
                    <button class="menu-item" onclick="switchTab('tab-diagnostico')">⚠️ 6. Diagnósticos</button>
                    <button class="menu-item" onclick="window.location.href='{{ route('admin.diagnosticos.index') }}'">📊 7. Diagnóstico Leads</button>
                    <button class="menu-item" onclick="switchTab('tab-relatorios')">📋 8. Relatórios</button>
                </div>
                
                <div class="content-panel">
                    @if(session('success'))
                        <div style="background-color: #d1fae5; color: #065f46; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-weight: 600; border: 1px solid #a7f3d0;">
                            ✅ {{ session('success') }}
                        </div>
                    @endif
                    <!-- PARTE 2-A: FORMULÁRIOS DE CADASTRO DE CLIENTES E PROJETOS -->
                    
                    <!-- REQUISITO 2: CADASTRO DE CLIENTE -->
                    <div id="tab-clientes" class="tab-content">
                        <h3 class="section-title">📁 Cadastro de Cliente Corporativo</h3>
                        <p class="section-desc">Insira as informações cadastrais básicas da empresa parceira da 8ou80.</p>
                        <form action="{{ route('admin.clients.store') }}" method="POST">
                            @csrf
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Nome da Empresa</label>
                                    <input type="text" name="name" placeholder="Ex: Nike Brasil" required>
                                </div>
                                <div class="form-group">
                                    <label>Segmento de Atuação</label>
                                    <input type="text" name="segment" placeholder="Ex: Artigos Esportivos" required>
                                </div>
                                <div class="form-group">
                                    <label>Responsável na Empresa</label>
                                    <input type="text" name="responsible" placeholder="Ex: Carlos Silva" required>
                                </div>
                                <div class="form-group">
                                    <label>Contato Direto (E-mail ou WhatsApp)</label>
                                    <input type="text" name="contact" placeholder="Ex: carlos@nike.com" required>
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
                                    <label>Observações Estratégicas</label>
                                    <textarea name="notes" rows="3" placeholder="Particularidades comerciais ou histórico..."></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit">Salvar Cliente no Banco</button>
                        </form>
                    </div>

                    <!-- REQUISITO 3: CADASTRO DE PROJETO -->
                    <div id="tab-projetos" class="tab-content">
                        <h3 class="section-title">🚀 Cadastro de Projeto Estratégico</h3>
                        <p class="section-desc">Vincule e configure uma nova operação para um cliente corporativo ativo.</p>
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
                                    <input type="text" name="name" placeholder="Ex: Performance e Tráfego Pago" required>
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
                                    <textarea name="services_contracted" rows="2" placeholder="Ex: Google Ads e Meta Ads."></textarea>
                                </div>
                                <div class="form-group full-width">
                                    <label>Objetivos de Negócio da Operação</label>
                                    <textarea name="objectives" rows="2" placeholder="Ex: Reduzir o CAC global em 20%."></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit">Salvar Projeto Estratégico</button>
                        </form>
                    </div>
                    <!-- PARTE 2-B1: REQUISITO 4 - FORMULÁRIO DE ENTRADA DE MÉTRICAS -->
                    <div id="tab-metricas" class="tab-content">
                        <h3 class="section-title">📊 Lançamento Periódico de Dados Brutos</h3>
                        <p class="section-desc">Insira as informações brutas colhidas nos canais de marketing para alimentar o cálculo de inteligência de negócios.</p>
                        <form action="{{ route('admin.metrics.store') }}" method="POST">
                            @csrf
                            
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
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mês de Análise</label>
                                    <select name="month" required>
                                        <option value="9" selected>Setembro</option>
                                        <option value="10">Outubro</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Canal / Origem de Tráfego</label>
                                    <select name="channel" required>
                                        <option value="all" selected>Geral Consolidado (All)</option>
                                        <option value="google_ads">Google Ads</option>
                                        <option value="meta_ads">Meta Ads</option>
                                    </select>
                                </div>
                            </div>

                            <div style="display: grid; grid-template-cols: repeat(auto-fit, minmax(290px, 1fr)); gap: 25px;">
                                <div>
                                    <h4 style="font-size: 14px; font-weight: 700; margin: 0 0 12px 0; color: #1e3a8a;">⚗️ Bloco I: Investimento</h4>
                                    <div class="form-group"><label>Total em Marketing (R$)</label><input type="number" name="investment_total" step="0.01" value="0.00" required></div>
                                    <div class="form-group"><label>Em Mídia Paga (R$)</label><input type="number" name="investment_paid_media" step="0.01" value="0.00" required></div>

                                    <h4 style="font-size: 14px; font-weight: 700; margin: 20px 0 12px 0; color: #10b981;">🏁 Bloco II: Aquisição</h4>
                                    <div class="form-group"><label>Visitantes Únicos</label><input type="number" name="visitors" value="0" required></div>
                                    <div class="form-group"><label>Leads Captados</label><input type="number" name="leads" value="0" required></div>
                                    <div class="form-group"><label>Leads Qualificados</label><input type="number" name="leads_qualified" value="0" required></div>
                                    <div class="form-group"><label>Oportunidades</label><input type="number" name="opportunities" value="0" required></div>
                                    <div class="form-group"><label>Clientes Adquiridos</label><input type="number" name="clients_acquired" value="0" required></div>
                                </div>

                                <div>
                                    <h4 style="font-size: 14px; font-weight: 700; margin: 0 0 12px 0; color: #b45309;">📣 Bloco III: Marketing</h4>
                                    <div class="form-group"><label>Alcance</label><input type="number" name="reach" value="0" required></div>
                                    <div class="form-group"><label>Impressões</label><input type="number" name="impressions" value="0" required></div>
                                    <div class="form-group"><label>Cliques</label><input type="number" name="clicks" value="0" required></div>
                                    <div class="form-group"><label>Engajamento</label><input type="number" name="engagement" value="0" required></div>
                                    <div class="form-group"><label>Novos Seguidores</label><input type="number" name="followers" value="0" required></div>

                                    <h4 style="font-size: 14px; font-weight: 700; margin: 20px 0 12px 0; color: #4338ca;">💵 Bloco IV: Faturamento</h4>
                                    <div class="form-group"><label>Receita Gerada (R$)</label><input type="number" name="revenue_generated" step="0.01" value="0.00" required></div>
                                    <div class="form-group"><label>Número de Vendas</label><input type="number" name="sales_count" value="0" required></div>
                                    <div class="form-group"><label>Ticket Médio Manual (R$)</label><input type="number" name="ticket_manual" step="0.01" placeholder="Opcional"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit" style="margin-top: 25px;">Registrar Dados Mensais</button>
                        </form>
                    </div>
                    <!-- PARTE 2-B2: REQUISITO 7 - FORMULÁRIO DO SISTEMA DE METAS -->
                    <div id="tab-metas" class="tab-content">
                        <h3 class="section-title">🎯 Configuração de Metas de Performance</h3>
                        <p class="section-desc">Defina os limiares e objetivos operacionais para cada ciclo. O motor medirá o cumprimento em relação aos dados brutos lançados.</p>
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
                                    <select name="year"><option value="2026">2026</option></select>
                                </div>
                                <div class="form-group">
                                    <label>Mês Alvo</label>
                                    <select name="month"><option value="9">Setembro</option><option value="10">Outubro</option></select>
                                </div>
                            </div>
                            <div class="form-grid">
                                <div class="form-group"><label>Meta de Receita Global (R$)</label><input type="number" name="goal_revenue" step="0.01" placeholder="Ex: 50000.00" required></div>
                                <div class="form-group"><label>Meta de Geração de Leads</label><input type="number" name="goal_leads" placeholder="Ex: 300" required></div>
                                <div class="form-group"><label>Meta de Clientes Adquiridos</label><input type="number" name="goal_clients" placeholder="Ex: 12" required></div>
                                <div class="form-group"><label>CAC Máximo Tolerável (R$)</label><input type="number" name="max_cac" step="0.01" placeholder="Ex: 120.00" required></div>
                                <div class="form-group"><label>ROI Mínimo Esperado (%)</label><input type="number" name="min_roi" step="0.1" placeholder="Ex: 200.0" required></div>
                                <div class="form-group"><label>ROAS Mínimo Desejado</label><input type="number" name="min_roas" step="0.1" placeholder="Ex: 4.0" required></div>
                            </div>
                            <button type="submit" class="btn-submit">Gravar Objetivos de Período</button>
                        </form>
                    </div>
                    <!-- PARTE 3-A: REQUISITO 6 - CENTRAL DE KPIS, EVOLUÇÃO E FUNIL REAL -->
                    <div id="tab-dashboard" class="tab-content">
                        <h3 class="section-title">🖥️ Central de KPIs, Evolução & Funil</h3>
                        <p class="section-desc">Visão consolidada dos resultados analíticos computados pelo sistema em tempo real contra as metas da 8ou80.</p>

                        @if($metric)
                            <!-- Grid de Cards de Alta Gestão -->
                            <div style="display: grid; grid-template-cols: repeat(auto-fit, minmax(180px, 1fr)); gap: 20px; margin-bottom: 30px;">
                                <div style="background: #f0fdf4; border: 1px solid #bbf7d0; padding: 20px; border-radius: 12px;">
                                    <span style="font-size: 11px; text-transform: uppercase; color: #166534; font-weight: 700;">Receita Gerada</span>
                                    <h4 style="font-size: 20px; font-weight: 800; color: #166534; margin: 5px 0 0 0;">R$ {{ number_format($metric->revenue_generated, 2, ',', '.') }}</h4>
                                </div>
                                <div style="background: #eff6ff; border: 1px solid #bfdbfe; padding: 20px; border-radius: 12px;">
                                    <span style="font-size: 11px; text-transform: uppercase; color: #1e40af; font-weight: 700;">Clientes Adquiridos</span>
                                    <h4 style="font-size: 20px; font-weight: 800; color: #1e40af; margin: 5px 0 0 0;">{{ $metric->clients_acquired }}</h4>
                                </div>
                                <div style="background: #fffbeb; border: 1px solid #fde68a; padding: 20px; border-radius: 12px;">
                                    <span style="font-size: 11px; text-transform: uppercase; color: #92400e; font-weight: 700;">CAC Real</span>
                                    <h4 style="font-size: 20px; font-weight: 800; color: #92400e; margin: 5px 0 0 0;">R$ {{ number_format($metric->cac, 2, ',', '.') }}</h4>
                                </div>
                                <div style="background: #faf5ff; border: 1px solid #e9d5ff; padding: 20px; border-radius: 12px;">
                                    <span style="font-size: 11px; text-transform: uppercase; color: #6b21a8; font-weight: 700;">ROAS Atual</span>
                                    <h4 style="font-size: 20px; font-weight: 800; color: #6b21a8; margin: 5px 0 0 0;">{{ number_format($metric->roas, 1, ',', '.') }}x</h4>
                                </div>
                                <div style="background: #fef2f2; border: 1px solid #fca5a5; padding: 20px; border-radius: 12px;">
                                    <span style="font-size: 11px; text-transform: uppercase; color: #991b1b; font-weight: 700;">ROI Líquido</span>
                                    <h4 style="font-size: 20px; font-weight: 800; color: #991b1b; margin: 5px 0 0 0;">{{ number_format($metric->roi, 1, ',', '.') }}%</h4>
                                </div>
                            </div>

                            <!-- Comparativo de Metas e Funil -->
                            <div style="display: grid; grid-template-cols: repeat(auto-fit, minmax(340px, 1fr)); gap: 30px; margin-top: 20px;">
                                <!-- Painel de Cumprimento de Metas -->
                                <div style="border: 1px solid #e2e8f0; padding: 24px; border-radius: 12px; background: #ffffff;">
                                    <h4 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 20px 0;">🎯 Acompanhamento de Metas</h4>
                                    
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

                                <!-- Box de Conversão do Funil -->
                                <div style="border: 1px solid #e2e8f0; padding: 24px; border-radius: 12px; background: #faf5ff; text-align: center; display: flex; flex-direction: column; gap: 15px;">
                                    <h4 style="font-size: 15px; font-weight: 700; color: #0f172a; margin: 0;">📊 Funil de Conversão Comercial</h4>
                                    <div style="display:flex; flex-direction:column; gap:6px; width: 100%;">
                                        <div style="background:#0f172a; color:white; padding:8px; border-radius:6px; font-size:12px; font-weight:700; text-align: left; padding-left: 15px;">👥 Visitantes Únicos: {{ $metric->visitors }}</div>
                                        <div style="background:#1e293b; color:white; padding:8px; border-radius:6px; font-size:12px; font-weight:700; text-align: left; padding-left: 15px; width:90%; margin:0 auto 0 0;">🎯 Leads Gerados: {{ $metric->leads }} ({{ number_format($metric->conversion_visitor_to_lead, 1) }}%)</div>
                                        <div style="background:#334155; color:white; padding:8px; border-radius:6px; font-size:12px; font-weight:700; text-align: left; padding-left: 15px; width:80%; margin:0 auto 0 0;">💼 Oportunidades: {{ $metric->opportunities }} ({{ number_format($metric->conversion_lead_to_opportunity, 1) }}%)</div>
                                        <div style="background:#10b981; color:white; padding:8px; border-radius:6px; font-size:12px; font-weight:700; text-align: left; padding-left: 15px; width:70%; margin:0 auto 0 0;">🤝 Novos Clientes: {{ $metric->clients_acquired }} ({{ number_format($metric->conversion_opportunity_to_client, 1) }}%)</div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div style="background: #f8fafc; padding: 40px; border-radius: 12px; text-align: center; border: 2px dashed #cbd5e1; color: #64748b;">
                                ℹ️ Nenhuma métrica cadastrada para este ciclo. Lance dados brutos na aba "4. Entrada de Métricas" para alimentar a Dashboard.
                            </div>
                        @endif
                    </div>
                    <!-- PARTE 3-B: DIAGNÓSTICOS, RELATÓRIOS E ENGINE JAVASCRIPT MESTRE -->

                    <!-- REQUISITO 8: DIAGNÓSTICO AUTOMÁTICO -->
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
                                🔍 Nenhuma anomalia operacional detectada. O projeto está operando dentro dos limiares normais.
                            </div>
                        @endif
                    </div>

                    <!-- REQUISITO 9: RELATÓRIOS -->
                    <div id="tab-relatorios" class="tab-content">
                        <h3 class="section-title">📋 Emissão de Relatórios Gerenciais</h3>
                        <p class="section-desc">Compilação executiva gerencial pronta para auditoria e acompanhamento estratégico interno.</p>
                        
                        @if($metric)
                            <div style="border: 1px solid #cbd5e1; border-radius: 12px; padding: 24px; background: #ffffff;">
                                <div style="display:flex; justify-content:space-between; border-bottom: 2px solid #0f172a; padding-bottom:10px; margin-bottom:20px;">
                                    <h4 style="margin:0; font-size:18px; font-weight:800; color:#0f172a;">Sumário Executivo: {{ $activeProject?->name }}</h4>
                                    <span style="font-weight:700; color:#64748b;">Ciclo: {{ $selectedMonth }}/{{ $selectedYear }}</span>
                                </div>
                                <div style="display:grid; grid-template-cols: repeat(auto-fit, minmax(220px, 1fr)); gap:20px; font-size:14px;">
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

    <!-- Controle de Abas em JavaScript Nativo Otimizado -->
    <script>
        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(function(el) {
                el.style.display = 'none';
            });
            document.querySelectorAll('.menu-item').forEach(function(el) {
                el.classList.remove('active');
            });
            const selectedContent = document.getElementById(tabId);
            if (selectedContent) {
                selectedContent.style.display = 'block';
            }
            if (event && event.currentTarget) {
                event.currentTarget.classList.add('active');
            }
        }

        // Força a primeira aba a abrir visível por padrão
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.tab-content').forEach(function(el, idx) {
                if (idx === 0) {
                    el.style.display = 'block';
                } else {
                    el.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>
