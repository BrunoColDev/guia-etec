<?php
require_once('../backend/protecao.php');
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <title>Área do Aluno - Guia ETEC</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Fonts e Font Awesome -->
  <link
    href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Inter:wght@400;700&family=Poppins:wght@600&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- Seu CSS principal -->
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<style>
  :root {
    --yellow: #FFCC00;
    --yellow-logo: #f8be35;
    --dark-blue: #033A7B;
    --nav-blue: #212B78;
    --button-blue: #218FD9;
    --white: #FFF;
    --dark: #1A1A1A;
    --title-font: "Bowlby One", sans-serif;
    --body-font: "Inter", sans-serif;
    --button-font: "Poppins", sans-serif;
  }

  body {
    background: linear-gradient(180deg, var(--dark-blue) 0%, #012B5C 100%);
    padding: 48px 72px;
    min-height: 100vh;
    margin: 0;
    font-family: var(--body-font);
    box-sizing: border-box;
  }

  /* FOLHA BRANCA */
  .pagina-area-aluno {
    width: 100%;
    max-width: 1156px;
    background: var(--white);
    border-radius: 40px;
    box-shadow: 0 0 20px 8px rgba(30, 30, 30, 0.85);
    margin: 0 auto;
    overflow: hidden;
    display: flex;
    flex-direction: column;
  }

  /* NAVBAR (igual simulados) */
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
    width: 72px;
    height: 38px;
    border: 1px solid var(--yellow-logo);
    background-color: var(--yellow-logo);
    border-radius: 70px 0 0 70px;
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
    text-decoration: none;
    transition: 0.3s;
  }

  .nav-links a:hover {
    color: var(--yellow);
    transform: scale(1.07);
  }

  .area-do-aluno-btn {
    background: linear-gradient(90deg, var(--button-blue), var(--dark-blue));
    color: white;
    padding: 13px 36px;
    border-radius: 11px;
    border: none;
    cursor: pointer;
    
    font-family: var(--button-font);
    transition: 0.3s;
  }

  .area-do-aluno-btn:hover {
    transform: scale(1.05);
  }

  /* -------------------------------------- */
  /* CONTEÚDO DA ÁREA DO ALUNO */
  /* -------------------------------------- */

  .aluno-wrapper {
    display: grid;
    grid-template-columns: 260px 1fr;
    gap: 30px;
    padding: 40px;
  }

  /* CARD LATERAL */
  .profile-card {
    background: white;
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 4px 26px rgba(0, 0, 0, 0.15);
  }

  .profile-top h3,
.info-user h3 {
    font-weight: 50;  /* normal */
}

  .profile-top {
    display: flex;
    align-items: center;
    gap: 15px;
  }

  .avatar {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    background: #eee;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
  }

  .menu-list {
    list-style: none;
    margin-top: 25px;
    padding: 0;
  }

  .menu-list li {
    padding: 10px;
    border-radius: 10px;
    cursor: pointer;
    margin-bottom: 5px;
  }

  .menu-list a {
    padding: 10px 10px 10px 50px;
    border-radius: 10px;
    cursor: pointer;
    margin-bottom: 5px;
    background: #ff2d55;
    text-decoration: none;   /* remove o traço de link */
    color: #fff;             /* deixa o texto branco (opcional) */
    text-align: left;        /* força o texto para esquerda */
    display: block; 
  }

  .menu-list li:hover,
  .menu-list .active {
    background: #f1f1f1;
  }

  .tag {
    float: right;
    opacity: 0.5;
    font-size: 13px;
  }

  /* CARD GRANDE */
  .profile-info {
    background: white;
    border-radius: 20px;
    padding: 25px;
    box-shadow: 0 4px 26px rgba(0, 0, 0, 0.15);
  }

  .info-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .avatar.big {
    width: 70px;
    height: 70px;
    font-size: 33px;
  }

  .info-grid {
    margin-top: 25px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    row-gap: 16px;
  }

  .label {
    font-size: 14px;
    color: #555;
  }

  .value {
    float: right;
    opacity: 0.6;
  }

  /* CONTEÚDO ASSISTIDO */
  .content-box {
    background: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 4px 26px rgba(0, 0, 0, 0.15);
    margin: 20px 40px 40px;
  }

  .content-title {
    display: flex;
    align-items: center;
    gap: 15px;
  }

  .videos-grid {
    margin-top: 25px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
  }

  .video-thumb {
    height: 120px;
    background: black;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 35px;
  }


/* Container do item de menu */
#notificacoes-btn {
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
  padding: 10px 12px;
}

/* TAG verde/vermelha ao lado */
#notificacoes-status {
  padding: 4px 8px;
  border-radius: 6px;
  font-size: 12px;
  font-weight: 600;
  background: rgba(0,0,0,0.06);
}

/* SUBMENU */
#submenu-notificacoes {
  display: none;
  list-style: none;
  padding: 5px 0;
  margin: 4px 0 0 0;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 4px 16px rgba(0,0,0,0.12);
}

/* Itens do submenu */
#submenu-notificacoes li {
  padding: 10px 14px;
  cursor: pointer;
  transition: background 0.15s ease;
  border-radius: 6px;
  margin: 4px 8px;
}

/* Hover bonito */
#submenu-notificacoes li:hover {
  background: #f1f5ff;
}

/* ------ BOTÕES ESTILO Fino (visual dos itens do submenu) ------ */
.opcao-notificacao {
  font-size: 14px;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
}

/* Permitir */
.opcao-notificacao[data-opcao="permitir"] {
  color: #0E6FB0;
  font-size: 12px;
}

/* Não permitir */
.opcao-notificacao[data-opcao="nao"] {
  color: #d62040;
  font-size: 12px;
}



/* Responsivo */
@media (max-width: 480px) {
  #submenu-notificacoes li {
    padding: 8px 10px;
    font-size: 13px;
  }

  #notificacoes-status {
    font-size: 11px;
    padding: 3px 6px;
  }
}



  /* rodape */

    .logo {
      width: 80px;
      height: 40px;
      border: 1px solid #012B5C;        /* usar cor diretamente ou var(--nome) */
      background-color: transparent;
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

    .social-icons a {
      margin-right: 15px;
      font-size: 22px;
      color: #fff;
      text-decoration: none;
      transition: color 0.3s;
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







    /* Avatar grande */
.avatar.big {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid #033A7B;
    display: flex;
    justify-content: center;
    align-items: center;
}

.avatar.big img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* nunca deforma */
}


/* Botão */
.trocar-avatar-btn {
    margin-top: 8px;
    padding: 6px 14px;
    font-size: 12px;
    border-radius: 6px;
    background: var(--button-blue);
}


.trocar-avatar-btn:hover {
    background: var(--dark-blue);
}

/* POPUP */
.popup-avatar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.popup-content-avatar {
    background: #fff;
    padding: 25px;
    border-radius: 14px;
    width: 350px;
    text-align: center;
}

.avatar-options {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    margin: 15px 0;
}

.avatar-options img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    cursor: pointer;
    border: 3px solid transparent;
    transition: 0.2s;
}

.avatar-options img:hover {
    transform: scale(1.06);
    border-color: #004AAD;
}

.info-user {
    display: flex;
    align-items: center;
    gap: 18px; /* espaço entre avatar, botão e nome */
}


.user-info-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}




.btn-excluir-video {
    position: absolute;
    top: 6px;
    right: 6px;
    background: rgba(255, 40, 40, 0.9);
    color: white;
    border: none;
    border-radius: 50%;
    width: 26px;
    height: 26px;
    font-size: 16px;
    cursor: pointer;
    display:flex;
    justify-content:center;
    align-items:center;
    transition: 0.2s;
}

.btn-excluir-video:hover {
    background: red;
    transform: scale(1.1);
}



</style>

<body>

  <div class="pagina-area-aluno">

    <!-- NAVBAR -->
    <div class="navbar-container">
      <div class="navbar">
        <div class="logo-links">
          <img src="../assets/img/Logo.png" class="logonav">
          <div class="nav-links">
            <a href="../inicio.php">Início</a>
            <a href="../pages/Calendario.php">Calendário</a>
            <a href="../pages/simulado.php">Simulados</a>
            <a href="../pages/conteudos.php">Conteúdos</a>
            <a href="../pages/sobre.html">Sobre Nós</a>
          </div>
        </div>
        <button class="area-do-aluno-btn">Área do Aluno</button>
      </div>
    </div>


    <!-- CONTEÚDO -->
    <div class="aluno-wrapper">

      <!-- CARD LATERAL -->
      <div class="profile-card">
        <div class="profile-top">

 

          
          <div class="avatar big" id="avatarExibido">
             <img id="avatarImg" src="../assets/img/avatars/coruja1.jpeg" alt="Avatar">
          </div>
        
      

          <!-- POPUP DE TROCA DE AVATAR -->
<div id="popupAvatar" class="popup-avatar">
    <div class="popup-content-avatar">

        <h3>Escolha seu Avatar</h3>

        <div class="avatar-options">
            <img src="../assets/img/avatars/coruja1.jpeg" data-avatar="coruja1.jpeg">
<img src="../assets/img/avatars/coruja2.jpeg" data-avatar="coruja2.jpeg">
<img src="../assets/img/avatars/coruja3.jpeg" data-avatar="coruja3.jpeg">
<img src="../assets/img/avatars/coruja4.jpeg" data-avatar="coruja4.jpeg">
<img src="../assets/img/avatars/coruja5.jpeg" data-avatar="coruja5.jpeg">
<img src="../assets/img/avatars/coruja6.jpeg" data-avatar="coruja6.jpeg">
<img src="../assets/img/avatars/coruja7.jpeg" data-avatar="coruja7.jpeg">
<img src="../assets/img/avatars/coruja8.jpeg" data-avatar="coruja8.jpeg">
<img src="../assets/img/avatars/coruja9.jpeg" data-avatar="coruja9.jpeg">

        </div>

        <button class="fecharPopupAvatar">Fechar</button>

    </div>
</div>



          <div>
            <h3><?php echo $_SESSION['usuario']; ?></h3>
          </div>
        </div>
        <ul class="menu-list">
          <li class="active">Meu Perfil</li>
          <li id="notificacoes-btn">Notificações <span class="tag" id="notificacoes-status">Permitir</span></li>

<!-- submenu escondido -->
<ul id="submenu-notificacoes" class="submenu">
    <li class="opcao-notificacao" data-opcao="permitir">Permitir</li>
    <li class="opcao-notificacao" data-opcao="nao">Não permitir</li>
</ul>


          <a href="../backend/logout.php" >Sair</a>
        </ul>
      </div>

      <!-- CARD GRANDE -->
      <div class="profile-info">
        <div class="info-header">
          <div class="info-user">
            <div class="avatar big">
    <img id="avatarImgGrande" src="../assets/img/avatars/coruja1.jpeg" alt="Avatar Grande">
</div>

<div class="user-info-group">
            <button id="trocarAvatarBtn" class="trocar-avatar-btn">Trocar Avatar</button>
</div>
           
          </div>
          <span style="cursor:pointer;">✖</span>
        </div>
        <br>


        <hr>

        <div class="info-grid">
          <div class="label">Nome <span class="value"><?php echo $_SESSION['usuario']; ?></span></div>
          <br>
          <div class="label">Email <span class="value"><?php echo $_SESSION['email']; ?></span></div>
        </div>
      </div>

    </div>

    <!-- CONTEÚDO ASSISTIDO -->
<div class="content-box">
  <div class="content-title">
    <img src="../assets/img/mascoteGuia.png" width="70">
    <h2>Conteúdo Assistido</h2>
  </div>

  <div class="videos-grid" id="videosAssistidos"></div>
</div>

<script>
// ================================
//   CARREGA VÍDEOS ASSISTIDOS
// ================================
function carregarVideosAssistidos() {
  const container = document.getElementById("videosAssistidos");
  container.innerHTML = "";

  let progress = JSON.parse(localStorage.getItem("guiaEtecProgress") || "{}");

  if (!progress.videos) progress.videos = [];

  if (progress.videos.length === 0) {
    container.innerHTML = "<p style='opacity:0.7'>Nenhum vídeo assistido ainda.</p>";
    return;
  }

  progress.videos.forEach(video => {
    const thumb = `
      <a href="${video.link}" target="_blank" class="video-thumb">
        <img src="${video.thumb}" alt="thumb do vídeo">
      </a>
    `;
    container.innerHTML += thumb;
  });
}

carregarVideosAssistidos();
</script>

<style>
.videos-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
  gap: 15px;
}

.video-thumb {
  width: 100%;
  border-radius: 10px;
  overflow: hidden;
  border: 2px solid #1e5fff;
  transition: 0.2s;
}

.video-thumb img {
  width: 100%;
  display: block;
}

.video-thumb:hover {
  transform: scale(1.05);
}
</style>


    <!-- SIMULADOS FEITOS -->
<div class="content-box">
  <div class="content-title">
    <img src="../assets/img/mascoteGuia.png" width="70">
    <h2>Simulados Feitos</h2>
  </div>

  <div class="videos-grid" id="simuladosFeitos"></div>
</div>



    <!-- RODAPÉ -->
    <footer class="rodape" role="contentinfo">
      <div class="rodape-top">
        <div class="social-icons">
          <!-- Instagram -->
          <a href="https://www.instagram.com/guiaetec/" target="_blank" rel="noopener noreferrer" aria-label="Instagram Guia Etec">
            <i class="fab fa-instagram"></i>
          </a>
          <!-- Facebook -->
          <a href="https://www.facebook.com/profile.php?id=61584199692540" target="_blank" rel="noopener noreferrer" aria-label="Facebook Guia Etec">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>

        <div class="atendimento">
          Central de Atendimento: <strong>XXXXX-XXXX</strong>
        </div>
      </div>

      <div class="rodape-meio">
        <div class="logo">
          <img src="../assets/img/Logo off-white.png" height="42">
        </div>

        <div class="coluna">
          <h3>Ajuda</h3>
          <a href="politica.html">Entre em Contato</a>
        </div>

        <div class="coluna">
          <h3>Guia</h3>
          <a href="areadoaluno.php">Crie sua Conta</a>
          <a href="sobre.html">Sobre Nós</a>
        </div>

        <div class="coluna">
          <h3>Termos</h3>
          <a href="politica.html">Termos e Condições</a>
          <a href="politica.html">Política de Privacidade</a>
        </div>
      </div>

      <div class="rodape-bottom">
        Guia Etec - S.P - CNPJ: 10.760.260 / Av. Vereador Francisco Moraes Ramos, 777 - Jardim Novo Horizonte | Rio
        Grande da Serra - SP
      </div>

    </footer>

  </div>
<script>
  const btn = document.getElementById("notificacoes-btn");
  const submenu = document.getElementById("submenu-notificacoes");
  const status = document.getElementById("notificacoes-status");

  // Abre e fecha o submenu
  btn.addEventListener("click", () => {
    submenu.style.display = submenu.style.display === "block" ? "none" : "block";
  });

  // Atualiza texto e fecha submenu
  document.querySelectorAll(".opcao-notificacao").forEach(opcao => {
    opcao.addEventListener("click", () => {

      if (opcao.dataset.opcao === "permitir") {
        status.textContent = "Permitir";
        status.style.opacity = "1";
        status.style.color = "#0E6FB0";
      } else {
        status.textContent = "Não permitir";
        status.style.opacity = "1";
        status.style.color = "red";
      }

      submenu.style.display = "none";
    });
  });
</script>


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
   
/// ---- Conteúdos Assistidos (COM THUMBNAIL + BOTÃO EXCLUIR) ----
function carregarVideosAssistidos() {
    const box = document.getElementById("videosAssistidos");
    box.innerHTML = "";

    let prog = JSON.parse(localStorage.getItem("guiaEtecProgress") || "{}");
    if (!prog.videos) prog.videos = [];

    if (prog.videos.length === 0) {
        box.innerHTML = "<p style='opacity:.6'>Nenhum vídeo assistido ainda.</p>";
        return;
    }

    prog.videos.forEach(v => {
        box.innerHTML += `
            <div class="video-item" style="
                position:relative;
                border:2px solid #004AAD;
                border-radius:12px;
                overflow:hidden;
            ">
                <button onclick="excluirVideo('${v.id}')" class="btn-excluir-video">✖</button>

                <a href="${v.link}" target="_blank">
                    <img src="${v.thumb}" style="width:100%; display:block;">
                </a>
            </div>
        `;
    });
}

carregarVideosAssistidos();


function excluirVideo(id) {
    let progress = JSON.parse(localStorage.getItem("guiaEtecProgress") || "{}");

    if (!progress.videos) progress.videos = [];

    // filtra removendo o vídeo
    progress.videos = progress.videos.filter(v => v.id !== id);

    // salva novamente
    localStorage.setItem("guiaEtecProgress", JSON.stringify(progress));

    // recarrega a listagem
    
}




// ==============================
// CARREGAR SIMULADOS FEITOS
// ==============================
function carregarSimuladosFeitos() {
    const container = document.getElementById("simuladosFeitos");
    container.innerHTML = "";

    const progress = JSON.parse(localStorage.getItem("guiaEtecProgress") || "{}");

    if (!progress.simulados || Object.keys(progress.simulados).length === 0) {
        container.innerHTML = "<p style='opacity:.6'>Nenhum simulado realizado ainda.</p>";
        return;
    }

    Object.keys(progress.simulados).forEach(id => {
        const s = progress.simulados[id];

        container.innerHTML += `
            <div class="video-thumb" style="
                background:#212B78;
                padding:12px;
                color:white;
                display:flex;
                flex-direction:column;
                justify-content:center;
                align-items:flex-start;
                font-size:14px;
                line-height:1.3;
            ">
                <strong>📝 ${id}</strong>
                Nota: <b>${s.nota}%</b>
                <small>${s.data}</small>
            </div>
        `;
    });
}

carregarSimuladosFeitos();


});
</script>

<script>
function salvarVideoAssistido(id, link, thumb) {
    let progress = JSON.parse(localStorage.getItem("guiaEtecProgress") || "{}");

    if (!progress.videos) progress.videos = [];

    // impedir salvar repetido
    const existe = progress.videos.some(v => v.id === id);
    if (!existe) {
        progress.videos.push({ id, link, thumb });
    }

    localStorage.setItem("guiaEtecProgress", JSON.stringify(progress));
}
</script>


<script>
// ===============================
// SISTEMA DE AVATAR DO ALUNO
// ===============================

// Elementos
const btnTrocar = document.getElementById("trocarAvatarBtn");
const popup = document.getElementById("popupAvatar");
const fechar = document.querySelector(".fecharPopupAvatar");
const avatarImg = document.getElementById("avatarImg");

// Carregar avatar salvo
let avatarSalvo = localStorage.getItem("avatarGuiaEtec");
if (avatarSalvo) {
    avatarImg.src = "../assets/img/avatars/" + avatarSalvo;
}

// Abrir popup
btnTrocar.addEventListener("click", () => {
    popup.style.display = "flex";
});

// Fechar popup
fechar.addEventListener("click", () => {
    popup.style.display = "none";
});

// Trocar avatar ao clicar
document.querySelectorAll(".avatar-options img").forEach(img => {
    img.addEventListener("click", () => {

        const novoAvatar = img.getAttribute("data-avatar");

        // Atualiza imagem exibida
        avatarImg.src = "../assets/img/avatars/" + novoAvatar;

        // Salva no localStorage
        localStorage.setItem("avatarGuiaEtec", novoAvatar);

        popup.style.display = "none";
    });
});



document.addEventListener("DOMContentLoaded", () => {

    const avatarImgPequeno = document.getElementById("avatarImg");
    const avatarImgGrande = document.getElementById("avatarImgGrande");

    // Seleciona todos os avatares disponíveis
    const avatarOptions = document.querySelectorAll(".avatar-options img");

    avatarOptions.forEach(img => {
        img.addEventListener("click", () => {

            const novoAvatar = img.dataset.avatar; 
            const caminho = "../assets/img/avatars/" + novoAvatar;

            // Atualiza avatar pequeno e grande
            avatarImgPequeno.src = caminho;
            avatarImgGrande.src = caminho;

            // Salva no LocalStorage
            localStorage.setItem("avatarGuiaEtec", novoAvatar);

            // Fecha o popup
            document.getElementById("avatarPopup").style.display = "none";
        });
    });

    // Carrega avatar salvo ao abrir a página
    const avatarSalvo = localStorage.getItem("avatarGuiaEtec");
    
    if (avatarSalvo) {
        const caminho = "../assets/img/avatars/" + avatarSalvo;
        avatarImgPequeno.src = caminho;
        avatarImgGrande.src = caminho;
    }

});


</script>



</body>

</html>