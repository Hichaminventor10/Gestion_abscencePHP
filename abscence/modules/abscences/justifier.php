<?php require_once __DIR__ . '/../../includes/auth.php'; require_login(); $id=(int)($_GET['id']??0);
if ($_SERVER['REQUEST_METHOD']==='POST') { $pdo->prepare("UPDATE absences SET etat='justifiee', motif=? WHERE id=?")->execute([$_POST['motif'],$id]); header('Location: liste.php'); exit; }
include __DIR__ . '/../../includes/header.php'; ?>
<h1 class="page-title mb-3">Justifier absence</h1><form method="post" class="card p-4"><label class="form-label">Motif</label><textarea name="motif" class="form-control mb-3" rows="5" required></textarea><button class="btn btn-success">Justifier</button></form>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
