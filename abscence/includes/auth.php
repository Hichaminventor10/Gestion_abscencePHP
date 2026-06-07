<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../config/database.php';

function require_login(): void {
    if (empty($_SESSION['user'])) {
        header('Location: /gst_abscence/abscence/connexion.php');
        exit;
    }
}

function current_user(): array {
    return $_SESSION['user'] ?? [];
}

function random_password(int $len = 10): string {
    return substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789@#$'), 0, $len);
}

function e(?string $v): string {
    return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
}
