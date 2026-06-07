<?php require_once __DIR__ . '/../../includes/auth.php'; require_login(); $id=(int)($_GET['id']??0);
if ($_SERVER['REQUEST_METHOD']==='POST') { $pdo->prepare("UPDATE etudiants SET nom=?,prenom=?,massar_id=?,cin=?,email=?,niveau=? WHERE id=?")->execute([$_POST['nom'],$_POST['prenom'],$_POST['massar_id'],$_POST['cin'],$_POST['email'],$_POST['niveau'],$id]); header('Location: liste.php'); exit; }
$st=$pdo->prepare("SELECT * FROM etudiants WHERE id=?"); $st->execute([$id]); $r=$st->fetch(); include __DIR__ . '/../../includes/header.php'; ?>
<h1 class="page-title mb-3">Modifier étudiant</h1><form method="post" class="card p-4">
<?php foreach(['nom'=>'Nom','prenom'=>'Prénom','massar_id'=>'Massar ID','cin'=>'CIN','email'=>'Email','niveau'=>'Niveau'] as $k=>$l): ?><div class="mb-3"><label class="form-label"><?= $l ?></label><input name="<?= $k ?>" value="<?= e($r[$k]??'') ?>" class="form-control" required></div><?php endforeach; ?>
<button class="btn btn-warning">Modifier</button></form><?php include __DIR__ . '/../../includes/footer.php'; ?>
