<?php
$host = 'localhost';   // Defina o host do seu banco de dados
$user = 'root';        // Defina o usuário do banco (para o XAMPP, geralmente é 'root')
$pass = '';            // Defina a senha (geralmente está em branco no XAMPP)
$dbname = 'guiaetec';  // Nome do banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para obter exceções em caso de erro
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage()); // Caso ocorra erro de conexão
}

?>
