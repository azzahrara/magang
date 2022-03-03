<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10"><?= $sub; ?></h3>
                            <div class="mt-3">
                                <div class="mt-3">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="peg_laporan">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Peserta</th>
                                                    <th class="no-sort">Isi Laporan</th>
                                                    <!-- <th>Dokumen</th> -->
                                                    <th class="no-sort">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($sub == 'Laporan Mingguan Peserta Bimbingan') { ?>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($detail as $d) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $d->tgl_lap_ming ?></td>
                                                            <td><?= $d->nama_pm ?></td>
                                                            <td><?= character_limiter($d->isi_lap_ming, 20) ?></td>
                                                            <!-- <td><?= character_limiter($d->dok_lap_ming, 12); ?></td> -->
                                                            <td>
                                                                <a class="btn btn-sm btn-info" href="<?= base_url('pegawai/laporan/detail/' . $d->id_lap_ming) ?>"><i class="ti ti-eye"></i></a>
                                                                <!-- <a class="btn btn-sm btn-success"><i class="ti ti-pencil"></i></a> -->
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($details as $d) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $d->tgl_lap_ming ?></td>
                                                            <td><?= $d->nama_pm ?></td>
                                                            <td><?= character_limiter($d->isi_lap_ming, 20) ?></td>
                                                            <!-- <td><?= character_limiter($d->dok_lap_ming, 12); ?></td> -->
                                                            <td> <?php
                                                                    if ($d->pembimbing_balai != $nip) { ?>
                                                                    <a class="btn btn-sm btn-primary" href="<?= base_url('pegawai/laporan/det_lap/' . $d->id_lap_ming) ?>"><i class="ti ti-eye"></i></a>
                                                                    <!-- <a class="btn btn-sm btn-success"><i class="ti ti-pencil"></i></a> -->
                                                                <?php } else { ?>
                                                                    <a class="btn btn-sm btn-info" href="<?= base_url('pegawai/laporan/detail/' . $d->id_lap_ming) ?>"><i class="ti ti-eye"></i></a>
                                                                <?php } ?>
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