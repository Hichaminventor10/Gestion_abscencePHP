<?php require_once __DIR__ . '/../../includes/auth.php'; require_login(); $id=(int)($_GET['id']??0);
if ($_SERVER['REQUEST_METHOD']==='POST') { $pdo->prepare("UPDATE utilisateurs SET role=? WHERE id=?")->execute([$_POST['role'],$id]); header('Location: liste.php'); exit; }
$st=$pdo->prepare("SELECT * FROM utilisateurs WHERE id=?"); $st->execute([$id]); $r=$st->fetch(); include __DIR__ . '/../../includes/header.php'; ?>
<h1 class="page-title mb-3">Modifier compte</h1><form method="post" class="card p-4"><p><b>Login :</b> <?= e($r['login']??'') ?></p><label class="form-label">Rôle</label><select name="role" class="form-select mb-3"><?php foreach(['admin','enseignant','scolarite'] as $role): ?><option <?= (($r['role']??'')===$role)?'selected':'' ?>><?= $role ?></option><?php endforeach; ?></select><button class="btn btn-warning">Modifier</button></form>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
