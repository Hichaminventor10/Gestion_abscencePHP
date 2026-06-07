<?php require_once __DIR__ . '/../../includes/auth.php'; require_login(); $msg='';
if ($_SERVER['REQUEST_METHOD']==='POST') { $pwd=random_password(); $pdo->prepare("INSERT INTO utilisateurs(login,mot_de_passe,role,enabled) VALUES(?,?,?,1)")->execute([$_POST['login'],password_hash($pwd,PASSWORD_DEFAULT),$_POST['role']]); $msg="Mot de passe généré : $pwd"; }
include __DIR__ . '/../../includes/header.php'; ?>
<h1 class="page-title mb-3">Ajouter compte</h1><?php if($msg): ?><div class="alert alert-success"><?= e($msg) ?></div><?php endif; ?>
<form method="post" class="card p-4"><div class="mb-3"><label class="form-label">Login</label><input name="login" class="form-control" required></div><div class="mb-3"><label class="form-label">Rôle</label><select name="role" class="form-select"><option>enseignant</option><option>scolarite</option><option>admin</option></select></div><button class="btn btn-primary">Créer</button></form>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
