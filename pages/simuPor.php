<?php
require_once('../backend/protecao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <title>Simulado - Guia ETEC</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Fonts e Font Awesome -->
  <link href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Inter:wght@400;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
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

/* Cor de fundo */
body {
  background: linear-gradient(180deg, var(--dark-blue) 0%, #012B5C 100%);
  padding: 48px 72px;
  min-height: 100vh;
  margin: 0;
  box-sizing: border-box;
  font-family: var(--body-font);
  color: var(--color-white);
}

/* Layout principal da página */
.pagina-simulados {
  max-width: 1156px;
  margin: 0 auto;
  border-radius: 20px;
  background: var(--white);
  box-shadow: var(--shadow-lg);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  height: 100%;
}

/* HEADER DO SIMULADO */
.simulados-header {
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  padding: 50px 30px;
  color: var(--color-white);
  position: relative;
  overflow: hidden;
  text-align: center;
  border-radius: 0 0 40px 40px;
  box-shadow: var(--shadow-md);
}

.simulados-header h1 {
  font-family: var(--title-font);
  font-size: 3rem;
  color: var(--color-white);
  margin-bottom: 10px;
  text-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
}

/* Conteúdo das questões */
.simulado-conteudo {
  padding: 40px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

/* Estilo das perguntas */
.question {
  background-color: var(--color-bg-light);
  padding: 30px;
  border-radius: 10px;
  box-shadow: var(--shadow-sm);
  transition: all 0.3s ease;
}

.question:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-md);
}

.question p {
  font-size: 1.2rem;
  color: var(--dark-blue);
  margin-bottom: 15px;
}

/* Estilo das opções de resposta */
.options {
  display: flex;
  flex-direction: column;
  gap: 15px;
  margin-top: 20px;
}

.options label {
  font-size: 1.1rem;
  color: var(--dark);
  display: flex;
  align-items: center;
  cursor: pointer;
  transition: color 0.2s ease;
}

.options label:hover {
  color: var(--button-blue);
}

/* Estilo para os radio buttons */
input[type="radio"] {
  margin-right: 10px;
  accent-color: var(--button-blue); /* Personalizando o rádio button */
}

/* Botão de envio */
button[type="submit"] {
  background-color: var(--button-blue);
  color: var(--color-white);
  padding: 15px 30px;
  font-size: 1.2rem;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  transition: all 0.3s ease;
  margin-top: 20px;
}

button[type="submit"]:hover {
  background-color: var(--mid-blue);
  transform: scale(1.05);
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
}

button[type="submit"]:active {
  background-color: var(--color-primary);
}

/* Resultados */
#result {
  background-color: var(--light-blue);
  padding: 20px;
  border-radius: 10px;
  font-size: 1.2rem;
  font-weight: bold;
  margin-top: 30px;
  text-align: center;
  box-shadow: var(--shadow-sm);
  transition: transform 0.3s ease;
}

#result.success {
  background-color: #4CAF50;
}

#result.error {
  background-color: #F44336;
}

#result p {
  margin: 0;
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
        <h1>Simulado de Português</h1>
        <p>Responda às perguntas abaixo para testar seus conhecimentos!</p>
      </div>
    </div>

    <div class="simulado-conteudo">
      <form id="quiz-form">
        <!-- Pergunta 1 -->
        <div class="question">
          <p>1. Na frase "Os professores explicaram a matéria aos alunos", o termo "aos alunos" exerce a função de:</p>
          <div class="options">
            <label><input type="radio" name="q1" value="Sujeito"> Sujeito</label>
            <label><input type="radio" name="q1" value="Objeto direto"> Objeto direto</label>
            <label><input type="radio" name="q1" value="Predicativo"> Predicativo</label>
            <label><input type="radio" name="q1" value="Objeto indireto"> Objeto indireto</label>
          </div>
        </div>

        <!-- Pergunta 2 -->
        <div class="question">
          <p>2. Assinale a alternativa em que o uso de "por que" está correto:</p>
          <div class="options">
            <label><input type="radio" name="q2" value="Não sei porque ele faltou"> Não sei porque ele faltou</label>
            <label><input type="radio" name="q2" value="Você sabe por que ela saiu mais cedo?"> Você sabe por que ela saiu mais cedo?</label>
            <label><input type="radio" name="q2" value="Esse é o motivo do por quê discutimos"> Esse é o motivo do por quê discutimos</label>
            <label><input type="radio" name="q2" value="Ele não veio, porquê estava cansado"> Ele não veio, porquê estava cansado</label>
          </div>
        </div>

        <!-- Pergunta 3 -->
        <div class="question">
          <p>3. "Mesmo depois de tudo, ela sorria. Talvez não por esperança, mas por teimosia". O trecho acima revela principalmente uma ideia de:</p>
          <div class="options">
            <label><input type="radio" name="q3" value="Resiliência diante as dificuldades"> Resiliência diante as dificuldades</label>
            <label><input type="radio" name="q3" value="Indiferença perante a dor"> Indiferença perante a dor</label>
            <label><input type="radio" name="q3" value="Alegria e otimismo"> Alegria e otimismo</label>
            <label><input type="radio" name="q3" value="Ironia e sarcasmo"> Ironia e sarcasmo</label>
          </div>
        </div>

        <!-- Pergunta 4 -->
        <div class="question">
          <p>4. Leia o fragmento: "A tecnologia aproxima quem está longe, mas afasta quem está perto". A frase apresenta uma crítica ao uso da tecnologia porque:</p>
          <div class="options">
            <label><input type="radio" name="q4" value="Ela não é útil para a comunicação"> Ela não é útil para a comunicação</label>
            <label><input type="radio" name="q4" value="As pessoas se tornam mais preguiçosas"> As pessoas se tornam mais preguiçosas</label>
            <label><input type="radio" name="q4" value="As relações presenciais perdem espaço"> As relações presenciais perdem espaço</label>
            <label><input type="radio" name="q4" value="A internet é um meio inseguro"> A internet é um meio inseguro</label>
          </div>
        </div>

        <!-- Pergunta 5 -->
        <div class="question">
          <p>5. Assinale a alternativa correta quanto à concordância verbal:</p>
          <div class="options">
            <label><input type="radio" name="q5" value="Fazem dois anos que não nos vemos"> Fazem dois anos que não nos vemos</label>
            <label><input type="radio" name="q5" value="Houveram muitos problemas na escola"> Houveram muitos problemas na escola</label>
            <label><input type="radio" name="q5" value="Deve haver soluções para esse caso"> Deve haver soluções para esse caso</label>
            <label><input type="radio" name="q5" value="Existiam de haver motivos para a confusão"> Existiam de haver motivos para a confusão</label>
          </div>
        </div>

        <!-- Pergunta 6 -->
        <div class="question">
          <p>6. Assinale a alternativa que apresenta o uso correto da crase:</p>
          <div class="options">
            <label><input type="radio" name="q6" value="Entregou o documento ã secretária"> Entregou o documento à secretária</label>
            <label><input type="radio" name="q6" value="Chegou à cerca de dez minutos"> Chegou à cerca de dez minutos</label>
            <label><input type="radio" name="q6" value="Vou à pé até a escola"> Vou à pé até a escola</label>
            <label><input type="radio" name="q6" value="Referiu-se à ele várias vezes"> Referiu-se a ele várias vezes</label>
          </div>
        </div>

        <!-- Pergunta 7 -->
        <div class="question">
          <p>7. Quando um anúncio publicitário usa expressões como "Compre já", "você merece o melhor", predomina a função:</p>
          <div class="options">
            <label><input type="radio" name="q7" value="Emotiva"> Emotiva</label>
            <label><input type="radio" name="q7" value="Referencial"> Referencial</label>
            <label><input type="radio" name="q7" value="Conativa ou apelativa"> Conativa ou apelativa</label>
            <label><input type="radio" name="q7" value="Metalinguística"> Metalinguística</label>
          </div>
        </div>

        <!-- Pergunta 8 -->
        <div class="question">
          <p>8. Na frase "O tempo é um rio que nunca para de correr". Temos o uso de:</p>
          <div class="options">
            <label><input type="radio" name="q8" value="Metáfora"> Metáfora</label>
            <label><input type="radio" name="q8" value="Comparação"> Comparação</label>
            <label><input type="radio" name="q8" value="Hipérbole"> Hipérbole</label>
            <label><input type="radio" name="q8" value="Ironia"> Ironia</label>
          </div>
        </div>

        <!-- Pergunta 9 -->
        <div class="question">
          <p>9. Assinale a alternativa em que o pronome está corretamente empregado:</p>
          <div class="options">
            <label><input type="radio" name="q9" value="Entregou-se os trabalhos aos alunos"> Entregou-se os trabalhos aos alunos</label>
            <label><input type="radio" name="q9" value="Me empresta teu caderno, por favor?"> Me empresta teu caderno, por favor?</label>
            <label><input type="radio" name="q9" value="Entre eu e você, tudo está resolvido."> Entre eu e você, tudo está resolvido.</label>
            <label><input type="radio" name="q9" value="Entre mim e você, tudo está resolvido."> Entre mim e você, tudo está resolvido.</label>
          </div>
        </div>

        <!-- Pergunta 10 -->
        <div class="question">
          <p>10. Na frase "Os alunos realizaram o experimento", a voz verbal é:</p>
          <div class="options">
            <label><input type="radio" name="q10" value="Passiva analítica"> Passiva analítica</label>
            <label><input type="radio" name="q10" value="Ativa"> Ativa</label>
            <label><input type="radio" name="q10" value="Passiva sintética"> Passiva sintética</label>
            <label><input type="radio" name="q10" value="Reflexiva"> Reflexiva</label>
          </div>
        </div>

        <button type="submit">Finalizar Simulado</button>
      </form>

      <div id="result" style="display:none;"></div>
    </div>

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
        Guia Etec - S.P - CNPJ: 10.760.260 / Av. Vereador Francisco Moraes Ramos, 777 - Jardim Novo Horizonte | Bairro CSU, Rio Grande da Serra - SP CEP: 09450-000
      </div>
    </footer>
  </div>

  <script>
    const correctAnswers = {
      q1: "Objeto indireto",
      q2: "Você sabe por que ela saiu mais cedo?",
      q3: "Resiliência diante as dificuldades",
      q4: "As relações presenciais perdem espaço",
      q5: "Deve haver soluções para esse caso",
      q6: "Entregou o documento à secretária",
      q7: "Conativa ou apelativa",
      q8: "Metáfora",
      q9: "Entre mim e você, tudo está resolvido.",
      q10: "Ativa"
    };

    document.getElementById('quiz-form').addEventListener('submit', function (e) {
      e.preventDefault();

      let score = 0;
      let totalQuestions = Object.keys(correctAnswers).length;

      for (let i = 1; i <= totalQuestions; i++) {
        let question = `q${i}`;
        let selectedAnswer = document.querySelector(`input[name="${question}"]:checked`);

        if (selectedAnswer && selectedAnswer.value === correctAnswers[question]) {
          score++;
        }
      }

      let resultText = `Você acertou ${score} de ${totalQuestions} questões.`;
      let resultDiv = document.getElementById('result');
      resultDiv.textContent = resultText;
      resultDiv.style.display = "block";
    });
  </script>
</body>

</html>
