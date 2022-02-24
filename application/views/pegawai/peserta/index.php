<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Data Peserta Bimbingan</h3>
                            <div class="mt-3">
                                <div class="mt-3">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Magang</th>
                                                    <th>Mulai</th>
                                                    <th>Selesai</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($ps as $pm) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $pm->nama_pm ?></td>
                                                        <td><?= $pm->jns_magang ?></td>
                                                        <td><?= $pm->tgl_mli_pm; ?></td>
                                                        <td><?= $pm->tgl_sls_pm; ?></td>
                                                        <td><?= $pm->status_pm; ?></td>
                                                        <td>
                                                            <a class="btn btn-sm btn-info" href=" <?= base_url('pegawai/data_peserta/detail/' . $pm->id_pm) ?>"><i class="ti ti-eye"></i></a>
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