<?php
require_once('../backend/protecao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Calendário - Guia Etec</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- se quiser herdar style.css principal, mantenha a linha; mas a página já tem o CSS essencial abaixo -->
  <!-- <link rel="stylesheet" href="../style.css"> -->

  <style>
    :root {
      --mid-blue: #4A90E2;
      --dark: #1A1A1A;
      --yellow: #FFCC00;
      --dark-blue: #033A7B;
      --nav-blue: #212B78;
      --button-blue: #218FD9;
      --light-blue: #218FD9;
      --pink: #FF2D55;
      --white: #FFF;
      --spacing-unit: 8px;
      --transition-speed: 0.3s;
      --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.1);
      --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.15);
      --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.2);
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

    p,
    .descricao,
    .rodape-bottom,
    .coluna a {
      font-family: var(--body-font);
    }

    h1,
    h2,
    h3,
    .conteudos-title,
    .card-title {
      text-align: left;
      font-family: var(--title-font);
      letter-spacing: 4px;
    }

    /* Body com textura de fundo (igual à home) */
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: url("../assets/img/Textura Guia Etec.png") center top / cover no-repeat;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      display: flex;
      justify-content: center;
      padding: 48px 72px;
      color: var(--dark);
    }

    .coluna a {
      display: block;
      color: #fff;
      text-decoration: none;
      font-size: 14px;
      margin-bottom: 6px;
    }

    .pagina {
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      border-radius: 40px;
      background: var(--white);
      box-shadow: 0px 0px 20px 8px rgba(30, 30, 30, 0.85);
      overflow: hidden;
    }

    .pagina-nav {
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      background: var(--white);
      overflow: visible;
    }

    /* ----------------------- V LIBRAS ----------------------- */
    .vlibras-widget {
      bottom: 20px !important;
      right: 20px !important;
    }

    /* ----------------------- NAVBAR ----------------------- */

    .navbar-container {
      width: 100%;
      display: flex;
      justify-content: center;
      padding: 10px 0;
      position: relative;
      z-index: 1200;
    }

    .navbar {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 1156px;
      padding: 10px 40px;
      border-radius: 40px;
      gap: 40px;
      z-index: 1201;
    }

    .navbar-container.navbar-fixed {
      position: fixed;
      top: 10px;
      left: 50%;
      transform: translateX(-50%);
      width: 90%;
      max-width: 980px;
      padding: 0;
      border-radius: 25px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      z-index: 1201;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      transition: all 0.4s ease;
    }

    .navbar-fixed .nav-links a {
      color: #fff;
      padding: 8px 12px;
      transition: color 0.3s ease, transform 0.3s ease;
    }

    .navbar-fixed .nav-links a:hover {
      color: #FFD700;
      transform: scale(1.1);
    }

    .navbar-fixed .area-do-aluno {
      background: linear-gradient(90deg, #218FD9, #033A7B);
      color: #fff;
      padding: 10px 24px;
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease, background 0.3s ease;
    }

    .navbar-fixed .area-do-aluno:hover {
      background: linear-gradient(90deg, #0E2C56, #218FD9);
      transform: scale(1.05);
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

    .logo {
      width: 80px;
      height: 40px;
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
      text-decoration: none;
      padding: 8px 12px;
      border-radius: 10px;
      transition: background 0.3s ease;
    }

    .nav-links a:hover {
      color: #FFD700;
      transform: scale(1.1);
    }

    #btn-conteudos {
      background: none;
      border: none;
      color: white;
      padding: 8px 12px;
      border-radius: 10px;
      font-family: var(--button-font);
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: color .3s ease, transform .3s ease;
    }

    #btn-conteudos:hover {
      color: #FFD700;
      transform: scale(1.07);
    }

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

    .hamburger {
      display: none;
      background: none;
      border: none;
      font-size: 30px;
      color: var(--white);
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

      .logonav {
        width: 55px;
        height: 55px;
        border-radius: 50% !important;
      }

      .navbar-fixed .logonav {
        border-radius: 50% !important;
      }
    }

    /* Conteudo */
    .conteudo {
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      background: #033A7B;
      border-radius: 0 0 40px 40px;
      overflow: hidden;
    }

    .page-wrap {
      max-width: 1200px;
      height: 100%;
      width: 85%;
      margin: 0px auto;
      padding: 26px;
      background: #033A7B;
    }

    .calendar-box {
      background: #fff;
      border: 6px solid var(--yellow);
      border-radius: 22px;
      padding: 28px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }

    .calendar-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 14px;
      flex-wrap: wrap;
    }

    .calendar-header .title {
      font-size: 22px;
      color: var(--dark-blue);
      font-weight: 700;
    }

    .calendar-controls {
      display: flex;
      gap: 10px;
      align-items: center;
    }

    .btn {
      background: var(--dark-blue);
      color: #fff;
      border: none;
      padding: 8px 12px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 700;
    }

    .btn:hover {
      background: var(--mid-blue);
    }

    .calendar {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 10px;
      margin-top: 12px;
    }

    .week {
      background: var(--dark-blue);
      color: white;
      border-radius: 10px;
      padding: 10px;
      text-align: center;
      font-weight: 700;
    }

    .day {
      background: #f6f7fb;
      min-height: 80px;
      border-radius: 10px;
      padding: 8px;
      cursor: pointer;
      transition: all .2s;
      display: flex;
      align-items: flex-start;
      justify-content: center;
      font-weight: 600;
      color: var(--dark);
    }

    .day:hover {
      background: var(--mid-blue);
      color: white;
      transform: translateY(-2px);
    }

    .highlight {
      background: var(--yellow) !important;
      color: var(--dark) !important;
      font-weight: 800;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .filter-row {
      text-align: center;
      margin-top: 12px;
    }

    .filter-row label {
      font-weight: 700;
      color: var(--dark-blue);
      margin-right: 8px;
    }

    .explicacoes {
      margin-top: 20px;
    }

    .lista-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 16px;
      margin-top: 12px;
    }

    .card-evento {
      background: #fff;
      border-left: 6px solid var(--dark-blue);
      padding: 14px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    }

    .card-evento h4 {
      margin: 0 0 6px 0;
      color: var(--dark);
    }

    .card-evento p {
      margin: 0 0 8px 0;
      color: #444;
      font-size: 14px;
    }

    .tag {
      display: inline-block;
      padding: 6px 10px;
      border-radius: 8px;
      font-weight: 700;
      font-size: 12px;
    }

    .tag.vestibulinho {
      background: var(--yellow);
      color: var(--dark);
    }

    .tag.etec {
      background: var(--mid-blue);
      color: white;
    }

    .tag.aulas {
      background: #28a745;
      color: white;
    }

    .notificacao {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: var(--dark-blue);
      color: white;
      padding: 14px 18px;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      transform: translateY(18px);
      opacity: 0;
      transition: all .4s;
      z-index: 2000;
      font-weight: 700;
    }

    .notificacao.show {
      opacity: 1;
      transform: translateY(0);
    }

    /* Ajustes para rodapé idêntico ao inicio.html */
    .rodape {
      background-color: #0E2C56;
      color: #fff;
      padding: 90px;
      width: 100%;
      border-radius: 0 0 40px 40px;
      box-sizing: border-box;
    }

    .rodape-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 2px solid #fff;
      padding-bottom: 12px;
      margin-bottom: 20px;
    }

    .rodape-meio {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      flex-wrap: wrap;
      margin-bottom: 20px;
    }

    .rodape-bottom {
      text-align: center;
      font-size: 12px;
      border-top: 1px solid #fff;
      padding-top: 12px;
      line-height: 1.4;
    }

    .rodape .logo img {
      height: 250%;
    }

    @media (max-width: 1024px) {
      body {
        padding: 20px;
      }

      .pagina {
        border-radius: 20px;
      }

      .page-wrap {
        width: 92%;
        padding: 20px;
      }

      .rodape {
        padding: 60px 28px;
      }
    }

    @media (max-width: 768px) {
      body {
        padding: 12px;
        background-position: center top;
      }

      /* Navbar: tornar logo totalmente arredondada e ajustar espaçamento */
      .navbar {
        width: calc(100% - 24px);
        padding: 10px 14px;
        gap: 12px;
        border-radius: 12px;
        justify-content: space-between;
      }

      .logo-links {
        gap: 8px;
        padding: 6px;
      }

      .logonav,
      .logo {
        width: 56px;
        height: 56px;
        border-radius: 12px !important;
        /* todos os cantos arredondados */
        border-radius: 14px;
        border: 1px solid var(--yellow);
        background-color: var(--yellow);
        object-fit: contain;
      }

      /* Menu mobile */
      .hamburger {
        display: block;
        color: #fff;
        background: transparent;
        border: 0;
        font-size: 26px;
      }

      .nav-links {
        display: none;
        position: absolute;
        top: 74px;
        left: 12px;
        right: 12px;
        background: var(--dark-blue);
        padding: 12px;
        border-radius: 12px;
        flex-direction: column;
        gap: 8px;
        z-index: 1200;
      }

      .nav-links.nav-active {
        display: flex;
      }

      .nav-links a {
        color: #fff;
        padding: 10px 14px;
        border-radius: 8px;
      }

      /* Esconder botão grande da barra e colocar link no menu (opcional) */
      .area-do-aluno {
        display: none;
      }

      /* Conteúdo: empilha e reduz paddings */
      .page-wrap {
        width: 100%;
        padding: 12px;
      }

      .calendar-box {
        padding: 18px;
        border-radius: 16px;
      }

      /* Calendário: reduzir alturas e fontes */
      .calendar {
        gap: 6px;
        grid-auto-rows: minmax(56px, auto);
      }

      .week {
        padding: 8px;
        font-size: 12px;
      }

      .day {
        min-height: 56px;
        padding: 6px;
        font-size: 14px;
      }

      .day .badge,
      .tag {
        font-size: 11px;
      }

      /* Lista de eventos: 1 coluna */
      .lista-cards {
        grid-template-columns: 1fr;
        gap: 12px;
      }

      /* Rodapé: empilhar */
      .rodape {
        padding: 36px 18px;
        border-radius: 0 0 12px 12px;
      }

      .rodape-top {
        flex-direction: column;
        gap: 10px;
        text-align: center;
      }

      .rodape-meio {
        flex-direction: column;
        gap: 12px;
        align-items: center;
      }

      .rodape-bottom {
        font-size: 12px;
      }
    }

    /* telas bem pequenas */
    @media (max-width: 420px) {
      .logo {
        width: 52px;
        height: 52px;
      }

      .calendar {
        gap: 4px;
      }

      .day {
        min-height: 48px;
        font-size: 13px;
      }

      .week {
        font-size: 11px;
        padding: 6px;
      }

      .rodape {
        padding: 28px 12px;
      }

      .notificacao {
        right: 8px;
        left: auto;
        bottom: 72px;
        max-width: 90%;
      }
    }

    /* Adicionando o estilo para o menu hamburguer */
    .hamburger {
      display: none;
      flex-direction: column;
      gap: 5px;
      cursor: pointer;
    }

    .hamburger div {
      width: 30px;
      height: 4px;
      background-color: #fff;
      border-radius: 5px;
    }

    @media (max-width: 620px) {
      .nav-links {
        display: none;
        width: 100%;
        text-align: center;
        flex-direction: column;
        gap: 12px;
        padding: 20px 0;
      }

      .hamburger {
        display: flex;
      }

      .nav-links.active {
        display: flex;
      }

      .area-do-aluno {
        width: 100%;
        padding: 12px;
        font-size: 14px;
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
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
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

    /* Fixes: igualar rodapé + garantir navbar sobreposto */
    .navbar-container {
      z-index: 1200;
    }

    .navbar {
      z-index: 1201;
    }

    /* Rodapé: links e ícones em branco como no início */
    .rodape a {
      color: #fff;
      text-decoration: none;
    }

    .rodape a:hover {
      color: #FFCC00;
      text-decoration: underline;
    }

    .rodape .social-icons a {
      color: #fff;
      margin-right: 15px;
      font-size: 22px;
    }

    /* Caso ainda haja comportamento estranho no menu, força cor dos links da navbar */
    .nav-links a {
      color: #fff;
      text-decoration: none;
    }

    /* Ajuste de z-index do menu mobile aberto (evita ficar atrás do conteúdo) */
    .nav-links {
      z-index: 1250;
    }

    /* Remove possíveis duplicações visuais do hamburger (deixa controle pelo botão único) */
    .hamburger {
      background: transparent;
      border: 0;
      color: #fff;
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
      margin-right: 0;
    }

    .social-icons a:hover {
      transform: scale(1.15);
      color: #FFD23F;
    }

    /* ===== POP-UP DE CONTEÚDOS (estilos) ===== */
    .popup-conteudos {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.6);
      display: none;
      /* mostrado via JS */
      align-items: center;
      justify-content: center;
      z-index: 9999;
      -webkit-tap-highlight-color: transparent;
    }

    .popup-card {
      background: #ffffff;
      width: 380px;
      max-width: calc(100% - 40px);
      padding: 28px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.28);
      animation: popupFadeIn .18s ease-out forwards;
      font-family: "Poppins", system-ui, -apple-system, "Segoe UI", Roboto, Arial;
    }

    .popup-card h2 {
      font-size: 20px;
      margin: 0 0 16px 0;
      color: #033A7B;
      font-weight: 700;
    }

    .popup-item {
      display: block;
      margin: 10px 0;
      padding: 12px 14px;
      border-radius: 8px;
      background: #033A7B;
      color: #fff;
      font-weight: 700;
      text-decoration: none;
      font-size: 16px;
      transition: background .15s ease, transform .12s ease;
    }

    .popup-item:hover {
      background: #0552ab;
      transform: translateY(-2px);
    }

    .popup-close {
      margin-top: 18px;
      background: #e0e0e0;
      padding: 8px 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 15px;
      font-weight: 600;
    }

    .popup-close:hover {
      background: #cfcfcf;
    }

    /* Responsivo / evitar overflow */
    @media (max-height: 520px) {
      .popup-conteudos {
        align-items: flex-start;
        padding-top: 24px;
      }

      .popup-card {
        max-height: calc(100vh - 80px);
        overflow: auto;
      }
    }

    /* animação */
    @keyframes popupFadeIn {
      from {
        transform: translateY(-8px) scale(.995);
        opacity: 0;
      }

      to {
        transform: translateY(0) scale(1);
        opacity: 1;
      }
    }
  </style>
</head>

<body>
  <div class="pagina">
    <!-- V Libras -->
    <div vw class="enabled">
      <div vw-access-button class="active"></div>
      <div vw-plugin-wrapper></div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
      new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>

    <div class="pagina-nav">
      <!-- NAVBAR -->
      <div class="navbar-container">
        <div class="navbar">
          <div class="logo-links">
            <img src="../assets/img/Logo.png" alt="Logo Guia Etec" class="logonav" />
            <div class="nav-links" id="nav-links">
              <a href="../inicio.php">Início</a>
              <a href="../pages/Calendario.php">Calendário</a>
              <a href="../pages/simulado.php">Simulados</a>
              <a href="#" id="btn-conteudos">Conteúdos</a>
              <a href="../pages/sobre.html">Sobre Nós</a>
            </div>
          </div>

          <button class="area-do-aluno" onclick="window.location.href='../backend/login.php'">Área do Aluno</button>

          <!-- botão hamburger (apenas visível no mobile) -->
          <button id="hamburger" class="hamburger" aria-label="Abrir menu" aria-controls="nav-links"
            aria-expanded="false">&#9776;</button>
        </div>
      </div>

      <!-- POP-UP DE CONTEÚDOS (compartilhado com outras páginas) -->
      <div id="popup-conteudos" class="popup-conteudos" aria-hidden="true">
        <div class="popup-card" role="dialog" aria-modal="true" aria-labelledby="popupTitle">
          <h2 id="popupTitle">Conteúdos Disponíveis</h2>

          <a href="../pages/conteudos.php" class="popup-item">CONTEÚDO <br> PREPARATÓRIO</a>
          <a href="../pages/dec.php" class="popup-item">DICAS E <br> CURIOSIDADES</a>
          <a href="../pages/mapa.php" class="popup-item">ENCONTRE AS <br> ETECs</a>

          <button id="close-popup" class="popup-close">Fechar</button>
        </div>
      </div>

      <div class="conteudo">
        <!-- MAIN -->
        <main class="page-wrap">
          <section class="calendar-box" aria-label="Calendário Interativo">
            <div class="calendar-header">
              <div class="title">📅 Calendário Interativo - Guia Etec</div>
              <div class="calendar-controls">
                <button class="btn" id="prev">&larr; Mês anterior</button>
                <div id="monthYear" style="font-weight:800;color:var(--dark-blue);"></div>
                <button class="btn" id="next">Próximo mês &rarr;</button>
              </div>
            </div>

            <!-- botão adicionar evento (local) -->
            <button id="addDateBtn" class="btn" style="background:var(--yellow);color:#000;font-weight:800;">
              + Adicionar Data Importante
            </button>

            <!-- POPUP ADICIONAR EVENTO -->
            <div id="popupAdd" style="
                display:none;
                position:fixed;
                top:50%;
                left:50%;
                transform:translate(-50%,-50%);
                background:#fff;
                padding:20px;
                z-index:2000;
                border-radius:12px;
                box-shadow:0 8px 20px rgba(0,0,0,0.25);
                width:320px;
            ">
              <h3 style="margin-top:0;color:var(--dark-blue);">Adicionar Evento</h3>

              <label>Data:</label>
              <input type="date" id="popupDate" style="width:100%;padding:6px;margin-bottom:10px;">

              <label>Descrição:</label>
              <input type="text" id="popupDesc" placeholder="Ex: Aniversário" style="width:100%;padding:6px;margin-bottom:14px;">

              <label>Tipo:</label>
              <select id="popupTipo" style="width:100%;padding:6px;margin-bottom:10px;">
                <option value="Pessoal">Pessoal</option>
                <option value="Vestibulinho">Vestibulinho</option>
                <option value="ETEC">ETEC</option>
                <option value="Aulas">Aulas</option>
              </select>

              <button id="popupSave" class="btn" style="width:100%;margin-bottom:6px;">Salvar</button>
              <button id="popupCancel" class="btn" style="background:#ccc;color:#000;width:100%;">Cancelar</button>
            </div>

            <div class="filter-row">
              <label for="filtro">Filtrar por:</label>
              <select id="filtro" style="padding:8px;border-radius:8px;border:1px solid #ddd;">
                <option value="Todos">Todos</option>
                <option value="Vestibulinho">Vestibulinho</option>
                <option value="ETEC">Eventos da ETEC</option>
                <option value="Aulas">Aulas Extras</option>
                <option value="Pessoal">Meus Eventos</option>
              </select>
            </div>

            <div class="calendar" id="calendar" role="grid" aria-label="Calendário"></div>

            <div id="event" style="text-align:center;margin-top:12px;font-weight:700;">Clique em uma data para ver
              detalhes.
            </div>

            <div class="explicacoes">
              <h3 style="text-align:center;color:var(--dark-blue);margin-top:18px;">📌 Datas Importantes</h3>
              <div class="lista-cards" id="listaExplicacoes"></div>
            </div>
          </section>
        </main>

        <!-- rodape -->
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
        </section>
      </div>

      <!-- NOTIFICAÇÃO -->
      <div id="notificacao" class="notificacao" role="status" aria-live="polite"></div>

      <!-- JS do calendário: eventos + filtro + Google Calendar + notificação -->
      <script>
    // eventos fixos (global)
    window.eventos = {
        "2025-08-12": { desc: "Início do período de isenção/redução da taxa", tipo: "Vestibulinho" },
        "2025-09-12": { desc: "Fim do período de isenção/redução da taxa", tipo: "Vestibulinho" },
        "2025-09-15": { desc: "Início das inscrições do vestibular", tipo: "Vestibulinho" },
        "2025-11-07": { desc: "Fim das inscrições do vestibular", tipo: "Vestibulinho" },
        "2025-09-30": { desc: "Divulgação do resultado de isenção/redução", tipo: "Vestibulinho" },
        "2025-12-14": { desc: "Prova do Vestibular", tipo: "Vestibulinho" },
        "2025-12-17": { desc: "Divulgação do gabarito oficial", tipo: "Vestibulinho" },
        "2026-01-19": { desc: "Divulgação da classificação e chamada", tipo: "Vestibulinho" },
        "2026-01-20": { desc: "Início da matrícula da 1ª chamada", tipo: "Vestibulinho" },
        "2026-01-22": { desc: "Fim da matrícula da 1ª chamada", tipo: "Vestibulinho" },
        "2026-01-26": { desc: "Divulgação da 2ª chamada", tipo: "Vestibulinho" },
        "2026-01-27": { desc: "Início da matrícula da 2ª chamada", tipo: "Vestibulinho" },
        "2026-01-29": { desc: "Fim da matrícula da 2ª chamada", tipo: "Vestibulinho" },

        "2025-03-08": { desc: "Aula extra de Matemática – Revisão de frações e equações", tipo: "Aulas" },
        "2025-03-15": { desc: "Aula extra de Português – Interpretação de texto", tipo: "Aulas" },
        "2025-03-22": { desc: "Aula extra de Ciências – Ecossistemas e meio ambiente", tipo: "Aulas" },
        "2025-04-19": { desc: "Aula extra de História – Período Regencial", tipo: "Aulas" },
        "2025-05-03": { desc: "Aula extra de Geografia – Cartografia básica", tipo: "Aulas" },
        "2025-05-17": { desc: "Aula extra de Química – Tabela Periódica", tipo: "Aulas" },
        "2025-05-31": { desc: "Aula extra de Física – Movimento uniforme", tipo: "Aulas" },
        "2025-06-14": { desc: "Aula extra de Biologia – Genética básica", tipo: "Aulas" },
        "2025-06-28": { desc: "Aula extra de Inglês – Leitura e interpretação", tipo: "Aulas" },

        "2025-05-02": { desc: "Evento especial da ETEC", tipo: "ETEC" }
    };

    // eventos do usuário (persistidos)
    window.eventosUser = JSON.parse(localStorage.getItem("eventosUser") || "{}");

    const calendarEl = document.getElementById('calendar');
    const monthYearEl = document.getElementById('monthYear');
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');
    const filtroEl = document.getElementById('filtro');
    const listaExplicacoes = document.getElementById('listaExplicacoes');
    const eventBox = document.getElementById('event');
    const notifyEl = document.getElementById('notificacao');

    window.current = new Date();

    function formatMonthYear(date) {
        return date.toLocaleString('pt-BR', { month: 'long', year: 'numeric' });
    }

    function criarLinkGoogleCalendar(dataStr, titulo) {
        const start = dataStr.replace(/-/g, '') + 'T090000Z';
        const end = dataStr.replace(/-/g, '') + 'T110000Z';
        return 'https://www.google.com/calendar/render?action=TEMPLATE&text=' + encodeURIComponent(titulo) + '&dates=' + start + '/' + end;
    }

    window.showNotification = function(text) {
        notifyEl.textContent = text;
        notifyEl.classList.add('show');
        setTimeout(() => notifyEl.classList.remove('show'), 6000);
    }

    function checkTomorrow() {
        const hoje = new Date();
        const amanha = new Date();
        amanha.setDate(hoje.getDate() + 1);
        const s = amanha.toISOString().split('T')[0];
        if (eventos[s]) showNotification('🔔 Amanhã: ' + eventos[s].desc);
    }

    window.renderCalendar = function(date) {
        calendarEl.innerHTML = '';
        listaExplicacoes.innerHTML = '';
        eventBox.textContent = 'Clique em uma data para ver detalhes.';
        monthYearEl.textContent = formatMonthYear(date);

        const year = date.getFullYear();
        const month = date.getMonth();
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        const weekdays = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
        weekdays.forEach(w => {
            const el = document.createElement('div');
            el.className = 'week';
            el.textContent = w;
            calendarEl.appendChild(el);
        });

        for (let i = 0; i < firstDay; i++) {
            const empty = document.createElement('div');
            calendarEl.appendChild(empty);
        }

        const filtro = filtroEl.value;

        for (let d = 1; d <= daysInMonth; d++) {
            const dayNode = document.createElement('div');
            dayNode.className = 'day';
            dayNode.textContent = d;

            const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(d).padStart(2, '0')}`;
            const evt = eventos[dateStr] || eventosUser[dateStr];

            if (evt && (filtro === 'Todos' || filtro === evt.tipo || (filtro === 'Pessoal' && eventosUser[dateStr]))) {
                dayNode.classList.add('highlight');

                dayNode.addEventListener('click', () => {
                    let html = `📌 ${evt.desc}`;

                    if (eventosUser[dateStr]) {
                        html += `
                            <button 
                                style="margin-left:12px;background:#c62828;color:white;border:none;padding:6px 10px;border-radius:6px;cursor:pointer;font-weight:bold;"
                                onclick="excluirEvento('${dateStr}')">
                                Excluir
                            </button>
                        `;
                    }

                    html += `<a href="${criarLinkGoogleCalendar(dateStr, evt.desc)}" target="_blank"
                        style="margin-left:10px;padding:6px 10px;background:var(--dark-blue);color:#fff;border-radius:8px;text-decoration:none;font-weight:700;">
                        + Google Calendar</a>`;

                    eventBox.innerHTML = html;
                });

                const card = document.createElement('div');
                card.className = 'card-evento';

                const tagClass =
                    (evt.tipo === 'Vestibulinho') ? 'vestibulinho' :
                    (evt.tipo === 'ETEC') ? 'etec' :
                    (evt.tipo === 'Aulas') ? 'aulas' : 'vestibulinho';

                const meses = [
                    "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                    "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
                ];

                card.innerHTML = `
                    <h4>📅 ${d} de ${meses[month]} de ${year}</h4>
                    <p>${evt.desc}</p>
                    <span class="tag ${tagClass}">${evt.tipo}</span>
                    <div style="margin-top:8px;display:flex;gap:10px;align-items:center;">
                        <a href="${criarLinkGoogleCalendar(dateStr, evt.desc)}" target="_blank"
                            style="background:var(--dark-blue);color:#fff;padding:8px 10px;border-radius:8px;text-decoration:none;font-weight:700;">
                            + Google Calendar
                        </a>
                        ${
                            eventosUser[dateStr] 
                            ? `<button onclick="excluirEvento('${dateStr}')"
                                 style="background:#c62828;color:white;border:none;padding:8px 12px;border-radius:8px;cursor:pointer;font-weight:bold;">
                                 Excluir
                               </button>`
                            : ""
                        }
                    </div>
                `;

                listaExplicacoes.appendChild(card);

            } else {
                dayNode.addEventListener('click', () => {
                    eventBox.textContent = 'Nenhum evento nesta data.';
                });
            }

            calendarEl.appendChild(dayNode);
        }
    }

    // init
    renderCalendar(current);
    checkTomorrow();

    prevBtn && prevBtn.addEventListener('click', () => {
        current.setMonth(current.getMonth() - 1);
        renderCalendar(current);
    });

    nextBtn && nextBtn.addEventListener('click', () => {
        current.setMonth(current.getMonth() + 1);
        renderCalendar(current);
    });

    filtroEl && filtroEl.addEventListener('change', () => renderCalendar(current));
</script>

<!-- ---------- POPUP + LÓGICA DE ADICIONAR / EXCLUIR EVENTO ---------- -->
<script>
  const btnAdd = document.getElementById("addDateBtn");
  const popup = document.getElementById("popupAdd");
  const popupDate = document.getElementById("popupDate");
  const popupDesc = document.getElementById("popupDesc");
  const popupTipo = document.getElementById("popupTipo");
  const popupSave = document.getElementById("popupSave");
  const popupCancel = document.getElementById("popupCancel");

  if (btnAdd) {
    btnAdd.addEventListener("click", () => {
      popupDate.value = "";
      popupDesc.value = "";
      popupTipo.value = "Pessoal";
      popup.style.display = "block";
    });
  }

  popupCancel && popupCancel.addEventListener("click", () => {
    popup.style.display = "none";
  });

  popupSave && popupSave.addEventListener("click", () => {
    const data = popupDate.value;
    const desc = popupDesc.value;
    const tipo = popupTipo.value || "Pessoal";

    if (!data || !desc) {
      alert("Preencha todos os campos!");
      return;
    }

    // salva evento no objeto local
    eventosUser[data] = { desc: desc, tipo: tipo };

    // salva no localStorage
    localStorage.setItem("eventosUser", JSON.stringify(eventosUser));

    popup.style.display = "none";

    // recarrega o calendário
    renderCalendar(current);

    showNotification("📌 Evento adicionado!");
  });

  window.excluirEvento = function(dataStr) {
    if (!eventosUser[dataStr]) {
        alert("Você só pode excluir eventos adicionados por você.");
        return;
    }

    if (!confirm("Tem certeza que deseja excluir este evento?")) return;

    delete eventosUser[dataStr];
    localStorage.setItem("eventosUser", JSON.stringify(eventosUser));

    showNotification("🗑️ Evento excluído!");

    renderCalendar(current);
    eventBox.textContent = "Evento removido.";
  }
</script>

<script>
  // Gerencia o menu hamburguer, navbar fixa e pop-up de conteúdos
  document.addEventListener('DOMContentLoaded', () => {
    const navbarContainer = document.querySelector('.navbar-container');
    const navLinks = document.getElementById('nav-links');
    const navbarEl = document.querySelector('.navbar');
    let hamburger = document.getElementById('hamburger');

    if (!navbarContainer || !navLinks || !navbarEl) return;

    // POP-UP CONTEÚDOS
    const btnConteudos = document.getElementById("btn-conteudos");
    const popupConteudos = document.getElementById("popup-conteudos");
    const closePopup = document.getElementById("close-popup");
    if (btnConteudos && popupConteudos && closePopup) {
      btnConteudos.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        popupConteudos.style.display = "flex";
        popupConteudos.setAttribute('aria-hidden','false');
        closePopup.focus();
      });
      closePopup.addEventListener("click", () => {
        popupConteudos.style.display = "none";
        popupConteudos.setAttribute('aria-hidden','true');
        btnConteudos.focus();
      });
      popupConteudos.addEventListener("click", (e) => {
        if (e.target === popupConteudos) {
          popupConteudos.style.display = "none";
          popupConteudos.setAttribute('aria-hidden','true');
          btnConteudos.focus();
        }
      });
      document.addEventListener('keydown', (ev) => {
        if (ev.key === 'Escape' && popupConteudos.style.display === 'flex') {
          popupConteudos.style.display = 'none';
          popupConteudos.setAttribute('aria-hidden','true');
        }
      });
    }

    function handleNavbarOnScroll() {
      const threshold = 20;
      if (window.scrollY > threshold) navbarContainer.classList.add('navbar-fixed');
      else navbarContainer.classList.remove('navbar-fixed');
    }
    handleNavbarOnScroll();
    window.addEventListener('scroll', handleNavbarOnScroll);

    if (!hamburger) {
      hamburger = document.createElement('button');
      hamburger.id = 'hamburger';
      hamburger.className = 'hamburger';
      hamburger.type = 'button';
      hamburger.setAttribute('aria-label', 'Abrir menu');
      hamburger.setAttribute('aria-controls', 'nav-links');
      hamburger.setAttribute('aria-expanded', 'false');
      hamburger.innerHTML = '&#9776;';
      navbarEl.appendChild(hamburger);
    }

    function closeMobileMenu() {
      navLinks.classList.remove('nav-active');
      if (hamburger) hamburger.setAttribute('aria-expanded', 'false');
      document.body.classList.remove('menu-open');
    }
    function toggleMobileMenu(e) {
      e.stopPropagation();
      const opened = navLinks.classList.toggle('nav-active');
      if (hamburger) hamburger.setAttribute('aria-expanded', opened ? 'true' : 'false');
      document.body.classList.toggle('menu-open', opened);
    }
    if (hamburger) hamburger.addEventListener('click', toggleMobileMenu);

    document.addEventListener('click', (e) => {
      if (window.innerWidth <= 768 && !navbarEl.contains(e.target) && navLinks.classList.contains('nav-active')) {
        closeMobileMenu();
      }
    });

    window.addEventListener('resize', () => {
      if (window.innerWidth > 768 && navLinks.classList.contains('nav-active')) {
        closeMobileMenu();
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && navLinks.classList.contains('nav-active')) closeMobileMenu();
    });
  });
</script>

    </div> <!-- .pagina-nav -->
  </div> <!-- .pagina -->

  <!-- Botão Voltar ao Topo -->
  <button id="btn-topo" title="Voltar ao topo">↑</button>

  <script>
    (function () {
      const btnTopo = document.getElementById("btn-topo");
      const navbarContainer = document.querySelector(".navbar-container");
      const navbarEl = document.querySelector(".navbar"); // fallback

      if (!btnTopo) return;

      // atualiza visibilidade do botão conforme a navbar fixa
      function updateBtnVisibility() {
        const fixed = (navbarContainer && navbarContainer.classList.contains("navbar-fixed")) ||
          (navbarEl && navbarEl.classList.contains("navbar-fixed"));
        btnTopo.classList.toggle("show", !!fixed);
      }

      // checagem inicial
      updateBtnVisibility();

      // responde ao scroll (fallback)
      window.addEventListener("scroll", updateBtnVisibility, { passive: true });

      // observa mudanças de classe na navbar (mais confiável)
      const targets = [navbarContainer, navbarEl].filter(Boolean);
      if (targets.length) {
        const mo = new MutationObserver(() => updateBtnVisibility());
        targets.forEach(t => mo.observe(t, { attributes: true, attributeFilter: ['class'] }));
      }

      // ação do botão
      btnTopo.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
      });
    })();
  </script>

</body>

</html>