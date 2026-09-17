import json
import os

def processar_dados():
    # 3.1.1 Dados de Marketing & Empresas
    marketing_data = {
        "empresa": "Hornet Corp",
        "roi": 4.8,
        "leads": 450,
        "custo_captacao": 12.50
    }
    
    # 3.1.2 Financeiro Clientes
    financeiro_clientes = {
        "valor_contrato": 25000.00,
        "faturamento_estimado_mensal": 4166.66,
        "status": "Ativo"
    }
    
    # 3.1.3 Financeiro Pessoal (Simulação de parcelamento automático)
    financeiro_pessoal = {
        "setembro": {"entradas": 5000.00, "saidas": 1200.00, "saldo": 3800.00},
        "outubro": {"entradas": 5000.00, "saidas": 450.00, "saldo": 4550.00},
        "novembro": {"entradas": 5500.00, "saidas": 200.00, "saldo": 5300.00}
    }
    
    relatorio_final = {
        "marketing": marketing_data,
        "clientes": financeiro_clientes,
        "pessoal": financeiro_pessoal
    }
    
    # Salva o arquivo JSON dentro da pasta storage do Laravel
    output_path = os.path.join(os.path.dirname(__file__), '../storage/app/relatorio_hornet.json')
    
    with open(output_path, 'w', encoding='utf-8') as f:
        json.dump(relatorio_final, f, indent=4, ensure_ascii=False)
    
    print("Mapeamento e processamento de dados Python concluído com sucesso!")

if __name__ == "__main__":
    processar_dados()
