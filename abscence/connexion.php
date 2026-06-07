<?php
require_once __DIR__ . '/includes/auth.php';
if (!empty($_SESSION['user'])) { header('Location: dashboard.php'); exit; }
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $st = $pdo->prepare("SELECT * FROM utilisateurs WHERE login=? AND enabled=1");
    $st->execute([$_POST['login'] ?? '']);
    $user = $st->fetch();
    if ($user && password_verify($_POST['mot_de_passe'] ?? '', $user['mot_de_passe'])) {
        $_SESSION['user'] = ['id'=>$user['id'], 'login'=>$user['login'], 'role'=>$user['role']];
        header('Location: dashboard.php'); exit;
    }
    $error = 'Login ou mot de passe incorrect.';
}
?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Connexion ENSAH</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
<style>body{min-height:100vh;background:linear-gradient(135deg,#123c69,#2a9d8f);display:grid;place-items:center}.card{width:min(430px,92vw);border:0;border-radius:18px;box-shadow:0 25px 60px rgba(0,0,0,.25)}</style></head>
<body><div class="card p-4"><h3 class="fw-bold text-center mb-1">ENSAH Al Hoceima</h3><p class="text-center text-muted mb-4">Gestion d'absences</p>
<?php if($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<form method="post"><div class="mb-3"><label class="form-label">Login</label><input name="login" class="form-control" required autofocus></div>
<div class="mb-3"><label class="form-label">Mot de passe</label><input type="password" name="mot_de_passe" class="form-control" required></div>
<button class="btn btn-primary w-100"><i class="fa-solid fa-right-to-bracket me-2"></i>Connexion</button></form></div></body></html>
