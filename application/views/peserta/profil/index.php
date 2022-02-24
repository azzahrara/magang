<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Akun Peserta</h3>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <!-- <div class="col-md-12"> <a class="btn btn-sm btn-primary float-right"><i class="ti ti-pencil"></i>Edit</a></div> -->
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Email</p>
                                        <p><?= $user2['email_pm']; ?></p>
                                    </address>
                                </div>
                                <!-- <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Kata Sandi</p>
                                        <p><?= $user2['kata_sandi_pm']; ?></p>
                                    </address>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Profil Peserta</h3>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-md-12"> <a class="btn btn-sm btn-primary float-right" href="<?= base_url('peserta/profil/edit_profil/' . $user2['id_pm']) ?>"><i class="ti ti-pencil"></i>Edit</a></div>
                                <div class="col-md-12">
                                    <h3> <small class="text-muted">
                                            Biodata
                                        </small>
                                    </h3>
                                </div>
                                <div class="col-md-12">
                                    <address>
                                        <p class="font-weight-bold">ID Peserta</p>
                                        <p><?= $user2['id_pm']; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-12">
                                    <address>
                                        <p class="font-weight-bold">Nama Lengkap</p>
                                        <p><?= $user2['nama_pm']; ?></p>
                                    </address>
                                </div>
                                <!-- <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Jenis Kelamin</p>
                                        <p><?= $user2['jk_pm']; ?></p>
                                    </address>
                                </div> -->
                                <div class="col-md-12">
                                    <address>
                                        <p class="font-weight-bold">Nomor Whatsapp</p>
                                        <p><?= $user2['no_wa_pm']; ?></p>
                                    </address>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h3> <small class="text-muted">
                                            Jenis Magang <a class="badge badge-sm badge-info"><?= $user2['jns_magang']; ?></a>
                                        </small>
                                    </h3>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Asal Instansi</p>
                                        <p><?= $user2['asal_instansi_pm']; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Jurusan</p>
                                        <p><?= $user2['jurusan_pm']; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Pembimbing Instansi</p>
                                        <p><?= $peg->nama_pegawai; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Nomor Whatsapp Pembimbing Instansi</p>
                                        <p><?= $user2['no_wa_pi_pm']; ?></p>
                                    </address>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h3> <small class="text-muted">
                                            Detail Magang
                                        </small>
                                    </h3>
                                </div>
                                <div class="col-md-12">
                                    <address>
                                        <p class="font-weight-bold">Pembimbing Balai</p>
                                        <p><?= $user2['pembimbing_balai']; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Tanggal Mulai</p>
                                        <p><?= $user2['tgl_mli_pm']; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Tanggal Selesai</p>
                                        <p><?= $user2['tgl_sls_pm']; ?></p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Surat Pengajuan</p>
                                        <p><a class="btn btn-outline-info btn-sm btn-icon-text" href="<?= base_url() ?>assets/dokumen/surat/<?= $user2['s_pengajuan_pm']; ?>" target="_blank">
                                                <i class="ti ti-file"></i> <?= $user2['s_pengajuan_pm']; ?>
                                            </a></p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <p class="font-weight-bold">Surat Penerimaan</p>
                                        <p> <a class="btn btn-outline-info btn-sm btn-icon-text" href="<?= base_url() ?>assets/dokumen/surat/<?= $user2['s_penerimaan_pm']; ?>" target="_blank">
                                                <i class="ti ti-file"></i> <?= $user2['s_penerimaan_pm']; ?>
                                            </a>
                                            <!-- <?= $user2['s_penerimaan_pm']; ?></p> -->
                                    </address>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>peserta/laporan" class="btn btn-light float-right">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>