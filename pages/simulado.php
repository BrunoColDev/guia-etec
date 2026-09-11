<?php
require_once('../backend/protecao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8"/>
  <title>Simulados - Guia ETEC</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- Fonts e Font Awesome -->
  <link href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Inter:wght@400;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <!-- Seu CSS principal -->
  <link rel="stylesheet" href="../assets/css/style.css"/>

  <style>
    /* garantia: navbar fixa com alta especificidade */
    .navbar-container.navbar-fixed {
      position: fixed;
      top: 10px;
      left: 50%;
      transform: translateX(-50%);
      width: 90%;
      max-width: 1156px;
      padding: 0;
      border-radius: 25px;
      background: rgba(255,255,255,0.15);
      backdrop-filter: blur(12px);
      z-index: 1300;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      transition: all 0.3s ease;
    }

    /* Remova qualquer position:relative em .navbar-container abaixo (não sobrescrever) */
    .navbar-container { /* apenas visual, sem position */ width:100%; border-radius:40px 40px 0 0; z-index:1299; }

    :root {
  --color-primary: #004AAD;
  --color-secondary: #4A90E2;
  --color-accent: #FFD700;
  --color-dark: #1A1A1A;
  --color-white: #FFFFFF;
  --color-bg-light: #EAF2FB;
    --yellow: #FFCC00;
    --yellow-logo: #f8be35;
    --dark-blue: #033A7B;
    --nav-blue: #212B78;
    --button-blue: #218FD9;
    --light-blue: #218FD9;
    --mid-blue: #4A90E2;
    --dark: #1A1A1A;
    --white: #FFF;
    --gelo: #fffafa;
    --title-font: "Bowlby One", sans-serif;
    --body-font: "Inter", sans-serif;
    --button-font: "Poppins", sans-serif;
    --spacing-unit: 8px;
    --transition-speed: 0.3s;
    --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.1);
    --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.15);
    --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.2);
}

/* Fundo azul e respiro para a folha branca */
body {
  background: linear-gradient(180deg, var(--dark-blue) 0%, #012B5C 100%);
  padding: 48px 72px;
  min-height: 100vh;
  margin: 0;
  box-sizing: border-box;
  font-family: var(--body-font);
}


/* ===== POP-UP DE CONTEÚDOS (estilos iguais ao início) ===== */
    .popup-conteudos {
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.6);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }
    .popup-card {
      background: #fff;
      width: 380px;
      padding: 28px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 8px 30px rgba(0,0,0,0.25);
    }
    .popup-card h2 { font-size: 22px; margin-bottom: 18px; color:#033A7B; }
    .popup-item {
      display:block; margin:10px 0; padding:12px; border-radius:8px;
      background:#033A7B; color:#fff; text-decoration:none; font-weight:600;
    }
    .popup-item:hover { background:#0552ab; }
    .popup-close {
      margin-top:14px; background:#ddd; padding:8px 14px; border-radius:8px; border:0; cursor:pointer;
    }
    @media (max-width: 720px) {
      .popup-card { width: calc(100% - 40px); max-width:380px; }
    }
    /* ===== fim popup ===== */

/* Folha branca — TUDO dentro dela: navbar, conteúdo, rodapé */
.pagina-simulados {
  width: 100%;
  height: 100%;
  max-width: 1156px;
  margin: 0 auto;
  border-radius: 40px;
  background: var(--white);
  box-shadow: 0px 0px 20px 8px rgba(30,30,30,0.85);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  align-items: stretch;
}

/* NAVBAR */
.navbar-container {
  width: 100%;
  border-radius: 40px 40px 0 0;
}
.navbar {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 40px;
}
.logo-links {
  display: flex;
  align-items: center;
  gap: 5px;
  background: var(--dark-blue);
  border-radius: 30px;
  padding: 3px;
}

    .logonav {
      width: 80px;
      height: 40px;
      border-radius: 70px 0 0 70px;
      border: 1px solid var(--yellow);
      background-color: var(--yellow);
      object-fit: contain;
    }

.nav-links {
  display: flex;
  gap: 10px;
  padding: 0 20px;
}
.nav-links a {
  color: white;
  padding: 8px 12px;
  border-radius: 10px;
  font-family: var(--button-font);
  font-weight: 600;
  letter-spacing: 0.5px;
  transition: background 0.3s;
  background: none;
  text-decoration: none;
}
.nav-links a:hover {
  color: var(--yellow);
  transform: scale(1.07);
}
.area-do-aluno {
  background: linear-gradient(90deg, var(--button-blue), var(--dark-blue));
  color: white;
  padding: 13px 36px;
  border: none;
  border-radius: 11px;
  cursor: pointer;
  font-weight: bold;
  transition: background 0.3s ease, transform 0.2s ease;
  font-family: var(--button-font);
}
.area-do-aluno:hover {
  background: #1b79be;
  transform: scale(1.05);
}

.hero-content {
  animation: fadeInLeft 0.8s ease-out;
}

/* Header Simulados */
/* ===== NOVO LAYOUT DO CONTEÚDO PRINCIPAL ===== */
.simulados-header {
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  padding: calc(var(--spacing-unit) * 10) calc(var(--spacing-unit) * 4);
  color: var(--color-white);
  position: relative;
  overflow: hidden;
  height: 20%;
  width: 100%;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  padding: 50px 10px 50px 50px;
  display: flex;
  border-radius: 0 0 40px 40px;
  flex-wrap: wrap;
  gap: 60px;
}

.simulados-conteudo {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 60px;
  flex-wrap: wrap;
  width: 100%;
}

.simulados-texto {
  flex: 1;
  min-width: 280px;
}

.simulados-texto h1 {
  font-family: var(--title-font);
  font-size: 2.6rem;
  color: var(--color-white);
  margin-bottom: 18px;
  text-shadow: 0 4px 14px #dbefff3f;
}

.simulados-texto p {
  font-size: 1.2rem;
  color: var(--color-white);
  line-height: 1.6;
  max-width: 100%;
}

.simulados-mascote {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
}

.simulados-mascote img {
  width: 75%;
  max-width: 100%;
  border-radius: 30%;
  padding: 10px;
  animation: flutuar 3s ease-in-out infinite;
  filter: drop-shadow(0 3px 9px #033A7B15);
}

@keyframes flutuar {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

/* Responsivo */
@media (max-width: 768px) {
  .simulados-header {
    flex-direction: column;
    padding: 40px 5%;
    text-align: center;
  }
  .simulados-conteudo {
    flex-direction: column;
    align-items: center;
  }
  .simulados-texto p {
    max-width: 100%;
  }
  .simulados-mascote img {
    width: 200px;
  }
}

/* Cards de Simulado/Matérias */
.simulados-grid {
  display: flex;
  flex-wrap: nowrap;
  justify-content: center;
  padding: 0px 72px;
  gap: 30px;
  margin: 26px 0 0 0;
  width: 100%;
  padding-bottom: 28px;
  overflow-x: auto;
}

.simulado-card {
  background: #fff;
  border-radius: 18px;
  box-shadow: 0 4px 22px rgba(33,143,217,0.08);
  border: 2.7px solid var(--yellow);
  padding: 34px 36px;
  display: flex;
  flex-direction: column;
  align-items: center;
  cursor: pointer;
  min-width: 200px;
  min-height: 126px;
  max-width: 200px;
  flex: 0 0 200px;
  transition: transform .16s, box-shadow .2s, border-color .22s;
  text-align: center;
  position: relative;
}

.simulado-card:hover {
  border-color: var(--button-blue);
  background: #e4f1fd;
  box-shadow: 0 8px 32px #4A90E280;
  transform: translateY(-4px) scale(1.04);
}
.simulado-card .icon {
  font-size: 2.1rem;
  margin-bottom: 12px;
  color: var(--button-blue);
  text-shadow: 0 1px 6px #e5eefd6c;
}
.simulado-card .titulo-materia {
  font-family: var(--button-font);
  color: var(--dark-blue);
  font-size: 1.10rem;
  font-weight: 700;
  letter-spacing: 0.6px;
  margin-bottom: 6px;
}
.simulado-card small {
  color: var(--nav-blue);
  font-size: 0.93rem;
  font-family: var(--body-font);
  opacity: 0.65;
}

/* RODAPÉ */

.rodape {
  background-color: #0E2C56;
  color: #fff;
  padding: 90px;
  width: 100%;
  border-radius: 0 0 40px 40px;
  letter-spacing: normal;
  font-weight: normal;
}

.rodape-meio,
.rodape-meio * {
  font-family: Arial, sans-serif !important;
  letter-spacing: normal !important;
  font-weight: normal !important;
}

.rodape-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 2px solid #fff;
  padding-bottom: 12px;
  margin-bottom: 20px;
}

.social-icons a {
  margin-right: 15px;
  font-size: 22px;
  color: #fff;
  text-decoration: none;
  transition: transform .2s ease, color .2s ease;
}

.social-icons a:hover {
  transform: scale(1.15);
  color: #FFD23F;
}



.atendimento {
  font-size: 16px;
  font-weight: bold;
}

.rodape-meio {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  flex-wrap: wrap;
  margin-bottom: 20px;
}

    .logo {
      width: 80px;
      height: 40px;
      border: 1px solid #012B5C;
      background-color: transparent;
      border-radius: 70px 0 0 70px;
      object-fit: contain;
    }

.coluna {
  min-width: 160px;
}

.coluna h3 {
  font-size: 18px;
  margin-bottom: 8px;
  font-weight: bold;
}

.coluna a {
  display: block;
  color: #fff;
  text-decoration: none;
  font-size: 14px;
  margin-bottom: 6px;
}

.coluna a:hover {
  color: #FFCC00;
}

.rodape-bottom {
  text-align: center;
  font-size: 12px;
  border-top: 1px solid #fff;
  padding-top: 12px;
  line-height: 1.4;
}

/* Corrige fundo amarelo da logo do rodapé */
.rodape .logo,
.rodape .logo img {
  background: transparent !important;
  border: none !important;
}

/* Ajuste seguro do tamanho (evita stretch que mostra fundo inesperado) */
.rodape .logo img {
  height: auto !important;
  max-height: 80px; /* ajuste conforme necessário */
  display: block;
}

/* RESPONSIVO */
@media (max-width: 1156px) {
  .pagina-simulados { max-width: 100vw; }
}
@media (max-width: 1024px) {
  .pagina-simulados { max-width: 100vw; padding: 0 12px; }
}
@media (max-width: 820px) {
  body { padding: 12px; }
  .pagina-simulados { border-radius: 18px; }
}

/* MOBILE: menu, logo arredondada, mascot maior, cards empilhados */
@media (max-width: 768px) {
  .navbar {
    width: 100%;
    padding: 10px 14px;
    gap: 12px;
    border-radius: 12px;
    justify-content: space-between;
    position: relative;
  }

  /* logo totalmente arredondada no mobile */
  .logonav {
    width: 56px;
    height: 56px;
    object-fit: contain;
    border-radius: 14px !important; /* todos os cantos arredondados */
  }

  /* hamburger */
  .hamburger { display: block; background: none; border: none; font-size: 28px; color: gray; cursor: pointer; }

  /* menu oculto e exibido via classe nav-active */
  .nav-links {
    display: none;
    position: absolute;
    top: 72px;
    left: 12px;
    right: 12px;
    background: var(--dark-blue);
    padding: 12px;
    border-radius: 12px;
    flex-direction: column;
    gap: 8px;
    z-index: 1300;
  }
  .nav-links.nav-active { display: flex; }
  .nav-links a { color: #fff; padding: 10px 12px; border-radius: 8px; display: block; text-align: center; }

  /* esconde botão grande e usa menu (opcional) */
  .area-do-aluno { display: none; }

  /* header empilhado e centralizado */
  .simulados-header { padding: 28px 6%; text-align: center; align-items: center; gap: 18px; }
  .simulados-texto h1 { font-size: 1.8rem; }
  .simulados-texto p { font-size: 1rem; }

  /* mascote maior */
  .simulados-mascote img { width: 220px; max-width: 80%; border-radius: 20px; }

  /* grid: duas colunas até caber, depois 1 coluna */
  .simulados-grid { padding: 0 12px; gap: 14px; justify-content: center; }
  .simulado-card { flex: 1 1 45%; min-width: 140px; max-width: 48%; padding: 18px; }

  .rodape { padding: 48px 20px; border-radius: 0 0 12px 12px; }
  .rodape-top { flex-direction: column; gap: 12px; text-align: center; }
  .rodape-meio { flex-direction: column; gap: 12px; align-items: center; }
}

/* telas bem pequenas */
@media (max-width: 420px) {
  .logonav { width: 52px; height: 40px; border-radius: 12px !important; }
  .simulados-mascote img { width: 240px; }
  .simulado-card { flex: 1 1 100%; max-width: 100%; padding: 12px; }
  .simulados-texto h1 { font-size: 1.4rem; }
  .simulados-texto p { font-size: 0.98rem; }
  .nav-links { top: 64px; left: 8px; right: 8px; padding: 10px; }
}








/* ==========================================================
   COMPLEMENTO RESPONSIVO — SEM ALTERAR NENHUMA REGRA EXISTENTE
   ==========================================================*/

/* Garantir que o hamburger sempre apareça no mobile */
@media (max-width: 900px) {
  .hamburger {
    display: block !important;
    z-index: 1400;
  }
}

/* Garantir que o menu mobile apareça corretamente */
@media (max-width: 900px) {
  .nav-links {
    position: absolute !important;
    top: 70px !important;
    right: 15px !important;
    left: 15px !important;
    background: var(--dark-blue) !important;
    display: none;
    flex-direction: column;
    padding: 14px 10px;
    border-radius: 14px;
    z-index: 1500 !important;
  }

  .nav-links.nav-active {
    display: flex !important;
  }

  .nav-links a {
    text-align: center;
    padding: 12px 8px;
    font-size: 1.05rem;
  }
}

/* Evitar que o menu corte quando a navbar fica fixa */
.navbar-container.navbar-fixed .nav-links {
  top: 82px !important;
}

/* Ajuste da logo no mobile (não quebra seu layout atual) */
@media (max-width: 768px) {
  .logonav {
    width: 60px !important;
    height: 60px !important;
    border-radius: 16px !important;
  }

  .navbar {
    justify-content: space-between !important;
    padding: 8px 14px !important;
  }
}

/* Ajuste header para nunca estourar em telas menores */
@media (max-width: 768px) {
  .simulados-header {
    padding: 28px 20px !important;
    text-align: center !important;
  }

  .simulados-conteudo {
    flex-direction: column !important;
    gap: 20px !important;
  }

  .simulados-texto h1 {
    font-size: 1.9rem !important;
  }
}

/* Ajuste dos cards no mobile */
@media (max-width: 768px) {
  .simulados-grid {
    padding: 0 16px !important;
    gap: 18px !important;
  }

  .simulado-card {
    flex: 1 1 45% !important;
    max-width: 48% !important;
    min-width: 150px !important;
    padding: 20px !important;
  }
}

@media (max-width: 420px) {
  .simulado-card {
    flex: 1 1 100% !important;
    max-width: 100% !important;
  }
}

/* Mascote mais proporcional no mobile */
@media (max-width: 768px) {
  .simulados-mascote img {
    width: 220px !important;
    max-width: 85% !important;
    border-radius: 20px !important;
  }
}

/* Footer corrigido no mobile */
@media (max-width: 768px) {
  .rodape {
    padding: 50px 20px !important;
    text-align: center;
  }

  .rodape-top,
  .rodape-meio {
    flex-direction: column !important;
    gap: 16px !important;
    align-items: center !important;
  }
}

</style>
</head>
<body>
  <div class="pagina-simulados">
     <!-- NAVBAR -->
    <div class="navbar-container">
      <div class="navbar">
        <div class="logo-links">
          <img src="../assets/img/Logo.png" alt="Logo Guia Etec" class="logonav" />
          <div class="nav-links" id="nav-links">
            <a href="../inicio.php">Início</a>
            <a href="Calendario.php">Calendário</a>
            <a href="simulado.php">Simulados</a>
            <!-- botão Conteúdos como link para herdar estilo -->
            <a href="conteudos.php" id="btn-conteudos" aria-haspopup="dialog" aria-controls="popup-conteudos">Conteúdos ▾</a>
            <a href="sobre.html">Sobre Nós</a>
          </div>
        </div>

        <button id="hamburger" class="hamburger" aria-label="Abrir menu">&#9776;</button>
        <button class="area-do-aluno" onclick="window.location.href='../backend/login.php'">Área do Aluno</button>
      </div>
    </div>

    <!-- POP-UP DE CONTEÚDOS -->
    <div id="popup-conteudos" class="popup-conteudos" aria-hidden="true">
      <div class="popup-card" role="dialog" aria-modal="true" aria-labelledby="popup-conteudos-title">
        <h2 id="popup-conteudos-title">Conteúdos Disponíveis</h2>

        <a href="conteudos.php" class="popup-item">CONTEÚDO <br> PREPARATÓRIO</a>
        <a href="dec.php" class="popup-item">DICAS E <br> CURIOSIDADES</a>
        <a href="mapa.php" class="popup-item">ENCONTRE AS <br> ETECs</a>

        <button id="close-popup" class="popup-close" aria-label="Fechar">Fechar</button>
      </div>
    </div>

    <!-- CONTEÚDO PRINCIPAL -->
<section class="simulados-header">
  <div class="simulados-conteudo">
    <div class="simulados-texto">
      <h1><i class="fa-solid fa-laptop-code"></i> Simulados Online</h1>
      <p>
        Teste seus conhecimentos com nossos simulados inspirados nas provas reais da ETEC!
        Escolha uma disciplina e pratique à vontade. Resultados instantâneos para você acompanhar seu progresso.
      </p>
    </div>

    <div class="simulados-mascote">
      <img src="../assets/img/mascoteGuia.png" alt="Mascote Guia Etec">
    </div>
  </div>
</section>

    <div class="simulados-grid">
      <div class="simulado-card" onclick="window.location.href='simuMat.php'">
        <div class="icon"><i class="fa-solid fa-square-root-variable"></i></div>
        <div class="titulo-materia">Matemática</div>
        <small>Simulado oficial</small>
      </div>
      <div class="simulado-card" onclick="window.location.href='simuPor.php'">
        <div class="icon"><i class="fa-solid fa-book-open"></i></div>
        <div class="titulo-materia">Português</div>
        <small>Simulado oficial</small>
      </div>
      <div class="simulado-card" onclick="window.location.href='simuCien.php'">
        <div class="icon"><i class="fa-solid fa-flask"></i></div>
        <div class="titulo-materia">Ciências</div>
        <small>Provas resolvidas</small>
      </div>
      <div class="simulado-card" onclick="window.location.href='simuHist.php'">
        <div class="icon"><i class="fa-solid fa-landmark"></i></div>
        <div class="titulo-materia">História</div>
        <small>Conteúdo atualizado</small>
      </div>
      <div class="simulado-card" onclick="window.location.href='simuMat.php'">
        <div class="icon"><i class="fa-solid fa-globe-americas"></i></div>
        <div class="titulo-materia">Geografia</div>
        <small>Pratique agora</small>
      </div>
    </div>

    <!-- RODAPÉ -->
    <footer class="rodape">
      <div class="rodape-top">
        <div class="social-icons">
          <!-- Instagram -->
          <a href="https://www.instagram.com/guiaetec/" 
             target="_blank" 
             rel="noopener noreferrer"
             aria-label="Instagram Guia Etec">
            <i class="fab fa-instagram"></i>
          </a>

          <!-- Facebook -->
          <a href="https://www.facebook.com/profile.php?id=61584199692540"
             target="_blank" 
             rel="noopener noreferrer"
             aria-label="Facebook Guia Etec">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>

        <div class="atendimento">
          Central de Atendimento: <strong>XXXXX-XXXX</strong>
        </div>
      </div>

      <div class="rodape-meio">
        <div class="logo">
          <img src="../assets/img/Logo off-white.png" alt="Logo Guia Etec">
        </div>

        <div class="coluna">
          <h3>Ajuda</h3>
          <a href="#">Entre em Contato</a>
        </div>

        <div class="coluna">
          <h3>Guia</h3>
          <a href="login.html">Crie sua Conta</a>
          <a href="sobre.html">Sobre Nós</a>
        </div>

        <div class="coluna">
          <h3>Termos</h3>
          <a href="politica.html">Termos e condições</a>
          <a href="politica.html">Política de Privacidade</a>
        </div>
      </div>

      <div class="rodape-bottom">
        Guia Etec - S.P - CNPJ: 10.760.260 / Av. Vereador Francisco Moraes Ramos, 777 - Jardim Novo Horizonte |
        Bairro CSU, Rio Grande da Serra - SP CEP: 09450-000
      </div>
    </footer>
  </div>

  <script>
    function abrirSimulado(url) {
      window.open(url, "_blank");
    }
  </script>

  <!-- JS: toggler do menu mobile (simples e protegido) -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const hamburger = document.getElementById('hamburger');
      const navLinks = document.getElementById('nav-links');
      const navbar = document.querySelector('.navbar');
      if (!hamburger || !navLinks || !navbar) return;

      hamburger.addEventListener('click', (e) => {
        e.stopPropagation();
        navLinks.classList.toggle('nav-active');
        hamburger.setAttribute('aria-expanded', navLinks.classList.contains('nav-active'));
      });

      // Fechar ao clicar fora
      document.addEventListener('click', (e) => {
        if (window.innerWidth <= 768 && !navbar.contains(e.target) && navLinks.classList.contains('nav-active')) {
          navLinks.classList.remove('nav-active');
          hamburger.setAttribute('aria-expanded', 'false');
        }
      });

      // ajustar ao redimensionar
      window.addEventListener('resize', () => {
        if (window.innerWidth > 768 && navLinks.classList.contains('nav-active')) {
          navLinks.classList.remove('nav-active');
          hamburger.setAttribute('aria-expanded', 'false');
        }
      });
    });




    
  </script>



<script>
  function marcarSimulado(id, nota) {
      let progress = JSON.parse(localStorage.getItem("guiaEtecProgress") || "{}");

      if (!progress.simulados) progress.simulados = {};

      progress.simulados[id] = {
          feito: true,
          nota: nota,
          data: new Date().toLocaleString("pt-BR")
      };

      localStorage.setItem("guiaEtecProgress", JSON.stringify(progress));
  }
  </script>

</body>
</html>