<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .table-responsive { box-shadow: 0 0 15px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden; }
        .header-lab { background: linear-gradient(45deg, #0d6efd, #0dcaf0); color: white; padding: 20px; border-radius: 8px 8px 0 0; }
    </style>
  </head>
  <body>

    <div class="container mt-5 mb-5">
        <div class="header-lab text-center mb-0">
            <h2 class="fw-bold">INVENTARIS LABORATORIUM FISIKA</h2>
            <p class="mb-0">UIN Sunan Gunung Djati Bandung</p>           
        </div>
        
        <div class="bg-white p-4 rounded-bottom table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Nama Alat</th>
                        <th width="20%">Lokasi Lab</th>
                        <th width="10%">Tahun</th>
                        <th width="30%">Fungsi</th>
                        <th width="10%">Kondisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($alat)): ?>
                        <?php foreach($alat as $key => $row): ?>
                        <tr>
                            <td class="text-center fw-bold"><?= $key + 1 ?></td>
                            <td class="fw-bold text-primary"><?= esc($row['nama_alat']) ?></td>
                            <td>
                                <span class="badge bg-secondary">
                                    <i class="bi bi-geo-alt"></i> <?= esc($row['nama_lab']) ?>
                                </span>
                            </td>
                            <td><?= esc($row['tahun']) ?></td>
                            <td class="small"><?= esc($row['fungsi']) ?></td>
                            <td>
                                <?php if($row['kondisi'] == 'Baik'): ?>
                                    <span class="badge bg-success">Baik</span>
                                <?php elseif($row['kondisi'] == 'Rusak'): ?>
                                    <span class="badge bg-danger">Rusak</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark">Perbaikan</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <div class="alert alert-warning">Belum ada data alat. Silakan jalankan seeder.</div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="text-right mt-3">
            <a href="/home/tambah" class="btn btn-light text-primary fw-bold shadow-sm">
                + Tambah Data Baru
            </a>
            </div>
        <div class="text-center mt-3 text-muted">
            <small>&copy; 2025 Sistem Informasi Laboratorium</small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>