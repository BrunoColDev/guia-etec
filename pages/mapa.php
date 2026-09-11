<?php
require_once('../backend/protecao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <title>Simulados - Guia ETEC</title>
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
    --color-primary: #004AAD;
    --color-secondary: #4A90E2;
    --color-accent: #FFD700;
    --color-dark: #1A1A1A;
    --color-white: #FFFFFF;
    --color-bg-light: #EAF2FB;
    --yellow: #FFCC00;
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

  /* Corpo da página */
  body {
    background: linear-gradient(180deg, var(--dark-blue) 0%, #012B5C 100%);
    padding: 48px 72px;
    min-height: 100vh;
    margin: 0;
    box-sizing: border-box;
    font-family: var(--body-font);
  }

  /* Folha branca — TUDO dentro dela: navbar, conteúdo, rodapé */
  .pagina-simulados {
    width: 100%;
    height: 100%;
    max-width: 1156px;
    margin: 0 auto;
    border-radius: 40px;
    background: var(--white);
    box-shadow: 0px 0px 20px 8px rgba(30, 30, 30, 0.85);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: stretch;
  }


  .map-area {
  padding: 28px;
  width: 100%;
  display: flex;          /* 👈 Alinha filhos com flex */
  justify-content: center;/* 👈 Centraliza horizontalmente */
  align-items: center;    /* 👈 Centraliza verticalmente (opcional) */
}



.svg-wrap {
    width: 750px;
    max-width: 100%;
    background: #fff;
    padding: 14px;
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    position: relative;
    transition: all .2s ease;
    margin: 0 auto; /* 👈 AGORA CENTRALIZA DE VERDADE */
}


/* Mapa (SVG) */
svg {
    display: block;
    width: 100%;
    height: auto;
    overflow: visible;
}

/* MUNICÍPIOS - cor padrão */
svg path,
svg polygon,
svg rect,
svg circle {
    fill: #218FD9;          /* Azul claro PASTEL */
    transition: fill .15s ease, opacity .15s ease;
    cursor: pointer;
}

/* Hover (passar mouse) */
svg [id]:hover {
    fill: #0E6FB0;          /* Azul forte (secundário Guia Etec) */
    opacity: .85;
}

/* MUNICÍPIO SELECIONADO */
.__selected_muni {
    fill: #A9D4F2 !important;   /* Azul primário Guia Etec */
    filter: drop-shadow(0 4px 10px rgba(0,0,0,0.15));
}

/* =============================
          CARD LATERAL
============================= */

.card {
    position: fixed;
    right: 25px;
    top: 25px;
    width: 350px;           /* 🔥 reduzido também */
    background: #fff;
    padding: 16px;
    border-radius: 14px;
    display: none;
    z-index: 9999;
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    animation: fadeInCard .25s ease forwards;
}

@keyframes fadeInCard {
    from { opacity: 0; transform: translateY(8px); }
    to   { opacity: 1; transform: translateY(0);  }
}

.card h3 {
    margin: 0 0 8px 0;
    color: #0E6FB0;         /* Azul primário */
    font-size: 20px;
    font-weight: 700;
}

.card .close {
    float: right;
    cursor: pointer;
    font-size: 22px;
    padding: 4px 8px;
    border-radius: 6px;
    transition: background .15s ease;
}

.card .close:hover {
    background: rgba(0,0,0,0.08);
}

/* Lista das etecs */
.etec-list {
    list-style: none;
    padding: 0;
    margin-top: 10px;
    max-height: 50vh;
    overflow-y: auto;
}

.etec-list li {
    background: #f9fafb;
    border: 1px solid rgba(0,0,0,0.07);
    padding: 10px;
    border-radius: 10px;
    margin-bottom: 8px;
    transition: transform .15s ease;
}

.etec-list li:hover {
    transform: translateY(-1px);
}

/* =============================
           LEGENDA
============================= */

.legend {
    position: absolute;
    left: 12px;
    top: 12px;
    background: #fff;
    padding: 8px 12px;
    border-radius: 10px;
    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
    font-size: 14px;
    color: #0E6FB0;
    font-weight: 600;
}

/* =============================
        MOBILE
============================= */

@media(max-width: 720px) {

    .svg-wrap {
        width: 100%;
        border-radius: 0;
        padding: 10px;
        box-shadow: none;
    }

    .card {
        right: 10px;
        left: 10px;
        width: auto;
        bottom: 10px;
        top: auto;
    }
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

  .logo {
    width: 72px;
    height: 38px;
    border-radius: 70px 0 0 70px;
    object-fit: contain;
    background: var(--yellow);
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

  /* RODAPÉ */
  .rodape {
    width: 100%;
    background-color: var(--dark-blue);
    border-radius: 0 0 40px 40px;
    box-sizing: border-box;
    color: #fff;
    margin-top: auto;
    padding: 38px 24px 28px 24px;
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
    transition: color 0.3s;
  }

  .social-icons a:hover {
    color: var(--yellow);
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
    height: 42px;
  }

  .coluna {
    min-width: 134px;
  }

  .coluna h3 {
    font-size: 15px;
    margin-bottom: 8px;
    font-weight: bold;
  }

  .coluna a {
    color: #fff;
    font-size: 13px;
    margin-bottom: 5px;
    display: block;
  }

  .coluna a:hover {
    color: var(--yellow);
  }

  .rodape-bottom {
    text-align: center;
    font-size: 12px;
    border-top: 1px solid #fff;
    padding-top: 8px;
    line-height: 1.4;
  }

  /* RESPONSIVO */
  @media (max-width: 1156px) {
    .pagina-simulados {
      max-width: 100vw;
    }
  }

  @media (max-width: 820px) {
    body {
      padding: 10px;
    }

    .pagina-simulados {
      border-radius: 18px;
    }

    .simulados-header {
      flex-direction: column;
      align-items: flex-start;
      padding: 24px 3vw 0 3vw;
    }

    .rodape,
    .navbar {
      max-width: 98vw;
    }
  }

  @media (max-width: 540px) {
    .pagina-simulados {
      border-radius: 10px;
    }

    .simulados-header {
      padding: 15px 2vw 0 2vw;
    }

    .simulados-titulo h1 {
      font-size: 1.3rem;
    }

    .simulado-card {
      padding: 12px 4px;
      min-width: 118px;
      max-width: 99vw;
    }

    .rodape {
      padding: 14px 2px 12px 2px;
      border-radius: 0 0 10px 10px;
    }
  }
</style>

<body>
  <div class="pagina-simulados">
    <!-- NAVBAR -->
    <div class="navbar-container">
      <div class="navbar">
        <div class="logo-links">
          <img src="../assets/img/Logo.png" alt="Logo Guia Etec" class="logo" />
          <div class="nav-links" id="nav-links">
            <a href="../inicio.php">Início</a>
            <a href="../pages/calendario.php">Calendário</a>
            <a href="../pages/simulado.php">Simulados</a>
            <a href="../pages/conteudos.php">Conteúdos</a>
            <a href="../pages/sobre.html">Sobre Nós</a>
          </div>
        </div>
        <button class="area-do-aluno" onclick="window.location.href='../backend/login.php'">Área do Aluno</button>
      </div>
    </div>

    <div class="map-area">
  <div class="svg-wrap" id="svg-wrap">
    <div class="legend">Municípios</div>

<!-- prólogo XML removido (causa conflito em arquivos .php) -->
<!-- SVG inserido abaixo -->
<svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   width="1000"
   height="600"
   id="svg3679"
   version="1.1"
   inkscape:version="0.48.1 "
   sodipodi:docname="Mapa-RMSP.svg">
  <defs
     id="defs3681" />
  <sodipodi:namedview
     id="base"
     pagecolor="#ffffff"
     bordercolor="#666666"
     borderopacity="1.0"
     inkscape:pageopacity="0.0"
     inkscape:pageshadow="2"
     inkscape:zoom="0.70710678"
     inkscape:cx="358.85299"
     inkscape:cy="389.43326"
     inkscape:document-units="px"
     inkscape:current-layer="layer1"
     showgrid="false"
     inkscape:window-width="1280"
     inkscape:window-height="719"
     inkscape:window-x="-4"
     inkscape:window-y="-4"
     inkscape:window-maximized="1" />
  <metadata
     id="metadata3684">
    <rdf:RDF>
      <cc:Work
         rdf:about="">
        <dc:format>image/svg+xml</dc:format>
        <dc:type
           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
        <dc:title />
      </cc:Work>
    </rdf:RDF>
  </metadata>
  <g
     inkscape:label="Camada 1"
     inkscape:groupmode="layer"
     id="layer1"
     transform="translate(0,-452.36218)">
    <path
       inkscape:connector-curvature="0"
       style="fill-rule:evenodd;stroke:#cccccc;stroke-opacity:1;stroke-width:0.69999999999999996;stroke-miterlimit:4;stroke-dasharray:none"
       id="sp_sao_paulo"
       class="fil3 str1"
       d="m 277.13319,935.31922 -0.4772,-7.53306 4.11766,-8.79519 -1.15373,-4.29896 4.01821,3.9243 14.62074,-0.19703 -1.39245,-31.47325 7.93698,1.0846 2.14836,-4.79201 0.0225,-5.12723 -6.70362,-5.26525 -16.13259,-4.75255 -1.84997,-1.49873 1.81023,-4.04262 6.14667,-6.92174 -0.0225,-8.18387 8.5934,-6.40901 4.47572,-6.74425 -15.93362,-9.091 -2.60585,-6.70485 3.00372,-3.70737 1.01444,-13.82379 -4.5155,-2.34666 1.09405,-2.40589 -2.58598,-5.26524 5.74886,-22.89502 24.84534,-23.86135 2.80477,-4.29897 -8.09613,-2.99744 -9.13045,4.25952 -13.60628,1.24238 -4.47571,2.52415 -2.66558,-1.0846 1.75049,-14.47456 6.30582,-0.82823 19.51424,-12.16729 3.26229,-7.1781 -0.39803,-12.46314 2.80475,-3.51012 2.38709,0.51256 2.58597,-3.01713 -2.80482,-0.43411 -7.30039,-7.53305 4.8537,-7.33587 -6.80311,-2.60306 -3.24242,-4.83142 1.69083,-4.22011 -3.6403,-3.35241 2.36721,-7.29646 -4.2172,3.82575 -4.51551,0.45357 -4.01822,-2.60305 -3.62036,4.71314 -0.91503,-0.35507 -5.29132,-9.28818 -0.93494,-6.27103 -8.75252,-12.64058 2.60586,-3.21436 -3.66017,-4.47647 1.59141,-5.71882 8.95147,-0.70993 3.69991,-2.93827 1.57147,4.61447 4.05803,-1.59728 3.99829,3.09606 2.48656,-1.38046 -0.2386,-2.32696 7.32032,-0.90711 1.37252,-5.34417 2.52631,-1.77477 2.38707,1.14375 3.60049,-0.51257 2.34727,2.36643 9.78695,-1.22268 8.49394,4.91034 7.38,6.44847 0.93495,5.46248 3.93863,1.43956 0.95482,2.42558 8.57355,2.50445 3.38165,-6.94151 1.51179,-0.25656 5.51016,2.58333 8.41437,7.49364 13.44713,-1.79453 6.88266,-4.22011 0.17909,-1.93254 2.62578,1.22262 3.52088,-1.34095 0.0994,-6.60623 8.25523,-7.76975 -0.67633,-2.2678 12.45249,-10.4911 6.72355,1.30154 11.87566,-10.78689 8.11599,3.07636 -0.2386,4.06232 -4.8537,4.06233 -1.03438,7.11892 -4.15745,3.15523 -1.61128,3.70742 -0.59677,6.50762 -5.29131,3.11576 -0.91503,11.98981 1.01451,3.03688 -3.28223,10.70803 5.94776,10.70802 0.85535,9.82064 -1.43224,5.56104 4.45589,5.69912 5.92783,-2.11008 13.66595,-12.83776 15.0186,-5.6005 14.00407,0.96627 -0.55691,1.24237 11.79605,1.69592 10.6423,-1.53813 3.93861,-2.11009 1.45218,1.00574 1.41232,-2.85942 6.96226,0.53261 4.39616,-2.01146 1.86986,3.82568 1.57146,-0.31555 -0.81553,5.16668 3.08326,1.24238 0.83548,-2.05087 7.57891,-0.88741 0.85535,-4.45676 2.88437,-1.24237 10.32404,18.75382 -0.41768,5.3047 -5.90796,-0.92686 0.83547,1.97201 -2.58597,0.8874 -5.3908,6.9809 -5.21176,2.58337 4.95317,9.07123 -4.77414,3.70736 3.36179,5.63997 6.3655,0.98598 -2.12846,4.67369 2.74509,3.62851 -3.20262,1.22262 3.97842,7.02036 -2.42683,-0.13802 -1.2134,5.71882 -8.87193,3.41156 1.45212,4.81171 -1.59135,4.02294 -5.76873,3.13545 -0.1196,5.14698 -9.17032,7.37533 -4.97305,-4.73285 -0.87521,2.03116 -10.76167,1.87344 -12.69118,-2.32696 -7.47949,-8.85436 -3.40153,-0.33503 -10.70204,1.12405 -11.27882,-7.15838 -7.55903,-0.31556 -7.85742,-4.65395 -6.9026,2.72135 -12.61157,-6.96121 -2.2876,25.57701 -6.6838,6.25128 -12.71108,5.75822 -1.35269,-1.85368 -6.06711,1.45931 -4.55526,19.36513 6.30577,8.24299 4.91337,2.32696 -13.10893,10.09673 -7.04181,2.89881 -1.79031,1.34099 3.10319,12.36447 9.32942,9.20932 7.24071,13.21248 -2.40694,13.50822 -3.9983,7.41478 -2.30753,11.22071 0.97477,6.03434 9.56812,6.52738 -0.13923,12.20675 5.15208,19.93697 -2.40694,9.11069 -2.34728,1.73543 5.88803,7.11892 -2.44669,3.07635 2.42682,4.49616 -2.94404,6.82318 -4.01823,-0.13802 -9.4289,4.92998 -1.01445,3.49049 3.28218,5.34415 -12.49229,7.59222 -6.98213,-8.47963 -10.20469,0.21706 -4.51552,-4.25958 -4.07791,1.30154 -5.37086,4.23981 -9.05095,3.03689 -3.95856,-1.87338 -7.34019,0.74934 -6.06712,-1.22268 -12.31325,8.61764 -6.52466,0.43411 -0.77579,-1.75512 12.59177,-17.90581 -3.75965,-2.97773 -1.75051,-4.29898 -6.18646,-2.89888 -1.01445,-4.96948 -2.0887,-0.31557 -4.97305,-5.26525 -12.2337,-1.99176 -2.62573,-10.51078 -0.0595,-0.039 z" />
    <path
       inkscape:connector-curvature="0"
       style="fill-rule:evenodd;stroke:#cccccc;stroke-opacity:1;stroke-width:0.69999999999999996;stroke-miterlimit:4;stroke-dasharray:none"
       id="sp_diadema"
       class="fil3 str1"
       d="m 377.20763,818.93685 7.02194,-2.89881 13.12886,-10.09672 -4.91338,-2.32697 -6.32569,-8.24298 4.55526,-19.36514 6.06711,-1.45931 1.37257,1.85368 3.83919,5.24555 4.23707,-3.98347 2.86442,0.33504 -1.88972,4.79196 5.2515,3.5891 7.89723,-3.15522 -0.0797,10.96437 -5.70905,5.46243 -1.55154,4.73285 -8.97141,7.96694 -1.23329,8.47962 -2.44675,2.09033 -5.41067,1.43955 -17.74379,-5.42302 0.0393,0 z" />
    <path
       inkscape:connector-curvature="0"
       style="fill-rule:evenodd;stroke:#cccccc;stroke-opacity:1;stroke-width:0.69999999999999996;stroke-miterlimit:4;stroke-dasharray:none"
       id="sp_sao_bernardo_do_campo"
       class="fil3 str1"
       d="m 377.17243,818.94203 17.72392,5.42302 5.41066,-1.43956 2.46663,-2.09032 1.23328,-8.49938 8.95148,-7.94718 1.57147,-4.75255 5.68918,-5.46248 0.0797,-10.96437 -7.89716,3.15522 -5.25156,-3.56936 1.88979,-4.79196 -2.8645,-0.33503 -4.21712,3.96376 -3.85907,-5.22584 12.71106,-5.75828 6.68381,-6.27099 5.27138,5.48219 5.25157,-0.51257 7.79769,10.19528 -0.51705,10.31361 9.17031,2.93828 4.15745,7.8683 9.64773,2.76085 -2.98385,6.03433 2.84456,4.45677 -1.88973,7.888 1.61127,4.00317 -5.98755,3.66796 3.56068,1.34095 9.40902,-3.68766 5.27145,1.87344 31.33012,30.86194 10.10522,2.36643 -1.21342,4.33838 2.20806,2.12977 10.72185,2.07063 -10.00573,6.31044 -4.73435,-0.39459 -5.0924,3.0369 2.44675,1.63674 -2.1285,5.73858 3.42146,0.82825 -3.79939,4.35814 -6.5246,2.38613 -3.18275,6.15264 -3.54081,-2.12978 -2.32741,7.15845 -8.69288,8.3613 -1.45213,-1.51848 -6.5246,9.3671 -3.3419,2.87911 -11.85571,1.12405 -8.37463,9.95864 -8.53375,4.85112 -2.42683,6.48791 -3.93868,3.66798 -4.89344,1.93259 -1.33276,-1.73542 -1.90967,3.78628 -9.88636,5.65967 -14.56106,3.56935 2.94404,-6.82319 -2.42687,-4.49614 2.44674,-3.07637 -5.88808,-7.11892 2.34728,-1.71566 2.42682,-9.11069 -5.17196,-19.93704 0.13924,-12.22645 -9.56818,-6.50762 -0.9747,-6.03433 2.30752,-11.22077 4.01821,-7.43443 2.38702,-13.48857 -7.24072,-13.23218 -9.30952,-9.18955 -3.12308,-12.36454 1.79031,-1.3607 0,0.039 z" />
    <path
       inkscape:connector-curvature="0"
       style="fill-rule:evenodd;stroke:#cccccc;stroke-opacity:1;stroke-width:0.69999999999999996;stroke-miterlimit:4;stroke-dasharray:none"
       id="sp_sao_caetano_do_sul"
       class="fil3 str1"
       d="m 417.49559,764.36923 2.2876,-25.57694 12.61164,6.94144 6.90264,-2.72134 1.61116,5.0483 -3.04347,1.341 3.32199,4.83141 -3.44134,4.7131 -0.93496,6.46821 -2.42682,3.8454 -2.46662,-2.54392 -3.89886,2.60308 -5.25153,0.5326 -5.27143,-5.48217 z" />
    <path
       inkscape:connector-curvature="0"
       style="fill-rule:evenodd;stroke:#cccccc;stroke-opacity:1;stroke-width:0.69999999999999996;stroke-miterlimit:4;stroke-dasharray:none"
       id="sp_santo_andre"
       class="fil3 str1"
       d="m 428.04016,769.33049 3.879,-2.60303 2.46662,2.54387 2.42682,-3.84539 0.93496,-6.46822 3.44132,-4.71309 -3.32197,-4.83143 3.04347,-1.34099 -1.61123,-5.0483 7.85736,4.67364 7.55904,0.31556 11.27888,7.15844 10.70198,-1.12405 -1.69083,8.95291 4.79402,6.27097 -5.33111,1.00574 -4.39617,3.72711 0.41769,2.54385 6.46492,2.72139 4.11771,8.85436 -6.46499,11.08269 -0.27845,7.41473 4.71442,0.84794 1.73064,4.27928 3.52088,-0.0167 3.66015,4.23981 -1.11392,8.65716 10.42347,10.76714 -2.96392,4.16095 2.10857,2.16925 4.73433,1.26206 11.75625,-2.48474 1.98927,5.0089 6.5644,-2.62277 12.69119,-0.86766 10.84119,-5.54135 2.68548,-4.25957 6.76335,-1.06488 0.8951,-6.15265 6.14673,-2.60308 3.62036,0.88741 5.29131,-7.04006 4.97305,1.47901 6.44504,5.22585 -2.04887,4.75249 3.20262,-0.11859 5.6295,4.14125 6.64395,-1.341 10.48321,12.87728 -11.07993,10.6094 -3.99836,0.23655 -11.06002,9.13038 0,-10.5897 -9.98587,-2.66225 -10.86113,6.07381 -12.31325,0.27604 -2.74509,8.24303 -9.94611,5.56106 -1.45212,-1.24238 -9.03103,1.83397 -10.72191,-2.07062 -2.20804,-2.12972 1.21347,-4.33843 -10.10527,-2.36671 -31.33014,-30.86194 -5.27144,-1.87339 -9.40896,3.68765 -3.56069,-1.34099 5.98751,-3.66791 -1.61129,-4.00322 1.8898,-7.88801 -2.84462,-4.45675 2.98384,-6.03434 -9.64766,-2.76078 -4.15752,-7.86838 -9.17025,-2.93829 0.51705,-10.3136 -7.79769,-10.19528 0.0393,0.0222 z" />
    <path
       inksape:connector-curvature="0"
       style="fill-rule:evenodd;stroke:#cccccc;stroke-opacity:1;stroke-width:0.69999999999999996;stroke-miterlimit:4;stroke-dasharray:none"
       id="sp_maua"
       class="fil3 str1"
       d="m 476.69943,754.05334 3.40154,0.33504 7.47948,8.83464 12.69119,2.34667 10.76166,-1.87338 0.87528,-2.03123 4.97299,4.71316 9.17032,-7.37533 0.13922,-5.12722 5.76874,-3.15521 1.57147,-4.00317 7.4198,3.45096 -5.35099,5.62027 -4.97305,11.45735 6.58433,15.42112 -4.19726,-0.25657 -5.51014,2.93828 -5.15208,5.32442 -8.8918,-3.8257 -13.08902,14.51402 -7.12142,2.7805 -8.97135,7.59226 -3.50099,0.0222 -1.73065,-4.27926 -4.71446,-0.84797 0.25881,-7.41473 6.48478,-11.08269 -4.11763,-8.85433 -6.48486,-2.7214 -0.41768,-2.54385 4.39615,-3.72713 5.33112,-1.00573 -4.77409,-6.27098 1.69082,-8.95291 0,0 z" />
    <path
       inkscape:connector-curvature="0"
       style="fill-rule:evenodd;stroke:#cccccc;stroke-opacity:1;stroke-width:0.69999999999999996;stroke-miterlimit:4;stroke-dasharray:none"
       id="sp_ribeirao_pires"
       class="fil3 str1"
       d="m 484.30608,811.71764 8.97136,-7.59221 7.12142,-2.78055 13.08905,-14.51402 8.8918,3.82574 5.15203,-5.32446 5.51015,-2.93827 4.19726,0.25656 -6.58434,-15.42111 4.97306,-11.45737 5.33112,-5.62021 5.86815,15.40136 6.70368,-0.5916 3.97842,-2.50445 1.21342,1.6565 0.89515,4.33842 -2.70535,8.57825 0.85537,3.29325 3.68008,1.30153 8.13588,8.24299 3.99835,15.22393 -2.84462,-1.59734 -0.49739,4.22012 -2.92411,2.30726 -6.2462,0.70993 -7.45956,-2.09033 -1.37256,-3.37216 -6.18648,1.73536 -6.10685,-1.28177 1.7107,4.51586 -1.88973,4.25956 -7.30046,0.0985 -2.88437,4.39753 -8.61329,2.83971 -3.28222,9.36704 1.69088,4.73285 -5.8284,1.83393 -0.67638,2.72139 -11.73636,2.48475 -4.73435,-1.26208 -2.10856,-2.16924 2.96396,-4.16095 -10.42351,-10.76713 1.09406,-8.65716 -3.66017,-4.23981 0.0393,0 z" />
    <path
       inkscape:connector-curvature="0"
       style="fill-rule:evenodd;stroke:#cccccc;stroke-opacity:1;stroke-width:0.69999999999999996;stroke-miterlimit:4;stroke-dasharray:none"
       id="sp_rio_grande_da_serra"
       class="fil3 str1"
       d="m 512.86953,840.4896 0.67632,-2.72134 5.8284,-1.83398 -1.69083,-4.73286 3.28218,-9.36704 8.61334,-2.8397 2.90425,-4.39754 7.28052,-0.0984 1.88978,-4.25952 -1.71076,-4.51591 6.10692,1.28178 6.18647,-1.73536 1.37257,3.37215 7.45955,2.09033 6.24614,-0.70992 2.92411,-2.30727 0.51706,-4.22012 2.82469,1.59735 1.37257,-3.3327 2.74507,0.65077 -2.32734,15.30279 -4.95318,-1.479 -5.31119,7.04006 -3.62036,-0.88742 -6.14672,2.60307 -0.89515,6.15266 -6.7633,1.0649 -2.68547,4.25956 -10.8412,5.54136 -12.69119,0.86764 -6.56446,2.62277 -1.98922,-5.0089 -0.0393,0 z" />
    
    <text
       xml:space="preserve"
       style="font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;text-align:center;line-height:125%;letter-spacing:0px;word-spacing:0px;text-anchor:middle;fill:#000000;fill-opacity:1;stroke:none;font-family:Arial;-inkscape-font-specification:Arial;stroke-width:0.69999999999999996;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
       x="379.00925"
       y="716.13293"
       id="text5355"
       sodipodi:linespacing="125%"><tspan
         sodipodi:role="line"
         id="tspan5357"
         x="379.00925"
         y="716.13293">SP</tspan></text>
    <text
       xml:space="preserve"
       style="font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;text-align:center;line-height:125%;letter-spacing:0px;word-spacing:0px;text-anchor:middle;fill:#000000;fill-opacity:1;stroke:none;font-family:Arial;-inkscape-font-specification:Arial;stroke-width:0.69999999999999996;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
       x="440.17395"
       y="855.07941"
       id="text5363"
       sodipodi:linespacing="125%"><tspan
         sodipodi:role="line"
         id="tspan5365"
         x="440.17395"
         y="855.07941">SBC</tspan><tspan
         sodipodi:role="line"
         x="440.17395"
         y="871.32941"
         id="tspan5367"></tspan></text>
    <text
       xml:space="preserve"
       style="font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;text-align:center;line-height:125%;letter-spacing:0px;word-spacing:0px;text-anchor:middle;fill:#000000;fill-opacity:1;stroke:none;font-family:Arial;-inkscape-font-specification:Arial"
       x="456.79095"
       y="770.7569"
       id="text5369"
       sodipodi:linespacing="125%"><tspan
         sodipodi:role="line"
         id="tspan5371"
         x="456.79095"
         y="770.7569">SA</tspan><tspan
         sodipodi:role="line"
         x="456.79095"
         y="787.0069"
         id="tspan5373"></tspan></text>
    <text
       xml:space="preserve"
       style="font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;text-align:center;line-height:125%;letter-spacing:0px;word-spacing:0px;text-anchor:middle;fill:#000000;fill-opacity:1;stroke:none;font-family:Arial;-inkscape-font-specification:Arial;stroke-width:0.69999999999999996;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
       x="499.9245"
       y="327.76389"
       id="text5379"
       sodipodi:linespacing="125%"
       transform="translate(0,452.36218)"><tspan
         sodipodi:role="line"
         id="tspan5381"
         x="499.9245"
         y="327.76389">MAU</tspan></text>
    <text
       xml:space="preserve"
       style="font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;text-align:center;line-height:125%;letter-spacing:0px;word-spacing:0px;text-anchor:middle;fill:#000000;fill-opacity:1;stroke:none;font-family:Arial;-inkscape-font-specification:Arial;stroke-width:0.69999999999999996;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
       x="401.28308"
       y="797.80377"
       id="text5383"
       sodipodi:linespacing="125%"><tspan
         sodipodi:role="line"
         id="tspan5385"
         x="401.28308"
         y="797.80377">DIA</tspan></text>
    <text
       xml:space="preserve"
       style="font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;text-align:center;line-height:125%;letter-spacing:0px;word-spacing:0px;text-anchor:middle;fill:#000000;fill-opacity:1;stroke:none;font-family:Arial;-inkscape-font-specification:Arial"
       x="419.84467"
       y="747.24561"
       id="text5397"
       sodipodi:linespacing="125%"><tspan
         sodipodi:role="line"
         id="tspan5399"
         x="419.84467"
         y="747.24561">SCS</tspan><tspan
         sodipodi:role="line"
         x="419.84467"
         y="763.49561"
         id="tspan5401"></tspan></text>
    <text
       xml:space="preserve"
       style="font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;text-align:center;line-height:125%;letter-spacing:0px;word-spacing:0px;text-anchor:middle;fill:#000000;fill-opacity:1;stroke:none;font-family:Arial;-inkscape-font-specification:Arial"
       x="531.56757"
       y="804.52124"
       id="text5413"
       sodipodi:linespacing="125%"><tspan
         sodipodi:role="line"
         id="tspan5415"
         x="531.56757"
         y="804.52124">RP</tspan></text>
    <text
       xml:space="preserve"
       style="font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;text-align:center;line-height:125%;letter-spacing:0px;word-spacing:0px;text-anchor:middle;fill:#000000;fill-opacity:1;stroke:none;font-family:Arial;-inkscape-font-specification:Arial"
       x="536.87079"
       y="824.14349"
       id="text5417"
       sodipodi:linespacing="125%"><tspan
         sodipodi:role="line"
         id="tspan5419"
         x="536.87079"
         y="824.14349">RGS</tspan><tspan
         sodipodi:role="line"
         x="536.87079"
         y="840.39349"
         id="tspan5421"></tspan></text>
  </g>
</svg>

  </div>
</div>

<div class="card" id="card">
  <span class="close" id="card-close">✕</span>
  <h3 id="card-title">Município</h3>
  <div id="card-body">
    <p id="card-empty" class="empty">Nenhuma ETEC cadastrada.</p>
    <ul class="etec-list" id="card-list"></ul>
  </div>
</div>

<script>
/* =======================
   DADOS DAS ETECs (AGORA CORRETO)
======================= */

const etecsData = {

  /* ==========================
     SÃO PAULO (CAPITAL)
  ========================== */
  "sao_paulo": [
     {
      nome: "ETEC Heliópolis",
      endereco: "Rua Almirante Mariath, 30 – Heliópolis",
      cursos: ["DS", "Administração", "Logística"]
    },
    {
      nome: "ETEC José Rocha Mendes",
      endereco: "Av. Sapopemba, 5279 – Sapopemba",
      cursos: ["Informática", "Mecatrônica", "Administração"]
    },
    {
      nome: "ETEC Guaracy Silveira",
      endereco: "Rua Ferreira de Araújo, 527 – Pinheiros",
      cursos: ["DS", "Nutrição", "RH"]
    },
    {
      nome: "ETEC de Artes",
      endereco: "Av. Cruzeiro do Sul, 2630 – Santana",
      cursos: ["Teatro", "Dança", "Produção Cultural"]
    },
    {
      nome: "ETEC Aprígio Gonzaga",
      endereco: "Rua Vergueiro, 2676 – Vila Mariana",
      cursos: ["Edificações", "Administração"]
    },
    {
      nome: "ETEC Getúlio Vargas",
      endereco: "Av. Tiradentes, 615 – Luz",
      cursos: ["Mecânica", "Mecatrônica", "DS"]
    },
    {
      nome: "ETEC Martin Luther King",
      endereco: "Av. Conde de Frontin, 500 – Tatuapé",
      cursos: ["Química", "Administração"]
    },
    {
      nome: "ETEC Parque Belém",
      endereco: "Rua Ulisses Cruz, 300 – Belém",
      cursos: ["Eventos", "Nutrição"]
    },
    {
      nome: "ETEC Carlos de Campos",
      endereco: "Rua Monsenhor Andrade, 298 – Brás",
      cursos: ["Hospedagem", "Administração"]
    },
    {
      nome: "ETEC São Mateus",
      endereco: "Av. Mateo Bei, 2970 – São Mateus",
      cursos: ["DS", "Administração", "Logística"]
    },
    {
      nome: "ETEC Jardim Ângela",
      endereco: "Estrada da Baronesa, 1695 – Jardim Ângela",
      cursos: ["Administração", "Logística"]
    },
    {
      nome: "ETEC Raposo Tavares",
      endereco: "Rua Bragança Paulista, 145 – Raposo Tavares",
      cursos: ["DS", "Marketing"]
    },
    {
      nome: "ETEC Prof. Horácio Augusto da Silveira",
      endereco: "Rua Alcântara, 113 – Vila Guilherme",
      cursos: ["Mecânica", "Mecatrônica", "Eletrônica"]
    },
    {
      nome: "ETEC Santa Ifigênia",
      endereco: "Rua Pedro Vicente, 68 – Luz",
      cursos: ["Informática", "Administração"]
    },
    {
      nome: "ETEC Jardim São Luís",
      endereco: "Estrada de Itapecerica, 7887 – Jardim São Luís",
      cursos: ["Administração", "RH", "DS"]
    }
  ],
  /* ==========================
     ABC PAULISTA
  ========================== */

  "santo_andre": [
    {
      nome: "ETEC Júlio de Mesquita",
      endereco: "R. Prefeito Justino Paixão, 80 – Vl. Príncipe de Gales",
      cursos: ["DS", "Administração", "RH", "Logística"]
    },
    {
      nome: "ETEC Parque da Juventude Santo André",
      endereco: "R. Antônio Cardoso Franco, 150 – Centro",
      cursos: ["DS", "Informática", "Enfermagem"]
    }
  ],

  "sao_bernardo_do_campo": [
    {
      nome: "ETEC Lauro Gomes",
      endereco: "Rua Tiradentes, 1845 – SBC",
      cursos: ["DS", "Mecatrônica", "Administração", "Edificações"]
    },
    {
      nome: "ETEC São Bernardo",
      endereco: "Av. Pereira Barreto, 1800 – Baeta Neves",
      cursos: ["Administração", "Marketing", "Logística"]
    }
  ],

  "sao_caetano_do_sul": [
    {
      nome: "ETEC Jorge Street",
      endereco: "R. Capivari, 30 – Barcelona",
      cursos: ["Automação Industrial", "Eletrônica", "Administração"]
    }
  ],

  "diadema": [
    {
      nome: "ETEC Diadema",
      endereco: "Av. Sete de Setembro, 555 – Centro",
      cursos: ["Química", "Administração", "Logística"]
    }
  ],

  "maua": [
    {
      nome: "ETEC Alcides Greca",
      endereco: "Rua Ribeirão Preto, 70 – Vila Noêmia",
      cursos: ["Química", "Administração"]
    },
    {
      nome: "ETEC Mauá (Ext. Lauro Gomes)",
      endereco: "Rua Rui Barbosa, 955 – Vila Bocaina",
      cursos: ["DS", "Administração"]
    }
  ],

  "ribeirao_pires": [
    {
      nome: "ETEC Ribeirão Pires",
      endereco: "Rua Bélgica, 88 – Jardim Alvorada",
      cursos: ["DS", "Administração", "Enfermagem"]
    }
  ],

  "rio_grande_da_serra": [
    {
      nome: "ETEC Rio Grande da Serra (Classe Parceira)",
      endereco: "Rua do Progresso, 251 – Centro",
      cursos: ["Administração", "Logística"]
    }
  ],


};



/* =======================
   FUNÇÕES DO MAPA
======================= */

function keyFromId(id){
  if(!id) return '';
  return id.toString()
    .toLowerCase()
    .replace(/^sp[_-]?/,'')
    .replace(/^mun[_-]?/,'')
    .replace(/-|\s+/g,'_')
    .replace(/[^\w]/g,'');
}

function niceName(id){
  const k = keyFromId(id);
  return k.replace(/_/g,' ').replace(/\b\w/g,c=>c.toUpperCase());
}


const svgWrap = document.getElementById('svg-wrap');
const card = document.getElementById('card');
const cardTitle = document.getElementById('card-title');
const cardList = document.getElementById('card-list');
const cardEmpty = document.getElementById('card-empty');
const cardClose = document.getElementById('card-close');

const svgEl = svgWrap.querySelector('svg');


/* =======================
   AJUSTE DO SVG + EVENTOS
======================= */

if (svgEl) {
  try {
    svgEl.setAttribute('preserveAspectRatio', 'xMidYMid meet');
    svgEl.removeAttribute('width');
    svgEl.removeAttribute('height');

    const layer = svgEl.querySelector('#layer1');
    if (layer) {
      if (layer.getAttribute('transform')) layer.removeAttribute('transform');

      try {
        const bb = layer.getBBox();
        if (bb && bb.width && bb.height) {
          svgEl.setAttribute('viewBox', `${bb.x} ${bb.y} ${bb.width} ${bb.height}`);
        }
      } catch (e) {}
    }
  } catch (e) {}


  /* CLIQUE NOS MUNICÍPIOS */
  svgEl.addEventListener('click', function (ev) {
    const target = ev.target.closest('path, g, polygon, rect, circle, ellipse, polyline');
    if (!target || !svgEl.contains(target)) return;

    const id = target.id;
    if (!id) return;

    const prev = svgEl.querySelector('.__selected_muni');
    if (prev) prev.classList.remove('__selected_muni');

    target.classList.add('__selected_muni');

    showCard(id, ev.pageX, ev.pageY);
  });


  /* TOOLTIP */
  svgEl.addEventListener('mouseover', function (ev) {
    const target = ev.target.closest('path, g, polygon, rect, circle, ellipse, polyline, text');
    if (!target || !svgEl.contains(target)) return;

    if (!target.getAttribute('title')) {
      const id = target.id;
      if (id) target.setAttribute('title', niceName(id));
    }
  }, { passive: true });

  try {
    const style = document.createElement('style');
    style.textContent = 'svg text{pointer-events:none}';
    document.head.appendChild(style);
  } catch (e) {}
}


/* =======================
   FUNÇÃO DO CARD
======================= */

function showCard(id,x,y){
  const key = keyFromId(id);

  cardTitle.textContent = niceName(id);

  const list = etecsData[key] || [];
  cardList.innerHTML='';

  if(list.length === 0){
    cardEmpty.style.display='block';
    cardList.style.display='none';

  } else {
    cardEmpty.style.display='none';
    cardList.style.display='block';

    list.forEach(e=>{
      const li = document.createElement('li');
      li.innerHTML =
        '<strong>'+e.nome+'</strong><br>'+
        '<small>'+e.endereco+'</small><br>'+
        '<small>Cursos: '+(e.cursos||[]).join(', ')+'</small>';

      cardList.appendChild(li);
    });
  }

  card.style.display='block';

  const ww = window.innerWidth;
  const wh = window.innerHeight;

  let left = (x||window.innerWidth/2)+12;
  let top  = (y||window.innerHeight/2)+12;

  if(left + card.offsetWidth > ww - 20) left = ww - card.offsetWidth - 20;
  if(top + card.offsetHeight > wh - 20) top = wh - card.offsetHeight - 20;

  card.style.left = left + 'px';
  card.style.top  = top  + 'px';
}

cardClose.addEventListener('click', ()=>card.style.display='none');

document.addEventListener('click',(ev)=>{
  const inside = ev.target.closest('.card') || ev.target.closest('svg');
  if(!inside){
    card.style.display='none';
    const prev = svgEl.querySelector('.__selected_muni');
    if(prev) prev.classList.remove('__selected_muni');
  }
});


/* =======================
   NOTIFICAÇÕES
======================= */

const btn = document.getElementById("notificacoes-btn");
const submenu = document.getElementById("submenu-notificacoes");
const status = document.getElementById("notificacoes-status");

if (btn && submenu && status) {

  btn.addEventListener("click", () => {
    submenu.style.display =
      submenu.style.display === "block" ? "none" : "block";
  });

  document.querySelectorAll(".opcao-notificacao").forEach(opcao => {
    opcao.addEventListener("click", () => {

      const value = opcao.dataset.opcao;

      if (value === "permitir") {
        status.textContent = "Permitir";
        status.style.color = "#0E6FB0";
      } else {
        status.textContent = "Não permitir";
        status.style.color = "red";
      }

      submenu.style.display = "none";

      localStorage.setItem("notificacoes_status", value);
    });
  });

  const saved = localStorage.getItem("notificacoes_status");
  if (saved) {
    if (saved === "permitir") {
      status.textContent = "Permitir";
      status.style.color = "#0E6FB0";
    } else {
      status.textContent = "Não permitir";
      status.style.color = "red";
    }
  }
}
</script>


    

        <!-- RODAPÉ -->
        <footer class="rodape">
          <div class="rodape-top">
            <div class="social-icons">
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-facebook-f"></i></a>
            </div>
            <div class="atendimento">
              Central de Atendimento: <strong>XXXXX-XXXX</strong>
            </div>
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
        </footer>
    </div>

</body>

</html>