<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white py-4 text-center" style="border-bottom: 5px solid #14522d;">
                    <h3 class="mb-1 fw-bold">FORM PENGGUNAAN ALAT</h3>
                    <p class="mb-0 opacity-75">Laboratorium Fisika - Fakultas Sains dan Teknologi</p>
                </div>

                <div class="card-body p-4">
                    <div class="alert alert-light border d-flex align-items-center mb-4 shadow-sm">
                        <img src="/img/<?= $alat['gambar']; ?>" class="rounded border me-3" width="80" height="80" style="object-fit: cover;">
                        <div>
                            <small class="text-muted d-block">Anda akan meminjam:</small>
                            <h5 class="fw-bold text-dark mb-0"><?= $alat['nama_alat']; ?></h5>
                            <span class="badge bg-secondary"><?= $alat['merek']; ?></span>
                        </div>
                    </div>

                    <form action="/home/simpan_booking" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="alat_id" value="<?= $alat['id']; ?>">
                        <div class="mb-4">
                            <label class="form-label fw-bold text-success"><i class="bi bi-hash me-2"></i>Pilih Unit</label>
                            <select name="no_unit" class="form-select" required>
                                <?php for($i = 1; $i <= $alat['jumlah']; $i++): ?>
                                    <option value="<?= $i; ?>">Unit <?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <small class="text-muted">Tersedia <?= $alat['jumlah']; ?> unit untuk alat ini.</small>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-success"><i class="bi bi-person-badge me-2"></i>Identitas Peminjam</label>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <input type="text" name="nama_peminjam" class="form-control" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="identitas" class="form-control" placeholder="NIM / NIP / NIDN" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" name="kontak_wa" class="form-control" placeholder="Nomor WhatsApp (Aktif)" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="instansi" class="form-control" placeholder="Asal Instansi / Jurusan" required>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="mb-4">    
                            <label class="form-label fw-bold text-success"><i class="bi bi-info-circle me-2"></i>Detail Penggunaan</label>
                            <textarea name="keperluan" class="form-control mb-3" rows="3" placeholder="Apa tujuan penggunaan alat ini? (Sebutkan judul penelitian jika ada)" required></textarea>
                            <input type="text" name="dosen_pembimbing" class="form-control" placeholder="Dosen Pembimbing (Tulis '-' jika tidak ada)">
                        </div>
                        <hr>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-success"><i class="bi bi-calendar-event me-2"></i>Rencana Waktu Penggunaan</label>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <small class="text-muted fw-bold">Tanggal & Jam Mulai</small>
                                    <input type="datetime-local" name="tgl_mulai" class="form-control" step="60" required>
                                </div>
                                <div class="col-md-6">
                                    <small class="text-muted fw-bold">Tanggal & Jam Selesai</small>
                                    <input type="datetime-local" name="tgl_selesai" class="form-control" step="60" required>
                                </div>
                            </div>
                            <div class="form-text mt-2 text-info">
                                <i class="bi bi-info-circle"></i> Pastikan memilih jam sesuai jadwal operasional laboratorium.
                            </div>
                        </div>

                        <div class="d-flex justify-content-between pt-3">
                            <a href="javascript:history.back()" class="btn btn-outline-secondary px-4">Kembali</a>
                            <button type="submit" class="btn btn-success px-5 shadow fw-bold">Kirim Permohonan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>