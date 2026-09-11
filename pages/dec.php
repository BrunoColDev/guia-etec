<?php
require_once('../backend/protecao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dicas e Curiosidades — Guia Etec</title>

  <!-- Fontes e ícones -->
  <link href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Inter:wght@400;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css" /> <!-- Seu CSS global -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    :root {
      --yellow: #FFCC00;
      --yellow-logo: #f8be35;
      --dark-blue: #033A7B;
      --nav-blue: #212B78;
      --button-blue: #218FD9;
      --light-blue: #218FD9;
      --pink: #FF2D55;
      --white: #FFF;
      --title-font: 'Bowlby One', sans-serif;
      --body-font: 'Inter', sans-serif;
      --button-font: 'Poppins', sans-serif;
    }

    /* Reset e box-sizing consistente */
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: var(--body-font); }
    a { color: inherit; text-decoration: none; }

    /* Fundo e container principal */
    body {
      background: linear-gradient(180deg, var(--dark-blue) 0%, #012B5C 100%);
      display: flex;
      justify-content: center;
      padding: 48px 72px;
      min-height: 100vh;
    }
    .pagina {
      width: 100%;
      max-width: 1050px;
      /* ajustar para não somar ao padding do body (48px top + 48px bottom = 96px) */
      min-height: calc(100vh - 96px);
      display: flex;
      flex-direction: column;
      align-items: center;
      border-radius: 40px;
      background: var(--white);
      box-shadow: 0px 0px 20px 8px rgba(30, 30, 30, 0.85);
      overflow: hidden;
      position: relative;
      /* opcional: garantir margem inferior consistente */
      margin-bottom: 24px;
    }

    h1,h2,h3, .conteudos-title, .card-title, .dicas-title {
      font-family: var(--title-font);
      letter-spacing: 3px;
    }

    p, .descricao, .rodape-bottom, .coluna a { font-family: var(--body-font); font-size: 1.04rem; }

    /* NAVBAR */
    .navbar-container { width: 100%; display:flex; justify-content:center; padding:10px 0; }
    .navbar {
      display:flex; align-items:center; justify-content:center;
      width:1156px; padding:10px 40px; border-radius:40px; gap:40px; position:relative;
    }
    .navbar-fixed { position:fixed; top:10px; left:50%; transform:translateX(-50%); width:90%; max-width:980px; padding:0; border-radius:25px; background: rgba(255,255,255,0.15); backdrop-filter: blur(15px); z-index:1000; box-shadow:0 4px 12px rgba(0,0,0,0.2); transition:all .4s ease; }
    .logo-links { display:flex; align-items:center; gap:5px; background:var(--dark-blue); border-radius:30px; padding:3px; }
  
  .logonav {
  width: 80px;
  height: 40px;
  border-radius: 70px 0 0 70px;
  border: 1px solid var(--yellow-logo);
  background-color: var(--yellow-logo);
  object-fit: contain;
}
    .nav-links { display:flex; gap:10px; padding:0 20px; }
    .nav-links a { color:white; padding:8px 12px; border-radius:10px; transition:background .3s; }
    .area-do-aluno { background: linear-gradient(90deg, var(--button-blue), var(--dark-blue)); color:#fff; padding:14px 38px; border-radius:11px; border:none; cursor:pointer; font-weight:bold; }

    /* MOBILE: hamburger menu */
    .hamburger { display:none; background:none; border:none; font-size:30px; color:var(--dark-blue); cursor:pointer; }

    @media (max-width: 768px) {
      /* esconder links padrão e mostrar botão hamburger */
      .nav-links { display: none; position: fixed; inset: 70px 0 0 0; background: var(--dark-blue); flex-direction: column; align-items: stretch; padding: 18px 16px; gap: 6px; z-index: 9999; overflow-y: auto; }
      .nav-links a { padding: 14px 18px; color: #fff; width: 100%; display: block; text-align: left; border-radius: 8px; }
      .nav-links.nav-active { display: flex; }

      /* mostrar hamburger */
      .hamburger { display: block; color: #fff; background: transparent; border: none; font-size: 26px; padding: 8px; }

      /* ajustar navbar para mobile */
      .navbar { justify-content: space-between; padding: 10px 16px; width: calc(100% - 32px); align-items: center; }
      .area-do-aluno { display: none; }
      .logo-links { gap: 8px; }
      .logonav { width: 64px; height: 36px; border-radius: 12px; background-color: var(--yellow-logo); }

      /* garantir que o menu não empurre o conteúdo atrás do overlay quando aberto */
      body.menu-open { overflow: hidden; }
    }

    /* Conteúdo principal */
    .conteudo-wrapper { padding:40px; font-family:"Inter", sans-serif; width:100%; max-width:1100px; }
    .cards-container { display:flex; gap:24px; justify-content:center; margin-bottom:30px; flex-wrap:wrap; }
    .card-topico { width:280px; background:#fff; border-radius:20px; padding:24px; border:2px solid #004AAD; box-shadow:0 4px 14px rgba(0,0,0,0.1); cursor:pointer; text-align:center; transition:.2s; }
    .card-topico:hover { transform:scale(1.05); border-color:#FFD700; }

    /* Container dicas (folha branca) */
    .container-dicas { width:100%; max-width:900px; margin:36px auto 0 auto; padding:24px; background:var(--white); border-radius:24px; box-shadow:0 2px 16px rgba(3,58,123,0.09); position:relative; }
    .dicas-title { font-family:var(--title-font); font-size:2rem; color:var(--button-blue); letter-spacing:2px; margin-bottom:18px; text-align:left; }

    .card { background:#E5F1FB; border-left:7px solid var(--yellow); border-radius:18px; margin-bottom:26px; padding:20px 22px; }
    .card-title { font-family:var(--title-font); color:var(--dark-blue); font-size:1.22rem; margin-bottom:6px; }
    .dica,.curiosidade,.extra { font-family:var(--button-font); padding:5px 15px; border-radius:12px; font-size:1rem; display:inline-block; margin-bottom:5px; }
    .dica{ background:var(--yellow); color:var(--dark-blue); } .curiosidade{ background:var(--button-blue); color:#fff; } .extra{ background:#87B9E8; color:var(--dark-blue); }
    .depoimento{ background:#fffbe8; border-left:5px solid var(--button-blue); border-radius:12px; margin:10px 0; padding:10px; }
    .glossario-card{ background:#f6faff; border-left:5px solid var(--button-blue); border-radius:9px; margin-bottom:8px; padding:9px 15px; }
    .top-cursos{ margin:15px 0 3px 0; }
    .mascote-coruja{ height:58px; float:right; margin-top:-14px; }

    .conteudo-secao { max-width:800px; margin:auto; margin-top:20px; }
    .oculto { display:none; }
    .faq-item { border-bottom:1px solid #ccc; margin-bottom:10px; }
    .faq-pergunta { width:100%; background:none; border:none; text-align:left; font-size:1.1rem; padding:14px 0; cursor:pointer; font-weight:bold; }
    .faq-resposta { display:none; padding:10px 0 20px 0; color:#333; }
    .faq-item.ativo .faq-resposta { display:block; }

    /* RODAPÉ */
    .rodape { background-color:#0E2C56; color:#fff; padding:60px 30px 30px 30px; width:100%; border-radius:0 0 40px 40px; margin-top:48px; }
    .rodape-top { display:flex; justify-content:space-between; align-items:center; border-bottom:2px solid #fff; padding-bottom:12px; margin-bottom:20px; }
    .social-icons a { margin-right:15px; font-size:22px; color:#fff; text-decoration:none; }
    .atendimento { font-size:16px; font-weight:bold; }
    .rodape-meio { display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; margin-bottom:20px; }

    .logo {
      width: 80px;
      height: 40px;
      border-radius: 70px 0 0 70px;
      object-fit: contain;
    }

/* forçar logo do rodapé sem fundo */
.rodape .logo img {
  background: transparent !important;
  display: block;
  object-fit: contain;
  border: none;
}

    .coluna { min-width:160px; }
    .coluna h3 { font-size:18px; margin-bottom:8px; font-weight:bold; }
    .coluna a { color:#fff; font-size:14px; margin-bottom:6px; display:block; }
    .coluna a:hover { color:var(--yellow); }
    .rodape-bottom { text-align:center; font-size:12px; border-top:1px solid #fff; padding-top:12px; line-height:1.4; }

    /* Acessibilidade */
    .acessibilidade-menu { position:fixed; top:85%; left:3px; transform:translateY(-50%); display:flex; flex-direction:column; gap:10px; padding:10px; border-radius:0 10px 10px 0; z-index:9999; }
    .acessibilidade-menu button { background-color:var(--button-blue); color:var(--white); border:none; padding:10px 12px; border-radius:8px; cursor:pointer; font-size:18px; transition:transform .3s, background .3s, box-shadow .3s; }
    .acessibilidade-menu button:hover { transform:rotate(10deg) scale(1.1); background-color:var(--dark-blue); box-shadow:0 0 10px rgba(255,210,63,0.25); }

    /* Dark mode */
    body.dark-mode { background-color:#0A192F; color:#E6F1FF; transition:background-color .4s, color .4s; }
    .dark-mode .pagina { background:#112240; box-shadow:0px 4px 25px rgba(0,0,0,0.6); }
    .dark-mode .container-dicas, .dark-mode .card { background:#172d47; color:#E6F1FF; }
    .dark-mode .card-title, .dark-mode .dicas-title { color:#FFD23F; }
    .dark-mode .dica { background:#FFD23F; color:#0A192F; }
    .dark-mode .curiosidade { background:#218FD9; color:#FFD23F; }
    .dark-mode .extra, .dark-mode .depoimento { background:#213a5c; color:#FFD23F; }
    .dark-mode .glossario-card { background:#20395B; color:#FFD23F; border-left:5px solid #FFD23F; }
    .dark-mode .quiz-btn { background:#FFD23F; color:#0A192F; }
    .dark-mode .notifica-btn { background:#FFD23F; color:#213a5c; }

    /* ===== ANIMAÇÕES ===== */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    /* animação quando seção aparece */
    .conteudo-secao {
      animation: fadeUp .5s ease forwards;
    }

    /* animação ao abrir FAQ */
    .faq-resposta {
      animation: fadeIn .3s ease;
    }

    /* brilho suave nos cards ao passar o mouse */
    .card-topico:hover {
      box-shadow: 0 0 18px rgba(255, 235, 120, 0.6);
      transform: scale(1.06);
    }

    /* container sem espaço extra */
    .conteudo-wrapper {
      padding-bottom: 0;
    }

    /* ajuste do scroll para parar exatamente abaixo dos cards */
    .scroll-adjust {
      padding-top: 60px;
      margin-top: -60px;
    }

    /* Barra de pesquisa */
.search-container {
  width: 100%;
  max-width: 900px;
  margin: 0 auto 30px auto;
  display: flex;
  justify-content: center;
}

#pesquisa {
  width: 100%;
  padding: 14px 18px;
  font-size: 1.1rem;
  border: 2px solid var(--dark-blue);
  border-radius: 12px;
  outline: none;
  transition: .2s ease;
}

#pesquisa:focus {
  border-color: var(--button-blue);
  box-shadow: 0 0 10px rgba(33,143,217,0.3);
}

/* Dark mode */
.dark-mode #pesquisa {
  background: #112240;
  color: #fff;
  border-color: #FFD23F;
}

    /* realce e sugestões */
.marcado { background: #ffeb3b; padding: 0 2px; border-radius: 4px; }
.sugestoes-box {
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  max-height: 220px;
  overflow-y: auto;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 18px rgba(0,0,0,.2);
  z-index: 10000;
  display: none;
}
.sugestao-item {
  padding: 10px 14px;
  cursor: pointer;
  transition: .12s;
}
.sugestao-item:hover { background: #eef4ff; }

    /* ======================= */
    /* RESPONSIVIDADE GLOBAL   */
    /* ======================= */

    /* 1. Ajustes gerais para telas menores */
@media (max-width: 900px) {

  body {
    padding: 8px;
  }

  .pagina {
    width: 100%;
    padding: 16px;
    border-radius: 20px;
  }

  .navbar {
    padding: 8px 12px;
    gap: 14px;
  }

  .nav-links a {
    font-size: 1rem;
  }

  .conteudo-wrapper {
    padding: 12px;
  }

  .container-dicas {
    padding: 14px;
  }

  .card-topico {
    width: 100%;
    padding: 20px;
    margin: 10px 0;
    box-sizing: border-box;
  }

  .mascote-coruja {
    float: none;
    width: 150px;
    margin: 0 auto 20px auto;
    display: block;
  }

  .rodape {
    padding: 20px;
  }
}

/* 2. Ajuste forte para telas pequenas (celulares) */
@media (max-width: 600px) {

  .navbar {
    flex-wrap: wrap;
    justify-content: center;
    text-align: center;
  }

  .logonav {
    width: 80px;
  }

  .nav-links {
    flex-wrap: wrap;
    gap: 12px;
  }

  .nav-links a {
    padding: 6px 12px;
    font-size: 0.95rem;
  }

  .conteudo-wrapper {
    padding: 6px;
  }

  h2 {
    font-size: 1.4rem;
  }

  p, li {
    font-size: 1rem;
  }

  .card-topico {
    padding: 16px;
  }

  .rodape {
    padding: 18px;
    text-align: center;
  }
}

/* 3. Ajuste extremo (celulares minúsculos: 360px para baixo) */
@media (max-width: 360px) {

  .navbar {
    gap: 6px;
  }

  .nav-links a {
    font-size: 0.85rem;
    padding: 5px 10px;
  }

  h2, .dicas-title {
    font-size: 1.2rem;
  }

  .faq-pergunta {
    font-size: 0.95rem;
  }

  .faq-resposta {
    font-size: 0.9rem;
  }

  .pagina {
    padding: 12px;
  }

  .search-container { padding: 0 8px; }
  #pesquisa { font-size: 0.98rem; padding: 10px; }
}

/* garantia de layout fluido */
.pagina, .conteudo-wrapper, .container-dicas {
  box-sizing: border-box;
  width: 100%;
}

/* evita overflow em imagens e logos */
img { max-width: 100%; height: auto; display: block; }

/* pequenas correções visuais para evitar deslocamentos */
.card-topico, .container-dicas, .card { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }

/* BOTÃO VOLTAR AO TOPO */
#btn-topo {
  position: fixed;
  right: 45px;
  bottom: 55px;
  width: 58px;
  height: 58px;
  border-radius: 50%;
  background: linear-gradient(180deg, #FFD237, #D4A014);
  color: #033A7B;
  font-size: 28px;
  font-weight: bold;
  border: 3px solid #033A7B;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0 6px 18px rgba(0,0,0,0.25);
  z-index: 1200;
  transition: 0.25s ease;

  /* começa invisível */
  opacity: 0;
  transform: translateY(20px);
  pointer-events: none;
}

#btn-topo.show {
  opacity: 1;
  transform: translateY(0);
  pointer-events: all;
}

#btn-topo:hover {
  transform: scale(1.14);
  background: linear-gradient(180deg, #FFDF50, #E3B738);
}

/* ====== CARDS GUIA ETEC (VERSÃO AJUSTADA) ====== */

.cards-guiaetec {
  width: 100%;
  padding: 10px 0;
}

.cards-guiaetec .cards-container {
  display: flex;
  justify-content: center;
  gap: 30px;
  flex-wrap: wrap;
}

/* CARD */
.card-guia {
  width: 300px;
  height: 330px;
  background: #ffffff;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0px 2px 8px rgba(0,0,0,0.18);
  transition: transform .3s ease, box-shadow .3s ease;
}

.card-img {
  width: 500px;
}

.card-guia:hover {
  transform: translateY(-6px);
  box-shadow: 0px 6px 18px rgba(0,0,0,0.22);
}

/* TOPO AZUL */
.card-topo {
  background: #003A75;
  height: 180px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.card-topo img {
  width: 100%; /* reduzido */
  height: auto;
}

/* ÁREA BRANCA DO CARD */
.conteudo-card {
  padding: 18px 20px 24px; /* reduzido */
}

.card-guia h3 {
  font-size: 18px;
  font-weight: 700;
  margin: 6px 0 8px;
}

.card-guia p {
  font-size: 14px;
  margin-bottom: 16px;
  line-height: 1.35;
}

/* LINK */
.ler-mais {
  font-size: 14px;
  color: #0066cc;
  font-weight: 600;
  text-decoration: none;
}

.ler-mais:hover {
  text-decoration: underline;
}

/* --- TESTIMONIALS (escopo exclusivo) --- */
.testimonials-container {
  width: 100%;
  max-width: 980px;
  margin: 30px auto;
  padding: 20px;
  display: flex;
  flex-direction: column;
  gap: 18px;
  align-items: center;
}

.testimonials-title {
  font-family: var(--title-font);
  font-size: 32px;
  color: #033A7B;
  margin-bottom: 6px;
  letter-spacing: 2px;
}

.testimonials-list {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 18px;
}

/* cartão do depoimento */
.testimonial-card {
  background: #fff;
  border: 3px solid #033A7B;
  border-radius: 26px;
  padding: 18px;
  display: flex;
  gap: 14px;
  align-items: flex-start;
  box-shadow: 0 6px 18px rgba(0,0,0,0.08);
}

.testimonial-content {
  flex: 1;
  display: flex;
  flex-direction: column;
}

.testimonial-photo {
  width: 17%;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid #033A7B;
  flex-shrink: 0;
}

.testimonial-name {
  font-size: 18px;
  font-weight: 700;
  margin: 0 0 6px 0;
  color: #0B2545;
}

/* bloco de texto */
.testimonial-text {
  font-size: 15px;
  line-height: 1.45;
  color: #333;
  margin: 0 0 10px 0;
}

/* botão ler mais */
.testimonial-toggle {
  align-self: flex-start;
  background: #033A7B;
  color: #fff;
  border: none;
  padding: 8px 14px;
  border-radius: 12px;
  cursor: pointer;
  font-weight: 700;
  transition: 0.3s;
}

.testimonial-toggle:hover {
  background: #0552a1;
}

/* layout vertical em mobile */
@media (max-width: 768px) {
  .testimonial-card {
    flex-direction: column;
    text-align: center;
    padding: 16px;
  }

  .testimonial-content {
    align-items: center;
  }

  .testimonial-toggle {
    align-self: center;
  }

  .testimonials-title {
    font-size: 24px;
  }
}
    </style>
</head>
<body>
  <div class="pagina">

    <!-- NAVBAR -->
    <div class="navbar-container">
      <div class="navbar" id="navbar">
        <div class="logo-links">
          <img src="../assets/img/Logo.png" alt="Logo Guia Etec" class="logonav" />
          <div class="nav-links" id="nav-links">
            <a href="../inicio.php">Início</a>
            <a href="../pages/calendario.php">Calendário</a>
            <a href="../pages/simulado.php">Simulados</a>
            <a href="../pages/conteudos.php">Conteúdos</a>
            <a href="../pages/sobre.html">Sobre Nós</a>
          </div>
        </div>

        <!-- botão hamburger para mobile -->
        <button id="hamburger" class="hamburger" aria-label="Abrir menu" aria-expanded="false">&#9776;</button>

        <button class="area-do-aluno" onclick="window.location.href='../backend/login.php'">Área do Aluno</button>
      </div>
    </div>

    <!-- CONTEÚDO PRINCIPAL -->
    <div class="conteudo-wrapper">

      <!-- ===== CARDS GUIA ETEC ===== -->
      <section id="cards-guiaetec" class="cards-guiaetec">
        <div class="cards-container">

          <!-- Card 1 -->
          <div class="card-guia">
            <div class="card-topo">
              <img src="../assets/img/site Cards/Dicas.png" alt="Dicas">
            </div>

            <div class="conteudo-card">
              <span class="categoria">⭐ Dicas</span>
              <p>Orientações práticas para estudar com leveza e eficiência.</p>
              <a href="#" class="ler-mais" onclick="mostrarSecao('dicas'); return false;">Ler mais →</a>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="card-guia">
            <div class="card-topo">
              <img src="../assets/img/site Cards/Curiosidades.png" alt="Curiosidades">
            </div>

            <div class="conteudo-card">
              <span class="categoria">🔍 Curiosidades</span>
              <p>Descobertas interessantes sobre a ETEC e o mundo acadêmico.</p>
              <a href="#" class="ler-mais" onclick="mostrarSecao('curiosidades'); return false;">Ler mais →</a>
            </div>
          </div>

          <!-- Card 3 - Depoimentos -->
          <div class="card-guia">
            <div class="card-topo">
              <img src="../assets/img/site Cards/Depoimento.png" alt="Depoimentos">
            </div>

            <div class="conteudo-card">
              <span class="categoria">💬 Depoimentos</span>
              <p>Experiências reais de alunos que já passaram pela ETEC.</p>
              <a href="#" class="ler-mais" onclick="abrirDepoimentos(); return false;">Ler mais →</a>
            </div>
          </div>

        </div>
      </section>

      <!-- BARRA DE PESQUISA: agora abaixo dos cards, sem encolher -->
      <div class="search-container">
        <div style="position: relative; width: 100%; max-width: 900px; margin: 22px auto;">
          <input id="pesquisa" type="text" placeholder="🔎 Pesquise por palavras-chave (NSA, passes, estudo...)" />
          <div id="sugestoes" class="sugestoes-box"></div>
        </div>
      </div>

      <!-- ===== SEÇÃO DICAS ===== -->
      <div id="dicas" class="conteudo-secao oculto scroll-adjust">
        <h2>⭐ Dicas de Estudo</h2>

        <div class="faq-item">
          <button class="faq-pergunta">Como começar a estudar?</button>
          <div class="faq-resposta">
            Organize um cronograma leve e revise sempre o que sente mais dificuldade.
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">Técnicas que realmente ajudam</button>
          <div class="faq-resposta">
            Pomodoro, resumos, mapas mentais, simulados e autoexplicação.
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">Como evitar esquecer o conteúdo?</button>
          <div class="faq-resposta">
            Revise em 24h, 7 dias e 30 dias. Seu cérebro ama reforço.
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">Como controlar a ansiedade?</button>
          <div class="faq-resposta">
            Respiração, pausas, boa noite de sono e revisão leve.
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">Tutorial de inscrição no Vestibulinho</button>
          <div class="faq-resposta">
            <ol>
              <li>Acesse vestibulinho.etec.sp.gov.br</li>
              <li>Clique em “Inscreva-se”</li>
              <li>Preencha seus dados</li>
              <li>Escolha curso e unidade</li>
              <li>Envie documentos</li>
              <li>Pague a taxa</li>
            </ol>
          </div>
        </div>

        <!-- INSERIR AQUI: novas dicas -->
        <div class="faq-item">
          <button class="faq-pergunta">Como emitir passes escolares gratuitos?</button>
          <div class="faq-resposta">
            <p>O passe escolar garante transporte gratuito ou com desconto, ajudando estudantes que dependem de ônibus ou trem. Cada município possui seu sistema próprio. Veja alguns exemplos:</p>
            <ul>
              <li><strong>Mauá:</strong> Cartão SIM Escolar – http://busfacilmaua.com.br/sim-escolar/</li>
              <li><strong>Santo André:</strong> CADES – https://aesanet.com.br/estudante/</li>
              <li><strong>Ribeirão Pires:</strong> Cartão NOSSO Estudante – https://www.rpmobilidade.com.br/cartao-nosso/estudante/</li>
              <li><strong>Rio Grande da Serra:</strong> PEG – Passe Escolar Gratuito – https://viacaotalisma.com.br/.../Formulario-Aluno.pdf</li>
              <li><strong>Bilhete Único Estudante:</strong> https://estudante.sptrans.com.br</li>
            </ul>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">Como estudar na Etec?</button>
          <div class="faq-resposta">
            <p>A ETEC oferece ensino técnico gratuito e ensino médio integrado. O processo é simples:</p>
            <ol>
              <li>Escolha o curso e a unidade.</li>
              <li>Faça a inscrição no Vestibulinho no período oficial.</li>
              <li>Realize a prova (conteúdo de 5ª a 8ª/EF ou Ensino Médio, dependendo da modalidade).</li>
              <li>Confira o resultado e faça a matrícula.</li>
            </ol>
            <p>Fique atento ao edital do Vestibulinho, divulgado duas vezes ao ano.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">Quais são as datas principais do Vestibulinho?</button>
          <div class="faq-resposta">
            <p>As datas variam por edição, mas geralmente incluem:</p>
            <ul>
              <li>Divulgação do local de prova</li>
              <li>Dia do exame</li>
              <li>Publicação do gabarito</li>
              <li>Lista de classificação e matrícula</li>
            </ul>
            <p>Confira sempre no site oficial: <strong>https://vestibulinhoetec.com.br</strong></p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">O que é o NSA?</button>
          <div class="faq-resposta">
            <p>O NSA (Novo Sistema Acadêmico) é o aplicativo usado pelas ETECs para:</p>
            <ul>
              <li>Acompanhar horários e grade</li>
              <li>Receber avisos da escola</li>
              <li>Ver notas e faltas</li>
              <li>Submeter trabalhos</li>
              <li>Participar de atividades e eventos</li>
            </ul>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">Para que serve o Microsoft Teams?</button>
          <div class="faq-resposta">
            <p>O Teams é usado para:</p>
            <ul>
              <li>Aulas online e reuniões</li>
              <li>Enviar e receber tarefas</li>
              <li>Interagir com professores</li>
              <li>Acessar materiais de estudo</li>
              <li>Trabalhos em grupo</li>
            </ul>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">Como montar um cronograma de estudos eficiente?</button>
          <div class="faq-resposta">
            <p>Organize blocos de 40 minutos, priorize matérias difíceis, use simulados semanais e revise a cada 24h.</p>
          </div>
        </div>
        <!-- FIM INSERÇÃO DIAS -->
      </div>

      <!-- ===== SEÇÃO CURIOSIDADES ===== -->
      <div id="curiosidades" class="conteudo-secao oculto scroll-adjust">
        <h2>🔍 Curiosidades</h2>

        <div class="faq-item">
          <button class="faq-pergunta">A ETEC aumenta empregabilidade?</button>
          <div class="faq-resposta">
            Sim. As ETECs têm uma das maiores taxas de empregabilidade do estado.
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">Quantos fazem o Vestibulinho?</button>
          <div class="faq-resposta">
            Em média, mais de 100 mil candidatos por edição.
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">A prova muda muito?</button>
          <div class="faq-resposta">
            Os temas variam. A estrutura permanece.
          </div>
        </div>

        <!-- INSERIDAS: novas curiosidades -->
        <div class="faq-item">
          <button class="faq-pergunta">O que é a Semana Paulo Freire?</button>
          <div class="faq-resposta">
            <p>É uma semana de atividades pedagógicas com projetos, palestras e apresentações feitas pelos próprios alunos, valorizando inclusão, criatividade e aprendizagem significativa.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">O que é a FETEPS?</button>
          <div class="faq-resposta">
            <p>A FETEPS é a Feira Tecnológica do Centro Paula Souza, onde projetos das ETECs são apresentados para o estado inteiro. Muitos alunos ganham bolsas, prêmios e oportunidades.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">A Etec tem interclasse?</button>
          <div class="faq-resposta">
            <p>Sim! As ETECs geralmente realizam interclasses de futsal, vôlei, xadrez e outras modalidades. É um dos eventos mais esperados pelos alunos.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">O que é o Carnetec?</button>
          <div class="faq-resposta">
            <p>O Carnetec é o “carnaval estudantil” das ETECs: fantasias, música, confraternização e muita criatividade dos alunos para celebrar a cultura carnavalesca de forma leve e divertida.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-pergunta">Existem projetos sociais na ETEC?</button>
          <div class="faq-resposta">
            <p>Sim! Muitas ETECs fazem campanhas solidárias, arrecadações, ações ambientais e visitas técnicas que ajudam a comunidade.</p>
          </div>
        </div>
      </div>

      <!-- ===== SEÇÃO DEPOIMENTOS ===== -->
      <section id="depoimentos" class="conteudo-secao oculto scroll-adjust">

        <!-- SEÇÃO DE DEPOIMENTOS (inicialmente escondida) -->
        <section id="testimonials-section" class="testimonials-container" aria-hidden="true" style="display:none;">
          <h2 class="testimonials-title">💬 Depoimentos</h2>

          <div class="testimonials-list">
            <!-- DEP 01 -->
            <article class="testimonial-card">
              <img src="../assets/img/Dep/Dep1.jpg" alt="Nicolas Samuel" class="testimonial-photo">
              <div class="testimonial-content">
                <h3 class="testimonial-name">Nicolas Samuel, 21 anos</h3>
                <p class="testimonial-text" data-full="A Etec me proporcionou muitos aprendizados e experiências importantes ao longo desses três anos. Aprendi a valorizar mais os estudos e me preparei melhor para o mercado de trabalho por meio de projetos e atividades que simulam a realidade profissional. Tudo isso foi possível graças aos excelentes professores. Esse período me marcou e levarei suas lições para a vida toda."></p>
                <button class="testimonial-toggle">Ler Mais</button>
              </div>
            </article>

            <!-- DEP 02 -->
            <article class="testimonial-card">
              <img src="../assets/img/Dep/Dep2.jpg" alt="Geovanna Canelli" class="testimonial-photo">
              <div class="testimonial-content">
                <h3 class="testimonial-name">Geovanna Canelli, 17 anos</h3>
                <p class="testimonial-text" data-full="A Etec me proporcionou, além de um ensino que realmente me preparou para o mercado de trabalho, experiências valiosas que levarei comigo para toda a vida."></p>
                <button class="testimonial-toggle">Ler Mais</button>
              </div>
            </article>

            <!-- DEP 03 -->
            <article class="testimonial-card">
              <img src="../assets/img/Dep/Dep3.jpg" alt="Antonio Marcos" class="testimonial-photo">
              <div class="testimonial-content">
                <h3 class="testimonial-name">Antonio Marcos, 21 anos</h3>
                <p class="testimonial-text" data-full="Durante meus três anos na Etec de Rio Grande da Serra, construí uma base sólida que ampliou minha visão sobre o mercado de trabalho e me preparou para os passos após o ensino médio. Com o apoio dos professores, pude direcionar meus esforços para ingressar na faculdade e continuar meu desenvolvimento. Também formei grandes amizades que contribuíram para meu crescimento profissional e pessoal."></p>
                <button class="testimonial-toggle">Ler Mais</button>
              </div>
            </article>

            <!-- DEP 04 -->
            <article class="testimonial-card">
              <img src="../assets/img/Dep/Dep4.jpg" alt="Sarah Ferreira" class="testimonial-photo">
              <div class="testimonial-content">
                <h3 class="testimonial-name">Sarah Ferreira, 20 anos</h3>
                <p class="testimonial-text" data-full="Minha experiência na ETEC foi extremamente positiva. A escola sempre ofereceu boa estrutura, professores dedicados e um ambiente que incentivou meu desenvolvimento pessoal e profissional. Vivi aprendizados que me ajudaram a ganhar maturidade, ritmo e foco. Foi um período intenso, mas muito enriquecedor."></p>
                <button class="testimonial-toggle">Ler Mais</button>
              </div>
            </article>

            <!-- DEP 05 -->
            <article class="testimonial-card">
              <img src="../assets/img/Dep/dep5.jpg" alt="Grazielly Silva" class="testimonial-photo">
              <div class="testimonial-content">
                <h3 class="testimonial-name">Grazielly Silva, 20 anos</h3>
                <p class="testimonial-text" 
                   data-full="Minha experiência na ETEC foi extremamente enriquecedora e marcou significativamente minha trajetória acadêmica e profissional. Ao longo do curso, melhorei de forma notável minha aprendizagem e desenvolvi competências fundamentais para o mercado de trabalho. A vivência na instituição me ensinou a valorizar ainda mais os estudos e compreender a importância do conhecimento para o futuro. Além disso, tive um crescimento real em diversos aspectos pessoais e profissionais. Essa formação abriu portas e ampliou minhas oportunidades, contribuindo diretamente para o meu desenvolvimento.">
                </p>
                <button class="testimonial-toggle">Ler Mais</button>
              </div>
            </article>

            <!-- DEP 06 -->
            <article class="testimonial-card">
              <img src="../assets/img/Dep/Dep6.png" alt="Pedro Rafael" class="testimonial-photo">
              <div class="testimonial-content">
                <h3 class="testimonial-name">Pedro Rafael, 18 anos</h3>
                <p class="testimonial-text" data-full="Minha experiência na ETEC marcou muito a minha trajetória. Foi lá que desenvolvi minhas habilidades, participei de projetos importantes e aprendi com professores que realmente fizeram diferença. A ETEC me ajudou a crescer como pessoa e como profissional, e sou grato por tudo o que vivi e construí durante esse período."></p>
                <button class="testimonial-toggle">Ler Mais</button>
              </div>
            </article>

            <!-- DEP 07 -->
            <article class="testimonial-card">
              <img src="../assets/img/Dep/Dep7.png" alt="Giovanna Basilio" class="testimonial-photo">
              <div class="testimonial-content">
                <h3 class="testimonial-name">Giovanna Basilio, 19 anos</h3>
                <p class="testimonial-text" data-full="Ter estudado na Etec foi um divisor de águas na minha vida, achei que estava ali só para estudar, mas aprendi coisas que vou levar para a vida, conheci professores e pessoas maravilhosas e percebi que com determinação tudo é possível, A Etec é um marco na vida de todo estudante que passa por ela."></p>
                <button class="testimonial-toggle">Ler Mais</button>
              </div>
            </article>
          </div>
        </section>
      </section>

    </div> <!-- .conteudo-wrapper -->

    <!-- RODAPÉ -->
    <section class="rodape" role="contentinfo">
      <div class="rodape-top">
        <div class="social-icons">
          <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        </div>
        <div class="atendimento">Central de Atendimento: <strong>XXXXX-XXXX</strong></div>
      </div>
      <div class="rodape-meio">
        <div class="logo"><img src="../assets/img/Logo off-white.png" alt="Logo Guia Etec"></div>
        <div class="coluna">
          <h3>Ajuda</h3>
          
          <a href="#">Entre em Contato</a>
        </div>
        <div class="coluna">
          <h3>Guia</h3>
          <a href="#">Crie sua Conta</a>
          <a href="#">Sobre Nós</a>
        </div>
        <div class="coluna">
          <h3>Termos</h3>
          <a href="#">Termos e condições</a>
          <a href="#">Política de Privacidade</a>
        </div>
      </div>
      <div class="rodape-bottom">
        Guia Etec - S.P - CNPJ: 10.760.260 / Av. Vereador Francisco Moraes Ramos, 777 - Jardim Novo Horizonte |
        Bairro CSU, Rio Grande da Serra - SP CEP: 09450-000
      </div>
    </section>

    <!-- BOTÃO DE ACESSIBILIDADE/MODO ESCURO -->
    <div class="acessibilidade-menu">
      <button id="dark-toggle" aria-pressed="false">🌙</button>
    </div>

    <!-- Botão Voltar ao Topo -->
    <button id="btn-topo" title="Voltar ao topo">↑</button>
  </div> <!-- .pagina -->

  <!-- SCRIPTS: nav mobile, mostrar seções, FAQ e modo escuro -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Hamburger menu
      const hamburger = document.getElementById('hamburger');
      const navLinks = document.getElementById('nav-links');
      const navbar = document.getElementById('navbar');
      if (hamburger && navLinks) {
        hamburger.setAttribute('aria-controls', 'nav-links');
        hamburger.setAttribute('aria-expanded', 'false');
        hamburger.addEventListener('click', (e) => {
          e.stopPropagation();
          const opened = navLinks.classList.toggle('nav-active');
          hamburger.setAttribute('aria-expanded', opened);
          document.body.classList.toggle('menu-open', opened); // trava scroll ao abrir
        });

        // fechar clicando fora do menu (apenas em mobile)
        document.addEventListener('click', (e) => {
          if (window.innerWidth <= 768 && !navbar.contains(e.target) && navLinks.classList.contains('nav-active')) {
            navLinks.classList.remove('nav-active');
            hamburger.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('menu-open');
          }
        });

        // ao redimensionar para desktop, garante menu fechado
        window.addEventListener('resize', () => {
          if (window.innerWidth > 768 && navLinks.classList.contains('nav-active')) {
            navLinks.classList.remove('nav-active');
            hamburger.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('menu-open');
          }
        });
      }

      // Mostrar seção por clique nos cards
      window.mostrarSecao = function(secao) {
        // esconde todas as seções
        document.querySelectorAll('.conteudo-secao').forEach(div => {
          div.classList.add('oculto');
        });

        const el = document.getElementById(secao);
        if (!el) return;

        // mostra a seção clicada
        el.classList.remove('oculto');

        const destino = el.getBoundingClientRect().top + window.scrollY - 150;

        window.scrollTo({
          top: destino,
          behavior: 'smooth'
        });
      };

      // FAQ toggle
      document.querySelectorAll('.faq-item').forEach(item => {
        const btn = item.querySelector('.faq-pergunta');
        btn.addEventListener('click', () => {
          item.classList.toggle('ativo');
          const expanded = item.classList.contains('ativo');
          btn.setAttribute('aria-expanded', expanded);
        });
      });

      // Dark mode toggle
      const darkToggle = document.getElementById('dark-toggle');
      if (darkToggle) {
        darkToggle.addEventListener('click', () => {
          document.body.classList.toggle('dark-mode');
          const pressed = document.body.classList.contains('dark-mode');
          darkToggle.setAttribute('aria-pressed', pressed);
        });
      }

      // === Sistema de Pesquisa ===
const campoPesquisa = document.getElementById('pesquisa');

if (campoPesquisa) {
  campoPesquisa.addEventListener('input', () => {
    const termo = campoPesquisa.value.trim().toLowerCase();

    document.querySelectorAll('.faq-item').forEach(item => {
      const pergunta = item.querySelector('.faq-pergunta')?.innerText.toLowerCase() || '';
      const resposta = item.querySelector('.faq-resposta')?.innerText.toLowerCase() || '';

      if (termo === '' || pergunta.includes(termo) || resposta.includes(termo)) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    });

    // esconder seções vazias (se nenhum .faq-item visível)
    document.querySelectorAll('.conteudo-secao').forEach(sec => {
      // NÃO fechar a seção #depoimentos - ela não tem .faq-item!
      if (sec.id === 'depoimentos') return;
      
      const anyVisible = Array.from(sec.querySelectorAll('.faq-item')).some(i => i.style.display !== 'none');
      sec.style.display = anyVisible ? '' : 'none';
    });
  });
}

// === Busca com realce + sugestões ===
const input = document.getElementById('pesquisa');
const boxSugestoes = document.getElementById('sugestoes');

if (input) {
  // utilitários
  function limparMarcacoes(el) {
    if (!el) return;
    el.innerHTML = el.innerText;
  }
  function marcarTermo(el, termo) {
    if (!el || !termo) return;
    const regex = new RegExp(`(${termo.replace(/[.*+?^${}()|[\]\\]/g,'\\$&')})`, 'gi');
    el.innerHTML = el.innerText.replace(regex, `<span class="marcado">$1</span>`);
  }

  input.addEventListener('input', () => {
    const termo = input.value.toLowerCase().trim();
    const secoes = ['dicas','curiosidades','depoimentos'];
    let encontrouAlgo = false;
    const resultadosSugestoes = [];

    // limpa sugestões
    if (boxSugestoes) { boxSugestoes.innerHTML = ''; boxSugestoes.style.display = 'none'; }

    if (termo === '') {
      // fechar tudo
      document.querySelectorAll('.conteudo-secao').forEach(div => div.classList.add('oculto'));
      return;
    }

    secoes.forEach(secaoId => {
      const secao = document.getElementById(secaoId);
      if (!secao) return;
      const itens = secao.querySelectorAll('.faq-item');
      let encontrouNaSecao = false;

      itens.forEach(item => {
        const perguntaEl = item.querySelector('.faq-pergunta');
        const respostaEl = item.querySelector('.faq-resposta');
        const pergunta = perguntaEl?.innerText.toLowerCase() || '';
        const resposta = respostaEl?.innerText.toLowerCase() || '';

        // limpar marcações antigas
        limparMarcacoes(perguntaEl);
        limparMarcacoes(respostaEl);

        if (pergunta.includes(termo) || resposta.includes(termo)) {
          item.style.display = 'block';
          encontrouNaSecao = true;
          resultadosSugestoes.push(perguntaEl?.innerText || '');
          // realce
          marcarTermo(perguntaEl, termo);
          marcarTermo(respostaEl, termo);
        } else {
          item.style.display = 'none';
        }
      });

      if (encontrouNaSecao) {
        // abre esta seção e fecha as outras
        document.querySelectorAll('.conteudo-secao').forEach(s => s.classList.add('oculto'));
        secao.classList.remove('oculto');

        // rola até a seção (ajuste offset se necessário)
        const destino = secao.getBoundingClientRect().top + window.scrollY - 120;
        window.scrollTo({ top: destino, behavior: 'smooth' });

        encontrouAlgo = true;
      }
    });

    // montar sugestões (máx 7)
    if (boxSugestoes && resultadosSugestoes.length) {
      resultadosSugestoes.slice(0,7).forEach(texto => {
        const div = document.createElement('div');
        div.className = 'sugestao-item';
        div.textContent = texto;
        div.onclick = () => {
          input.value = texto;
          input.dispatchEvent(new Event('input'));
          boxSugestoes.style.display = 'none';
        };
        boxSugestores.appendChild(div);
      });
      boxSugestoes.style.display = 'block';
    }

    // se nada encontrado em nenhuma seção -> ocultar seções
    if (!encontrouAlgo) {
      document.querySelectorAll('.conteudo-secao').forEach(div => div.classList.add('oculto'));
    }
  });

  // clicar fora fecha sugestões
  document.addEventListener('click', (e) => {
    if (boxSugestoes && !input.contains(e.target) && !boxSugestoes.contains(e.target)) {
      boxSugestoes.style.display = 'none';
    }
  });
}
    });
  </script>

  <script>
(function(){
  const btnTopo = document.getElementById("btn-topo");
  const navbarContainer = document.querySelector(".navbar-container");

  if (!btnTopo) return;

  // Mostrar/esconder botão sincronizado com a navbar fixa
  window.addEventListener("scroll", () => {
    if (navbarContainer && navbarContainer.classList.contains("navbar-fixed")) {
      btnTopo.classList.add("show");
    } else {
      btnTopo.classList.remove("show");
    }
  });

  // Ação: voltar para o topo
  btnTopo.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
})();
</script>

  <script>
    (function() {
      // --- Abrir / fechar a seção de depoimentos ---
      const section = document.getElementById('testimonials-section');
      const sectionPai = document.getElementById('depoimentos');
      const CHARS = 120; // caracteres do preview

      // Fazer depoimentos aparecerem quando clica em "Depoimentos" nos cards
      window.abrirDepoimentos = function() {
        // Fecha todas as outras seções
        document.querySelectorAll('.conteudo-secao').forEach(div => {
          div.classList.add('oculto');
        });

        // Abre a seção pai de depoimentos
        if (sectionPai) {
          sectionPai.classList.remove('oculto');
        }

        // Abre a seção interna de testimonials
        if (section) {
          section.style.display = 'block';
          section.setAttribute('aria-hidden', 'false');
          // Rola até a seção
          setTimeout(() => {
            section.scrollIntoView({ behavior: 'smooth', block: 'start' });
          }, 100);
        }
      };

      // --- Ler Mais / Ler Menos ---
      const items = document.querySelectorAll('.testimonial-card');

      items.forEach(card => {
        const textoEl = card.querySelector('.testimonial-text');
        const full = textoEl.getAttribute('data-full') || '';
        const toggleBtn = card.querySelector('.testimonial-toggle');

        // define preview inicial
        const preview = full.length > CHARS ? full.substring(0, CHARS).trim() + '...' : full;
        textoEl.textContent = preview;
        
        // guardar estado
        let isExpanded = false;

        toggleBtn.addEventListener('click', (e) => {
          e.preventDefault();
          
          if (!isExpanded) {
            // Expandir
            textoEl.textContent = full;
            toggleBtn.innerText = 'Ler Menos';
            isExpanded = true;
          } else {
            // Recolher
            textoEl.textContent = preview;
            toggleBtn.innerText = 'Ler Mais';
            isExpanded = false;
          }
        });
      });

      // Garante que a seção inicie escondida
      if (section) {
        section.style.display = 'none';
        section.setAttribute('aria-hidden', 'true');
      }
    })();
  </script>
</body>
</html>