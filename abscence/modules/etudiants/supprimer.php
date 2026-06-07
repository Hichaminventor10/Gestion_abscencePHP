<?php
require_once __DIR__ . '/../../includes/auth.php'; require_login();
$pdo->prepare("DELETE FROM etudiants WHERE id=?")->execute([(int)($_GET['id'] ?? 0)]);
header('Location: liste.php'); exit;
