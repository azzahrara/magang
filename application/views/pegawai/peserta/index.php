<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bold mb-10"><?= $sub; ?></h3>
                    <?php
                    if ($sub == 'Data Peserta Bimbingan') { ?>
                        <button type="button" class="btn btn-sm btn-primary float-right mb-2" data-toggle="modal" data-target="#exportpdf">
                            <i class="icon-file"></i> PDF
                        </button>
                    <?php } else { ?>
                        <button type="button" class="btn btn-sm btn-primary float-right mb-2" data-toggle="modal" data-target="#exportpdf2">
                            <i class="icon-file"></i> PDF
                        </button>
                    <?php } ?>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="mt-3">
                        <div class="table-responsive">
                            <table class="table table-hover" id="peg_pes">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Jenis Magang</th>
                                        <!-- <th>Asal Instansi</th> -->
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                        <?php
                                        if ($sub == 'Data Seluruh Peserta Magang') { ?>
                                            <th style="width: 15%;">Pembimbing</th>
                                        <?php } ?>
                                        <th>Status</th>
                                        <th class="no-sort">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($sub == 'Data Peserta Bimbingan') { ?>
                                        <?php
                                        $no = 1;
                                        foreach ($ps as $pm) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $pm->nama_pm ?></td>
                                                <td><?= $pm->jns_magang ?></td>
                                                <!-- <td><?= $pm->asal_instansi_pm ?></td> -->
                                                <td><?= $pm->tgl_mli_pm; ?></td>
                                                <td><?= $pm->tgl_sls_pm; ?></td>
                                                <td><?php
                                                    if ($pm->status_pm == 'berlangsung') { ?>
                                                        <a class="badge badge-success">Berlangsung</a>
                                                    <?php } else { ?>
                                                        <a class="badge badge-danger">Selesai</a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-info" href=" <?= base_url('pegawai/data_peserta/detail/' . $pm->id_pm) ?>"><i class="ti ti-eye"></i></a>
                                                    <!-- <a class="btn btn-sm btn-success"><i class="ti ti-pencil"></i></a> -->
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php
                                        $no = 1;
                                        foreach ($detail as $pm) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= character_limiter($pm->nama_pm, 8) ?></td>
                                                <td><?php
                                                    if ($pm->jns_magang == 'Mahasiswa') { ?>
                                                        Mhs
                                                    <?php } elseif ($pm->jns_magang == 'Siswa') { ?>
                                                        Siswa
                                                    <?php } else { ?>
                                                        Mandiri
                                                    <?php } ?></td>
                                                <!-- <td><?= $pm->asal_instansi_pm ?></td> -->
                                                <td><?= date("y-m-d", strtotime($pm->tgl_mli_pm)); ?></td>
                                                <td><?= date("y-m-d", strtotime($pm->tgl_sls_pm)); ?></td>
                                                <td><?= character_limiter($pm->nama_pegawai, 8); ?></td>
                                                <td><?php
                                                    if ($pm->status_pm == 'berlangsung') { ?>
                                                        <a class="badge badge-success">Brjln</a>
                                                    <?php } else { ?>
                                                        <a class="badge badge-danger">Sls</a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-info" href=" <?= base_url('pegawai/data_peserta/detail/' . $pm->id_pm) ?>"><i class="ti ti-eye"></i></a>
                                                    <!-- <a class="btn btn-sm btn-success"><i class="ti ti-pencil"></i></a> -->
                                                </td>
                                            </tr>
                                        <?php } ?>
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
<div class="modal fade" id="exportpdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form method="POST" action="<?= base_url('pegawai/data_peserta/export_pdf') ?>"> -->
                <?= form_open_multipart('pegawai/data_peserta/export_pdf') ?>
                <label>
                    <h6 class="font-weight-bold">Tanggal Mulai</h6>
                </label>
                <input type="date" class="form-control form-control-user mb-2" id="tglawal" name="tglawal" placeholder="Tanggal Awal">
                <label class="mt-2">
                    <h6 class="font-weight-bold">Tanggal Akhir</h6>
                </label>
                <input type="date" class="form-control form-control-user mb-3" id="tglakhir" name="tglakhir" placeholder="Tanggal Akhir">
                <select class="js-example-basic-single w-100 " id="pdfjns1" name="pdfjns1">
                    <option value="" selected disabled> --Pilih Jenis Magang-- </option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="Siswa">Siswa</option>
                    <option value="Mandiri">Mandiri</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Ekspor</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<div class="modal fade" id="exportpdf2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('pegawai/data_peserta/export_pdf2') ?>" target="_blank">
                    <!-- <?= form_open_multipart('pegawai/data_peserta/export_pdf2') ?> -->
                    <label>
                        <h6 class="font-weight-bold">Tanggal Mulai</h6>
                    </label>
                    <input type="date" class="form-control form-control-user mb-2" id="tglawal" name="tglawal" placeholder="Tanggal Awal">
                    <label class="mt-2">
                        <h6 class="font-weight-bold">Tanggal Akhir</h6>
                    </label>
                    <input type="date" class="form-control form-control-user mb-3" id="tglakhir" name="tglakhir" placeholder="Tanggal Akhir">
                    <!-- <div class="form-group col-12"> -->
                    <select class="js-example-basic-single w-100" id="pdfjns" name="pdfjns">
                        <option value="" selected disabled> --Pilih Jenis Magang-- </option>
                        <option value="Mahasiswa">Mahasiswa</option>
                        <option value="Siswa">Siswa</option>
                        <option value="Mandiri">Mandiri</option>
                    </select>
                    <!-- </div>
                <div class="form-group col-12"> -->
                    <select class="js-example-basic-single w-100" id="pdfpeg" name="pdfpeg">
                        <option value="" selected disabled> --Pilih Pembimbing--</option>
                        <?php foreach ($pegawai as $peg) { ?>
                            <option value="<?= $peg->nip; ?>"><?= $peg->nama_pegawai; ?></option>';
                        <?php } ?>
                    </select>
                    <!-- </form> -->
                    <!-- </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Ekspor</button>
            </div>
            </form>
            <!-- <?= form_close() ?> -->
        </div>
    </div>
</div>