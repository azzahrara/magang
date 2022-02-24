<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Detail Laporan Mingguan</h3>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="mt-3 px-4 pt-10">
                            <button onclick="addrev()" class="btn btn-sm btn-primary float-right mb-3"><i class="ti ti-plus"></i> Review</button>
                            <div class="table-responsive">
                                <table class="table col-lg" style="width: 100%">
                                    <colgroup>
                                        <col span="1" style="width: 20%;">
                                        <col span="2" style="width: 80%;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <th>Tanggal</th>
                                            <td><?= $detail->tgl_lap_ming ?></td>
                                        </tr>
                                        <tr>
                                            <th>ID Laporan</th>
                                            <td><?= $detail->id_lap_ming ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Peserta</th>
                                            <td><?= $detail->nama_pm ?></td>
                                        </tr>
                                        <tr>
                                            <th>Isi Laporan</th>
                                            <td><?= $detail->isi_lap_ming ?></td>
                                        </tr>
                                        <tr>
                                            <th>Dok Lap</th>
                                            <td><?php
                                                if ($detail->dok_lap_ming) { ?>
                                                    <a class="btn btn-outline-info btn-sm btn-icon-text" href="<?= base_url() ?>assets/dokumen/lap_ming/<?= $detail->dok_lap_ming ?>" target="_blank">
                                                        <i class="ti ti-file"></i> <?= $detail->dok_lap_ming; ?>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="<?= base_url(); ?>pegawai/laporan" class="btn btn-light float-right">Kembali</a>
                    </div>
                </div>
                <div class="card" id="crev" name="crev" style="display: none;">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Tambah Review</h3>
                        </div>
                        <?= form_open_multipart('pegawai/laporan/review', 'class="mt-4"'); ?>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $detail->id_lap_ming; ?>">
                        </div>
                        <div class="form-group">
                            <label for="isirev">Review
                                <?php
                                if ($detail->status_rev == 'read') { ?>
                                    <a class="badge badge-succes">Dilihat</a>
                                <?php } elseif ($detail->status_rev == 'sent') { ?>
                                    <a class="badge badge-warning">Terkirim</a>
                                <?php } else { ?>
                                <?php } ?></label>
                            <textarea class="form-control" id="isirev" name="isirev" rows="13"><?= $detail->review_lap; ?></textarea>
                            <?= form_error('isitgs', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary float-right ml-2">Simpan</button>
                        <a href="<?= base_url('pegawai/laporan/hapus/' . $detail->id_lap_ming) ?>" class="btn btn-danger float-right">Hapus</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>