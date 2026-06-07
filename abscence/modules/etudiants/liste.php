<?php require_once __DIR__ . '/../../includes/auth.php'; require_login(); include __DIR__ . '/../../includes/header.php';
$rows = $pdo->query("SELECT * FROM etudiants ORDER BY nom, prenom")->fetchAll();
$niveaux = $pdo->query("SELECT niveau, COUNT(*) c FROM etudiants GROUP BY niveau")->fetchAll();
?>
<div class="d-flex justify-content-between align-items-center mb-3"><h1 class="page-title">Étudiants</h1><a class="btn btn-primary" href="ajouter.php"><i class="fa-solid fa-plus me-1"></i>Ajouter</a></div>
<div class="row g-3 mb-3"><div class="col-md-3"><div class="card p-3"><b>Total</b><span class="fs-3"><?= count($rows) ?></span></div></div><?php foreach($niveaux as $n): ?><div class="col-md-3"><div class="card p-3"><b><?= e($n['niveau']) ?></b><span class="fs-3"><?= $n['c'] ?></span></div></div><?php endforeach; ?></div>
<input id="q" class="form-control mb-3" placeholder="Recherche en temps réel...">
<div class="table-responsive table-wrap bg-white p-3"><table class="table table-hover align-middle" id="tbl"><thead><tr><th>Nom</th><th>Prénom</th><th>Massar</th><th>CIN</th><th>Email</th><th>Niveau</th><th></th></tr></thead><tbody>
<?php foreach($rows as $r): ?><tr><td><?= e($r['nom']) ?></td><td><?= e($r['prenom']) ?></td><td><?= e($r['massar_id']) ?></td><td><?= e($r['cin']) ?></td><td><?= e($r['email']) ?></td><td><span class="badge bg-info"><?= e($r['niveau']) ?></span></td><td class="text-end"><a class="btn btn-sm btn-warning" href="modifier.php?id=<?= $r['id'] ?>"><i class="fa-solid fa-pen"></i></a> <a onclick="return confirm('Supprimer cet étudiant ?')" class="btn btn-sm btn-danger" href="supprimer.php?id=<?= $r['id'] ?>"><i class="fa-solid fa-trash"></i></a></td></tr><?php endforeach; ?>
</tbody></table></div><script>q.oninput=()=>{let v=q.value.toLowerCase();document.querySelectorAll('#tbl tbody tr').forEach(tr=>tr.style.display=tr.innerText.toLowerCase().includes(v)?'':'none')}</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
