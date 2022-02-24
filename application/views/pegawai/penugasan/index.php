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
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Penugasan</th>
                                                <th>Tanggal Pengumpulan</th>
                                                <!-- <th>Isi Tugas</th> -->
                                                <!-- <th>Dokumen</th> -->
                                                <th>Jumlah Peserta</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
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
                                                    <td><?= $dt->tgl_pengumpulan ?></td>
                                                    <!-- <td><?= $dt->isi_tugas; ?></td> -->
                                                    <!-- <td><?= $dt->dok_tugas; ?></td> -->
                                                    <td><?= $dt->jumlah_pm; ?></td>
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