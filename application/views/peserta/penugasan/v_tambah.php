<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Tambah Hasil penugasan</h3>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <?= form_open_multipart('peserta/penugasan/simpan', 'class="mt-4"'); ?>
                        <div class="form-group">
                            <input type="hidden" name="id_det_tugas" value="<?= $detail->id_det_tugas; ?>">
                        </div>
                        <div class="form-group">
                            <label for="isitgs">Isi Hasil Penugasan<i style="color:red">*</i></label>
                            <textarea class="form-control" id="isitgs" name="isitgs" rows="13"><?= $detail->hasil_tugas; ?></textarea>
                            <?= form_error('isitgs', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="doktgs">Dokumen</label>
                            <div class="row">
                                <div class="col-2">
                                    <?php
                                    if ($detail->dok_hasil_tugas) { ?>
                                        <a class="btn btn-outline-info btn-sm btn-icon-text" href="<?= base_url() ?>assets/dokumen/lap_ming/<?= $detail->dok_hasil_tugas ?>" target="_blank">
                                            <i class="ti ti-file"></i> <?= $detail->dok_hasil_tugas; ?>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="col-10">
                                    <input type="file" class="form-control form-control-lg" id="doktgs" name="doktgs">
                                </div>
                            </div>
                            <?= form_error('doktgs', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary float-right ml-2">Simpan</button>
                        <a href="<?= base_url('peserta/penugasan/detail/' . $detail->id_tugas) ?>" class="btn btn-light float-right">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>