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
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th class="text-center">Status</th>
                            <?php if (session()->get('logged_in')) : ?>
                                <th class="text-center">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($jadwal)) : ?>
                            <tr>
                                <td colspan="<?= session()->get('logged_in') ? '7' : '6' ?>" class="text-center py-5 text-muted">
                                    Belum ada jadwal penggunaan.
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
                                            $sekarang = date('Y-m-d H:i:s');
                                            $mulai    = $j['tgl_mulai'];
                                            $selesai  = $j['tgl_selesai'];

                                            if ($sekarang < $mulai) {
                                                $status_teks = "Akan Datang";
                                                $warna_badge = "info text-white";
                                            } elseif ($sekarang >= $mulai && $sekarang <= $selesai) {
                                                $status_teks = "Sedang Berlangsung";
                                                $warna_badge = "warning text-dark";
                                            } else {
                                                $status_teks = "Selesai";
                                                $warna_badge = "secondary";
                                            }
                                        ?>
                                        <span class="badge bg-<?= $warna_badge; ?> px-3">
                                            <?= $status_teks; ?>
                                        </span>
                                    </td>
                                    
                                    <?php if (session()->get('logged_in')) : ?>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <a href="/home/hapus_booking/<?= $j['id']; ?>" 
                                                class="btn btn-outline-danger" 
                                                onclick="return confirm('Hapus jadwal ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    <?php endif; ?>
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