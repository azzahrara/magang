<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Laporan Akhir</h3>
                            <?= form_open_multipart('peserta/laporan/tambah', 'class="mt-4"'); ?>
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control form-control-user" id="judul" name="judul" value="<?= set_value('nama'); ?>">
                            <?php echo form_error('judul', '<small class="text-danger">', '</small>'); ?>
                            <div class="form-group">
                                <label for="abstrak">Abstrak</label>
                                <textarea class="form-control" id="isilap" name="isilap" rows="13"><?= set_value('isilap'); ?></textarea>
                                <?php echo form_error('abstrak', '<small class="text-danger">', '</small>'); ?>
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
    </div>
</div>