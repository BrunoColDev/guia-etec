<?php
require_once('../backend/protecao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Guia Etec</title>

  <!-- Fontes -->
  <link
    href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Inter:wght@400;500;600;700&family=Poppins:wght@400;600;700&display=swap"
    rel="stylesheet">

  <!-- Font Awesome (SUBSTITUA ESTA LINHA) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- CSS -->
  <link rel="stylesheet" href="style.css" />
</head>
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
    --body-font: "Inter", sans-serif;
    --button-font: "Poppins", sans-serif;
  }

  /* ----------------------- RESET ----------------------- */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
  }

  body {
    font-family: var(--body-font);
    background-color: var(--dark-blue);
    display: flex;
    justify-content: center;
    border: 12px solid rgba(3, 58, 123, 0.9);
    padding: 48px 72px;
  }

  h1,
  h2,
  h3,
  .conteudos-title,
  .card-title {
    font-family: var(--title-font);
    letter-spacing: 4px;
  }

  p,
  .descricao,
  .rodape-bottom,
  .coluna a {
    font-family: var(--body-font);
  }

  .nav-links a,
  .area-do-aluno,
  .btn-yellow,
  .btn-blue,
  .card-btn {
    font-family: var(--button-font);
    font-weight: 600;
    letter-spacing: 0.5px;
  }

  /* ----------------------- CONTAINER PRINCIPAL ----------------------- */
  .pagina {
    width: 100%;
    height: 100%;
    display: flex;
    max-width: 1200px;
    flex-direction: column;
    align-items: center;
    border-radius: 40px;
    background: var(--white);
    box-shadow: 0px 0px 20px 8px rgba(30, 30, 30, 0.85);
    overflow: hidden;
  }

  /* ----------------------- NAVBAR ----------------------- */
  .navbar-container {
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 10px 0;
  }

  .navbar {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 1156px;
    padding: 10px 40px;
    border-radius: 40px;
    gap: 40px;
  }

  /* ----------------------- NAVBAR FIXA ----------------------- */
  /* navbar NÃO fixa — comportamento removido (apenas layout estático) */

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
    border: 1px solid var(--yellow-logo);
    background-color: var(--yellow-logo);
    object-fit: contain;
  }

  .nav-links {
    display: flex;
    gap: 10px;
    padding: 0 20px;
  }

  .nav-links a {
    color: white;
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 10px;
    transition: background 0.3s ease, transform 0.3s ease;
  }

  .nav-links a:hover {
    color: #FFD700;
    transform: scale(1.1);
  }

  /* Botão área do aluno */
  .area-do-aluno {
    background: linear-gradient(90deg, #218FD9, #033A7B);
    color: white;
    padding: 14px 38px;
    border: none;
    border-radius: 11px;
    cursor: pointer;
    font-weight: bold;
    transition: background 0.3s ease, transform 0.2s ease;
  }

  .area-do-aluno:hover {
    background: #1b79be;
    transform: scale(1.05);
  }

  /* botão hamburger (mobile) */
  .hamburger {
    display: none;
    background: none;
    border: none;
    font-size: 30px;
    color: var(--dark-blue);
    cursor: pointer;
  }

  @media (max-width: 768px) {
    .hamburger { display: block; }
    .nav-links { display: none; flex-direction: column; align-items: center; background: var(--dark-blue); position: absolute; top: 70px; left: 0; width: 100%; padding: 15px 0; border-radius: 0 0 20px 20px; z-index: 999; }
    .nav-links a { padding: 12px; width: 100%; text-align: center; color: white; }
    .nav-links.nav-active { display: flex; }
    .area-do-aluno { display: none; }
    .navbar { justify-content: space-between; }
  }

  /* ----------------------- HERO / Seção e-TecFacil ----------------------- */
  /* removed e-TecFacil CSS (peso morto) */
 
  /* ----------------------- RODAPÉ ----------------------- */
 .logo {
  width: 80px;
  height: 40px;
  border-radius: 70px 0 0 70px;
  object-fit: contain;
}

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

.social-icons {
      display: flex;
      gap: 18px;
      align-items: center;
    }

    .social-icons a {
      font-size: 24px;
      color: #fff;
      text-decoration: none;
      transition: transform .2s ease, color .2s ease;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
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

.logo img {
  height: 250%;
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

  /* ----------------------- ANIMAÇÃO ----------------------- */
  /* animação de fade removida para os cards (sem animação) */
  /* ----------------------- RESPONSIVO ----------------------- */
  .hamburger {
    display: none;
    background: none;
    border: none;
    font-size: 30px;
    color: var(--dark-blue);
    cursor: pointer;
  }

  @media (max-width: 768px) {
    .nav-links {
      display: none;
      flex-direction: column;
      align-items: center;
      background: var(--dark-blue);
      position: absolute;
      top: 70px;
      left: 0;
      width: 100%;
      padding: 15px 0;
      border-radius: 0 0 20px 20px;
      z-index: 999;
    }

    .nav-links a {
      padding: 12px;
      width: 100%;
      text-align: center;
      color: white;
    }

    .nav-links.nav-active {
      display: flex;
    }

    .hamburger {
      display: block;
    }

    .area-do-aluno {
      display: none;
    }

    .navbar {
      justify-content: space-between;
    }
  }

  /* ----------------------- NOVO ESTILO CARD ----------------------- */

  /* ====== CARDS GUIA ETEC (visual idêntico à imagem) ====== */
.cards-guiaetec {
  width: 100%;
  padding: 6px 0; /* menos espaçamento acima/abaixo */
  box-sizing: border-box;
}

.cards-guiaetec.hidden {
  display: none;
}

.cards-container {
  display: flex;
  justify-content: flex-start; /* alinha à esquerda, perto da borda interna */
  gap: 18px;                    /* distância entre cards */
  flex-wrap: wrap;
  padding-inline: 20px;         /* recuo interno igual para todos */
  box-sizing: border-box;
}

.card-guia {
  flex: 0 0 260px;
  max-width: 260px;
  background: #ffffff;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.12);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  height: 400px;  
}

.card-guia:hover {
  transform: translateY(-6px);
  transition: transform .25s;
}

.card-guia img {
  width: 100%;
  height: 160px;
  object-fit: cover;
  background: #004aad;
}

.conteudo-card {
  padding: 20px 18px;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.conteudo-card-4 {
  padding: 16px 16px;
  display: flex;
  flex-direction: column;
  flex-grow: 1; 
}

.categoria {
  font-size: 12px;
  color: #6b6b6b;
  text-transform: uppercase;
}

.card-guia h3 {
  font-size: 18px;
  margin: 8px 0;
  color: #003d82;
  font-weight: 700;
}

.data {
  font-size: 13px;
  color: #2e2e2e;
  display: block;
  margin-bottom: 8px;
}

.card-guia p {
  font-size: 15px;
  color: #3a3a3a;
  margin-bottom: auto;  /* empurra "ler mais" para o final */
}

.ler-mais {
  display: block;
  margin-top: 16px;
  font-weight: 600;
  color: #0056cc;
  text-decoration: none;
  font-size: 14px;
  cursor: pointer;
}

/* Card horizontal: responsivo e não fixo em telas grandes */
.card-horizontal {
  display: flex;
  gap: 18px;
  background: #fff;
  border-radius: 18px;
  padding: 0;
  box-shadow: 0 4px 12px rgba(0,0,0,0.12);
  margin-top: 12px;
  width: 100%;
  max-width: 100%;
  height: auto;
  overflow: hidden;
  transition: transform .2s ease, box-shadow .2s ease;
  flex: 1 1 100%; /* permite crescer / encolher conforme o container */
  flex-direction: row;
}

.card-horizontal img {
  width: 180px;
  height: 160px;
  object-fit: cover;
  flex-shrink: 0;
  border-radius: 0;
}

.card-horizontal-content {
  padding: 16px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  flex: 1;
}

/* Hover */
.card-horizontal:hover {
  transform: translateY(-6px);
  box-shadow: 0 6px 16px rgba(0,0,0,0.18);
}

/* Em telas muito largas pode aumentar a imagem um pouco */
@media (min-width: 1200px) {
  .card-horizontal img { width: 220px; height: 160px; }
}

/* Já em telas pequenas vira coluna (mobile) */
@media (max-width: 768px) {
  .card-horizontal {
    flex-direction: column;
    padding: 16px;
  }

  .card-horizontal img {
    width: 100%;
    height: auto;
    border-radius: 14px;
    margin-bottom: 12px;
  }

  .card-horizontal-content {
    align-items: center;
    text-align: center;
  }
}

/* BOTÃO VOLTAR AO TOPO */
#btn-topo {
  position: fixed;
  right: 5px;
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
</style>

<body>
  <!-- --------------------- V LIBRAS --------------------- -->
  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper></div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>new window.VLibras.Widget('https://vlibras.gov.br/app');</script>

  <div class="pagina">

    <!-- --------------------- NAVBAR --------------------- -->
    <!-- --------------------- NAVBAR --------------------- -->
<div class="navbar-container">
  <div class="navbar">
    
    <!-- BLOCO DA LOGO + LINKS -->
    <div class="logo-links">
      <img src="../assets/img/Logo.png" alt="Logo Guia Etec" class="logonav" />

      <!-- LINKS DO MENU -->
      <div class="nav-links" id="nav-links">
        <a href="../inicio.php">Início</a>
        <a href="../pages/Calendario.php">Calendário</a>
        <a href="../pages/simulado.php">Simulados</a>
        <a href="../pages/conteudos.php">Conteúdos</a>
        <a href="../pages/sobre.html">Sobre Nós</a>
      </div>
    </div>

    <!-- BOTÃO ÁREA DO ALUNO (desktop) -->
    <button class="area-do-aluno"
            onclick="window.location.href='../backend/login.php'">
      Área do Aluno
    </button>

    <!-- 🔥 HAMBURGUER DO MENU (mobile) -->
    <button class="hamburger" id="hamburger" aria-label="Abrir menu">
      &#9776;
    </button>

  </div>
</div>

    
    <!-- ===================== CONTEÚDOS – NOVOS CARDS ===================== -->
    <section style="padding:10px 5px; width:100%; max-width:1200px;">

     <!-- ====== CARDS GUIA ETEC ====== -->
      <section id="cards-guiaetec" class="cards-guiaetec">
        <div class="cards-container">

          <!-- Card 1 - Resumos -->
          <div class="card-guia">
            <img src="../assets/img/site Cards/Resumos.png" alt="Resumos">
            <div class="conteudo-card">
              <span class="categoria">CATEGORIA: Orientações Úteis</span>
              <h3><span class="emoji">📚</span> Resumos</h3>
              <span class="data">🕒 Dezembro 5, 2025</span>
              <p>Conteúdos objetivos para revisar rápido e fixar os pontos mais importantes.</p>
              <a href="../pages/resumos.php" class="ler-mais">Ler mais →</a>
            </div>
          </div>

          <!-- Card 2 - Vídeo Aulas -->
<div class="card-guia">
  <img src="../assets/img/site Cards/Videoaulas.png" alt="Vídeo Aulas">
  <div class="conteudo-card">
    <span class="categoria">Canal: <u>Bora pra ETEC</u></span>
    <h3><span class="emoji">🎥</span> Vídeo Aulas</h3>
    <span class="data">🕒 Dezembro 5, 2025</span>
    <p>Aulas claras e práticas para entender o conteúdo de forma visual e direta.</p>

    <a href="../pages/videoaulas.php" 
       class="ler-mais" 
       onclick="marcarConteudo(2)">
       Ler mais →
    </a>
  </div>
</div>


          <!-- Card 3 - Simulados -->
          <div class="card-guia">
            <img src="../assets/img/site Cards/Simulados.png" alt="Simulados">
            <div class="conteudo-card">
              <span class="categoria">CATEGORIA: Experiências Reais</span>
              <h3><span class="emoji">📝</span> Simulados</h3>
              <span class="data">🕒 Dezembro 5, 2025</span>
              <p>Questões no estilo do Vestibulinho para treinar e avaliar seu desempenho.</p>
              <a href="../pages/simulado.php" class="ler-mais">Ler mais →</a>
            </div>
          </div>

          <!-- Card 4 - Recomendações de Planos de Estudo -->
          <div class="card-guia">
            <img src="../assets/img/site Cards/recomendacao.png" alt="Recomendações de Planos de Estudo">
            <div class="conteudo-card-4">
              <span class="categoria">CATEGORIA: Guia e Orientações</span>
              <h3><span class="emoji">💡</span> Recomendações de Planos de Estudo</h3>
              <span class="data">🕒 Dezembro 5, 2025</span>
              <p>Sugestões para melhorar seu desempenho.</p>
              <a href="../pages/planos.php" class="ler-mais">Ler mais →</a>
            </div>
          </div>

          <!-- Card 5 - Dicas e Curiosidades (Horizontal) -->
          <div class="card-horizontal">
            <img src="../assets/img/site cards/dec.png" alt="Dicas e Curiosidades">

            <div class="card-horizontal-content">
              <span class="categoria">CATEGORIA: Guia e Orientações</span>

              <h3><span class="emoji">💡</span> Dicas e Curiosidades</h3>

              <span class="data">🕒 Dezembro 5, 2025</span>

              <p>
                Informações úteis, truques de estudo, curiosidades sobre o Vestibulinho e boas práticas que ajudam no
                desempenho escolar.
              </p>

              <a href="../pages/dec.php" class="ler-mais">Ler mais →</a>
            </div>
          </div>
        </div>
      </section>
    </section>

    <!-- --------------------- RODAPÉ --------------------- -->
    <section class="rodape">
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
          <a href="#">Crie sua Conta</a>
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
    </section>
  </div>

  <!-- --------------------- SCRIPT ÚNICO --------------------- -->
  <!-- SCRIPTS CONSOLIDADOS: hamburger + voltar ao topo (único) -->
   <script>
   (function() {
     const navBarEl = document.querySelector('.navbar');
     const navLinks = document.getElementById('nav-links');

     // Menu mobile (cria o botão apenas uma vez)
     if (navBarEl && !document.getElementById('hamburger')) {
       const hamburger = document.createElement('button');
       hamburger.className = 'hamburger';
       hamburger.id = 'hamburger';
       hamburger.setAttribute('aria-label', 'Abrir menu');
       hamburger.innerHTML = '&#9776;';
       navBarEl.appendChild(hamburger);

       if (navLinks) {
         hamburger.addEventListener('click', () => {
           navLinks.classList.toggle('nav-active');
         });
       }
     }

     // Botão voltar ao topo (um único controle)
     const btnTopo = document.getElementById('btn-topo');
     if (btnTopo) {
       const SHOW_AT = 300;
       window.addEventListener('scroll', () => {
         if (window.scrollY >= SHOW_AT) btnTopo.classList.add('show');
         else btnTopo.classList.remove('show');
       });

       btnTopo.addEventListener('click', () => {
         window.scrollTo({ top: 0, behavior: 'smooth' });
       });
     }
   })();
   </script>

  <!-- Botão Voltar ao Topo -->
  <button id="btn-topo" title="Voltar ao topo">↑</button>



  <script>
// ==============================
// SISTEMA DE PROGRESSO - LOCALSTORAGE
// ==============================

// Carrega progresso salvo
let progress = JSON.parse(localStorage.getItem("guiaEtecProgress") || "{}");

// Estrutura padrão
if (!progress.conteudos) progress.conteudos = {};
if (!progress.simulados) progress.simulados = {};

// Salva no localStorage
function salvarProgresso() {
    localStorage.setItem("guiaEtecProgress", JSON.stringify(progress));
}

// ===== CONTEÚDOS =====
function marcarConteudo(id) {
    progress.conteudos[id] = true;
    salvarProgresso();
}
function conteudoAssistido(id) {
    return !!progress.conteudos[id];
}

// ===== SIMULADOS =====
function marcarSimulado(id, nota) {
    progress.simulados[id] = {
        feito: true,
        nota: nota,
        data: new Date().toLocaleString("pt-BR")
    };
    salvarProgresso();
}
function simuladoFeito(id) {
    return progress.simulados[id]?.feito === true;
}
function notaSimulado(id) {
    return progress.simulados[id]?.nota || null;
}

// ==============================
// CARREGA DADOS NA ÁREA DO ALUNO
// ==============================
document.addEventListener("DOMContentLoaded", () => {
    // ---- Conteúdos assistidos ----
    const conteudosBox = document.querySelector(".content-box:nth-of-type(1) .videos-grid");
    conteudosBox.innerHTML = "";

    const conteudos = Object.keys(progress.conteudos);

    if (conteudos.length === 0) {
        conteudosBox.innerHTML = "<p style='opacity:.6'>Nenhum conteúdo assistido ainda.</p>";
    } else {
        conteudos.forEach(id => {
            conteudosBox.innerHTML += `
                <div class="video-thumb" style="background:#033A7B; font-size:20px; padding:10px;">
                    ✔ Conteúdo ${id}
                </div>
            `;
        });
    }

    // ---- Simulados feitos ----
    const simuladosBox = document.querySelector(".content-box:nth-of-type(2) .videos-grid");
    simuladosBox.innerHTML = "";

    const simulados = Object.keys(progress.simulados);

    if (simulados.length === 0) {
        simuladosBox.innerHTML = "<p style='opacity:.6'>Nenhum simulado realizado ainda.</p>";
    } else {
        simulados.forEach(id => {
            const sim = progress.simulados[id];
            simuladosBox.innerHTML += `
                <div class="video-thumb" style="background:#212B78; font-size:14px; padding:10px; line-height:1.2;">
                    📝 Simulado ${id}<br>
                    Nota: <b>${sim.nota}%</b><br>
                    <small>${sim.data}</small>
                </div>
            `;
        });
    }
});
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {

  const hamburger = document.getElementById("hamburger");
  const navLinks = document.getElementById("nav-links");

  hamburger.addEventListener("click", () => {
    navLinks.classList.toggle("nav-active");
  });

});
</script>


</body>
</html>