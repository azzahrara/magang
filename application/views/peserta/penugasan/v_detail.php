<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Detail Penugasan</h3>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="mt-3 px-4 pt-10">
                            <div>
                                <?php
                                if ($detail->tgl_pengumpulan < date('Y-m-d')) { ?>
                                <?php } else { ?>
                                    <?php
                                    if ($detail->status == 'Berlangsung') { ?> <a href=" <?= base_url('peserta/penugasan/tambah/' . $detail->id_det_tugas) ?>" class="btn btn-sm btn-primary float-right mb-3"><i class="ti ti-plus"></i> Kerjakan</a>
                                    <?php } else { ?> <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="table-responsive mb-4">
                                <table class="table col-lg" style="width: 100%">
                                    <colgroup>
                                        <col span="1" style="width: 20%;">
                                        <col span="2" style="width: 80%;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <th>ID Penugasan</th>
                                            <td><?= $detail->id_tugas ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Pengumpulan</th>
                                            <td><?= $detail->tgl_pengumpulan ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <th>Isi Tugas</th>
                                            <td><?= $detail->isi_tugas ?></td>
                                        </tr> -->
                                        <tr>
                                            <th>Dokumen</th>
                                            <td><?php
                                                if ($detail->dok_tugas) { ?>
                                                    <a class="btn btn-outline-info btn-sm btn-icon-text" href="<?= base_url() ?>assets/dokumen/tugas/<?= $detail->dok_tugas ?>" target="_blank">
                                                        <i class="ti ti-file"></i> <?= $detail->dok_tugas; ?>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h4 class="font-weight-bold mt-3">Isi Penugasan</h4>
                            <p><?= $detail->isi_tugas ?></p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Hasil Penugasan</h3>
                        </div>
                        <div class="mt-3 px-4 pt-10">
                            <div>
                                <?php
                                if ($detail->tgl_pengumpulan < date('Y-m-d')) { ?>
                                <?php } else { ?>
                                    <?php
                                    if ($detail->status == 'Berlangsung') { ?>
                                    <?php } else { ?>
                                        <a href=" <?= base_url('peserta/penugasan/tambah/' . $detail->id_det_tugas) ?>" class="btn btn-sm btn-info float-right mb-3"><i class="ti ti-pencil"></i> Edit</a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="table-responsive mb-4">
                                <table class="table col-lg" style="width: 100%">
                                    <colgroup>
                                        <col span="1" style="width: 20%;">
                                        <col span="2" style="width: 80%;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <th>ID Detail Penugasan</th>
                                            <td><?= $detail->id_det_tugas ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Peserta</th>
                                            <td><?= $user2['nama_pm'] ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <th>Hasil Tugas</th>
                                            <td><?= $detail->hasil_tugas ?></td>
                                        </tr> -->
                                        <tr>
                                            <th>Dokumen</th>
                                            <td><?php
                                                if ($detail->dok_hasil_tugas) { ?>
                                                    <a class="btn btn-outline-info btn-sm btn-icon-text" href="<?= base_url() ?>assets/dokumen/hasil_tugas/<?= $detail->dok_hasil_tugas ?>" target="_blank">
                                                        <i class="ti ti-file"></i> <?= $detail->dok_hasil_tugas; ?>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h4 class="font-weight-bold mt-3">Hasil Tugas</h4>
                            <p><?= $detail->hasil_tugas ?></p>
                        </div>
                        <a href="<?= base_url(); ?>peserta/penugasan" class="btn btn-light float-right">Kembali</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>