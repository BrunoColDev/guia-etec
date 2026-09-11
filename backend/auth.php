<?php
// backend/auth.php
session_start(); // deve ser chamado no topo de todas as páginas que usam sessão

function is_logged_in() {
    return !empty($_SESSION['user_id']);
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: /pages/login.html');
        exit();
    }
}
