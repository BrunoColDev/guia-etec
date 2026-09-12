<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Guia Etec</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <link
    href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Inter:wght@400;500;600;700&family=Poppins:wght@400;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style.css" />

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
      --title-font: "Bowlby One", sans-serif;
      --body-font: "Inter", sans-serif;
      --button-font: "Poppins", sans-serif;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    a {
      color: #000;
    }

    body {
      font-family: var(--body-font);
      background: linear-gradient(180deg, #033A7B 0%, #012B5C 100%);
      display: flex;
      justify-content: center;
      padding: 48px 72px;
      min-height: 100vh;
      /* adicionado: garante altura mínima */
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

    .navbar-fixed {
      position: fixed;
      top: 10px;
      left: 50%;
      transform: translateX(-50%);
      width: 90%;
      max-width: 980px;
      padding: 0px 0px;
      border-radius: 25px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      gap: 30px;
      z-index: 1000;
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

    /* ----------------------- LOGO E LINKS ----------------------- */

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
      transition: background 0.3s ease;
    }

    .nav-links a:hover {
      color: #FFD700;
      transform: scale(1.1);
    }

    /* ----------------------- BOTÃO ÁREA DO ALUNO ----------------------- */

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

    /* ----------------------- MENU MOBILE ----------------------- */
    .hamburger {
      display: none;
      background: none;
      border: none;
      font-size: 30px;
      color: var(--dark-blue);
      cursor: pointer;
    }

    /* Estilo apenas para telas pequenas */
    @media (max-width: 768px) {
      .nav-links {
        display: none;
        /* esconde menu inicialmente */
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
        /* mostra o menu ao clicar */
      }

      .hamburger {
        display: block;
        /* botão aparece */
      }

      .area-do-aluno {
        display: none;
        /* esconde o botão no mobile */
      }

      .navbar {
        justify-content: space-between;
      }

      /* LOGO 100% ARREDONDADA NO MOBILE */
      .logonav {
        width: 55px;
        /* ajuste se necessário */
        height: 55px;
        border-radius: 50% !important;
      }

      /* garante que a logo dentro da navbar fixa também fique redonda */
      .navbar-fixed .logonav {
        border-radius: 50% !important;
      }
    }

    /* ----------------------- HERO SECTION ----------------------- */
    .hero-section {
      display: flex;
      height: 20%;
      width: 100%;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
      gap: 10px;
      background: linear-gradient(270deg, rgba(0, 0, 0, 0) 26.46%, #00325E 63.3%),
        url('./assets/img/Textura\ Guia\ Etec.png') center top / cover no-repeat;
      color: white;
      padding: 50px 10px 50px 50px;
    }

    .hero-text {
      display: flex;
      flex-direction: column;
      max-width: 100%;
    }

    .hero-logo {
      width: 500px;
      height: auto;
    }

    .hero-section h1 {
      font-size: 3rem;
      font-weight: 700;
      line-height: 1.3;
    }

    .hero-buttons {
      display: flex;
      gap: 12px;
      margin-top: 20px;
    }

    .btn-yellow,
    .btn-blue {
      padding: 11px 23px;
      font-size: 1.1rem;
      border: none;
      border-radius: 12px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn-yellow {
      background-color: var(--yellow);
      color: #000;
    }

    .btn-yellow:hover {
      background-color: #e6b800;
      transform: scale(1.05);
    }

    .btn-blue {
      background-color: var(--button-blue);
      color: #fff;
    }

    .btn-blue:hover {
      background-color: #1b79be;
      transform: scale(1.05);
    }

    /* ----------------------- SOBRE AS ETECs ----------------------- */
    .sobre-projeto {
      padding: 60px 60px;
      position: relative;
      background: transparent;
    }

    .container-sobre {
      width: 100%;
      position: relative;
      max-width: 1200px;
      margin: 0 auto;
      border-radius: 10px;
    }

    .conteudo-sobre {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 40px;
      flex-wrap: wrap;
    }

    .texto-sobre {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 30px;
      text-align: center;
      flex: 1;
    }

    .texto-sobre h2 {
      font-family: "Bowlby One", sans-serif;
      font-size: 48px;
      color: var(--dark-blue);
      letter-spacing: 2.5px;
      text-transform: uppercase;
      text-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
    }

    .descricao {
      padding: 20px 25px;
      width: 700px;
      height: auto;
      background: rgba(33, 143, 217, 0.30);
      box-shadow: 0px 4px 4px #033A7B;
      border-right: 6px solid #033A7B;
      border-radius: 25px;
      font-family: 'Geologica', sans-serif;
      font-size: 20px;
      line-height: 1.7;
      font-weight: 555;
      color: #1E1E1E;
      text-align: justify;
    }

    .descricao strong {
      color: #033A7B;
      font-weight: 800;
    }

    /* Botões */
    .botoes-sobre {
      display: inline-flex;
      align-items: center;
      gap: 18px;
      padding: 12px 40px;
      border-radius: 30px;
      background: linear-gradient(135deg, var(--light-blue), #1a7ec2);
      box-shadow: 0 8px 18px rgba(3, 58, 123, 0.25);
      border: 2px solid rgba(255, 255, 255, 0.25);
      transition: transform .25s ease, box-shadow .25s ease;
    }

    /* Efeito de destaque */
    .botoes-sobre:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 24px rgba(3, 58, 123, 0.35);
    }

    /* Texto "MAPA DAS" */
    .btn-texto {
      font-family: "Poppins", sans-serif;
      font-size: 26px;
      font-weight: 700;
      color: var(--white);
      letter-spacing: 1px;
      text-shadow: 0px 2px 4px rgba(0,0,0,0.15);
    }

    /* Botão amarelo */
    .btn-amarelo {
      background: var(--yellow);
      padding: 10px 22px;
      border-radius: 30px;
      border: none;
      font-family: "Inter", sans-serif;
      font-size: 28px;
      font-weight: 800;
      color: #004aad;
      cursor: pointer;
      transition: transform .25s ease, background .25s ease, box-shadow .25s ease;
      box-shadow: 0px 6px 12px rgba(255, 200, 0, 0.35);
    }

    /* Hover do botão */
    .btn-amarelo:hover {
      background: #e6b800;
      transform: scale(1.08);
      box-shadow: 0px 8px 16px rgba(255, 200, 0, 0.45);
    }

    /* Dark Mode */
    .dark-mode .botoes-sobre {
      background: linear-gradient(135deg, #0e2c56, #143b72);
      border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .dark-mode .btn-texto {
      color: #ffda44;
    }

    .dark-mode .btn-amarelo {
      background: #ffda44;
      color: #0e2c56;
    }

    .dark-mode .btn-amarelo:hover {
      background: #f0c000;
    }

    /* Responsivo */
    @media (max-width: 768px) {
      .botoes-sobre {
        padding: 12px 22px;
        flex-direction: column;
      }

      .btn-texto {
        font-size: 22px;
      }

      .btn-amarelo {
        font-size: 24px;
      }
    }

    @media (max-width: 480px) {
      .btn-amarelo {
        font-size: 20px;
        padding: 8px 18px;
      }
    }

    /* Imagem da corujinha */
    .imagem-boa-vinda {
      flex: 1;
      display: flex;
      justify-content: center;
    }

    .imagem-boa-vinda img {
      width: 120%;
      border-radius: 30px;
      object-fit: cover;
      filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.25));
    }

    /* Responsividade */
    @media (max-width: 992px) {
      .texto-sobre h2 {
        font-size: 42px;
      }

      .descricao {
        font-size: 18px;
        padding: 15px 20px;
      }

      .imagem-boa-vinda img {
        width: 250px;
        height: auto;
      }
    }

    @media (max-width: 768px) {
      .conteudo-sobre {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }

      .descricao {
        max-width: 100%;
        text-align: left;
      }

      .botoes-sobre {
        padding: 10px 40px;
      }

      .btn-texto {
        font-size: 22px;
      }

      .btn-amarelo {
        font-size: 24px;
      }

      .imagem-boa-vinda img {
        margin-top: 30px;
        width: 230px;
      }

      /* LOGO 100% ARREDONDADA NO MOBILE */
      .logonav {
        width: 55px;
        /* ajuste se necessário */
        height: 55px;
        border-radius: 50% !important;
      }

      /* garante que a logo dentro da navbar fixa também fique redonda */
      .navbar-fixed .logonav {
        border-radius: 50% !important;
      }
    }

    /* ----------------------- CONTEÚDOS ----------------------- */
    /* Container Geral */
    .conteudos-frame {
      display: flex;
      padding: 50px 80px;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 25px;
      align-self: stretch;
      border: 5px solid rgba(3, 58, 123, 0.30);
      background: rgba(33, 143, 217, 0.20);
    }

    /* Título */
    .conteudos-title-bg {
      width: 80%;
      display: flex;
      justify-content: center;
      align-items: center;
      align-self: center;
      border-radius: 30px;
      background: rgba(33, 143, 217, 0.50);
    }

    .conteudos-title {
      font-family: "Bowlby One", sans-serif;
      font-style: normal;
      font-size: 60px;
      color: #033A7B;
      letter-spacing: 2px;
    }

    /* Cards */
    .conteudos-cards {
      display: flex;
      flex-direction: column;
      gap: 25px;
      width: 100%;
    }

    .conteudos-row {
      display: flex;
      gap: 25px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .conteudo-card {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      padding: 20px;
      border-radius: 30px;
      box-shadow: 4px 6px 8px rgba(0, 0, 0, 0.3);
      min-width: 220px;
      min-height: 240px;
      text-align: left;
      text-align: center;
    }

    .card-title {
      font-family: 'Bowlby One', sans-serif;
      font-size: 22px;
      color: #fff;
      text-shadow: 1px 2px 3px rgba(0, 0, 0, 0.3);
      line-height: 1.3;
    }

    .sub-card-title {
      font-family: 'Bowlby One', sans-serif;
      font-size: 17, 7px;
      color: #fff;
      text-shadow: 1px 2px 3px rgba(0, 0, 0, 0.3);
      line-height: 1.3;
    }

    .card-icon {
      width: auto;
      height: auto;
      margin-bottom: 5px;
    }

    /* Botões */
    .card-btn {
      background: #fff;
      color: #4A4459;
      border-radius: 20px;
      padding: 6px 14px;
      font-size: 14px;
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      border: none;
      cursor: pointer;
      margin-top: auto;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* Cards Específicos */
    .card-vestibulinho {
      background: #FF2D55;
    }

    .card-cursos-preparatorios {
      background: #5856D6;
    }

    .card-simulados {
      background: #033A7B;
    }

    .card-dicas-curiosidades {
      background: #FFCC00;
    }

    .card-calendario {
      background: #FF9500;
      border-radius: 35px;
      min-width: 470px;
    }

    .card-carreira {
      background: #007AFF;
      border-radius: 35px;
      min-width: 470px;
    }

    /* animação cards */

    .card-vestibulinho:hover {
      background-color: #FF2D55;
      transform: scale(1.05);
    }

    .card-cursos-preparatorios:hover {
      background-color: #5856D6;
      transform: scale(1.05);
    }

    .card-simulados:hover {
      background-color: #033A7B;
      transform: scale(1.05);
    }

    .card-dicas-curiosidades:hover {
      background-color: #FFCC00;
      transform: scale(1.05);
    }

    .card-calendario:hover {
      background-color: #FF9500;
      transform: scale(1.05);
    }

    .card-carreira:hover {
      background-color: #007AFF;
      transform: scale(1.05);
    }

    /* Horizontal Layout */
    .card-content-horizontal {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      height: 100%;
      padding: 30px;
    }

    .text-group {
      display: flex;
      flex-direction: column;
      gap: 10px;
      align-items: flex-start;
    }

    /* rodape */

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

    /* ----------------------- DARK MODE MELHORADO ----------------------- */

    body.dark-mode {
      background-color: #0A192F;
      color: #E6F1FF;
      transition: background-color 0.4s ease, color 0.4s ease;
    }

    /* Folha central */
    .dark-mode .pagina {
      background: #112240;
      box-shadow: 0px 4px 25px rgba(0, 0, 0, 0.6);
    }

    /* Navbar */
    .dark-mode .navbar {
      background: rgba(17, 34, 64, 0.85);
      backdrop-filter: blur(15px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
    }

    /* Texto da navbar */
    .dark-mode .nav-links a {
      color: #E6F1FF;
    }

    .dark-mode .nav-links a:hover {
      color: #FFD23F;
    }

    /* Botão Área do Aluno */
    .dark-mode .area-do-aluno {
      background: linear-gradient(90deg, #0059B2, #007AFF);
      color: #FFF;
    }

    .dark-mode .area-do-aluno:hover {
      background: linear-gradient(90deg, #007AFF, #0059B2);
      transform: scale(1.05);
    }

    /* Descrição */
    .dark-mode .descricao {
      background: rgba(33, 143, 217, 0.15);
      border-right: 4px solid #FFD23F;
      color: #fff;
    }

    .dark-mode .descricao strong {
      color: #1b79be;
      font-weight: 800;
    }

    /* Botão “Conheça Mais” */
    .dark-mode .botoes-sobre {
      background-color: #0E2C56;
      border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .dark-mode .btn-texto {
      color: #FFD23F;
    }

    .dark-mode .btn-amarelo {
      background: #FFD23F;
      color: #0A192F;
    }

    .dark-mode .btn-amarelo:hover {
      background: #E6B800;
    }

    /* Cards */
    .dark-mode .conteudo-card {
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
      transition: transform 0.2s ease, box-shadow 0.3s ease;
    }

    .dark-mode .conteudo-card:hover {
      transform: scale(1.04);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.6);
    }

    /* Rodapé */
    .dark-mode .rodape {
      background-color: #061123;
      color: #A8B2D1;
      transition: background-color 0.3s ease;
    }

    .dark-mode .coluna h3 {
      color: #FFD23F;
    }

    .dark-mode .coluna a:hover {
      color: #33A1FF;
    }

    /* Botão modo escuro */

    .acessibilidade-menu {
      position: fixed;
      top: 85%;
      left: 3px;
      transform: translateY(-50%);
      display: flex;
      flex-direction: column;
      gap: 10px;
      padding: 10px;
      border-radius: 0 10px 10px 0;
      z-index: 9999;
    }

    .acessibilidade-menu button {
      background-color: #1b79be;
      color: #0A192F;
      border: none;
      padding: 10px 12px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 18px;
      transition: transform 0.3s ease, background 0.3s ease, box-shadow 0.3s ease;
    }

    .acessibilidade-menu button:hover {
      transform: rotate(10deg) scale(1.1);
      background-color: #00325E;
      box-shadow: 0 0 10px rgba(255, 210, 63, 0.6);
    }

    .dark-mode .acessibilidade-menu button {
      background-color: #FFD23F;
      color: #0A192F;
      border: none;
      padding: 10px 12px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 18px;
      transition: transform 0.3s ease, background 0.3s ease, box-shadow 0.3s ease;
    }

    .dark-mode .acessibilidade-menu button:hover {
      transform: rotate(10deg) scale(1.1);
      background-color: #FFE566;
      box-shadow: 0 0 10px rgba(255, 210, 63, 0.6);
    }

    /* Responsivo */
    @media (max-width: 758px) {
      .rodape-top {
        flex-direction: column;
        gap: 10px;
        text-align: center;
      }

      .rodape-meio {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 20px;
      }
    }

    /* ----------------------- RESPONSIVIDADE GERAL ----------------------- */

    @media (max-width: 1024px) {
      body {
        padding: 20px;
        border: 8px solid rgba(3, 58, 123, 0.9);
      }

      .hero-logo {
        width: 350px;
      }

      .hero-section h1 {
        font-size: 2.2rem;
      }

      .descricao {
        font-size: 22px;
        padding: 12px;
      }

      .btn-amarelo {
        font-size: 26px;
      }

      .conteudos-frame {
        padding: 30px 40px;
      }

      .conteudos-title {
        font-size: 45px;
      }

      .card-calendario,
      .card-carreira {
        min-width: 350px;
      }

      .rodape {
        padding: 60px 40px;
      }
    }

    /* Telas até 768px — celulares grandes */
    @media (max-width: 768px) {
      body {
        padding: 10px;
      }

      .pagina {
        border-radius: 20px;
      }

      /* Navbar */
      .navbar {
        padding: 8px 20px;
        gap: 15px;
      }

      .logo {
        width: 60px;
        height: 30px;
      }

      /* Hero Section */
      .hero-section {
        padding: 40px 20px;
        align-items: center;
        text-align: center;
      }

      .hero-logo {
        width: 280px;
      }

      .hero-section h1 {
        font-size: 1.8rem;
      }

      .hero-buttons {
        flex-direction: column;
        gap: 10px;
      }

      .btn-yellow,
      .btn-blue {
        width: 80%;
        font-size: 1rem;
      }

      /* Sobre */
      .texto-sobre h2 {
        font-size: 36px;
      }

      .descricao {
        font-size: 18px;
        max-width: 90%;
      }

      .imagem-boa-vinda img {
        width: 180px;
        height: auto;
        background-color: #ffffff;
      }

      .botoes-sobre {
        flex-direction: column;
        padding: 10px 30px;
      }

      .btn-texto {
        font-size: 20px;
      }

      .btn-amarelo {
        font-size: 24px;
      }

      /* Conteúdos */
      .conteudos-frame {
        padding: 25px 20px;
      }

      .conteudos-title {
        font-size: 38px;
      }

      .conteudos-row {
        flex-direction: column;
        align-items: center;
      }

      .conteudo-card {
        width: 90%;
        min-width: unset;
      }

      .card-calendario,
      .card-carreira {
        width: 90%;
      }

      /* Rodapé */
      .rodape {
        padding: 40px 20px;
        text-align: center;
      }

      .rodape-top {
        flex-direction: column;
        gap: 12px;
      }

      .rodape-meio {
        flex-direction: column;
        align-items: center;
        gap: 25px;
      }

      .coluna h3 {
        font-size: 16px;
      }

      .coluna a {
        font-size: 13px;
      }

      .rodape-bottom {
        font-size: 11px;
      }

      /* Botão de acessibilidade */
      .acessibilidade-menu {
        top: unset;
        bottom: 15px;
        left: 15px;
        transform: none;
      }
    }

    /* Telas até 480px — celulares pequenos */
    @media (max-width: 480px) {
      .hero-section h1 {
        font-size: 1.4rem;
      }

      .hero-logo {
        width: 220px;
      }

      .descricao {
        font-size: 16px;
      }

      .btn-amarelo {
        font-size: 20px;
      }

      .conteudos-title {
        font-size: 32px;
      }

      .card-btn {
        font-size: 12px;
        padding: 5px 10px;
      }

      .rodape-bottom {
        font-size: 10px;
      }
    }

    .cookie-banner {
      position: fixed;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      background: rgba(3, 58, 123, 0.95);
      color: #fff;
      padding: 18px 26px;
      border-radius: 14px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      display: flex;
      align-items: center;
      gap: 16px;
      max-width: 700px;
      font-family: "Inter", sans-serif;
      z-index: 9999;
      transition: all 0.4s ease;
    }

    .cookie-banner p {
      margin: 0;
      font-size: 14px;
      line-height: 1.4;
    }

    .cookie-banner a {
      color: #FFCC00;
      text-decoration: underline;
    }

    .cookie-banner button {
      background: #FFCC00;
      color: #033A7B;
      border: none;
      padding: 8px 18px;
      border-radius: 10px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .cookie-banner button:hover {
      background: #FFD633;
      transform: scale(1.05);
    }

    @media (max-width: 600px) {
      .cookie-banner {
        flex-direction: column;
        text-align: center;
        gap: 10px;
        padding: 14px;
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

    /* Dropdown "Conteúdos" */
    .nav-dropdown {
      position: relative;
      display: inline-block;
    }

    #conteudosBtn {
      background: transparent;
      color: white;
      border: none;
      cursor: pointer;
      padding: 10px 14px;
      font-family: var(--button-font);
      font-weight: 700;
      font-size: 1.05rem;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: color 0.3s ease, transform 0.3s ease;
    }

    #conteudosBtn:hover {
      color: #FFD700;
      transform: scale(1.1);
    }

    #conteudosMenu {
      position: absolute;
      top: calc(100% + 8px);
      left: 0;
      min-width: 280px;
      background: #ffffff;
      color: #000000;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      overflow: hidden;
      z-index: 1200;
      opacity: 0;
      pointer-events: none;
      transform: translateY(-8px);
      transition: opacity 0.3s ease, transform 0.3s ease;
    }

    #conteudosMenu.show {
      opacity: 1;
      pointer-events: auto;
      transform: translateY(0);
    }

    .conteudos-menu-item {
      display: block;
      padding: 12px 16px;
      color: #000000;
      text-decoration: none;
      border-bottom: 1px solid #f1f1f1;
      font-weight: 700;
      font-size: 16px;
      transition: background 0.2s ease, color 0.2s ease;
    }

    .conteudos-menu-item:last-child {
      border-bottom: none;
    }

    .conteudos-menu-item:hover {
      background: #eef6ff;
      color: #033A7B;
    }

    /* Dark mode */
    .dark-mode #conteudosMenu {
      background: #1a3a52;
      color: #ffffff;
    }

    .dark-mode .conteudos-menu-item {
      color: #ffffff;
      border-bottom-color: rgba(255, 255, 255, 0.1);
    }

    .dark-mode .conteudos-menu-item:hover {
      background: rgba(33, 143, 217, 0.3);
      color: #FFD23F;
    }

    @media (max-width: 768px) {
      #conteudosMenu {
        min-width: 240px;
        top: calc(100% + 6px);
      }

      .conteudos-menu-item {
        padding: 10px 14px;
        font-size: 15px;
      }
    }

    /* Fundo escuro ao abrir o pop-up */
    .popup-conteudos {
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.6);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }

    /* Card central */
    .popup-card {
      background: #fff;
      width: 380px;
      padding: 30px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 8px 30px rgba(0,0,0,0.25);
      animation: fadeIn 0.25s ease-out;
    }

    .popup-card h2 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #033A7B;
      font-family: "Bowlby One", sans-serif;
    }

    .popup-item {
      display: block;
      margin: 12px 0;
      padding: 14px;
      border-radius: 8px;
      background: #033A7B;
      color: white;
      font-weight: bold;
      text-decoration: none;
      font-size: 16px;
      font-family: "Poppins", sans-serif;
      transition: 0.2s;
    }

    .popup-item:hover {
      background: #0552ab;
      transform: scale(1.05);
    }

    /* Botão fechar */
    .popup-close {
      margin-top: 20px;
      background: #ccc;
      padding: 8px 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      font-weight: 600;
      transition: 0.2s;
    }

    .popup-close:hover {
      background: #bbb;
    }

    /* Animação */
    @keyframes fadeIn {
      from { transform: scale(0.95); opacity: 0; }
      to   { transform: scale(1); opacity: 1; }
    }

    /* Dark mode para o pop-up */
    .dark-mode .popup-card {
      background: #1a3a52;
      color: #fff;
    }

    .dark-mode .popup-card h2 {
      color: #FFD23F;
    }

    .dark-mode .popup-item {
      background: #0059B2;
    }

    .dark-mode .popup-item:hover {
      background: #007AFF;
    }

    .dark-mode .popup-close {
      background: #334455;
      color: #fff;
    }

    .dark-mode .popup-close:hover {
      background: #445566;
    }

    @media (max-width: 720px) {
      .popup-card {
        width: calc(100% - 40px);
        max-width: 380px;
      }
    }

    /* ===== AJUSTES MOBILE ===== */

html,
body {
    max-width: 100%;
    overflow-x: hidden;
}

@media (max-width: 768px) {

    .sobre-projeto {
        width: 100%;
        padding: 40px 16px;
    }

    .container-sobre,
    .conteudo-sobre,
    .texto-sobre {
        width: 100%;
        max-width: 100%;
        min-width: 0;
    }

    .descricao {
        width: 100%;
        max-width: 100%;
        padding: 16px;
        font-size: 16px;
        line-height: 1.6;
        text-align: left;
    }

    .texto-sobre h2 {
        font-size: 32px;
        letter-spacing: 1.5px;
        text-align: center;
    }
}
  </style>
</head>

<body>

  <div id="login-success-message"
    style="display: none; padding: 20px; background-color: #4CAF50; color: white; text-align: center; border-radius: 10px; margin: 20px auto; width: 80%; max-width: 500px;">
    ✅ Login realizado com sucesso!
  </div>

  <!-- V Libras -->
  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper></div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>

  <div class="pagina">

    <!-- NAVBAR -->
    <div class="navbar-container">
      <div class="navbar">
        <div class="logo-links">
          <img src="assets/img/Logo.png" alt="Logo Guia Etec" class="logonav" />
          <div class="nav-links" id="nav-links">
            <a href="inicio.php">Início</a>
            <a href="pages/Calendario.php">Calendário</a>
            <a href="pages/simulado.php">Simulados</a>
            <a href="#" id="btn-conteudos">Conteúdos</a>
            <a href="pages/sobre.html">Sobre Nós</a>
          </div>
        </div>
        <?php if (isset($_SESSION['usuario'])): ?>
          <button class="area-do-aluno" onclick="window.location.href='pages/areadoaluno.php'">
            Área do Aluno
          </button>
        <?php else: ?>
          <button class="area-do-aluno" onclick="window.location.href='backend/login.php'">
            Área do Aluno
          </button>
        <?php endif; ?>
      </div>
    </div>

    <!-- POP-UP DE CONTEÚDOS -->
    <div id="popup-conteudos" class="popup-conteudos" aria-hidden="true">
      <div class="popup-card" role="dialog" aria-modal="true" aria-labelledby="popupTitle">
        <h2 id="popupTitle">Conteúdos Disponíveis</h2>

        <a href="pages/conteudos.php" class="popup-item">
          CONTEÚDO <br> PREPARATÓRIO
        </a>

        <a href="pages/dec.php" class="popup-item">
          DICAS E <br> CURIOSIDADES
        </a>

        <a href="pages/mapa.php" class="popup-item">
          ENCONTRE AS <br> ETECs
        </a>

        <button id="close-popup" class="popup-close">Fechar</button>
      </div>
    </div>

    <!-- HERO SECTION -->
    <section class="hero-section">
      <div class="hero-text">
        <img src="assets/img/Logo off-white.png" alt="Logo Guia Etec" class="hero-logo" />
        <h1>SUA CHAVE PARA A<br>ETEC E O SUCESSO <br>PROFISSIONAL</h1>
        <div class="hero-buttons">
          <button class="btn-yellow" onclick="window.location.href='pages/conteudos.php'">Ver
            Conteúdos</button>
          <button class="btn-blue" onclick="window.location.href='pages/Calendario.php'">Acompanhar
             Datas</button>
        </div>
      </div>
    </section>

    <!-- SOBRE AS ETECs -->
    <section class="sobre-projeto">
      <div class="container-sobre">
        <div class="conteudo-sobre">
          <!-- Texto principal -->
          <div class="texto-sobre">
            <h2>SOBRE AS ETECs</h2>
            <div class="descricao">
              <p>
                As <strong>Escolas Técnicas Estaduais (ETECs)</strong> são instituições públicas do <strong>Centro Paula Souza</strong>, reconhecidas pela qualidade no Estado de São Paulo.
              </p>

              <p>
                Oferecem <strong>cursos técnicos gratuitos</strong> e <strong>Ensino Médio Integrado</strong>, unindo teoria e prática para preparar os alunos para o mercado e para o ensino superior.
              </p>

              <p>
                O <strong>Vestibulinho</strong> é o processo seletivo de entrada, e o <strong>Guia Etec</strong> ajuda você a se preparar de forma segura e eficiente.
              </p>
            </div>

            <!-- Botões -->
            <div class="botoes-sobre">
              <span class="btn-texto">MAPA DAS</span>
              <button class="btn-amarelo" onclick="window.location.href='pages/mapa.php'">
                ETECs
              </button>
            </div>
          </div>

          <!-- Imagem ETECs -->
          <div class="imagem-boa-vinda">
            <img src="assets/img/ETECs.png" alt="Mascote Corujinha Guia Etec" />
          </div>
        </div>
      </div>
    </section>

    <!-- CONTEÚDOS -->
    <section class="conteudos-frame">
      <div class="conteudos-title-bg">
        <h2 class="conteudos-title">CONTEÚDOS</h2>
      </div>

      <div class="conteudos-cards">
        <div class="conteudos-row">
          <div class="conteudo-card card-vestibulinho">
            <img src="assets/img/icon Vestibulinho.png" class="card-icon" alt="ícone vestibulinho">
            <div class="card-title">VESTIBULINHO</div>
            <button class="card-btn" onclick="window.location.href='https://www.vestibulinhoetec.com.br'">✔ Clique
              Aqui</button>
          </div>

          <div class="conteudo-card card-cursos-preparatorios">
            <img src="assets/img/icon materiais.png" class="card-icon" alt="ícone materiais">
            <div class="card-title">CONTEÚDO</div>
            <div class="sub-card-title">PREPARATÓRIO</div>
            <button class="card-btn" onclick="window.location.href='pages/conteudos.php'">✔ Clique
              Aqui</button>
          </div>

          <div class="conteudo-card card-simulados">
            <img src="assets/img/icon simulados.png" class="card-icon" alt="ícone simulados">
            <div class="card-title">SIMULADOS</div>
            <button class="card-btn" onclick="window.location.href='pages/simulado.php'">✔ Clique
              Aqui</button>
          </div>

          <div class="conteudo-card card-dicas-curiosidades">
            <img src="assets/img/icon depoimento.png" class="card-icon" alt="ícone depoimento">
            <div class="card-title">DICAS E</div>
            <div class="sub-card-title">CURIOSIDADES</div>
            <button class="card-btn" onclick="window.location.href='pages/dec.php'">✔ Clique Aqui</button>
          </div>
        </div>

        <div class="conteudos-row">
          <div class="conteudo-card card-calendario">
            <div class="card-content-horizontal">
              <div class="text-group">
                <div class="card-title">CALENDÁRIO<br>INTERATIVO</div>
                <button class="card-btn" onclick="window.location.href='pages/Calendario.php'">✔ Clique
                  Aqui</button>
              </div>
              <img src="assets/img/Icon calendario.png" class="card-icon" alt="ícone calendário">
            </div>
          </div>

          <div class="conteudo-card card-carreira">
            <div class="card-content-horizontal">
              <div class="text-group">
                <div class="card-title">ENCONTRE AS<br>ETECs</div>
                <button class="card-btn" onclick="window.location.href='pages/mapa.php'">✔ Clique
                  Aqui</button>
              </div>
              <img src="assets/img/icon Cerreira.png" class="card-icon" alt="ícone carreira">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ALERTA DE COOKIES -->
    <div id="cookie-banner" class="cookie-banner" role="dialog" aria-live="polite">
      <p>
        🍪 Usamos cookies para melhorar sua experiência no <strong>Guia Etec</strong>.
        Ao continuar navegando, você concorda com nossa
        <a href="pages/politica.html">Política de Privacidade</a>.
      </p>
      <button id="accept-cookies">Entendi!</button>
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
          <img src="assets/img/Logo off-white.png" alt="Logo Guia Etec">
        </div>

        <div class="coluna">
          <h3>Ajuda</h3>
          <a href="#">Entre em Contato</a>
        </div>

        <div class="coluna">
          <h3>Guia</h3>
          <a href="backend/login.php">Crie sua Conta</a>
          <a href="pages/sobre.html">Sobre Nós</a>
        </div>

        <div class="coluna">
          <h3>Termos</h3>
          <a href="pages/politica.html">Termos e condições</a>
          <a href="pages/politica.html">Política de Privacidade</a>
        </div>
      </div>

      <div class="rodape-bottom">
        Guia Etec - S.P - CNPJ: 10.760.260 / Av. Vereador Francisco Moraes Ramos, 777 - Jardim Novo Horizonte |
        Bairro CSU, Rio Grande da Serra - SP CEP: 09450-000
      </div>
    </footer>

    <div class="acessibilidade-menu">
      <button id="dark-toggle" aria-pressed="false">🌙</button>
    </div>

  </div>

  <!-- SCRIPTS -->
  <script>
    // Verifica se o login foi feito com sucesso
    window.addEventListener("DOMContentLoaded", () => {
      if (sessionStorage.getItem("loginSuccess") === "true") {
        const message = document.getElementById("login-success-message");
        if (message) message.style.display = "block";
        sessionStorage.removeItem("loginSuccess");
        setTimeout(() => {
          if (message) message.style.display = "none";
        }, 4000);
      }
    });

    document.addEventListener('DOMContentLoaded', () => {
      // ===== POP-UP CONTEÚDOS =====
      const btnConteudos = document.getElementById("btn-conteudos");
      const popup = document.getElementById("popup-conteudos");
      const closePopup = document.getElementById("close-popup");

      if (btnConteudos && popup && closePopup) {
        btnConteudos.addEventListener("click", (e) => {
          e.preventDefault();
          popup.style.display = "flex";
          popup.setAttribute('aria-hidden', 'false');
          // foco no botão fechar para acessibilidade
          closePopup.focus();
        });

        closePopup.addEventListener("click", () => {
          popup.style.display = "none";
          popup.setAttribute('aria-hidden', 'true');
          btnConteudos.focus();
        });

        popup.addEventListener("click", (e) => {
          if (e.target === popup) {
            popup.style.display = "none";
            popup.setAttribute('aria-hidden', 'true');
            btnConteudos.focus();
          }
        });

        // fecha com ESC
        document.addEventListener('keydown', (e) => {
          if (e.key === 'Escape' && popup.style.display === 'flex') {
            popup.style.display = 'none';
            popup.setAttribute('aria-hidden', 'true');
            btnConteudos.focus();
          }
        });
      }

      // ===== NAVBAR FIXA E MENU MOBILE =====
      const navbarContainer = document.querySelector('.navbar-container');
      const navLinks = document.getElementById('nav-links');
      const navbarEl = document.querySelector('.navbar');

      if (navbarContainer && navLinks && navbarEl) {
        function handleNavbarOnScroll() {
          const threshold = 20;
          if (window.scrollY > threshold) {
            navbarContainer.classList.add('navbar-fixed');
          } else {
            navbarContainer.classList.remove('navbar-fixed');
          }
        }

        handleNavbarOnScroll();
        window.addEventListener('scroll', handleNavbarOnScroll);

        let hamburger = document.getElementById('hamburger');
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
          hamburger.setAttribute('aria-expanded', 'false');
          document.body.classList.remove('menu-open');
        }

        function toggleMobileMenu(e) {
          e.stopPropagation();
          const opened = navLinks.classList.toggle('nav-active');
          hamburger.setAttribute('aria-expanded', opened);
          document.body.classList.toggle('menu-open', opened);
        }

        hamburger.addEventListener('click', toggleMobileMenu);

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
      }

      // ===== DARK MODE =====
      const darkToggle = document.getElementById('dark-toggle');
      if (darkToggle) {
        darkToggle.addEventListener('click', () => {
          const enabled = document.body.classList.toggle('dark-mode');
          darkToggle.setAttribute('aria-pressed', enabled ? 'true' : 'false');
        });
      }
    });

    // ===== COOKIES =====
    document.addEventListener("DOMContentLoaded", function () {
      const banner = document.getElementById("cookie-banner");
      const button = document.getElementById("accept-cookies");

      if (!banner || !button) return;

      banner.style.display = "flex";

      button.addEventListener("click", () => {
        banner.style.opacity = "0";
        setTimeout(() => (banner.style.display = "none"), 400);
      });
    });
  </script>

  <!-- Botão Voltar ao Topo -->
  <button id="btn-topo" title="Voltar ao topo" aria-label="Voltar ao topo">↑</button>
  <script>
    (function () {
      const btnTopo = document.getElementById("btn-topo");
      const navbarContainer = document.querySelector(".navbar-container");

      if (!btnTopo) return;

      window.addEventListener("scroll", () => {
        if (navbarContainer && navbarContainer.classList.contains("navbar-fixed")) {
          btnTopo.classList.add("show");
        } else {
          btnTopo.classList.remove("show");
        }
      });

      btnTopo.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
      });
    })();
  </script>

</body>
</html>
