<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Notifikasi</h3>
                            <div class="mt-3">
                                <a onclick="shownp()" class="btn btn-sm btn-info mb-3">Penugasan</a>
                                <a onclick="shownl()" class="btn btn-sm btn-primary mb-3">Laporan</a>
                                <div class="mt-3" name="np" id="np" style="display: block;">
                                    <?php
                                    foreach ($notiftgs as $nt) {
                                    ?>
                                        <div class="col-12 mb-2">
                                            <?php
                                            if ($nt->status_np == 'read') { ?>
                                                <a class="btn btn-block btn-outline-light btn-md text-left">Pembimbing menambahkan penugasan dengan ID Tugas: <?= $nt->id_tugas; ?></a>
                                            <?php } else { ?>
                                                <a class="btn btn-block btn-outline-info btn-md text-left" href="<?= base_url('peserta/notifikasi/penugasan/' . $nt->id_np) ?>">Pembimbing menambahkan penugasan dengan ID Tugas: <?= $nt->id_tugas; ?></a>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="mt-3" name="nl" id="nl" style="display: none;">
                                    <?php
                                    foreach ($notiflap as $nl) {
                                    ?>
                                        <div class="col-12 mb-2">
                                            <?php
                                            if ($nl->jenis == 'Review') { ?>
                                                <?php
                                                if ($nl->status_np == 'read') { ?>
                                                    <a class="btn btn-block btn-outline-light btn-md text-left">Pembimbing menambahkan review di Laporan: <?= $nl->id_lap_ming; ?></a>
                                                <?php } else { ?>
                                                    <a class="btn btn-block btn-outline-primary btn-md text-left" href="<?= base_url('peserta/notifikasi/laporan/' . $nl->id_np) ?>">Pembimbing menambahkan review di Laporan: <?= $nl->id_lap_ming; ?></a>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <?php
                                                if ($nl->status_np == 'read') { ?>
                                                    <a class="btn btn-block btn-outline-light btn-md text-left">Pembimbing merubah review di Laporan: <?= $nl->id_lap_ming; ?></a>
                                                <?php } else { ?>
                                                    <a class="btn btn-block btn-outline-primary btn-md text-left" href=" <?= base_url('peserta/notifikasi/laporan/' . $nl->id_np) ?>">Pembimbing menambahkan review di Laporan: <?= $nl->id_lap_ming; ?></a>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>