<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Penugasan</h3>
                            <div class="mt-3">
                                <a href="<?= base_url() ?>pegawai/penugasan/tambah" class="btn btn-primary btn-sm btn-icon-text mb-2">
                                    <i class="ti ti-plus"></i>
                                    Tambah penugasan
                                </a>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="mt-3">
                                <div class="table-responsive">
                                    <table class="table table-hover wrap" id="peg_penugasan">
                                        <thead>
                                            <tr>
                                                <th class="col-md-1">No.</th>
                                                <th class="col-md-1">ID Penugasan</th>
                                                <th class="col-md-7 no-sort">Isi Tugas</th>
                                                <th class="col-md-1">Tanggal Pengumpulan</th>
                                                <!-- <th>Dokumen</th> -->
                                                <!-- <th class="col-1">Jumlah Peserta</th> -->
                                                <th class="col-md-1">Status</th>
                                                <th class="col-md-1 no-sort">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($detail as $dt) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $dt->id_tugas ?></td>
                                                    <td><?= word_limiter($dt->isi_tugas, 6); ?></td>
                                                    <td><?= $dt->tgl_pengumpulan ?></td>
                                                    <!-- <td><?= $dt->dok_tugas; ?></td> -->
                                                    <!-- <td><?= $dt->jumlah_pm; ?></td> -->
                                                    <td> <?php
                                                            if ($dt->tgl_pengumpulan < date('Y-m-d')) { ?>
                                                            <a class="badge badge-danger">Selesai</a>
                                                        <?php } else { ?>
                                                            <a class="badge badge-warning">Berjalan</a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="<?= base_url('pegawai/penugasan/detail/' . $dt->id_tugas) ?>"><i class="ti ti-eye"></i></a>
                                                        <!-- <a class="btn btn-sm btn-success"><i class="ti ti-pencil"></i></a> -->
                                                        <a onclick="return confirm('Yakin hapus data ini?')" class="btn btn-sm btn-danger" href="<?= base_url('pegawai/penugasan/hapus/' . $dt->id_tugas) ?>"><i class="ti ti-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>