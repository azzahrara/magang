<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Detail Peserta Bimbingan</h3>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3> <small class="text-muted">
                                            Biodata
                                        </small>
                                    </h3>
                                </div>
                                <div class="col-md-12">
                                    <address>
                                        <p class="font-weight-bold">ID Peserta</p>
                                        <p><?= $detail->id_pm; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-12">
                                    <address>
                                        <p class="font-weight-bold">Nama Lengkap</p>
                                        <p><?= $detail->nama_pm; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-12">
                                    <address>
                                        <p class="font-weight-bold">Nomor Whatsapp</p>
                                        <p><?= $detail->no_wa_pm; ?></p>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3> <small class="text-muted">
                                            Jenis Magang <a class="badge badge-sm badge-info"><?= $detail->jns_magang; ?></a>
                                        </small>
                                    </h3>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Asal Instansi</p>
                                        <p><?= $detail->asal_instansi_pm; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Jurusan</p>
                                        <p><?= $detail->jurusan_pm; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Pembimbing Instansi</p>
                                        <p><?= $detail->pi_pm; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Nomor Whatsapp Pembimbing Instansi</p>
                                        <p><?= $detail->no_wa_pi_pm; ?></p>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3> <small class="text-muted">
                                            Detail Magang
                                        </small>
                                    </h3>
                                </div>
                                <div class="col-md-12">
                                    <address>
                                        <p class="font-weight-bold">Pembimbing Balai</p>
                                        <p><?= $detail->pembimbing_balai; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Tanggal Mulai</p>
                                        <p><?= $detail->tgl_mli_pm; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Tanggal Selesai</p>
                                        <p><?= $detail->tgl_sls_pm; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Surat Pengajuan</p>
                                        <p>
                                            <a class="btn btn-outline-info btn-sm btn-icon-text" href="<?= base_url() ?>assets/dokumen/surat/<?= $detail->s_pengajuan_pm; ?>" target="_blank">
                                                <i class="ti ti-file"></i> <?= $detail->s_pengajuan_pm; ?>
                                            </a>
                                        </p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Surat Penerimaan</p>
                                        <p>
                                            <a class="btn btn-outline-info btn-sm btn-icon-text" href="<?= base_url() ?>assets/dokumen/surat/<?= $detail->s_penerimaan_pm; ?>" target="_blank">
                                                <i class="ti ti-file"></i> <?= $detail->s_penerimaan_pm; ?>
                                            </a>
                                        </p>
                                    </address>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>pegawai/data_peserta" class="btn btn-light float-right">Kembali</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Laporan Mingguan</h3><a onclick="showlap()" class="btn btn-sm btn-info float-right mb-3">Lihat</a>
                            <div class="mt-3" name="tlap" id="tlap" style="display: none;">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal</th>
                                                <th>Isi</th>
                                                <th>Dokumen</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($lap as $lm) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $lm->tgl_lap_ming ?></td>
                                                    <td><?php echo $lm->isi_lap_ming ?></td>
                                                    <td><?php echo $lm->dok_lap_ming; ?></td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info"><i class="ti ti-eye"></i></a>
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