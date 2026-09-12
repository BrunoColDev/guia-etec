<?php
session_start();
require_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);

    if (empty($usuario) || empty($senha)) {
        echo "<script>alert('Por favor, insira usuário e senha.'); window.location='login.php';</script>";
        exit();
    }

    // AGORA PEGANDO TUDO QUE PRECISA
    $stmt = $pdo->prepare("SELECT id, usuario, email, senha FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuario]);

    if ($stmt->rowCount() > 0) {
        $usuario_db = $stmt->fetch();

        if (password_verify($senha, $usuario_db['senha'])) {

            // SESSÃO AGORA FUNCIONA SEM ERRO
            $_SESSION['id']      = $usuario_db['id'];
            $_SESSION['usuario'] = $usuario_db['usuario'];
            $_SESSION['email']   = $usuario_db['email'];

            header("Location: ../pages/areadoaluno.php");
            exit();
        } else {
            echo "<script>alert('Senha incorreta!'); window.location='login.php';</script>";
            exit();
        }

    } else {
        echo "<script>alert('Usuário não encontrado!'); window.location='login.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Register</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
    background-image:
      radial-gradient(circle at center, rgba(0, 0, 0, 0) 60%, rgba(0, 0, 0, 0.6) 90%),
      url('../assets/img/Textura\ Guia\ Etec.png');
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;

    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 0 20px;
    overflow: hidden;
    z-index: 0;

  }

  .form-container {
    display: flex;
    width: 1000px;
    height: 600px;
    border: 5px solid #033A7B;
    border-radius: 30px;
    backdrop-filter: blur(25px);
    overflow: hidden;
  }

  /* Primeira coluna */
  .col-1 {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 55%;
    background: rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(30px);
    border-radius: 0 20% 20% 0;
    transition: border-radius .3s;
  }

  .image-layer {
    position: relative;
  }

  .form-image-main {
    width: 400px;
  }

  .form-image {
    position: absolute;
    left: 0;
    width: 400px;
  }

  /* animação da imagem */

  /* featured-words */
  .featured-words {
    text-align: center;
    color: #fff;
    width: 350px;
    margin: 0 50px 20px 0;
  }

  .featured-words span {
    font-weight: 600;
    color: #21264D;
  }

  /* Segunda coluna */

  .col-2 {
    position: relative;
    width: 45%;
    padding: 20px;
    overflow: hidden;
  }

  .btn-box {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
  }

  .btn {
    font-weight: 500;
    padding: 5px 30px;
    border: none;
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.34);
    color: #fff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: .2s;
  }

  .btn-1 {
    background: #21264D;
  }


  .btn:hover {
    opacity: 0.85;
  }

  .login-form {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 0 4vw;
    transition: .3s;
  }

  .register-form {
    position: absolute;
    left: -50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 0 4vw;
    transition: .3s;
  }

  .register-form .form-tittle {
    margin-block: 40px 20px;
  }

  .form-tittle {
    margin: 40px 0;
    color: #fff;
    font-size: 28px;
    font-weight: 600;
  }

  .form-inpusts {
    width: 100%;
  }

  .input-box {
    position: relative;
  }

  .input-field {
    width: 300px;
    height: 55px;
    padding: 0 15px;
    margin: 10px 0;
    color: #fff;
    background: rgba(255, 255, 255, 0.2);
    border: none;
    border-radius: 10px;
    outline: none;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(5, 5, 58, 0.5);
  }

  ::placeholder {
    color: #fff;
    font-size: 15px;
  }

  .input-box .icon {
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    color: #fff;
  }

  .forgot-pass {
    display: flex;
    justify-content: right;
    gap: 5px;
  }

  .forgot-pass a {
    color: #fff;
    text-decoration: none;
    font-size: 14px;
  }

  .forgot-pass a:hover {
    text-decoration: underline;
  }

  .input-submit {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    height: 55px;
    padding: 0 15px;
    margin: 10px 0;
    color: #fff;
    background: #21264D;
    /*Cor Botão "Entrar"*/
    border: none;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: .3s;
  }

  .input-submit:hover {
    gap: 15px;
  }

  .social-login {
    display: flex;
    gap: 20px;
    margin-top: 20px;
  }

  .social-login i {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 40px;
    width: 40px;
    color: #fff;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    transition: .2s;
  }

  .social-login i:hover {
    transform: scale(0.9);
  }

  @media (max-width: 892px) {
    .form-container {
      width: 400px;
    }

    .col-1 {
      display: none;
    }

    .col-2 {
      width: 100%;
    }
  }

  /* ==== BOTÃO DE LOGOUT (GUIA ETEC STYLE) ==== */
  .Btn {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    width: 45px;
    height: 45px;
    border: none;
    border-radius: 50%;
    margin: 10px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.25);
    background: linear-gradient(90deg, #033A7B, #218FD9);
  }

  .sign {
    width: 100%;
    transition: 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .sign svg {
    width: 20px;
    height: 20px;
  }

  .sign svg path {
    fill: #fff;
  }

  .text {
    position: absolute;
    right: 0%;
    width: 0%;
    opacity: 0;
    color: #FFD700;
    font-size: 1.1em;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
  }

  .Btn:hover {
    width: 140px;
    border-radius: 40px;
    background: linear-gradient(90deg, #FFD700, #033A7B);
  }

  .Btn:hover .sign {
    width: 26%;
    padding-left: 10px;
  }

  .Btn:hover .text {
    opacity: 1;
    width: 70%;
    color: #fff;
    padding-right: 20px;
  }

  .Btn:active {
    transform: translate(2px, 2px);
  }
</style>


<body>
  <div class="form-container">
    <div class="col col-1">
      <div class="image-layer">
        <img src="../assets/img/mascoteGuia.png" class="form-image-main">
        <img src="" class="form-image-dots">
        <img src="" class="form-image-coin">
        <img src="" class="form-image-spring">
        <img src="" class="form-image-rocket">
        <img src="" class="form-image-cloud">
        <img src="" class="form-image-stars">
      </div>
      <p class="featured-words">você está a poucos minutos de aumentar suas habilidades com <span>GuiaEtec</span></p>
    </div>
    <div class="col col-2">
      <div class="btn-box">
        <button class="btn btn-1" id="login">Entrar</button>
        <button class="btn btn-2" id="registrar">Cadastrar</button>
      </div>
      <!-- aqui fica o quadrado do login -->
      <form method="post" action="../backend/login.php" id="loginForm">
        <div class="login-form">
          <div class="form-tittle">
            <span>Entrar</span>
          </div>
          <div class="form-inputs">
            <div class="input-box">
              <input type="text" class="input-field" placeholder="Usuário" required name="usuario">
              <i class="bx bx-user icon"></i>
            </div>
            <div class="input-box">
              <input type="password" class="input-field" placeholder="Senha" required name="senha">
              <i class="bx bx-lock-alt icon"></i>
            </div>
            <div class="forgot-pass">
              <a href="#">Esqueceu a senha?</a>
            </div>
            <div class="input-box">
              <button class="input-submit">
                <span>Entrar</span>
                <i class="bx bx-right-arrow-alt"></i>
              </button>
            </div>
          </div>
          
        </div>
      </form>

      <form method="post" action="../backend/register.php">
        <div class="register-form">
          <div class="form-tittle">
            <span>Crie sua conta</span>
          </div>
          <div class="form-inputs">
            <div class="input-box">
              <input type="email" class="input-field" placeholder="Email" required name="email">
              <i class="bx bx-envelope icon"></i>
            </div>
            <div class="form-inputs">
              <div class="input-box">
                <input type="text" class="input-field" placeholder="Usuário" required name="usuario">
                <i class="bx bx-user icon"></i>
              </div>
              <div class="input-box">
                <input type="password" class="input-field" placeholder="Senha" required name="senha">
                <i class="bx bx-lock-alt icon"></i>
              </div>
              <div class="forgot-pass">
                <a href="#">Esqueceu a senha?</a>
              </div>
              <div class="input-box">
                <button class="input-submit">
                  <span>Cadastrar</span>
                  <i class="bx bx-right-arrow-alt"></i>
                </button>
              </div>
            </div>
          </div>
      </form>
    </div>
  </div>
  <a href="../inicio.php" class="Btn">
    <div class="sign">
      <svg viewBox="0 0 512 512">
        <path
          d="M497 273L329 441c-15 15-41 4-41-17v-96H192c-13 0-24-11-24-24v-96c0-13 11-24 24-24h96v-96c0-21 26-32 41-17l168 168c9 9 9 25 0 34zM160 424c0 13-11 24-24 24H64c-35 0-64-29-64-64V128c0-35 29-64 64-64h72c13 0 24 11 24 24s-11 24-24 24H72c-8 0-16 8-16 16v240c0 8 8 16 16 16h64c13 0 24 11 24 24z" />
      </svg>
    </div>
    <div class="text">Sair</div>
  </a>



  <script>

    const loginBtn = document.querySelector("#login");
    const registerBtn = document.querySelector("#registrar");
    const loginForm = document.querySelector(".login-form");
    const registerForm = document.querySelector(".register-form");

    loginBtn.addEventListener('click', () => {
      loginBtn.style.backgroundColor = "#21264D";
      registerBtn.style.backgroundColor = "";

      loginForm.style.left = "50%";
      registerForm.style.left = "-50%";

      loginForm.style.opacity = 1;
      registerForm.style.opacity = 0;

      document.querySelector(".col-1").style.borderRadius = "0 30% 20% 0 ";
    })

    registerBtn.addEventListener('click', () => {
      loginBtn.style.backgroundColor = "rgba(255, 255, 255, 0.3)";
      registerBtn.style.backgroundColor = "#21264D";

      loginForm.style.left = "150%";
      registerForm.style.left = "50%";

      loginForm.style.opacity = 0;
      registerForm.style.opacity = 1;

      document.querySelector(".col-1").style.borderRadius = "0 20% 30% 0 ";
    })

    


  </script>
</body>

</html>

