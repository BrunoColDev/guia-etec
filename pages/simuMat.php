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








/* CONTAINER DOS CARDS */
.cards-container {
    display: flex;
    justify-content: center;
    gap: 30px;
    padding: 40px 20px;
}

/* CARD */
.card-dificuldade {
    width: 280px;
    background: #ffffff;
    border-radius: 18px;
    box-shadow: 0 4px 18px rgba(0,0,0,0.15);
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.25s ease;
    display: flex;
    flex-direction: column;
}

.card-dificuldade:hover {
    transform: scale(1.05);
}

/* IMAGEM DO CARD */
.card-img {
    width: 100%;
    height: 160px;
    object-fit: cover;
}

/* PARTE INFERIOR DO CARD */
.card-content {
    background: white;
    padding: 20px;
    text-align: center;
}

.card-content h2 {
    font-size: 1.5rem;
    color: var(--dark-blue);
    margin-bottom: 14px;
    font-family: var(--title-font);
}

/* BOTÃO DO CARD */
.card-btn {
    background: var(--button-blue);
    color: white;
    font-size: 1rem;
    padding: 10px 18px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    transition: 0.3s;
}

.card-btn:hover {
    background: var(--mid-blue);
}

#simulado-conteudo {
    display: none ;
    opacity: 0;
    transition: opacity 0.3s ease;
}









.btn-voltar {
    background: var(--dark-blue);
    color: white;
    border: none;
    padding: 12px 20px;
    font-size: 1rem;
    font-weight: bold;
    border-radius: 10px;
    cursor: pointer;
    width: fit-content;
    margin-bottom: 15px;
    transition: 0.3s;
}

.btn-voltar:hover {
    background: var(--button-blue);
    transform: scale(1.05);
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
        <button class="area-do-aluno" onclick="window.location.href='../pages/areadoaluno.php'">Área do Aluno</button>
      </div>
    </div>

    <!-- SIMULADO -->
    <div class="simulados-header">
      <div class="simulados-texto">
        <h1>Simulado de Matemática</h1>
        <p>Escolha o nível de dificuldade para começar o simulado!</p>
      </div>
    </div>

    <div class="cards-container">

    <div class="card-dificuldade">
        <div class="card-content">
            <h2>Modo<h2> 
            <h2>Fácil</h2>
            <button class="card-btn" onclick="startSimulado('facil')">Começar</button>
        </div>
    </div>

    <div class="card-dificuldade">
        <div class="card-content">
            <h2>Modo<h2> 
            <h2>Moderado</h2>
            <button class="card-btn" onclick="startSimulado('medio')">Começar</button>
        </div>
    </div>

    <div class="card-dificuldade">
        <div class="card-content">
            <h2>Modo<h2> 
            <h2>Difícil</h2>
            <button class="card-btn" onclick="startSimulado('dificil')">Começar</button>
        </div>
    </div>

</div>


    <!-- Conteúdo do simulado -->
    <div class="simulado-conteudo" id="simulado-conteudo">
       
      <form id="quiz-form">
        <!-- Pergunta 1 -->
        <div class="question" id="q1">
          <p>1. Em uma loja, um produto custava R$ 188,24 e teve um desconto de 15%. O preço final é:</p>
          <div class="options">
            <label><input type="radio" name="q1" value="160"> R$ 160,00</label>
            <label><input type="radio" name="q1" value="165"> R$ 165,00</label>
            <label><input type="radio" name="q1" value="170"> R$ 170,00</label>
            <label><input type="radio" name="q1" value="175"> R$ 175,00</label>
          </div>
        </div>

        <!-- Pergunta 2 -->
        <div class="question" id="q2">
          <p>2. Se 5 operários constroem um muro em 12 dias, quantos dias levarão 8 operários para construir o mesmo muro, trabalhando no mesmo ritmo?</p>
          <div class="options">
            <label><input type="radio" name="q2" value="7.5"> 7,5 dias</label>
            <label><input type="radio" name="q2" value="8"> 8 dias</label>
            <label><input type="radio" name="q2" value="9"> 9 dias</label>
            <label><input type="radio" name="q2" value="10"> 10 dias</label>
          </div>
        </div>

        <!-- Pergunta 3 -->
        <div class="question" id="q3">
          <p>3. Qual é a solução da equação 3x - 5 = 16?</p>
          <div class="options">
            <label><input type="radio" name="q3" value="5"> 5</label>
            <label><input type="radio" name="q3" value="6"> 6</label>
            <label><input type="radio" name="q3" value="7"> 7</label>
            <label><input type="radio" name="q3" value="8"> 8</label>
          </div>
        </div>

        <!-- Pergunta 4 -->
        <div class="question" id="q4">
          <p>4. A base de um triângulo mede 10 cm e sua altura mede 6 cm. Qual é a área?</p>
          <div class="options">
            <label><input type="radio" name="q4" value="20"> 20 cm²</label>
            <label><input type="radio" name="q4" value="30"> 30 cm²</label>
            <label><input type="radio" name="q4" value="36"> 36 cm²</label>
            <label><input type="radio" name="q4" value="60"> 60 cm²</label>
          </div>
        </div>

        <!-- Pergunta 5 -->
        <div class="question" id="q5">
          <p>5. O salário de uma pessoa é R$ 1.200,00. Após um aumento de 10%, qual seria o novo salário?</p>
          <div class="options">
            <label><input type="radio" name="q5" value="1210"> R$ 1.210,00</label>
            <label><input type="radio" name="q5" value="1220"> R$ 1.220,00</label>
            <label><input type="radio" name="q5" value="1300"> R$ 1.300,00</label>
            <label><input type="radio" name="q5" value="1320"> R$ 1.320,00</label>
          </div>
        </div>

        <button id="btn-voltar" class="btn-voltar" onclick="voltarParaCards()">← Voltar</button>
        <button type="submit" onclick="finalizarSimulado()">Finalizar Simulado</button>
      </form>

      <div id="result" style="display:none;"></div>
    </div>
    
      <script>



function startSimulado(nivel) {

        // Esconde os cards
        document.querySelector(".cards-container").style.display = "none";

        // Mostra o conteúdo das perguntas
        const simulado = document.getElementById("simulado-conteudo");
        simulado.style.display = "block";

        setTimeout(() => {
            simulado.style.opacity = "1";
        }, 50);

        console.log("Nível escolhido:", nivel);
    }

    function voltarParaCards() {

    // Esconde o simulado
    const simulado = document.getElementById("simulado-conteudo");
    simulado.style.display = "none";
    simulado.style.opacity = "0";

    // Mostra os cards novamente
    const cards = document.querySelector(".cards-container");
    cards.style.display = "flex";

    // Resetar respostas marcadas
    document.getElementById("quiz-form").reset();

    // Esconder resultado
    document.getElementById("result").style.display = "none";
}


   

    // Sistema de correção
    document.getElementById('quiz-form').addEventListener('submit', function (e) {
        e.preventDefault();

        let score = 0;
        const total = Object.keys(correctAnswers).length;

        for (let i = 1; i <= total; i++) {
            const selected = document.querySelector(`input[name="q${i}"]:checked`);
            if (selected && selected.value === correctAnswers[`q${i}`]) {
                score++;
            }
        }

        const resultDiv = document.getElementById("result");
        resultDiv.textContent = `Você acertou ${score} de ${total} questões.`;
        resultDiv.style.display = "block";
    });





// 🔵 BANCO DE QUESTÕES (Fácil, Médio, Difícil)

const questions = {
    facil: [
        {q: "1. 3/5 + 7/10 = ?", options: ["1", "1,1", "1,3", "1,5"], correct: "1,3"},
        {q: "2. Resolva: 18 − 3(4 − x) = 9", options: ["1", "3", "5", "7"], correct: "3"},
        {q: "3. Fração geratriz de 0,18 periódico:", options: ["1/5", "2/9", "18/99", "1/6"], correct: "2/9"},
        {q: "4. Aumento de 20 para 25:", options: ["10%", "20%", "25%", "22,5%"], correct: "25%"},
        {q: "5. Ângulo faltante (50° e 30°):", options: ["90°", "100°", "110°", "120°"], correct: "100°"},
        {q: "6. Soma dos divisores positivos de 12:", options: ["12", "16", "24", "28"], correct: "28"},
        {q: "7. 3 lápis = R$ 5. Quanto custam 12?", options: ["18", "20", "22", "25"], correct: "20"},
        {q: "8. 2^4 − 3^2 =", options: ["1", "4", "7", "10"], correct: "7"},
        {q: "9. 2x/3 = 10", options: ["10", "12", "13", "15"], correct: "15"},
        {q: "10. Área do quadrado = 121 cm². Perímetro =", options: ["22", "44", "88", "242"], correct: "44"}
    ],

    medio: [
        {q: "1. 5/6 ÷ 2/3 =", options: ["1", "1,25", "1,5", "1,75"], correct: "1,25"},
        {q: "2. Aumento de 10% e 20%:", options: ["30%", "32%", "28%", "25%"], correct: "32%"},
        {q: "3. Resolva: 7(x−2)=3x+14", options: ["4", "5", "6", "7"], correct: "6"},
        {q: "4. Ângulo externo = 24°. Número de lados:", options: ["10", "12", "15", "18"], correct: "15"},
        {q: "5. 75 − 12/??", options: ["3/3", "2/3", "3/2", "5/3"], correct: "3/3"},
        {q: "6. Carro faz 12 km/l. Para 180 km:", options: ["10", "12,5", "14", "15"], correct: "15"},
        {q: "7. Triângulo isósceles, vértice = 40°:", options: ["70°", "80°", "60°", "50°"], correct: "70°"},
        {q: "8. 2x² − 5x − 3 = 0", options: ["1 ou −3", "3 ou −1/2", "−3 ou 2", "3 ou −2"], correct: "3 ou −1/2"},
        {q: "9. 0,375 → % :", options: ["3,75%", "15%", "37,5%", "25%"], correct: "37,5%"},
        {q: "10. Volume cilindro (r=3,h=5):", options: ["15π", "45π", "30π", "90π"], correct: "45π"}
    ],

    dificil: [
        {q: "1. Desconto 30% + aumento 20%:", options: ["70%", "80%", "84%", "90%"], correct: "84%"},
        {q: "2. Resolva: (3x−2)/4 + (x+6)/3 = 5", options: ["2", "3", "4", "6"], correct: "3"},
        {q: "3. Catetos 9 e 12. Altura da hipotenusa:", options: ["5,4", "6,75", "7,2", "8,1"], correct: "5,4"},
        {q: "4. 40% de x = 25% de 96", options: ["48", "60", "80", "96"], correct: "60"},
        {q: "5. Solução de 5 − 2x > 1 + x:", options: ["x < 1", "x > 1", "x < 4/3", "x > 4/3"], correct: "x < 4/3"},
        {q: "6. 1/2 + 1/3 − 1/6 =", options: ["0,5", "0,66", "0,75", "1"], correct: "0,66"},
        {q: "7. Prisma triangular: faces?", options: ["4", "5", "6", "7"], correct: "5"},
        {q: "8. Área setor (r=8, 45°):", options: ["8π", "16π", "32π", "64π"], correct: "32π"},
        {q: "9. Soma 15 termos de 4,7,10...", options: ["315", "330", "345", "375"], correct: "330"},
        {q: "10. det | 3 2 ; 7 x | = 5", options: ["1", "3", "5", "19/3"], correct: "19/3"}
    ]
};


// =============== SISTEMA PARA MONTAR O SIMULADO ===================
let nivelAtual = null;

function startSimulado(nivel) {
    nivelAtual = nivel; // agora funciona!

    document.querySelector(".cards-container").style.display = "none";

    const sim = document.getElementById("simulado-conteudo");
    sim.innerHTML = "";

    let html = `
        <button class="btn-voltar" onclick="voltarParaCards()">← Voltar</button>
        <form id="quiz-form">
    `;

    questions[nivel].forEach((item, i) => {
        html += `
        <div class="question">
            <p>${item.q}</p>
            <div class="options">
                ${item.options.map(opt => 
                    `<label><input type="radio" name="q${i}" value="${opt}"> ${opt}</label>`
                ).join("")}
            </div>
        </div>
        `;
    });

    html += `<button type="submit">Finalizar Simulado</button></form>
             <div id="result" style="display:none;"></div>`;

    sim.innerHTML = html;
    sim.style.display = "block";
    setTimeout(() => sim.style.opacity = "1", 10);

    // CORREÇÃO E SALVAMENTO
    document.getElementById("quiz-form").addEventListener("submit", corrigirSimulado);
}

// =============== VOLTAR AOS CARDS ===================
function voltarParaCards() {
    const sim = document.getElementById("simulado-conteudo");
    sim.style.display = "none";
    sim.style.opacity = "0";

    document.querySelector(".cards-container").style.display = "flex";
}

// =============== CORRIGIR + SALVAR ===================
function corrigirSimulado(e) {
    e.preventDefault();

    let acertos = 0;
    questions[nivelAtual].forEach((item, i) => {
        const marcada = document.querySelector(`input[name="q${i}"]:checked`);
        if (marcada && marcada.value === item.correct) acertos++;
    });

    const total = questions[nivelAtual].length;
    const notaFinal = Math.round((acertos / total) * 100);

    document.getElementById("result").style.display = "block";
    document.getElementById("result").innerHTML =
        `Você acertou <strong>${acertos}</strong> de <strong>${total}</strong> questões!`;

    // ID automático
    const idSimulado = `mat-${nivelAtual}-${Date.now()}`;

    marcarSimulado(idSimulado, notaFinal);

    console.log("Simulado salvo:", idSimulado, notaFinal);
}

// =============== LOCALSTORAGE (SÓ SIMULADOS AQUI!) ===================


function marcarSimulado(id, nota) {
    progress.simulados[id] = {
        feito: true,
        nota: nota,
        data: new Date().toLocaleString("pt-BR")
    };

    localStorage.setItem("guiaEtecProgress", JSON.stringify(progress));
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
<script>
// ==============================
// SISTEMA DE PROGRESSO - LOCALSTORAGE
// ==============================

// Carrega progresso salvo apenas UMA vez
let progress = JSON.parse(localStorage.getItem("guiaEtecProgress") || "{}");

// Garante estrutura
if (!progress.conteudos) progress.conteudos = {};
if (!progress.simulados) progress.simulados = {};

function salvarProgresso() {
    localStorage.setItem("guiaEtecProgress", JSON.stringify(progress));
}

// ===== MARCAR CONTEÚDOS =====
function marcarConteudo(id, thumb, titulo) {
    progress.conteudos[id] = {
        thumb: thumb,
        titulo: titulo,
        data: new Date().toLocaleString("pt-BR")
    };
    salvarProgresso();
}


// ===== CONSULTAR SE FOI ASSISTIDO =====
function conteudoAssistido(id) {
    return !!progress.conteudos[id];
}

// ===== MARCAR SIMULADO =====
function marcarSimulado(id, nota) {
    progress.simulados[id] = {
        feito: true,
        nota: nota,
        data: new Date().toLocaleString("pt-BR")
    };
    salvarProgresso();
}

// ===== VERIFICAR SE SIMULADO FOI FEITO =====
function simuladoFeito(id) {
    return progress.simulados[id]?.feito === true;
}

// ===== PEGAR NOTA DO SIMULADO =====
function notaSimulado(id) {
    return progress.simulados[id]?.nota || null;
}

// ==============================
// CARREGAR DADOS NA ÁREA DO ALUNO
// ==============================
document.addEventListener("DOMContentLoaded", () => {

    // ---- CONTEÚDOS ASSISTIDOS ----
const conteudosBox = document.querySelector(".content-box:nth-of-type(1) .videos-grid");
conteudosBox.innerHTML = "";

const conteudos = Object.keys(progress.conteudos);

if (conteudos.length === 0) {
    conteudosBox.innerHTML = "<p style='opacity:.6'>Nenhum conteúdo assistido ainda.</p>";
} else {
    conteudos.forEach(id => {
        const item = progress.conteudos[id];

        conteudosBox.innerHTML += `
            <div class="video-thumb" style="
                width: 180px;
                height: 100px;
                background-image: url('${item.thumb}');
                background-size: cover;
                background-position: center;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.3);
                cursor:pointer;
                position:relative;
                overflow:hidden;
            ">
                <div style="
                    position:absolute;
                    bottom:0;
                    width:100%;
                    background:rgba(0,0,0,0.6);
                    color:white;
                    font-size:13px;
                    padding:4px;
                    text-align:center;
                ">
                    ${item.titulo || id}
                </div>
            </div>
        `;
    });
}


    // ---- SIMULADOS FEITOS ----
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


function finalizarSimulado() {
    let total = perguntas.length;
    let notaFinal = Math.round((acertos / total) * 100);

    marcarSimulado("Matemática - 01", notaFinal);

    alert("Simulado salvo! Sua nota foi: " + notaFinal + "%");
}

marcarConteudo(
    "video01",
    "../assets/thumbs/video01.jpg",
    "Funções do 1º Grau"
);


</script>

</body>

</html>