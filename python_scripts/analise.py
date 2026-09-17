import mysql.connector
import matplotlib.pyplot as plt
import os

def processar_analise():
    try:
        # 1. Conexão com o Banco de Dados do Laravel (Configurações locais padrão)
        db = mysql.connector.connect(
            host="127.0.0.1",
            user="root",
            password="",
            database="hornet_db" # Nome do seu banco do XAMPP local
        )
        cursor = db.cursor(dictionary=True)
        
        # 2. Busca o último projeto com métricas e metas cadastradas no MySQL
        cursor.execute("""
            SELECT p.name as projeto, m.revenue_generated, g.goal_revenue, m.leads, g.goal_leads
            FROM projects p
            JOIN project_metrics m ON p.id = m.project_id
            JOIN project_goals g ON p.id = g.project_id AND m.year = g.year AND m.month = g.month
            ORDER BY m.id DESC LIMIT 1
        """)
        dados = cursor.fetchone()
        
        if not dados:
            print("Nenhum dado cruzado encontrado para analisar.")
            return

        # 3. Processamento estatístico e plotagem do Gráfico leve (Matplotlib)
        categorias = ['Faturamento (R$)', 'Volume de Leads']
        valores_reais = [float(dados['revenue_generated']), int(dados['leads'])]
        valores_metas = [float(dados['goal_revenue']), int(dados['goal_leads'])]

        plt.figure(figsize=(6, 4))
        plt.bar([c - 0.2 for c in range(2)], valores_reais, width=0.4, label='Realizado (Python)', color='#10b981')
        plt.bar([c + 0.2 for c in range(2)], valores_metas, width=0.4, label='Meta Estipulada', color='#4f46e5')
        plt.xticks(range(2), categorias)
        plt.ylabel('Escala de Performance')
        plt.title(f"Análise de Performance: {dados['projeto']}")
        plt.legend()
        plt.tight_layout()

        # Salva o gráfico direto na pasta pública do Laravel (Voltando um nível para achar a public)
        caminho_publico = os.path.join('..', 'public', 'grafico_python.png')
        plt.savefig(caminho_publico, dpi=100)
        plt.close()
        print("Gráfico gerado com sucesso pelo motor Python!")

    except Exception as e:
        print(f"Erro no processamento Python: {e}")

if __name__ == "__main__":
    processar_analise()
