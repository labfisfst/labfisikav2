<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4 mb-5">
    <div class="card shadow-sm border-0">
        
        <div class="card-header py-3" style="background-color: #ffc107; color: #000;">
            <h5 class="mb-0 fw-bold"><i class="bi bi-box-seam me-2"></i>Tambah Data Alat</h5>
        </div>

        <div class="card-body p-4">
            <form action="/alat/simpan" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="row">
                    <div class="col-md-7 mb-3">
                        <label for="nama_alat" class="form-label fw-bold text-muted">Nama Alat</label>
                        <input type="text" class="form-control" id="nama_alat" name="nama_alat" placeholder="Nama alat lengkap" required autofocus>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="merek" class="form-label fw-bold text-muted">Merek</label>
                        <input type="text" class="form-control" id="merek" name="merek" placeholder="Contoh: Pudak, Masda, dll">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 mb-3">
                        <label for="kode_barang" class="form-label fw-bold text-muted">Kode Barang (Kd Barang)</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukkan kode inventaris">
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="lab_id" class="form-label fw-bold text-muted">Lokasi Laboratorium</label>
                        <select class="form-select" id="lab_id" name="lab_id" required>
                            <option value="">-- Pilih Laboratorium --</option>
                            <?php foreach($labs as $l): ?>
                                <option value="<?= $l['id'] ?>" <?= ($selectedLab == $l['id']) ? 'selected' : '' ?>>
                                    <?= $l['nama_lab'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="tahun" class="form-label fw-bold text-muted">Tahun Pengadaan</label>
                        <input type="number" class="form-control" id="tahun" name="tahun" value="<?= date('Y') ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="jumlah" class="form-label fw-bold text-muted">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="1" min="1" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="satuan" class="form-label fw-bold text-muted">Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan" value="Unit" placeholder="Unit/Set/Pcs">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="fungsi" class="form-label fw-bold text-muted">Fungsi Alat</label>
                    <textarea class="form-control" id="fungsi" name="fungsi" rows="2" placeholder="Jelaskan kegunaan alat ini..."></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="kondisi" class="form-label fw-bold text-muted">Kondisi</label>
                        <select class="form-select" id="kondisi" name="kondisi">
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Perbaikan">Perbaikan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="gambar" class="form-label fw-bold text-muted">Foto Alat</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImg()">
                        <div class="form-text text-danger">Format: jpg/png. Max: 2MB.</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label d-block fw-bold text-muted">Preview Foto</label>
                    <img src="/img/default.jpg" width="150" class="img-thumbnail rounded img-preview shadow-sm">
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="javascript:history.back()" class="btn btn-secondary px-4">
                        <i class="bi bi-arrow-left"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary px-4 shadow">
                        <i class="bi bi-save"></i> Simpan Inventaris
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function previewImg() {
        const gambar = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        // Pastikan ada file yang dipilih
        if (gambar.files && gambar.files[0]) {
            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    }
</script>

<?= $this->endSection(); ?>