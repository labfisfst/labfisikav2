<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4 mb-5">
    <div class="card shadow-sm border-0">
        
        <div class="card-header py-3 <?= session()->get('logged_in') ? 'bg-warning text-dark' : 'bg-info text-white' ?>">
            <h5 class="mb-0 fw-bold">
                <i class="bi <?= session()->get('logged_in') ? 'bi-pencil-square' : 'bi-eye' ?> me-2"></i>
                <?= session()->get('logged_in') ? 'Edit Data Alat' : 'Detail Informasi Alat' ?>
            </h5>
        </div>

        <div class="card-body p-4">
            <form action="/alat/update/<?= $alat['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="row">
                    <div class="col-md-7 mb-3">
                        <label class="form-label fw-bold text-muted">Nama Alat</label>
                        <input type="text" class="form-control" name="nama_alat" value="<?= $alat['nama_alat']; ?>" <?= !session()->get('logged_in') ? 'readonly' : 'required' ?>>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label class="form-label fw-bold text-muted">Merek</label>
                        <input type="text" class="form-control" name="merek" value="<?= $alat['merek']; ?>" <?= !session()->get('logged_in') ? 'readonly' : '' ?>>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 mb-3">
                        <label class="form-label fw-bold text-muted">Kode Barang</label>
                        <input type="text" class="form-control" name="kode_barang" value="<?= $alat['kode_barang']; ?>" <?= !session()->get('logged_in') ? 'readonly' : '' ?>>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label class="form-label fw-bold text-muted">Lokasi Laboratorium</label>
                        <?php if (session()->get('logged_in')) : ?>
                            <select class="form-select" name="lab_id" required>
                                <?php foreach($labs as $l): ?>
                                    <option value="<?= $l['id'] ?>" <?= ($alat['lab_id'] == $l['id']) ? 'selected' : '' ?>>
                                        <?= $l['nama_lab'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        <?php else : ?>
                            <input type="text" class="form-control" value="<?= $alat['nama_lab'] ?? 'Laboratorium' ?>" readonly>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-muted">Tahun Pengadaan</label>
                        <input type="number" class="form-control" name="tahun" value="<?= $alat['tahun']; ?>" <?= !session()->get('logged_in') ? 'readonly' : 'required' ?>>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-muted">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" value="<?= $alat['jumlah']; ?>" <?= !session()->get('logged_in') ? 'readonly' : 'required' ?>>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-muted">Satuan</label>
                        <input type="text" class="form-control" name="satuan" value="<?= $alat['satuan']; ?>" <?= !session()->get('logged_in') ? 'readonly' : '' ?>>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-muted">Fungsi Alat</label>
                    <textarea class="form-control" name="fungsi" rows="2" <?= !session()->get('logged_in') ? 'readonly' : '' ?>><?= $alat['fungsi']; ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Kondisi</label>
                        <?php if (session()->get('logged_in')) : ?>
                            <select class="form-select" name="kondisi">
                                <option value="Baik" <?= ($alat['kondisi'] == 'Baik') ? 'selected' : ''; ?>>Baik</option>
                                <option value="Rusak" <?= ($alat['kondisi'] == 'Rusak') ? 'selected' : ''; ?>>Rusak</option>
                                <option value="Perbaikan" <?= ($alat['kondisi'] == 'Perbaikan') ? 'selected' : ''; ?>>Perbaikan</option>
                            </select>
                        <?php else : ?>
                            <input type="text" class="form-control" value="<?= $alat['kondisi']; ?>" readonly>
                        <?php endif; ?>
                    </div>
                    
                    <?php if (session()->get('logged_in')) : ?>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Ganti Foto (Opsional)</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImg()">
                    </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label d-block fw-bold text-muted">Foto Alat</label>
                    <img src="/img/<?= $alat['gambar']; ?>" width="200" class="img-thumbnail rounded img-preview shadow-sm">
                </div>

                <div class="d-flex justify-content-between mt-4 pt-3 border-top">                    
                    <div class="d-flex gap-2">
                        <a href="javascript:history.back()" class="btn btn-secondary px-4">
                            <i class="bi bi-arrow-left-circle"></i> <?= session()->get('logged_in') ? 'Batal' : 'Kembali' ?>
                        </a>
                        
                        <a href="<?= base_url('home/jadwal_alat/' . $alat['id']); ?>" class="btn btn-info px-4 shadow text-white">
                            <i class="bi bi-calendar3"></i> Lihat Jadwal Penggunaan
                        </a>

                        <?php if (session()->get('logged_in')) : ?>
                            <button type="submit" class="btn btn-success px-4 shadow">
                                <i class="bi bi-check-circle"></i> Simpan Perubahan
                            </button>
                        <?php endif; ?>
                    </div>
                    <div>
                        <?php if (session()->get('logged_in')) : ?>
                            <a href="/alat/hapus/<?= $alat['id']; ?>" class="btn btn-outline-danger px-4" onclick="return confirm('Hapus permanen data ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImg() {
        const gambar = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');
        if (gambar && gambar.files && gambar.files[0]) {
            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);
            fileGambar.onload = function(e) { imgPreview.src = e.target.result; }
        }
    }
</script>

<?= $this->endSection(); ?>