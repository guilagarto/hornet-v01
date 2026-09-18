<x-app-layout>
    <div class="diagnostico-container" style="padding: 40px 20px; max-width: 800px; margin: 0 auto;">
        <h2>Diagnóstico 8ou80</h2>
        <p class="subtitle">Descubra qual solução faz sentido para o seu negócio.</p>

        <form action="{{ route('diagnostico.processar') }}" method="POST" class="diagnostico-form">
            @csrf

            <!-- Dados Pessoais / Corporativos -->
            <fieldset style="margin-bottom: 20px; border: 1px solid #ccc; padding: 20px; border-radius: 8px;">
                <legend style="padding: 0 10px; font-weight: bold;">Informações de Contato</legend>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="nome" style="display:block; margin-bottom:5px;">Seu Nome *</label>
                    <input type="text" name="nome" id="nome" required value="{{ old('nome') }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                </div>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="email" style="display:block; margin-bottom:5px;">E-mail Corporativo *</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                </div>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="whatsapp" style="display:block; margin-bottom:5px;">WhatsApp / Telefone *</label>
                    <input type="text" name="whatsapp" id="whatsapp" required value="{{ old('whatsapp') }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                </div>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="empresa" style="display:block; margin-bottom:5px;">Nome da Empresa</label>
                    <input type="text" name="empresa" id="empresa" value="{{ old('empresa') }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                </div>
            </fieldset>

            <!-- Perguntas do Perfil -->
            <fieldset style="margin-bottom: 20px; border: 1px solid #ccc; padding: 20px; border-radius: 8px;">
                <legend style="padding: 0 10px; font-weight: bold;">Sobre o seu Negócio</legend>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px;">1. Qual é o seu tipo de negócio?</label>
                    <select name="tipo_negocio" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                        <option value="Comércio">Comércio</option>
                        <option value="Prestação de serviços">Prestação de serviços</option>
                        <option value="Profissional autônomo">Profissional autônomo</option>
                        <option value="E-commerce">E-commerce</option>
                        <option value="Empresa B2B">Empresa B2B</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px;">2. Como você vende atualmente?</label>
                    <select name="canal_venda" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                        <option value="Loja física">Loja física</option>
                        <option value="WhatsApp">WhatsApp</option>
                        <option value="Site">Site</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Marketplace">Marketplace</option>
                        <option value="Vários canais">Vários canais</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px;">3. O que você mais deseja neste momento?</label>
                    <select name="objetivo" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                        <option value="Conseguir mais clientes">Conseguir mais clientes</option>
                        <option value="Aumentar vendas">Aumentar vendas</option>
                        <option value="Melhorar presença digital">Melhorar presença digital</option>
                        <option value="Criar um site">Criar um site</option>
                        <option value="Divulgar um serviço">Divulgar um serviço</option>
                        <option value="Melhorar os resultados dos anúncios">Melhorar os resultados dos anúncios</option>
                        <option value="Organizar o marketing">Organizar o marketing</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px;">4. Situação atual: Você possui site?</label>
                    <select name="possui_site" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                        <option value="Está desatualizado">Está desatualizado</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px;">5. Já anuncia no Google?</label>
                    <select name="anuncia_google" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                        <option value="Já anunciei anteriormente">Já anunciei anteriormente</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px;">6. Você recebe contatos pela internet?</label>
                    <select name="recebe_contatos" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                        <option value="Sim, regularmente">Sim, regularmente</option>
                        <option value="Alguns">Alguns</option>
                        <option value="Poucos">Poucos</option>
                        <option value="Praticamente nenhum">Praticamente nenhum</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px;">7. Possui Google Perfil da Empresa?</label>
                    <select name="google_perfil" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                        <option value="Não sei">Não sei</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px;">8. O que representa uma conversão para seu negócio?</label>
                    <select name="conversao_representa" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                        <option value="WhatsApp">WhatsApp</option>
                        <option value="Ligação">Ligação</option>
                        <option value="Formulário">Formulário</option>
                        <option value="Agendamento">Agendamento</option>
                        <option value="Venda online">Venda online</option>
                        <option value="Visita à loja">Visita à loja</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom:5px;">9. Qual é aproximadamente o valor médio de uma venda/contratação?</label>
                    <select name="valor_medio" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
                        <option value="Até R$ 100">Até R$ 100</option>
                        <option value="R$ 100–500">R$ 100–500</option>
                        <option value="R$ 500–1.000">R$ 500–1.000</option>
                        <option value="R$ 1.000–5.000">R$ 1.000–5.000</option>
                        <option value="Acima de R$ 5.000">Acima de R$ 5.000</option>
                    </select>
                </div>
            </fieldset>

            <button type="submit" class="btn-submit" style="background-color: #111827; color: white; padding: 12px 24px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; width: 100%;">
                Gerar Meu Diagnóstico 🚀
            </button>
        </form>
    </div>
</x-app-layout>
