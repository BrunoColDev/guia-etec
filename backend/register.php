<?php
session_start();
require_once('conexao.php'); // Inclua a conexão com o banco

// Habilitar exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mensagem = '';  // Inicializa a variável de mensagem
$tipo_mensagem = '';  // Inicializa a variável de tipo de mensagem


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $email = trim($_POST['email']);
    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);  // Captura a senha enviada no formulário

    // Validações do formulário
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
            // Verifica se o e-mail já está cadastrado
            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $mensagem = 'E-mail já cadastrado.';
                $tipo_mensagem = 'error';
            } else {
                // Salva o novo usuário no banco de dados com a senha em texto simples
                $stmt = $pdo->prepare("INSERT INTO usuarios (email, usuario, senha) VALUES (?, ?, ?)");
                $stmt->execute([$email, $usuario, $senha]);  // Usa a senha diretamente
                  // Redireciona imediatamente para o login
            header("Location: ../backend/login.php");
            exit();

                $mensagem = 'Usuário cadastrado com sucesso!';
                $tipo_mensagem = 'success';
            }
        } catch (PDOException $e) {
            // Se houver erro na consulta, mostre a mensagem de erro
            $mensagem = 'Erro ao cadastrar usuário: ' . $e->getMessage();
            $tipo_mensagem = 'error';
        }
    }
}
?>

<!-- Exibindo as mensagens de erro ou sucesso no front-end -->
<?php if ($mensagem): ?>
    <div class="alert alert-<?php echo $tipo_mensagem; ?>">
        <?php echo $mensagem; ?>
    </div>
<?php endif; ?>
