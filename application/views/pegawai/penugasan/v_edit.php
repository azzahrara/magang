<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Edit penugasan</h3>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <?= form_open_multipart('pegawai/penugasan/simpan', 'class="mt-4"'); ?>
                        <div class="form-group">
                            <div class="form-group">
                                <input type="hidden" name="id_tugas" value="<?= $detail->id_tugas; ?>">
                            </div>
                            <div class="form-group">
                                <label>Peserta<i style="color:red">*</i></label>
                                <select class="js-example-basic-single w-100" multiple="multiple" id='pm' name='pm[]'>
                                    <option value="" disabled> --Pilih Peserta--</option>
                                    <?php foreach ($detailtgs as $dtgs) {
                                        $datapeserta[] = $dtgs->id_pm;
                                    }
                                    ?>
                                    <?php foreach ($peserta as $pm) { ?>
                                        <option value="<?= $pm->id_pm; ?>" <?= in_array($pm->id_pm, $datapeserta) ? 'selected' : '' ?>><?= $pm->nama_pm; ?></option>';
                                    <?php } ?>
                                </select>
                                <?php echo form_error('pm', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tgltgs">Tanggal Pengumpulan<i style="color:red">*</i></label>
                                <input type="date" class="form-control form-control-user" id="tgltgs" name="tgltgs" value="<?= $detail->tgl_pengumpulan; ?>">
                                <?php echo form_error('tgltgs', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <label for="isitgs">Isi penugasan<i style="color:red">*</i></label>
                            <textarea class="form-control" id="isitgs" name="isitgs" rows="13"><?= $detail->isi_tugas; ?></textarea>
                            <?php echo form_error('isitgs', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="doktgs">Dokumen</label>
                            <div class="row">
                                <div class="col-3">
                                    <?php
                                    if ($detail->dok_tugas) { ?>
                                        <a class="btn btn-outline-info btn-sm btn-icon-text" href="<?= base_url() ?>assets/dokumen/tugas/<?= $detail->dok_tugas ?>" target="_blank">
                                            <i class="ti ti-file"></i> <?= $detail->dok_tugas; ?>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="col-9">
                                    <input type="file" class="form-control form-control-lg" id="doktgs" name="doktgs">
                                </div>
                            </div>
                            <?= form_error('doktgs', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary float-right ml-2">Simpan</button>
                        <a href="<?= base_url('pegawai/penugasan/detail/' . $detail->id_tugas) ?>" class="btn btn-light float-right">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>