<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4 mb-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-info text-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-range me-2"></i>Jadwal Penggunaan Alat</h5>
            <a href="<?= base_url('home/booking/' . $alat['id']); ?>" class="btn btn-light btn-sm fw-bold shadow-sm px-3">
                <i class="bi bi-plus-circle"></i> Booking Alat Ini
            </a>
        </div>

        <div class="card-body p-4">
            <div class="row mb-4 align-items-center bg-light p-3 rounded border">
                <div class="col-md-2 text-center">
                    <img src="/img/<?= $alat['gambar']; ?>" class="img-thumbnail shadow-sm" style="max-height: 120px;">
                </div>
                <div class="col-md-10">
                    <h4 class="fw-bold text-dark mb-1"><?= $alat['nama_alat']; ?></h4>
                    <p class="text-muted mb-0"><?= $alat['merek']; ?> | <?= $alat['kode_barang']; ?></p>
                    <span class="badge bg-<?= $alat['kondisi'] == 'Baik' ? 'success' : 'danger' ?> mt-2">Kondisi: <?= $alat['kondisi'] ?></span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover border">
                    <thead class="table-dark">
                        <tr>
                            <th width="50">No</th>
                            <th>Nama Peminjam</th>
                            <th>Instansi</th>
                            <th>Mulai Penggunaan</th>
                            <th>Selesai Penggunaan</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($jadwal)) : ?>
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-calendar-x d-block fs-1 mb-2"></i>
                                    Belum ada jadwal penggunaan untuk alat ini.
                                </td>
                            </tr>
                        <?php else : ?>
                            <?php $no = 1; foreach ($jadwal as $j) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><span class="fw-bold text-primary"><?= $j['nama_peminjam']; ?></span></td>
                                    <td><?= $j['instansi']; ?></td>
                                    <td><?= date('d M Y, H:i', strtotime($j['tgl_mulai'])); ?></td>
                                    <td><?= date('d M Y, H:i', strtotime($j['tgl_selesai'])); ?></td>
                                    <td class="text-center">
                                        <?php 
                                        $badge = [
                                            'Pending' => 'warning text-dark',
                                            'Disetujui' => 'success',
                                            'Ditolak' => 'danger',
                                            'Selesai' => 'secondary'
                                        ];
                                        ?>
                                        <span class="badge bg-<?= $badge[$j['status']] ?? 'primary'; ?>">
                                            <?= $j['status']; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                <a href="javascript:history.back()" class="btn btn-secondary px-4">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>