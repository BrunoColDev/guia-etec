<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vídeo Aulas – Guia Etec</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Inter:wght@400;600;700&display=swap"
    rel="stylesheet">
  <style>
    :root {
      --dark-blue: #033A7B;
      --white: #ffffff;
      --light-gray: #f5f5f5;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: "Inter", sans-serif;
    }

    body {
      min-height: 100vh;
      padding: 32px 20px;
      overflow-x: hidden;
      background: linear-gradient(135deg, #003373, #0A4AA3);
    }

    /* CAMADA DE FUNDO */
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

    .container {
      width: 100%;
      max-width: 1400px;
      margin: 0 auto;
      position: relative;
      z-index: 1;
    }

    .fechar-btn {
      position: fixed;
      top: 20px;
      right: 20px;
      font-size: 28px;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(6px);
      border-radius: 12px;
      padding: 4px 16px;
      border: 2px solid #033A7B;
      cursor: pointer;
      color: #033A7B;
      font-weight: 700;
      z-index: 9999;
      transition: 0.2s;
    }

    .fechar-btn:hover {
      transform: scale(1.1);
      background: #033A7B;
      color: white;
    }

    .titulo-pagina {
      font-family: 'Bowlby One', sans-serif;
      font-size: 48px;
      color: #ffffff;
      text-align: center;
      margin-bottom: 12px;
      letter-spacing: 2px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .subtitulo {
      text-align: center;
      color: rgba(255, 255, 255, 0.9);
      font-size: 18px;
      margin-bottom: 48px;
    }

    /* SEÇÕES POR DISCIPLINA */
    .disciplina-section {
      margin-bottom: 56px;
    }

    .disciplina-titulo {
      font-size: 28px;
      color: #ffffff;
      font-weight: 700;
      margin-bottom: 24px;
      padding-left: 16px;
      border-left: 4px solid #FFD700;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    /* GRID DE VIDEOS */
    .videos-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 24px;
    }

    .video-card {
      border-radius: 16px;
      overflow: hidden;
      background: var(--white);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
      transition: all 0.3s ease;
      text-decoration: none;
      color: inherit;
      display: block;
      cursor: pointer;
    }

    .video-card:hover {
      transform: scale(1.02);
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.25);
    }

    .video-thumbnail {
      width: 100%;
      height: 180px;
      object-fit: cover;
      display: block;
      background: linear-gradient(135deg, #ddd 0%, #eee 100%);
    }

    .video-info {
      padding: 16px;
      background: var(--white);
    }

    .video-title {
      font-size: 14px;
      font-weight: 600;
      color: #033A7B;
      line-height: 1.4;
      margin: 0;
    }

    /* RESPONSIVO */
    @media (max-width: 768px) {
      .titulo-pagina {
        font-size: 32px;
        margin-bottom: 8px;
      }

      .subtitulo {
        font-size: 16px;
        margin-bottom: 32px;
      }

      .disciplina-titulo {
        font-size: 22px;
        margin-bottom: 16px;
      }

      .videos-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 16px;
      }

      .fechar-btn {
        font-size: 24px;
        padding: 6px 12px;
      }
    }

    @media (max-width: 480px) {
      body {
        padding: 16px;
      }

      .titulo-pagina {
        font-size: 26px;
      }

      .disciplina-titulo {
        font-size: 18px;
      }

      .videos-grid {
        grid-template-columns: 1fr;
      }

      .fechar-btn {
        top: 12px;
        right: 12px;
      }
    }
  </style>
</head>

<body>
  <div class="fundo-desfocado"></div>
  
  <button class="fechar-btn" onclick="window.location.href='../inicio.php'">×</button>

  <div class="container">
    <h1 class="titulo-pagina">📹 Vídeo Aulas</h1>
    <p class="subtitulo">Aprenda com os melhores conteúdos preparatórios para o VESTIBULINHO</p>

    <!-- ============ FÍSICA ============ -->
    <div class="disciplina-section">
      <h2 class="disciplina-titulo">⚛️ Física</h2>
      <div class="videos-grid">
        <a href="https://www.youtube.com/watch?v=zwHkj4MuoPw" target="_blank" onclick="marcarConteudoVideo(1, 'Funções – Parte 1', 'https://www.youtube.com/watch?v=zwHkj4MuoPw')" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/zwHkj4MuoPw/hqdefault.jpg" alt="O que estudar - Física #01" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Física #01</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=SDfhE5vaxgU" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/SDfhE5vaxgU/hqdefault.jpg" alt="O que estudar - Física #02" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Física #02</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=kqqEJB3tbAA" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/kqqEJB3tbAA/hqdefault.jpg" alt="O que estudar - Física #03" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Física #03</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=bzLP0QWfz6Y" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/bzLP0QWfz6Y/hqdefault.jpg" alt="O que estudar - Física #04" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Física #04</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=9-LMa_C_vsI" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/9-LMa_C_vsI/hqdefault.jpg" alt="O que estudar - Física #05" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Física #05</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=HKJ-yIbBCpk" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/HKJ-yIbBCpk/hqdefault.jpg" alt="O que estudar - Física #06" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Física #06</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=9CZB-Y9WE7A" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/9CZB-Y9WE7A/hqdefault.jpg" alt="O que estudar - Física #07" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Física #07</p></div>
        </a>
      </div>
    </div>

    <!-- ============ QUÍMICA ============ -->
    <div class="disciplina-section">
      <h2 class="disciplina-titulo">🧪 Química</h2>
      <div class="videos-grid">
        <a href="https://www.youtube.com/watch?v=qLsNOhykpVk" target="_blank" onclick="marcarConteudoVideo(1, 'Funções – Parte 1', 'https://www.youtube.com/watch?v=qLsNOhykpVk')" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/qLsNOhykpVk/hqdefault.jpg" alt="O que estudar - Química #01" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Química #01</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=ANdRAPwunWA" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/ANdRAPwunWA/hqdefault.jpg" alt="O que estudar - Química #02" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Química #02</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=qQYT1i1kOPM" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/qQYT1i1kOPM/hqdefault.jpg" alt="O que estudar - Química #03" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Química #03</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=krW3TNvl6-8" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/krW3TNvl6-8/hqdefault.jpg" alt="O que estudar - Química #04" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Química #04</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=UwI_JEr0UGA" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/UwI_JEr0UGA/hqdefault.jpg" alt="O que estudar - Química #05" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Química #05</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=0qpbRI6ZE-g" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/0qpbRI6ZE-g/hqdefault.jpg" alt="O que estudar - Química #06" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Química #06</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=l7xNsrZn4jw" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/l7xNsrZn4jw/hqdefault.jpg" alt="O que estudar - Química #07" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Química #07</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=KYdKLCIspEc" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/KYdKLCIspEc/hqdefault.jpg" alt="O que estudar - Química #08" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Química #08</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=b_rcMOvzEvk" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/b_rcMOvzEvk/hqdefault.jpg" alt="O que estudar - Química #09" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Química #09</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=B6QdZyLrBnk" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/B6QdZyLrBnk/hqdefault.jpg" alt="O que estudar - Química #10" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Química #10</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=xBeu3zMaonw" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/xBeu3zMaonw/hqdefault.jpg" alt="O que estudar - Química #11" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Química #11</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=lPGjFeIKyjY" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/lPGjFeIKyjY/hqdefault.jpg" alt="O que estudar - Química #12" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Química #12</p></div>
        </a>
      </div>
    </div>

    <!-- ============ MATEMÁTICA ============ -->
    <div class="disciplina-section">
      <h2 class="disciplina-titulo">📐 Matemática</h2>
      <div class="videos-grid">
        <a href="https://www.youtube.com/watch?v=Hx4iXQA7kEA" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/Hx4iXQA7kEA/hqdefault.jpg" alt="O que estudar - Matemática #01" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Matemática #01</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=wGltX2sMm9U" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/wGltX2sMm9U/hqdefault.jpg" alt="O que estudar - Matemática #02" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Matemática #02 - Figuras Planas e Poliedros</p></div>
        </a>
        <a href="https://www.youtube.com/watch?v=Pjs--T_Ytn4" target="_blank" rel="noopener noreferrer" class="video-card">
          <img src="https://img.youtube.com/vi/Pjs--T_Ytn4/hqdefault.jpg" alt="O que estudar - Matemática #03" class="video-thumbnail">
          <div class="video-info"><p class="video-title">O que estudar - Matemática #03 - Medidas</p></div>
        </a>
      </div>
    </div>

  </div>
<script>
  marcarConteudo(2); // Conteúdo 1 assistido
</script>

<!-- SISTEMA DE PROGRESSO PARA A ÁREA DO ALUNO -->
<script>
// ==============================
// SISTEMA DE PROGRESSO - LOCALSTORAGE
// ==============================

// Carrega progresso salvo
let progress = JSON.parse(localStorage.getItem("guiaEtecProgress") || "{}");

// Estrutura caso ainda não tenha nada salvo
if (!progress.conteudos) progress.conteudos = {};

// Salva no localStorage
function salvarProgresso() {
    localStorage.setItem("guiaEtecProgress", JSON.stringify(progress));
}

// Função para marcar vídeo como assistido
function marcarConteudo(id) {
    progress.conteudos[id] = true;
    salvarProgresso();
}
</script>


<script>
// ================================
//    MARCAR VÍDEO COMO ASSISTIDO
// ================================
function marcarConteudoVideo(id, titulo, link) {
  let progress = JSON.parse(localStorage.getItem("guiaEtecProgress") || "{}");

  if (!progress.videos) progress.videos = [];

  // PEGAR ID DO VÍDEO DO YOUTUBE PARA A THUMB
  const videoId = link.split("v=")[1];
  const thumb = `https://img.youtube.com/vi/${videoId}/hqdefault.jpg`;

  // EVITAR DUPLICADOS
  if (!progress.videos.some(v => v.id === id)) {
    progress.videos.push({
      id: id,
      titulo: titulo,
      link: link,
      thumb: thumb
    });
  }

  localStorage.setItem("guiaEtecProgress", JSON.stringify(progress));
}
</script>



</body>

</html>