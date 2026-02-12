<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4 mb-5">
    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white py-3">
            <h5 class="mb-0 fw-bold"><i class="bi bi-grid-3x3-gap me-2"></i>Jadwal Penggunaan Seluruh Alat</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover border" id="tabelJadwal">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Alat / Unit</th>
                            <th>Peminjam</th>
                            <th>Instansi</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th class="text-center">Status</th>
                            <?php if (session()->get('logged_in')) : ?>
                                <th class="text-center">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($jadwal as $j) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <span class="fw-bold d-block text-dark"><?= $j['nama_alat']; ?></span>
                                    <small class="badge bg-light text-dark border">Unit <?= $j['no_unit']; ?></small>
                                </td>
                                <td><span class="text-primary fw-bold"><?= $j['nama_peminjam']; ?></span></td>
                                <td><small><?= $j['instansi']; ?></small></td>
                                <td><?= date('d/m/y H:i', strtotime($j['tgl_mulai'])); ?></td>
                                <td><?= date('d/m/y H:i', strtotime($j['tgl_selesai'])); ?></td>
                                <td class="text-center">
                                    <?php 
                                        $sekarang = date('Y-m-d H:i:s');
                                        if ($sekarang < $j['tgl_mulai']) { echo '<span class="badge bg-info">Akan Datang</span>'; }
                                        elseif ($sekarang <= $j['tgl_selesai']) { echo '<span class="badge bg-warning text-dark">Sedang Berlangsung</span>'; }
                                        else { echo '<span class="badge bg-secondary">Selesai</span>'; }
                                    ?>
                                </td>
                                <?php if (session()->get('logged_in')) : ?>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $j['id']; ?>"><i class="bi bi-pencil"></i></button>
                                            <a href="/home/hapus_booking/<?= $j['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Hapus?')"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </td>
                                <?php endif; ?>
                            </tr>

                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <a href="javascript:history.back()" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>