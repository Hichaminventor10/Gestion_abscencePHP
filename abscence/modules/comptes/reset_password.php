<?php require_once __DIR__ . '/../../includes/auth.php'; require_login(); $pwd=random_password();
$pdo->prepare("UPDATE utilisateurs SET mot_de_passe=? WHERE id=?")->execute([password_hash($pwd,PASSWORD_DEFAULT),(int)($_GET['id']??0)]);
include __DIR__ . '/../../includes/header.php'; ?>
<div class="alert alert-success">Nouveau mot de passe : <b><?= e($pwd) ?></b></div><a class="btn btn-primary" href="liste.php">Retour</a>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
