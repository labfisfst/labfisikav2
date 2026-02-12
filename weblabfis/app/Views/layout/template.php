<!doctype html>
<html lang="id-ID">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Sistem Inventaris Lab' ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; border-radius: 10px; }
        .table thead th { 
            background-color: #e9ecef; 
            color: #495057; 
            font-weight: 600;
        }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm mb-4">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <i class="bi bi-cpu-fill me-2 fs-3"></i> <div>
                <span class="fw-bold d-block" style="line-height: 1.2;">LAB FISIKA</span>
                <small id="clock" class="d-block opacity-75" style="font-size: 0.75rem;">
                    <?= date('d M Y | H:i:s'); ?>
                </small>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
              <?php if (session()->get('logged_in')) : ?>
                  <li class="nav-item">
                      <a class="nav-link text-dark">Halo, <b><?= session()->get('nama'); ?></b></a>
                  </li>
                  <li class="nav-item">
                      <a class="btn btn-danger btn-sm mt-1" href="/logout">Logout</a>
                  </li>
              <?php else : ?>
                  <li class="nav-item">
                      <a class="btn btn-outline-secondary btn-sm mt-1" href="/login">Administrator Lab</a>
                  </li>
              <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <?= $this->renderSection('content'); ?>

    <footer class="text-center py-4 text-muted small mt-5">
        &copy; <?= date('Y'); ?> Sistem Inventaris Laboratorium Fisika
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>