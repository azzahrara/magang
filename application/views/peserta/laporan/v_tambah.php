<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Tambah Laporan Mingguan</h3>
                        </div>
                        <?= form_open_multipart('peserta/laporan/tambah', 'class="mt-4"'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="form-group">
                            <label for="tgllap">Tanggal<i style="color:red">*</i></label>
                            <input type="date" class="form-control form-control-user" id="tgllap" name="tgllap" value="<?= set_value('tgllap'); ?>">
                            <?php echo form_error('tgllap', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="isilap">Isi Laporan<i style="color:red">*</i></label>
                            <textarea class="form-control" id="isilap" name="isilap" rows="13"><?= set_value('isilap'); ?></textarea>
                            <?php echo form_error('isilap', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="doklap">Dokumen</label>
                            <input type="file" class="form-control form-control-lg" id="doklap" name="doklap">
                            <?php echo form_error('doklap', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary float-right ml-2">Simpan</button>
                        <a href="<?php echo base_url(); ?>peserta/laporan" class="btn btn-light float-right">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>