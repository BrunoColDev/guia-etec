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

  /* SIMULADO HEADER */
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

  /* CONTEÚDO DO SIMULADO */
  .simulado-conteudo {
    padding: 40px;
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .question {
    background-color: var(--color-bg-light);
    padding: 20px;
    border-radius: 10px;
    box-shadow: var(--shadow-sm);
    margin-bottom: 20px;
  }

  .question p {
    font-size: 1.2rem;
    color: var(--dark-blue);
  }

  .options {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 10px;
  }

  .options label {
    font-size: 1rem;
    color: var(--dark);
  }

  input[type="radio"] {
    margin-right: 10px;
  }

  /* Botão de envio */
  button[type="submit"] {
    background-color: var(--button-blue);
    color: var(--color-white);
    padding: 12px 25px;
    font-size: 1.2rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
    margin-top: 20px;
  }

  button[type="submit"]:hover {
    background-color: var(--mid-blue);
    transform: scale(1.05);
  }

  /* Resultado */
  #result {
    background-color: var(--light-blue);
    padding: 20px;
    border-radius: 10px;
    font-size: 1.2rem;
    font-weight: bold;
    margin-top: 20px;
    text-align: center;
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

  /* ---------- CRONÔMETRO ESTILIZADO ---------- */
  #timer {
    width: 100%;
    background: linear-gradient(90deg, #004AAD, #4A90E2);
    color: white;
    padding: 14px 0;
    text-align: center;
    font-size: 1.6rem;
    font-weight: bold;
    border-radius: 12px;
    margin-bottom: 22px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
    transition: all 0.4s ease;
  }

  /* Efeito pulsante quando faltar 5 minutos */
  .timer-alerta {
    animation: pulse 1s infinite alternate;
    background: #ff3b3b !important;
  }

  @keyframes pulse {
    0% {
      transform: scale(1);
      box-shadow: 0 0 10px #ff0000;
    }

    100% {
      transform: scale(1.05);
      box-shadow: 0 0 25px #ff4d4d;
    }
  }

  /* ---------- BARRA DE PROGRESSO BONITA ---------- */
  .progress-container {
    width: 100%;
    background: #dce8f7;
    height: 24px;
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.15);
  }

  #progressBar {
    height: 100%;
    width: 0%;
    background: linear-gradient(90deg, #218FD9, #004AAD);
    border-radius: 12px;
    transition: width 0.4s ease-in-out;
  }

  #progressPercent {
    margin-top: 6px;
    font-weight: bold;
    font-size: 1rem;
    text-align: right;
    color: #004AAD;
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


    <!-- SIMULADO -->
    <div class="simulados-header">
      <div class="simulados-texto">
        <h1>Simulado de Matemática</h1>
        <p>Responda às perguntas abaixo para testar seus conhecimentos!</p>
      </div>
    </div>

    <!-- CRONÔMETRO -->
    <div id="timer">Tempo restante: <span id="time">15:00</span></div>

    <!-- BARRA DE PROGRESSO -->
    <div class="progress-container">
      <div id="progressBar"></div>
    </div>
    <div id="progressPercent">0%</div>


    <div class="simulado-conteudo">
      <form id="quiz-form">
        <!-- Pergunta 1 -->
        <div class="question">
          <p>1. Qual foi a principal característica da economia colonial no Brasil no período colonial?</p>
          <div class="options">
            <label><input type="radio" name="q1" value="Subsistência"> Predomínio da agricultura de
              subsistência.</label>
            <label><input type="radio" name="q1" value="Industrial"> Economia voltada para a produção de bens
              industriais.</label>
            <label><input type="radio" name="q1" value="Plantation"> Sistema de plantation, com foco na monocultura de
              exportação.</label>
            <label><input type="radio" name="q1" value="Industria"> Forte presença da indústria têxtil e
              metalúrgica.</label>
          </div>
        </div>

        <!-- Pergunta 2 -->
        <div class="question">
          <p>2. O que foi o Ciclo do Ouro e qual a sua importância para o Brasil Colonial?</p>
          <div class="options">
            <label><input type="radio" name="q2" value="Agrícola"> Período de crescimento da produção agrícola.</label>
            <label><input type="radio" name="q2" value="Diamantes"> Ciclo da mineração de diamantes, com pouca
              importância.</label>
            <label><input type="radio" name="q2" value="Mineração"> Mineração de ouro como principal atividade
              econômica.</label>
            <label><input type="radio" name="q2" value="Café"> Ciclo da produção de café, com imigrantes
              italianos.</label>
          </div>
        </div>

        <!-- Pergunta 3 -->
        <div class="question">
          <p>3. Quem foi o responsável pela Proclamação da República no Brasil e quando ocorreu?</p>
          <div class="options">
            <label><input type="radio" name="q3" value="PedroII"> Dom Pedro II, em 1889.</label>
            <label><input type="radio" name="q3" value="Deodoro"> Marechal Deodoro da Fonseca, em 1889.</label>
            <label><input type="radio" name="q3" value="Vargas"> Getúlio Vargas, em 1930.</label>
            <label><input type="radio" name="q3" value="JK"> Juscelino Kubitschek, em 1960.</label>
          </div>
        </div>

        <!-- Pergunta 4 -->
        <div class="question">
          <p>4. O que foi o movimento Tenentista e quais suas principais causas?</p>
          <div class="options">
            <label><input type="radio" name="q4" value="Pacífico"> Movimento militar pacífico por renovação
              política.</label>
            <label><input type="radio" name="q4" value="Crítica"> Movimento militar que criticava a República
              Velha.</label>
            <label><input type="radio" name="q4" value="Operários"> Movimento de operários urbanos, sem apoio
              militar.</label>
            <label><input type="radio" name="q4" value="Intelectuais"> Movimento de intelectuais por reformas
              econômicas.</label>
          </div>
        </div>

        <!-- Pergunta 5 -->
        <div class="question">
          <p>5. Quais foram as principais causas da Revolução Francesa?</p>
          <div class="options">
            <label><input type="radio" name="q5" value="Religião"> Insatisfação com a religião e a aristocracia.</label>
            <label><input type="radio" name="q5" value="Iluminismo"> Ideias iluministas, crise econômica e desigualdade
              social.</label>
            <label><input type="radio" name="q5" value="Império"> Tentativa de expandir os domínios franceses.</label>
            <label><input type="radio" name="q5" value="Clero"> Aumento do poder do clero.</label>
          </div>
        </div>

        <!-- Pergunta 6 -->
        <div class="question">
          <p>6. O que foi a Inconfidência Mineira e qual seu principal objetivo?</p>
          <div class="options">
            <label><input type="radio" name="q6" value="Impostos"> Rebelião contra impostos sobre o ouro visando
              independência.</label>
            <label><input type="radio" name="q6" value="Escravos"> Revolta dos escravizados.</label>
            <label><input type="radio" name="q6" value="Monarquia"> Revolução militar para instaurar monarquia.</label>
            <label><input type="radio" name="q6" value="Abolição"> Movimento pela abolição da escravatura.</label>
          </div>
        </div>

        <!-- Pergunta 7 -->
        <div class="question">
          <p>7. Qual foi o impacto da Segunda Guerra Mundial para o Brasil?</p>
          <div class="options">
            <label><input type="radio" name="q7" value="Neutro"> Brasil permaneceu neutro.</label>
            <label><input type="radio" name="q7" value="Eixo"> Brasil se aliou ao Eixo.</label>
            <label><input type="radio" name="q7" value="Aliados"> Brasil entrou com os Aliados e acelerou
              modernização.</label>
            <label><input type="radio" name="q7" value="Invadido"> Brasil foi invadido.</label>
          </div>
        </div>

        <!-- Pergunta 8 -->
        <div class="question">
          <p>8. Quais foram as características da ditadura militar brasileira?</p>
          <div class="options">
            <label><input type="radio" name="q8" value="Democracia"> Governo democrático e popular.</label>
            <label><input type="radio" name="q8" value="Repressão"> Repressão, censura e perseguições.</label>
            <label><input type="radio" name="q8" value="Liberdade"> Liberdade política ampliada.</label>
            <label><input type="radio" name="q8" value="Agrícola"> Crescimento do setor agrícola.</label>
          </div>
        </div>

        <!-- Pergunta 9 -->
        <div class="question">
          <p>9. O que foi o processo de independência do Brasil e quem foi seu principal líder?</p>
          <div class="options">
            <label><input type="radio" name="q9" value="População"> Movimento popular liderado pelos
              escravizados.</label>
            <label><input type="radio" name="q9" value="PedroII"> Liderado por Dom Pedro II.</label>
            <label><input type="radio" name="q9" value="JoãoVI"> Guerra liderada por Dom João VI.</label>
            <label><input type="radio" name="q9" value="PedroI"> Ruptura com Portugal liderada por Dom Pedro I.</label>
          </div>
        </div>

        <!-- Pergunta 10 -->
        <div class="question">
          <p>10. Quais foram as principais consequências da escravidão no Brasil pós-abolição?</p>
          <div class="options">
            <label><input type="radio" name="q10" value="Infantil"> Fim do trabalho infantil e bem-estar social.</label>
            <label><input type="radio" name="q10" value="SemDesigualdade"> Brasil sem desigualdade social.</label>
            <label><input type="radio" name="q10" value="Desigualdade"> Manutenção da desigualdade e exclusão dos
              ex-escravizados.</label>
            <label><input type="radio" name="q10" value="Oligarquias"> Fim das oligarquias rurais.</label>
          </div>
        </div>


        <button type="submit">Finalizar Simulado</button>
      </form>

      <div id="result" style="display:none;"></div>
    </div>

    <script>

      /* ---------------- CRONÔMETRO ---------------- */

      let timeLeft = 15 * 60; // 15 minutos em segundos
      let timerSpan = document.getElementById("time");
      let timerDiv = document.getElementById("timer");

      let aviso5Minutos = false;

      // Áudio quando o tempo acabar
      let audioFim = new Audio("https://cdn.pixabay.com/download/audio/2022/03/10/audio_1d9b3d678d.mp3?filename=alarm-frenzy-243122.mp3");

      let timerInterval = setInterval(updateTimer, 1000);

      function updateTimer() {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;

        if (seconds < 10) seconds = "0" + seconds;
        if (minutes < 10) minutes = "0" + minutes;

        timerSpan.textContent = `${minutes}:${seconds}`;

        /* ALERTA FALTANDO 5 MINUTOS */
        if (timeLeft <= 300 && !aviso5Minutos) {
          aviso5Minutos = true;
          timerDiv.classList.add("timer-alerta");
          alert("⚠️ Atenção! Restam apenas 5 minutos!");
        }

        if (timeLeft <= 0) {
          clearInterval(timerInterval);
          audioFim.play(); // toca o som ao acabar
          finalizarAutomaticamente();
        }

        timeLeft--;
      }

      function finalizarAutomaticamente() {
        alert("⏳ O tempo acabou! O simulado será finalizado automaticamente.");
        document.getElementById("quiz-form").dispatchEvent(new Event("submit"));
      }

      /* -------------- BARRA DE PROGRESSO ---------------- */

      const totalQuestionsCount = 10;

      function updateProgressBar() {
        let checked = document.querySelectorAll("input[type='radio']:checked").length;
        let percent = Math.round((checked / totalQuestionsCount) * 100);

        document.getElementById("progressBar").style.width = percent + "%";
        document.getElementById("progressPercent").textContent = percent + "%";
      }

      // Atualiza a barra sempre que marcar uma alternativa
      document.querySelectorAll("input[type='radio']").forEach(input => {
        input.addEventListener("change", updateProgressBar);
      });


      const correctAnswers = {
        q1: "Plantation",
        q2: "Mineração",
        q3: "Deodoro",
        q4: "Crítica",
        q5: "Iluminismo",
        q6: "Impostos",
        q7: "Aliados",
        q8: "Repressão",
        q9: "PedroI",
        q10: "Desigualdade"
      };


      // Função para verificar as respostas
      document.getElementById('quiz-form').addEventListener('submit', function (e) {
        e.preventDefault();

        let score = 0;
        let totalQuestions = Object.keys(correctAnswers).length;

        // Verifica cada pergunta
        for (let i = 1; i <= totalQuestions; i++) {
          let question = `q${i}`;
          let selectedAnswer = document.querySelector(`input[name="${question}"]:checked`);

          // Verifica se a resposta está correta
          if (selectedAnswer && selectedAnswer.value === correctAnswers[question]) {
            score++;
          }
        }

        // Exibe o resultado
        let resultText = `Você acertou ${score} de ${totalQuestions} questões.`;
        let resultDiv = document.getElementById('result');
        resultDiv.textContent = resultText;
        resultDiv.style.display = "block";
      });

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