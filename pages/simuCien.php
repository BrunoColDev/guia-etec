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

    <div class="simulado-conteudo">
      <form id="quiz-form">
        <!-- Pergunta 1 -->
        <div class="question">
          <p>1. Qual a organela responsável pela produção de energia na célula?</p>
          <div class="options">
            <label><input type="radio" name="q1" value="Ribossomo"> Ribossomo</label>
            <label><input type="radio" name="q1" value="Lisossomo"> Lisossomo</label>
            <label><input type="radio" name="q1" value="Mitocôndria"> Mitocôndria</label>
            <label><input type="radio" name="q1" value="Complexo golgiense"> Complexo golgiense</label>
          </div>
        </div>

        <!-- Pergunta 2 -->
        <div class="question">
          <p>2. Um corpo está em repouso. Qual é a força resultante sobre ele?</p>
          <div class="options">
            <label><input type="radio" name="q2" value="Massa"> Igual a sua massa</label>
            <label><input type="radio" name="q2" value="Zero"> Igual a zero</label>
            <label><input type="radio" name="q2" value="Peso"> Igual ao peso do corpo</label>
            <label><input type="radio" name="q2" value="Aceleração"> Igual à aceleração</label>
          </div>
        </div>

        <!-- Pergunta 3 -->
        <div class="question">
          <p>3. Qual elemento químico tem símbolo Na?</p>
          <div class="options">
            <label><input type="radio" name="q3" value="Nitrogênio"> Nitrogênio</label>
            <label><input type="radio" name="q3" value="Sódio"> Sódio</label>
            <label><input type="radio" name="q3" value="Níquel"> Níquel</label>
            <label><input type="radio" name="q3" value="Neônio"> Neônio</label>
          </div>
        </div>

        <!-- Pergunta 4 -->
        <div class="question">
          <p>4. O sangue venoso é rico em:</p>
          <div class="options">
            <label><input type="radio" name="q4" value="Oxigênio"> Oxigênio</label>
            <label><input type="radio" name="q4" value="CO2"> Dióxido de carbono</label>
            <label><input type="radio" name="q4" value="Nutrientes"> Nutrientes</label>
            <label><input type="radio" name="q4" value="Glicose"> Glicose</label>
          </div>
        </div>

        <!-- Pergunta 5 -->
        <div class="question">
          <p>5. Se a tensão em um circuito é 12 V e a resistência é 4 Ω, qual é a corrente elétrica?</p>
          <div class="options">
            <label><input type="radio" name="q5" value="2"> 2 A</label>
            <label><input type="radio" name="q5" value="3"> 3 A</label>
            <label><input type="radio" name="q5" value="4"> 4 A</label>
            <label><input type="radio" name="q5" value="6"> 6 A</label>
          </div>
        </div>

        <!-- Pergunta 6 -->
        <div class="question">
          <p>6. O que é uma ligação covalente?</p>
          <div class="options">
            <label><input type="radio" name="q6" value="Transferência"> Transferência de elétrons</label>
            <label><input type="radio" name="q6" value="Compartilhamento"> Compartilhamento de elétrons</label>
            <label><input type="radio" name="q6" value="Íons"> Atração entre íons</label>
            <label><input type="radio" name="q6" value="Metais"> Ligação entre átomos de metais</label>
          </div>
        </div>

        <!-- Pergunta 7 -->
        <div class="question">
          <p>7. Qual órgão produz a bile, responsável pela digestão de gorduras?</p>
          <div class="options">
            <label><input type="radio" name="q7" value="Estômago"> Estômago</label>
            <label><input type="radio" name="q7" value="Pâncreas"> Pâncreas</label>
            <label><input type="radio" name="q7" value="Fígado"> Fígado</label>
            <label><input type="radio" name="q7" value="Intestino"> Intestino delgado</label>
          </div>
        </div>

        <!-- Pergunta 8 -->
        <div class="question">
          <p>8. Um espelho côncavo:</p>
          <div class="options">
            <label><input type="radio" name="q8" value="Invertida"> Sempre forma imagem invertida</label>
            <label><input type="radio" name="q8" value="Depende"> Pode formar imagem ampliada ou reduzida</label>
            <label><input type="radio" name="q8" value="Real"> Sempre forma imagem real</label>
            <label><input type="radio" name="q8" value="Nunca"> Nunca forma imagem</label>
          </div>
        </div>

        <!-- Pergunta 9 -->
        <div class="question">
          <p>9. Na combustão completa de um hidrocarboneto são formados:</p>
          <div class="options">
            <label><input type="radio" name="q9" value="CO2"> CO₂ e H₂O</label>
            <label><input type="radio" name="q9" value="CO"> CO e H₂O</label>
            <label><input type="radio" name="q9" value="CH4"> CH₄ e O₂</label>
            <label><input type="radio" name="q9" value="C e H2O"> C e H₂O</label>
          </div>
        </div>

        <!-- Pergunta 10 -->
        <div class="question">
          <p>10. Um organismo que produz seu próprio alimento usando luz solar é chamado de:</p>
          <div class="options">
            <label><input type="radio" name="q10" value="Herbívoro"> Herbívoro</label>
            <label><input type="radio" name="q10" value="Carnívoro"> Carnívoro</label>
            <label><input type="radio" name="q10" value="Produtor"> Produtor</label>
            <label><input type="radio" name="q10" value="Consumidor"> Consumidor secundário</label>
          </div>
        </div>


        <script>
          // Respostas corretas
          const correctAnswers = {
            q1: "Mitocôndria",
            q2: "Zero",
            q3: "Sódio",
            q4: "CO2",
            q5: "3",
            q6: "Compartilhamento",
            q7: "Fígado",
            q8: "Depende",
            q9: "CO2",
            q10: "Produtor"
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