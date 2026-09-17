<x-app-layout>
    <!-- PARTE 1 DE 5: Estilização do Ecossistema Interno e Topo Executivo -->
    <style>
        .hornet-body { background-color: #f8fafc; font-family: 'Segoe UI', system-ui, sans-serif; padding: 30px; color: #1e293b; }
        .main-container { max-width: 1400px; margin: 0 auto; display: flex; flex-direction: column; gap: 24px; }
        
        /* Cabeçalho Executivo Administrativo */
        .exec-header { display: flex; justify-content: space-between; align-items: center; background: #ffffff; padding: 20px 30px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border-left: 6px solid #0f172a; }
        .exec-title { font-size: 24px; font-weight: 800; color: #0f172a; margin: 0; }
        .agency-badge { background-color: #f1f5f9; color: #334155; padding: 6px 14px; border-radius: 20px; font-size: 13px; font-weight: 600; letter-spacing: 0.5px; border: 1px solid #e2e8f0; }
        
        /* Grid Operacional e Menu Lateral */
        .workspace-grid { display: grid; grid-template-cols: 290px 1fr; gap: 24px; margin-top: 10px; }
        .sidebar-menu { background: #ffffff; border-radius: 12px; padding: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); display: flex; flex-direction: column; gap: 8px; height: fit-content; }
        .menu-item { display: flex; align-items: center; gap: 12px; padding: 12px 16px; border-radius: 8px; color: #475569; font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.2s; border: none; background: transparent; text-align: left; font-size: 14px; width: 100%; }
        .menu-item:hover { background: #f8fafc; color: #0f172a; }
        .menu-item.active { background: #0f172a; color: #ffffff; }

        /* Painel Centralizado de Conteúdo */
        .content-panel { background: #ffffff; border-radius: 12px; padding: 30px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); min-height: 550px; }
        .section-title { font-size: 20px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0; display: flex; align-items: center; gap: 10px; }
        .section-desc { font-size: 14px; color: #64748b; margin: 0 0 24px 0; }

        /* Grid de Formulários e Inputs */
        .form-grid { display: grid; grid-template-cols: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-bottom: 24px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group.full-width { grid-column: 1 / -1; }
        .form-group label { font-size: 13px; font-weight: 600; color: #334155; }
        .form-group input, .form-group select, .form-group textarea { border: 1px solid #cbd5e1; padding: 10px 14px; border-radius: 8px; font-size: 14px; color: #1e293b; background-color: #ffffff; transition: border 0.15s; width: 100%; box-sizing: border-box; }
        .form-group input:focus, .form-group select:focus { border-color: #0f172a; outline: none; box-shadow: 0 0 0 2px rgba(15,23,42,0.05); }
        
        .btn-submit { background: #0f172a; color: #ffffff; border: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; cursor: pointer; transition: background 0.2s; font-size: 14px; display: inline-flex; align-items: center; gap: 8px; width: fit-content; }
        .btn-submit:hover { background: #1e293b; }

        /* Chaves de Visualização Dinâmica */
        .tab-content { display: none; }
        .tab-content.active { display: block; }
    </style>

    <div class="hornet-body">
        <div class="main-container">
            
            <div class="exec-header">
                <h2 class="exec-title">💼 Módulo Interno Administrativo — Agência 8ou80</h2>
                <span class="agency-badge">Painel de Gestão MVP</span>
            </div>
            <!-- PARTE 2 DE 5: Navegação Lateral e Aba de Cadastro de Clientes -->
            <div class="workspace-grid">
                
                <!-- Menu Lateral Baseado no Fluxo de Negócio do Escopo -->
                <div class="sidebar-menu">
                    <button class="menu-item active" onclick="switchTab('tab-clientes')">📁 2. Cadastro de Clientes</button>
                    <button class="menu-item" onclick="switchTab('tab-projetos')">🚀 3. Cadastro de Projetos</button>
                    <button class="menu-item" onclick="switchTab('tab-metricas')">📊 4. Entrada de Métricas</button>
                    <button class="menu-item" onclick="switchTab('tab-metas')">🎯 7. Sistema de Metas</button>
                    <button class="menu-item" onclick="switchTab('tab-dashboard')">🖥️ 6. Dashboard & KPIs</button>
                    <button class="menu-item" onclick="switchTab('tab-diagnostico')">⚠️ 8. Diagnósticos</button>
                    <button class="menu-item" onclick="switchTab('tab-relatorios')">📋 9. Relatórios</button>
                </div>
                
                <!-- Painel de Exibição de Conteúdo Dinâmico -->
                <div class="content-panel">
                    
                    <!-- REQUISITO 2: CADASTRO DE CLIENTE -->
                    <div id="tab-clientes" class="tab-content active">
                        <h3 class="section-title">📁 Cadastro de Cliente Corporativo</h3>
                        <p class="section-desc">Insira as informações cadastrais básicas da empresa parceira da 8ou80. O cliente final não possui acesso a esta área.</p>
                        <form action="#" method="POST">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Nome da Empresa</label>
                                    <input type="text" placeholder="Ex: Alfa Transportes Ltda" required>
                                </div>
                                <div class="form-group">
                                    <label>Segmento de Atuação</label>
                                    <input type="text" placeholder="Ex: Logística / E-commerce" required>
                                </div>
                                <div class="form-group">
                                    <label>Responsável na Empresa (Ponto de Contato)</label>
                                    <input type="text" placeholder="Ex: João Silva" required>
                                </div>
                                <div class="form-group">
                                    <label>Contato Direto (E-mail ou WhatsApp)</label>
                                    <input type="text" placeholder="Ex: joao@alfa.com" required>
                                </div>
                                <div class="form-group">
                                    <label>Status do Cliente</label>
                                    <select>
                                        <option value="active">Ativo (Em Operação)</option>
                                        <option value="inactive">Inativo / Encerrado</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Data de Início do Contrato</label>
                                    <input type="date" required>
                                </div>
                                <div class="form-group full-width">
                                    <label>Observações Estratégicas da Agência</label>
                                    <textarea rows="3" placeholder="Particularidades sobre o tom de voz da marca, restrições contratuais ou histórico comercial..."></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn-submit">Salvar Cliente no Banco</button>
                        </form>
                    </div>
                    <!-- PARTE 3 DE 5: REQUISITO 3 - CADASTRO DE PROJETOS -->
                    <div id="tab-projetos" class="tab-content">
                        <h3 class="section-title">🚀 Cadastro de Projeto Estratégico</h3>
                        <p class="section-desc">Vincule e configure uma nova operação ou campanha para um cliente corporativo ativo da 8ou80.</p>
                        <form action="#" method="POST">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Selecione o Cliente Responsável</label>
                                    <select required>
                                        <option value="">-- Escolha um Cliente Ativo --</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nome Descritivo do Projeto</label>
                                    <input type="text" placeholder="Ex: Performance e Tráfego Black Friday" required>
                                </div>
                                <div class="form-group">
                                    <label>Data de Início das Operações</label>
                                    <input type="date" required>
                                </div>
                                <div class="form-group">
                                    <label>Data Prevista de Encerramento</label>
                                    <input type="date">
                                </div>
                                <div class="form-group">
                                    <label>Investimento Mensal do Contrato (R$)</label>
                                    <input type="number" step="0.01" placeholder="Ex: 4500.00" required>
                                </div>
                                <div class="form-group">
                                    <label>Status Atual da Demanda</label>
                                    <select>
                                        <option value="active">Ativo (Em Execução)</option>
                                        <option value="planning">Em Planejamento Técnico</option>
                                        <option value="paused">Pausado temporariamente</option>
                                        <option value="completed">Concluído / Entregue</option>
                                    </select>
                                </div>
                                <div class="form-group full-width">
                                    <label>Serviços e Escopo Contratados</label>
                                    <textarea rows="2" placeholder="Ex: Gestão de anúncios (Google e Meta Ads), SEO On-page e Otimização de Funil."></textarea>
                                </div>
                                <div class="form-group full-width">
                                    <label>Objetivos de Negócio da Operação</label>
                                    <textarea rows="2" placeholder="Ex: Alavancar o faturamento em 30% e diminuir o Custo por Lead (CPL) do setor logístico."></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn-submit">Salvar Projeto Estratégico</button>
                        </form>
                    </div>
                    <!-- PARTE 4 DE 5: REQUISITO 4 - ENTRADA DE MÉTRICAS POR PERÍODO -->
                    <div id="tab-metricas" class="tab-content">
                        <h3 class="section-title">📊 Auditoria Mensal e Lançamento de Dados Brutos</h3>
                        <p class="section-desc">Insira os resultados obtidos nas auditorias das campanhas para alimentar os cálculos históricos de performance.</p>
                        <form action="#" method="POST">
                            <!-- Seleção de Contexto Cronológico -->
                            <div class="form-grid" style="border-bottom: 1px dashed #cbd5e1; padding-bottom: 20px; margin-bottom: 25px;">
                                <div class="form-group">
                                    <label>Selecione o Projeto Alvo</label>
                                    <select required>
                                        <option value="">-- Escolha o Projeto --</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ano de Referência</label>
                                    <select required>
                                        <option value="2026" selected>2026</option>
                                        <option value="2027">2027</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mês de Análise</label>
                                    <select required>
                                        <option value="1">Janeiro</option><option value="2">Fevereiro</option><option value="3">Março</option>
                                        <option value="4">Abril</option><option value="5">Maio</option><option value="6">Junho</option>
                                        <option value="7">Julho</option><option value="8">Agosto</option><option value="9" selected>Setembro</option>
                                        <option value="10">Outubro</option><option value="11">Novembro</option><option value="12">Dezembro</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Canal / Origem de Tráfego</label>
                                    <select required>
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
                                    <h4 style="font-size: 15px; font-weight: 700; margin: 0 0 15px 0; color: #1e3a8a; border-bottom: 2px solid #e2e8f0; padding-bottom: 5px;">💰 Bloco I: Investimento</h4>
                                    <div class="form-grid" style="grid-template-cols: 1fr; gap: 15px; margin-bottom: 25px;">
                                        <div class="form-group">
                                            <label>Investimento Total em Marketing (R$)</label>
                                            <input type="number" step="0.01" value="0.00" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Investimento Específico em Mídia Paga (R$)</label>
                                            <input type="number" step="0.01" value="0.00" required>
                                        </div>
                                    </div>

                                    <h4 style="font-size: 15px; font-weight: 700; margin: 0 0 15px 0; color: #10b981; border-bottom: 2px solid #e2e8f0; padding-bottom: 5px;">🏁 Bloco II: Aquisição e Funil</h4>
                                    <div class="form-grid" style="grid-template-cols: 1fr 1fr; gap: 15px;">
                                        <div class="form-group"><label>Visitantes Únicos</label><input type="number" value="0" required></div>
                                        <div class="form-group"><label>Leads Captados</label><input type="number" value="0" required></div>
                                        <div class="form-group"><label>Leads Qualificados</label><input type="number" value="0" required></div>
                                        <div class="form-group"><label>Oportunidades</label><input type="number" value="0" required></div>
                                        <div class="form-group full-width"><label>Clientes Adquiridos</label><input type="number" value="0" required></div>
                                    </div>
                                </div>

                                <!-- Coluna Direita: Redes Sociais e Conversão Comercial -->
                                <div>
                                    <h4 style="font-size: 15px; font-weight: 700; margin: 0 0 15px 0; color: #b45309; border-bottom: 2px solid #e2e8f0; padding-bottom: 5px;">📣 Bloco III: Métricas de Marketing</h4>
                                    <div class="form-grid" style="grid-template-cols: 1fr 1fr; gap: 15px; margin-bottom: 25px;">
                                        <div class="form-group"><label>Alcance</label><input type="number" value="0" required></div>
                                        <div class="form-group"><label>Impressões</label><input type="number" value="0" required></div>
                                        <div class="form-group"><label>Cliques</label><input type="number" value="0" required></div>
                                        <div class="form-group"><label>Engajamento</label><input type="number" value="0" required></div>
                                        <div class="form-group full-width"><label>Novos Seguidores</label><input type="number" value="0" required></div>
                                    </div>

                                    <h4 style="font-size: 15px; font-weight: 700; margin: 0 0 15px 0; color: #4338ca; border-bottom: 2px solid #e2e8f0; padding-bottom: 5px;">💵 Bloco IV: Faturamento Atribuído</h4>
                                    <div class="form-grid" style="grid-template-cols: 1fr; gap: 15px;">
                                        <div class="form-group"><label>Receita Gerada no Ciclo (R$)</label><input type="number" step="0.01" value="0.00" required></div>
                                        <div class="form-group"><label>Número Total de Vendas</label><input type="number" value="0" required></div>
                                        <div class="form-group"><label>Ticket Médio Manual (Opcional, R$)</label><input type="number" step="0.01" placeholder="Vazio para cálculo automático"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn-submit" style="margin-top: 25px;">Registrar Dados Mensais</button>
                        </form>
                    </div>
                    <!-- PARTE 5 DE 5: SISTEMA DE METAS, DIAGNÓSTICOS, RELATÓRIOS E SCRIPT DE ABAS -->
                    
                    <!-- REQUISITO 7: SISTEMA DE METAS -->
                    <div id="tab-metas" class="tab-content">
                        <h3 class="section-title">🎯 Configuração de Metas por Projeto</h3>
                        <p class="section-desc">Defina os limiares mínimos e máximos aceitáveis para cada período mensal. O motor de cálculo medirá o percentual de cumprimento.</p>
                        <form action="#" method="POST">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Selecione o Projeto</label>
                                    <select required>
                                        <option value="">-- Escolha o Projeto --</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ano Alvo</label>
                                    <select><option value="2026">2026</option><option value="2027">2027</option></select>
                                </div>
                                <div class="form-group">
                                    <label>Mês Alvo</label>
                                    <select>
                                        <option value="9">Setembro</option><option value="10">Outubro</option><option value="11">Novembro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-grid">
                                <div class="form-group"><label>Meta de Receita Global (R$)</label><input type="number" step="0.01" placeholder="Ex: 50000.00"></div>
                                <div class="form-group"><label>Meta de Geração de Leads</label><input type="number" placeholder="Ex: 300"></div>
                                <div class="form-group"><label>Meta de Clientes Adquiridos</label><input type="number" placeholder="Ex: 12"></div>
                                <div class="form-group"><label>CAC Máximo Tolerável (R$)</label><input type="number" step="0.01" placeholder="Ex: 120.00"></div>
                                <div class="form-group"><label>ROI Mínimo Esperado (%)</label><input type="number" step="0.1" placeholder="Ex: 200.0"></div>
                                <div class="form-group"><label>ROAS Mínimo Desejado</label><input type="number" step="0.1" placeholder="Ex: 4.0"></div>
                            </div>
                            <button type="button" class="btn-submit">Salvar Metas do Período</button>
                        </form>
                    </div>

                    <!-- REQUISITO 6: DASHBOARD DO PROJETO -->
                    <div id="tab-dashboard" class="tab-content">
                        <h3 class="section-title">🖥️ Central de KPIs, Evolução & Funil</h3>
                        <p class="section-desc">Visão consolidada dos resultados computados. Exibição gráfica comparativa contra metas corporativas.</p>
                        <div style="background: #f8fafc; padding: 40px; border-radius: 12px; text-align: center; border: 2px dashed #cbd5e1; color: #64748b;">
                            ℹ️ Selecione um cliente e projeto na barra lateral para carregar o funil histórico e os gráficos de evolução.
                        </div>
                    </div>

                    <!-- REQUISITO 8: DIAGNÓSTICO AUTOMÁTICO -->
                    <div id="tab-diagnostico" class="tab-content">
                        <h3 class="section-title">⚠️ Central de Alertas e Varredura de Performance</h3>
                        <p class="section-desc">Alertas gerados automaticamente com base em cruzamentos matemáticos rígidos extraídos do banco de dados.</p>
                        <div style="background: #f8fafc; padding: 40px; border-radius: 12px; text-align: center; border: 2px dashed #cbd5e1; color: #64748b;">
                            🔍 Sem desvios críticos ou anomalias encontradas para o período selecionado.
                        </div>
                    </div>

                    <!-- REQUISITO 9: RELATÓRIOS -->
                    <div id="tab-relatorios" class="tab-content">
                        <h3 class="section-title">📋 Emissão de Relatórios Gerenciais</h3>
                        <p class="section-desc">Página dedicada à compilação e exportação consolidada de resultados por Cliente, Projeto e Período.</p>
                        <div style="background: #f8fafc; padding: 40px; border-radius: 12px; text-align: center; border: 2px dashed #cbd5e1; color: #64748b;">
                            🖨️ Selecione os filtros cronológicos para gerar o sumário executivo da operação.
                        </div>
                    </div>

                </div> <!-- Fecha .content-panel -->
            </div> <!-- Fecha .workspace-grid -->
            
        </div> <!-- Fecha .main-container -->
    </div> <!-- Fecha .hornet-body -->

    <!-- Controle Inteligente de Abas em JavaScript Nativo -->
    <script>
        function switchTab(tabId) {
            // Varre e oculta todos os blocos de conteúdo de abas
            document.querySelectorAll('.tab-content').forEach(function(el) {
                el.style.display = 'none';
            });
            
            // Remove o destaque de seleção de todos os botões do menu lateral
            document.querySelectorAll('.menu-item').forEach(function(el) {
                el.classList.remove('active');
            });
            
            // Exibe especificamente o container clicado
            const targetContent = document.getElementById(tabId);
            if (targetContent) {
                targetContent.style.display = 'block';
            }
            
            // Aplica o estilo de seleção ao botão clicado
            if (event && event.currentTarget) {
                event.currentTarget.classList.add('active');
            }
        }

        // Garante a inicialização correta exibindo apenas a primeira aba ao entrar na página
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.tab-content').forEach(function(el, index) {
                if (index === 0) {
                    el.style.display = 'block';
                } else {
                    el.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>
