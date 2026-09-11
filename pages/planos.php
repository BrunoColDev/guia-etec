<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Planos de Estudo — Guia Etec</title>
  <link href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --dark-blue: #033A7B;
      --button-blue: #218FD9;
      --yellow: #FFCC00;
      --white: #ffffff;
      --title-font: 'Bowlby One', sans-serif;
      --body-font: 'Inter', sans-serif;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: var(--body-font);
    }

    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 32px;
      overflow-x: hidden;
      background: linear-gradient(135deg, #003373, #0A4AA3);
    }

    /* CAMADA DE FUNDO DESFOCADA */
    .fundo-desfocado {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      background: linear-gradient(135deg, #003373, #0A4AA3);
      filter: blur(8px);
      z-index: 0;
    }

    .folha-container {
      width: 100%;
      display: flex;
      justify-content: center;
      padding: 20px;
      position: relative;
      z-index: 1;
    }

    .folha-conteudo {
      width: 100%;
      max-width: 1100px;
      background: var(--white);
      border-radius: 22px;
      padding: 48px 50px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
      position: relative;
      overflow: auto;
      max-height: 90vh;
      animation: fadeIn 0.35s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(12px);
      }
      to {
        opacity: 1;
        transform: none;
      }
    }

    .fechar-btn {
      position: fixed;
      top: 50px;
      right: 40px;
      font-size: 23px;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(6px);
      border-radius: 12px;
      padding: 4px 16px;
      border: none;
      cursor: pointer;
      color: #033A7B;
      font-weight: 700;
      z-index: 9999;
      transition: 0.15s;
    }

    .fechar-btn:hover {
      transform: scale(1.1);
      background: rgba(255, 255, 255, 0.95);
    }

    .titulo-pagina {
      font-family: var(--title-font);
      font-size: 42px;
      color: var(--button-blue);
      text-align: center;
      margin-bottom: 8px;
      letter-spacing: 2px;
    }

    .subtitulo {
      text-align: center;
      color: #666;
      font-size: 18px;
      margin-bottom: 40px;
      line-height: 1.6;
    }

    /* GRID DE PLANOS */
    .planos-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 28px;
      margin-bottom: 40px;
    }

    .plano-card {
      background: #fff;
      border-radius: 16px;
      padding: 32px 28px;
      border-top: 5px solid;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
    }

    .plano-card:hover {
      transform: translateY(-12px);
      box-shadow: 0 14px 35px rgba(0, 0, 0, 0.18);
    }

    .plano-card.intensivo {
      border-top-color: var(--dark-blue);
    }

    .plano-card.equilibrado {
      border-top-color: var(--yellow);
    }

    .plano-card.longo {
      border-top-color: #22c55e;
    }

    .plano-titulo {
      font-family: var(--title-font);
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 12px;
      letter-spacing: 1px;
    }

    .plano-card.intensivo .plano-titulo {
      color: var(--dark-blue);
    }

    .plano-card.equilibrado .plano-titulo {
      color: #b8860b;
    }

    .plano-card.longo .plano-titulo {
      color: #22c55e;
    }

    .plano-desc {
      color: #666;
      font-size: 1rem;
      margin-bottom: 20px;
      line-height: 1.6;
    }

    .plano-info {
      background: #f5f5f5;
      padding: 16px;
      border-radius: 10px;
      margin-bottom: 16px;
      font-size: 0.95rem;
      border-left: 4px solid var(--button-blue);
    }

    .plano-card.equilibrado .plano-info {
      border-left-color: #b8860b;
    }

    .plano-card.longo .plano-info {
      border-left-color: #22c55e;
    }

    .plano-info strong {
      color: var(--dark-blue);
      display: block;
      margin-bottom: 4px;
    }

    .plano-subtitulo {
      font-weight: 700;
      color: var(--dark-blue);
      margin: 22px 0 14px 0;
      font-size: 1.05rem;
    }

    .plano-card.equilibrado .plano-subtitulo {
      color: #b8860b;
    }

    .plano-card.longo .plano-subtitulo {
      color: #22c55e;
    }

    .plano-list {
      list-style: none;
      padding: 0;
      margin: 0 0 20px 0;
    }

    .plano-list li {
      padding: 10px 0;
      padding-left: 28px;
      position: relative;
      color: #444;
      font-size: 0.95rem;
      line-height: 1.5;
    }

    .plano-list li:before {
      content: "✓";
      position: absolute;
      left: 0;
      color: var(--button-blue);
      font-weight: bold;
      font-size: 1.1rem;
    }

    .plano-card.equilibrado .plano-list li:before {
      color: #b8860b;
    }

    .plano-card.longo .plano-list li:before {
      color: #22c55e;
    }

    .plano-nota {
      font-size: 0.92rem;
      color: #666;
      border-left: 3px solid #ddd;
      padding-left: 14px;
      margin-top: auto;
      padding-top: 12px;
      border-top: 1px solid #f0f0f0;
    }

    .plano-card.intensivo .plano-nota {
      border-left-color: var(--dark-blue);
    }

    .plano-card.equilibrado .plano-nota {
      border-left-color: #b8860b;
    }

    .plano-card.longo .plano-nota {
      border-left-color: #22c55e;
    }

    /* SEÇÃO COMPARATIVA */
    .tabela-comparacao {
      margin-top: 60px;
      overflow-x: auto;
    }

    .tabela-comparacao h3 {
      font-family: var(--title-font);
      color: var(--dark-blue);
      font-size: 1.5rem;
      margin-bottom: 20px;
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      border-radius: 12px;
      overflow: hidden;
    }

    thead {
      background: var(--dark-blue);
      color: white;
    }

    thead th {
      padding: 16px;
      text-align: left;
      font-weight: 700;
      font-size: 0.95rem;
    }

    tbody td {
      padding: 14px 16px;
      border-bottom: 1px solid #f0f0f0;
      font-size: 0.95rem;
    }

    tbody tr:hover {
      background: #f9f9f9;
    }

    tbody tr:last-child td {
      border-bottom: none;
    }

    .destaque {
      font-weight: 700;
      color: var(--dark-blue);
    }

    /* FOOTER */
    .rodape-info {
      margin-top: 50px;
      padding-top: 30px;
      border-top: 2px solid #f0f0f0;
      text-align: center;
      color: #666;
      font-size: 0.95rem;
      line-height: 1.8;
    }

    .rodape-info strong {
      color: var(--dark-blue);
    }

    /* RESPONSIVO */
    @media (max-width: 1024px) {
      .folha-conteudo {
        padding: 36px 32px;
      }

      .titulo-pagina {
        font-size: 36px;
      }

      .plano-card {
        padding: 24px;
      }

      .plano-titulo {
        font-size: 1.6rem;
      }
    }

    @media (max-width: 768px) {
      body {
        padding: 16px;
      }

      .folha-conteudo {
        padding: 28px 20px;
        max-height: 95vh;
      }

      .fechar-btn {
        top: 8px;
        right: 12px;
        font-size: 20px;
        padding: 4px 12px;
      }

      .titulo-pagina {
        font-size: 28px;
        margin-bottom: 12px;
      }

      .subtitulo {
        font-size: 16px;
        margin-bottom: 30px;
      }

      .planos-grid {
        grid-template-columns: 1fr;
        gap: 20px;
      }

      .plano-card {
        padding: 20px;
      }

      .plano-titulo {
        font-size: 1.4rem;
      }

      table {
        font-size: 0.85rem;
      }

      thead th,
      tbody td {
        padding: 10px 12px;
      }

      .rodape-info {
        margin-top: 30px;
        padding-top: 20px;
        font-size: 0.88rem;
      }
    }

    @media (max-width: 480px) {
      .folha-conteudo {
        padding: 20px 16px;
        border-radius: 16px;
      }

      .titulo-pagina {
        font-size: 22px;
        letter-spacing: 1px;
      }

      .subtitulo {
        font-size: 14px;
        margin-bottom: 24px;
      }

      .plano-titulo {
        font-size: 1.2rem;
      }

      .plano-desc,
      .plano-info,
      .plano-list li {
        font-size: 0.9rem;
      }

      .fechar-btn {
        font-size: 18px;
        padding: 3px 10px;
      }

      table {
        font-size: 0.8rem;
        display: block;
        overflow-x: auto;
      }

      thead th,
      tbody td {
        padding: 8px;
      }
    }

    /* Scroll suave */
    html {
      scroll-behavior: smooth;
    }

    /* Animação de entrada */
    .plano-card {
      animation: slideUp 0.5s ease forwards;
      opacity: 0;
    }

    .plano-card:nth-child(1) { animation-delay: 0.1s; }
    .plano-card:nth-child(2) { animation-delay: 0.2s; }
    .plano-card:nth-child(3) { animation-delay: 0.3s; }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <div class="fundo-desfocado"></div>

  <section class="folha-container">
    <div class="folha-conteudo">
      <button class="fechar-btn" onclick="window.location.href='../inicio.php'" title="Fechar">×</button>

      <h1 class="titulo-pagina">📚 Planos de Estudo</h1>
      <p class="subtitulo">
        Montamos três planos de estudo recomendados para quem está se preparando para o Vestibulinho da ETEC.
        Escolha o que mais combina com o seu tempo disponível, ritmo e objetivos.
      </p>

      <!-- GRID DE PLANOS -->
      <div class="planos-grid">

        <!-- PLANO 1: INTENSIVO -->
        <div class="plano-card intensivo">
          <h2 class="plano-titulo">⚡ Intensivo – 1 Mês</h2>
          <p class="plano-desc">
            Ideal para quem está começando tarde ou quer uma preparação rápida e objetiva.
          </p>

          <div class="plano-info">
            <strong>⏱️ Tempo diário:</strong>
            2h30 – 3h
          </div>

          <div class="plano-info">
            <strong>📋 Estrutura:</strong>
            Estudo diário + revisão semanal + simulados semanais
          </div>

          <h3 class="plano-subtitulo">📊 Distribuição Semanal</h3>
          <ul class="plano-list">
            <li>Português: 3x por semana</li>
            <li>Matemática: 3x por semana</li>
            <li>Ciências Humanas: 2x por semana</li>
            <li>Ciências da Natureza: 2x por semana</li>
            <li>Simulado semanal obrigatório</li>
          </ul>

          <p class="plano-nota">
            💡 <strong>Foco:</strong> Resolução de questões e resumos ultra diretos. Perfeito para quem precisa de resultados rápidos.
          </p>
        </div>

        <!-- PLANO 2: EQUILIBRADO -->
        <div class="plano-card equilibrado">
          <h2 class="plano-titulo">⚙️ Equilibrado – 3 Meses</h2>
          <p class="plano-desc">
            Melhor opção para a maioria dos estudantes. Ritmo constante e sem sobrecargas.
          </p>

          <div class="plano-info">
            <strong>⏱️ Tempo diário:</strong>
            1h30 – 2h
          </div>

          <div class="plano-info">
            <strong>📋 Estrutura:</strong>
            Estudo 5–6 dias/semana + simulados quinzenais
          </div>

          <h3 class="plano-subtitulo">📊 Distribuição Semanal</h3>
          <ul class="plano-list">
            <li>Português: 2x por semana</li>
            <li>Matemática: 2x por semana</li>
            <li>Ciências Humanas: 1–2x por semana</li>
            <li>Ciências da Natureza: 1–2x por semana</li>
            <li>Simulado a cada 15 dias</li>
          </ul>

          <p class="plano-nota">
            💡 <strong>Foco:</strong> Evoluir com profundidade e constância. Ideal para manter consistência sem queimar.
          </p>
        </div>

        <!-- PLANO 3: LONGO PRAZO -->
        <div class="plano-card longo">
          <h2 class="plano-titulo">🌱 Longo Prazo – 6 Meses</h2>
          <p class="plano-desc">
            Ideal para quem quer aprender tudo com calma e construir base sólida.
          </p>

          <div class="plano-info">
            <strong>⏱️ Tempo diário:</strong>
            50 min – 1h20
          </div>

          <div class="plano-info">
            <strong>📋 Estrutura:</strong>
            Estudo leve + revisões + simulados mensais
          </div>

          <h3 class="plano-subtitulo">📊 Distribuição Semanal</h3>
          <ul class="plano-list">
            <li>Português: 1–2x por semana</li>
            <li>Matemática: 1–2x por semana</li>
            <li>Ciências Humanas: 1x por semana</li>
            <li>Ciências da Natureza: 1x por semana</li>
            <li>Simulado 1x por mês</li>
          </ul>

          <p class="plano-nota">
            💡 <strong>Foco:</strong> Aprender sem pressa e construir alicerces sólidos. Ótimo para começar cedo.
          </p>
        </div>

      </div>

      <!-- TABELA COMPARATIVA -->
      <div class="tabela-comparacao">
        <h3>🔍 Comparação Rápida</h3>
        <table>
          <thead>
            <tr>
              <th>Aspecto</th>
              <th>⚡ Intensivo</th>
              <th>⚙️ Equilibrado</th>
              <th>🌱 Longo Prazo</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="destaque">Duração Total</td>
              <td>1 mês</td>
              <td>3 meses</td>
              <td>6 meses</td>
            </tr>
            <tr>
              <td class="destaque">Tempo Diário</td>
              <td>2h30–3h</td>
              <td>1h30–2h</td>
              <td>50min–1h20</td>
            </tr>
            <tr>
              <td class="destaque">Simulados</td>
              <td>Semanal</td>
              <td>Quinzenal</td>
              <td>Mensal</td>
            </tr>
            <tr>
              <td class="destaque">Melhor Para</td>
              <td>Últimas semanas</td>
              <td>Maioria</td>
              <td>Começar cedo</td>
            </tr>
            <tr>
              <td class="destaque">Profundidade</td>
              <td>Básica</td>
              <td>Muito Boa</td>
              <td>Excelente</td>
            </tr>
            <tr>
              <td class="destaque">Dificuldade</td>
              <td>Alta</td>
              <td>Média</td>
              <td>Baixa</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- RODAPÉ -->
      <div class="rodape-info">
        <p>
          <strong>💡 Dica:</strong> Escolha o plano que melhor se encaixa na sua rotina. 
          O melhor plano é aquele que você consegue manter de forma consistente até o dia da prova!
        </p>
        <p style="margin-top: 12px; color: #999; font-size: 0.9rem;">
          Dúvidas? Entre em contato conosco no início do site.
        </p>
      </div>

    </div>
  </section>

  <script>
    // Smooth scroll ao fechar
    document.querySelector('.fechar-btn').addEventListener('click', function(e) {
      e.preventDefault();
      document.body.style.overflow = 'hidden';
      document.querySelector('.folha-conteudo').style.animation = 'fadeOut 0.3s ease forwards';
      setTimeout(() => {
        window.location.href = '../inicio.php';
      }, 300);
    });

    // Adiciona animação de saída
    const style = document.createElement('style');
    style.textContent = `
      @keyframes fadeOut {
        from { opacity: 1; transform: translateY(0); }
        to { opacity: 0; transform: translateY(12px); }
      }
    `;
    document.head.appendChild(style);
  </script>

</body>

</html>