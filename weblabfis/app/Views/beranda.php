<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container mt-4">
        <h3 class="text-center mb-4 fw-bold">DAFTAR LABORATORIUM</h3>

        <div class="row">
            
            <?php foreach($labs as $lab): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm hover-shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-primary"><?= $lab['nama_lab'] ?></h5>
                        <p class="card-text text-muted small"><?= $lab['deskripsi'] ?></p>
                        <a href="/lab/<?= $lab['id'] ?>" class="btn btn-outline-primary w-100">
                            Lihat Inventaris &rarr;
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm hover-shadow">
                    <div class="card-body text-center">
                        <h4 class="card-title fw-bold text-primary">SEMUA ALAT</h4>
                        <p class="card-text">Lihat Alat dari semua laboratorium.</p>
                        <a href="/alat/semua" class="btn btn-outline-primary w-100">
                            Lihat Data &rarr;
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

<?= $this->endSection(); ?>