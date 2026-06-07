<?php require_once __DIR__ . '/../../includes/auth.php'; require_login();
if ($_SERVER['REQUEST_METHOD']==='POST') { $pdo->prepare("INSERT INTO etudiants(nom,prenom,massar_id,cin,email,niveau) VALUES(?,?,?,?,?,?)")->execute([$_POST['nom'],$_POST['prenom'],$_POST['massar_id'],$_POST['cin'],$_POST['email'],$_POST['niveau']]); header('Location: liste.php'); exit; }
include __DIR__ . '/../../includes/header.php'; ?>
<h1 class="page-title mb-3">Ajouter étudiant</h1><form method="post" class="card p-4">
<?php foreach(['nom'=>'Nom','prenom'=>'Prénom','massar_id'=>'Massar ID','cin'=>'CIN','email'=>'Email','niveau'=>'Niveau'] as $k=>$l): ?><div class="mb-3"><label class="form-label"><?= $l ?></label><input name="<?= $k ?>" class="form-control" <?= in_array($k,['nom','prenom','massar_id','niveau'])?'required':'' ?>></div><?php endforeach; ?>
<button class="btn btn-primary">Enregistrer</button></form><?php include __DIR__ . '/../../includes/footer.php'; ?>
