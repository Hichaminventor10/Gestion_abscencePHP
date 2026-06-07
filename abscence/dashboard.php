<?php require_once __DIR__ . '/includes/auth.php'; require_login(); include __DIR__ . '/includes/header.php';
$et = $pdo->query("SELECT COUNT(*) c FROM etudiants")->fetch()['c'];
$co = $pdo->query("SELECT COUNT(*) c FROM utilisateurs")->fetch()['c'];
$ab = $pdo->query("SELECT COUNT(*) c FROM absences")->fetch()['c'];
?>
<h1 class="page-title mb-4">Tableau de bord</h1>
<div class="row g-4">
<?php foreach ([['Étudiants',$et,'fa-users','modules/etudiants/liste.php','primary'],['Comptes',$co,'fa-user-shield','modules/comptes/liste.php','success'],['Absences',$ab,'fa-calendar-xmark','modules/abscences/liste.php','danger']] as $c): ?>
  <div class="col-md-4"><div class="card p-4 h-100"><div class="d-flex align-items-center gap-3"><i class="fa-solid <?= $c[2] ?> fa-3x text-<?= $c[4] ?>"></i><div><h5><?= $c[0] ?></h5><div class="display-6 fw-bold"><?= $c[1] ?></div></div></div><a class="btn btn-<?= $c[4] ?> mt-4" href="<?= $c[3] ?>">Ouvrir</a></div></div>
<?php endforeach; ?>
</div>
<?php include __DIR__ . '/includes/footer.php'; ?>
