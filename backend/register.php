<?php
session_start();
require_once('conexao.php'); 


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mensagem = '';  
$tipo_mensagem = '';  


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = trim($_POST['email']);
    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);  

    
    if (empty($email) || empty($usuario) || empty($senha)) {
        $mensagem = 'Todos os campos são obrigatórios.';
        $tipo_mensagem = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagem = 'E-mail inválido.';
        $tipo_mensagem = 'error';
    } elseif (strlen($senha) < 8) {
        $mensagem = 'A senha deve ter pelo menos 8 caracteres.';
        $tipo_mensagem = 'error';
    } else {
        try {
            
            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $mensagem = 'E-mail já cadastrado.';
                $tipo_mensagem = 'error';
            } else {
                
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                
                $stmt = $pdo->prepare("INSERT INTO usuarios (email, usuario, senha) VALUES (?, ?, ?)");
                $stmt->execute([$email, $usuario, $senha_hash]); 
                  
            header("Location: ../backend/login.php");
            exit();

                $mensagem = 'Usuário cadastrado com sucesso!';
                $tipo_mensagem = 'success';
            }
        } catch (PDOException $e) {
            
            $mensagem = 'Erro ao cadastrar usuário: ' . $e->getMessage();
            $tipo_mensagem = 'error';
        }
    }
}
?>


<?php if ($mensagem): ?>
    <div class="alert alert-<?php echo $tipo_mensagem; ?>">
        <?php echo $mensagem; ?>
    </div>
<?php endif; ?>
