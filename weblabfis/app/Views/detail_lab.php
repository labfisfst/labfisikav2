<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-success fw-bold">
            <i class="bi bi-box-seam"></i> <?= $lab['nama_lab'] ?>
        </h2>
        <a href="/" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Lab
        </a>
    </div>

    <div class="card shadow-sm">
        <form action="" method="get">
            <div class="card-header bg-success text-white py-3">
                <div class="row align-items-center">
                    
                    <div class="col-md-7 d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center gap-2">
                            <span>Show</span>
                            <select name="per_page" class="form-select form-select-sm text-center" 
                                    style="width: 70px; cursor: pointer;" onchange="this.form.submit()">
                                <option value="10" <?= ($perPage == 10) ? 'selected' : '' ?>>10</option>
                                <option value="25" <?= ($perPage == 25) ? 'selected' : '' ?>>25</option>
                                <option value="50" <?= ($perPage == 50) ? 'selected' : '' ?>>50</option>
                            </select>
                            <span>entries</span>
                        </div>
                        <div class="border-start border-white ps-3">
                            <?php if (session()->get('logged_in')) : ?>
                                <a href="/alat/tambah?lab_id=<?= $lab['id']; ?>" class="btn btn-sm btn-light text-success fw-bold">
                                    <i class="bi bi-plus-lg"></i> Tambah Alat
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-5 mt-2 mt-md-0">
                        <div class="input-group input-group-sm justify-content-md-end">
                            <input type="text" name="keyword" class="form-control" 
                                   placeholder="Cari alat di lab ini..." 
                                   value="<?= isset($keyword) ? $keyword : '' ?>">
                            <button class="btn btn-light text-success fw-bold" type="submit">
                                <i class="bi bi-search"></i> Cari
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </form>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center mb-0">
                    <thead class="table-light">
                        <tr>
                            <th rowspan="2" class="align-middle">No</th>
                            <th rowspan="2" class="align-middle">Nama Barang</th>
                            <th colspan="3">Identitas Barang</th>
                            <th colspan="2">Kuantitas</th>
                            <th colspan="2">Kondisi</th>
                            <th rowspan="2" class="align-middle">Foto</th>
                            <th rowspan="2" class="align-middle">Lihat</th>
                        </tr>
                        <tr>
                            <th>Merek</th>
                            <th>Kd Barang</th>
                            <th>Tahun</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Baik</th>
                            <th>Rusak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($alat)): ?>
                            <tr>
                                <td colspan="11" class="text-center py-4 text-muted">
                                    <i class="bi bi-info-circle display-6 d-block mb-2"></i>
                                    Belum ada data alat di laboratorium ini.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php $i = $nomor; ?>
                            <?php foreach($alat as $a): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td class="text-start fw-bold"><?= $a['nama_alat'] ?></td>
                                <td><?= $a['merek'] ?: '-' ?></td>
                                <td><small class="text-muted"><?= $a['kode_barang'] ?: '-' ?></small></td>
                                <td><?= $a['tahun'] ?></td>
                                <td><?= $a['jumlah'] ?></td>
                                <td><?= $a['satuan'] ?></td>
                                
                                <td class="text-success fw-bold"><?= ($a['kondisi'] == 'Baik') ? '✓' : '-' ?></td>
                                <td class="text-danger fw-bold"><?= ($a['kondisi'] == 'Rusak') ? '✓' : '-' ?></td>

                                <td>
                                    <img src="/img/<?= $a['gambar'] ? $a['gambar'] : 'default.jpg'; ?>" 
                                         alt="" width="60" class="rounded border shadow-sm">
                                </td>
                                <td>
                                    <a href="/alat/edit/<?= $a['id'] ?>" class="btn btn-sm btn-info text-white shadow-sm" title="Lihat Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer py-3">
            <div class="d-flex justify-content-between align-items-center flex-column flex-md-row">
                <div class="small text-muted mb-2 mb-md-0">
                    Showing <b><?= $start ?></b> to <b><?= $end ?></b> of <b><?= $total ?></b> entries
                </div>
                <div>
                    <?= $pager->links('alat', 'bootstrap_pagination') ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>