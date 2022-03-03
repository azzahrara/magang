<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Penugasan</h3>
                            <div class="mt-3">
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="mt-3">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="pes_penugasan">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <!-- <th>ID Penugasan</th> -->
                                                <th>Tanggal Pengumpulan</th>
                                                <th>Isi Tugas</th>
                                                <th class="no-sort">Dokumen</th>
                                                <th>Status</th>
                                                <th>Pengerjaan</th>
                                                <th class="no-sort">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($detail as $dt) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <!--<td><?= $dt->id_tugas ?></td>-->
                                                    <td><?= $dt->tgl_pengumpulan ?></td>
                                                    <td><?= word_limiter($dt->isi_tugas, 6); ?></td>
                                                    <td style="text-align: center;"><?php
                                                                                    if ($dt->dok_tugas) { ?>
                                                            <a class="" href="<?= base_url() ?>assets/dokumen/tugas/<?= $dt->dok_tugas ?>" target="_blank">
                                                                <i class="icon-file"></i>
                                                            </a>
                                                        <?php } ?>
                                                    </td>
                                                    <td> <?php
                                                            if ($dt->tgl_pengumpulan < date('Y-m-d')) { ?>
                                                            <a class="badge badge-danger">Selesai</a>
                                                        <?php } else { ?>
                                                            <a class="badge badge-warning">Berjalan</a>
                                                        <?php } ?>
                                                    </td>
                                                    <td> <?php
                                                            if ($dt->status == 'Berlangsung') { ?>
                                                            <a class="badge badge-warning">Berjalan</a>
                                                        <?php } else { ?>
                                                            <a class="badge badge-success">Dikirim</a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="<?= base_url('peserta/penugasan/detail/' . $dt->id_tugas) ?>"><i class="ti ti-eye"></i></a>
                                                        <!-- <a class="btn btn-sm btn-success"><i class="ti ti-pencil"></i></a> -->
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