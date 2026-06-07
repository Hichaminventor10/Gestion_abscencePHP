<?php require_once __DIR__ . '/auth.php'; $u = current_user(); ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion Absences ENSAH</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <style>
    body{background:linear-gradient(135deg,#eef4ff,#f7fff8);min-height:100vh}
    .navbar{background:linear-gradient(90deg,#123c69,#2a9d8f)}
    .card,.table-wrap{border:0;border-radius:16px;box-shadow:0 12px 35px rgba(18,60,105,.12)}
    .btn{border-radius:10px}.badge{border-radius:999px}.page-title{font-weight:800;color:#123c69}
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/gst_abscence/abscence/dashboard.php"><i class="fa-solid fa-graduation-cap me-2"></i>ENSAH Absences</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
    <div id="nav" class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="/gst_abscence/abscence/modules/etudiants/liste.php">Étudiants</a></li>
        <li class="nav-item"><a class="nav-link" href="/gst_abscence/abscence/modules/comptes/liste.php">Comptes</a></li>
        <li class="nav-item"><a class="nav-link" href="/gst_abscence/abscence/modules/abscences/liste.php">Absences</a></li>
      </ul>
      <?php if ($u): ?><span class="text-white me-3"><i class="fa-solid fa-user me-1"></i><?= e($u['login']) ?></span><a class="btn btn-light btn-sm" href="/gst_abscence/abscence/logout.php">Déconnexion</a><?php endif; ?>
    </div>
  </div>
</nav>
<main class="container py-4">
