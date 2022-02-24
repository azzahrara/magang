<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Detail Laporan Mingguan</h3>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="mt-3 px-4 pt-10">
                            <a class="btn btn-sm btn-info float-right mb-3" href="<?= base_url('peserta/laporan/edit/' . $detail->id_lap_ming) ?>"><i class="ti ti-pencil"></i>Edit</a>
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
                                            <th>Isi Laporan</th>
                                            <td><?= $detail->isi_lap_ming ?></td>
                                        </tr>
                                        <tr>
                                            <th>Dokumen</th>
                                            <td>
                                                <?php
                                                if ($detail->dok_lap_ming) { ?>
                                                    <a class="btn btn-outline-info btn-sm btn-icon-text" href="<?= base_url() ?>assets/dokumen/lap_ming/<?= $detail->dok_lap_ming ?>" target="_blank">
                                                        <i class="ti ti-file"></i> <?= $detail->dok_lap_ming; ?>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                        if ($detail->review_lap) { ?>
                                            <tr>
                                                <th>
                                                    <p class="text-primary">Review</p>
                                                </th>
                                                <td><?= $detail->review_lap ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="<?= base_url(); ?>peserta/laporan" class="btn btn-light float-right">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>