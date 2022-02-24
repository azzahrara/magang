<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Laporan Mingguan</h3>
                            <div class="mt-3">
                                <div class="mt-3">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>ID Tugas</th>
                                                    <th>Peserta</th>
                                                    <th>Dokumen</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($detail as $d) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $d->nama_pm ?></td>
                                                        <td><?= $d->id_lap_ming ?></td>
                                                        <td><?= $d->tgl_lap_ming ?></td>
                                                        <td><?= $d->dok_lap_ming; ?></td>
                                                        <td>
                                                            <a class="btn btn-sm btn-info" href="<?= base_url('pegawai/laporan/detail/' . $d->id_lap_ming) ?>"><i class="ti ti-eye"></i></a>
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
    </div>