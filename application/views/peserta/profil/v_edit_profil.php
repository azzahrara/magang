<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3 class="font-weight-bold mb-10">Edit Profil</h3>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <?= form_open_multipart('peserta/profil/simpanedit', 'class="mt-4 row g-3"'); ?>
                        <div class="form-group">
                            <input type="hidden" name="id_pm" value="<?= $detail->id_pm ?>">
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">
                                <h6 class="font-weight-bold">Nama Lengkap </h6>
                            </label>
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $detail->nama_pm ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-12">
                            <label>
                                <h6 class="font-weight-bold">Nomor Whatsapp </h6>
                            </label>
                            <input type="int" class="form-control form-control-user" id="nowa" name="nowa" value="<?= $detail->no_wa_pm ?>">
                            <?= form_error('nowa', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group col-12">
                            <label>
                                <h6 class="font-weight-bold">Jenis Magang </h6>
                            </label>
                            <select class="js-example-basic-single w-100" id="jenis" name="jenis">
                                <option value="" selected disabled> --Pilih Jenis-- </option>
                                <option <?= $detail->jns_magang == "Mahasiswa" ? 'selected' : ''; ?> value="Mahasiswa">Mahasiswa</option>
                                <option <?= $detail->jns_magang == "Siswa" ? 'selected' : ''; ?> value="Siswa">Siswa</option>
                                <option <?= $detail->jns_magang == "Mandiri" ? 'selected' : ''; ?> value="Mandiri">Mandiri</option>
                            </select>
                            <?= form_error('jenis', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                <h6 class="font-weight-bold">Asal Instansi/Universitas/Sekolah </h6>
                            </label>
                            <input type="text" class="form-control form-control-user" id="asalinstansi" name="asalinstansi" value="<?= $detail->asal_instansi_pm ?>">
                            <?= form_error('asalinstansi', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                <h6 class="font-weight-bold">Jurusan </h6>
                            </label>
                            <input type="text" class="form-control form-control-user" id="jurusan" name="jurusan" value="<?= $detail->jurusan_pm ?>">
                            <?= form_error('jurusan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                <h6 class="font-weight-bold">Pembimbing Instansi/Universitas/Sekolah </h6>
                            </label>
                            <input type="text" class="form-control form-control-user" id="pi" name="pi" value="<?= $detail->asal_instansi_pm ?>">
                            <?= form_error('pi', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                <h6 class="font-weight-bold">Nomor Whatsapp Pembimbing Instansi/Universitas/Sekolah </h6>
                            </label>
                            <input type="int" class="form-control form-control-user" id="nowapi" name="nowapi" value="<?= $detail->no_wa_pi_pm ?>">
                            <?= form_error('nowapi', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                <h6 class="font-weight-bold">Tanggal Mulai </h6>
                            </label>
                            <input type="date" class="form-control form-control-user" id="tglmli" name="tglmli" value="<?= $detail->tgl_mli_pm ?>">
                            <?= form_error('tglmli', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                <h6 class="font-weight-bold">Tanggal Selesai </h6>
                            </label>
                            <input type="date" class="form-control form-control-user" id="tglsls" name="tglsls" value="<?= $detail->tgl_sls_pm ?>">
                            <?= form_error('tglsls', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                <h6 class="font-weight-bold">Surat Pengajuan </h6>
                            </label>
                            <div class="row">
                                <div class="col-1 mr-1">
                                    <a class="btn btn-outline-info btn-sm btn-icon-text" href="<?= base_url() ?>assets/dokumen/surat/<?= $detail->s_pengajuan_pm ?>" target="_blank">
                                        <i class="ti ti-file"></i>
                                    </a>
                                </div>
                                <div class="col-lg">
                                    <input type="file" class="form-control form-control-lg" id="pengajuan" name="pengajuan">
                                </div>
                            </div>
                            <?= form_error('pengajuan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                <h6 class="font-weight-bold">Surat Penerimaan </h6>
                            </label>
                            <div class="row">
                                <div class="col-1 mr-1">
                                    <a class="btn btn-outline-info btn-sm btn-icon-text" href="<?= base_url() ?>assets/dokumen/surat/<?= $detail->s_penerimaan_pm ?>" target="_blank">
                                        <i class="ti ti-file"></i>
                                    </a>
                                </div>
                                <div class="col-lg">
                                    <input type="file" class="form-control form-control-lg" id="penerimaan" name="penerimaan">
                                </div>
                            </div>
                            <?= form_error('penerimaan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">
                                <h6 class="font-weight-bold">Pembimbing Balitklimat </h6>
                            </label>
                            <select class="js-example-basic-single w-100" id="pb" name="pb">
                                <option value="" selected disabled> --Pilih Pembimbing--</option>
                                <?php foreach ($pegawai as $peg) : ?>
                                    <option <?= $detail->pembimbing_balai == $peg->nip ? 'selected' : ''; ?> value="<?= $peg->nip ?>"><?= $peg->nama_pegawai ?></option>
                                <?php endforeach; ?>
                                <!-- <?php foreach ($pegawai as $peg) { ?>
                                    <option value="<?= $peg->nip; ?>"><?= $peg->nama_pegawai; ?></option>';
                                <?php } ?> -->
                            </select>
                            <?= form_error('pb', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                            <a href="<?= base_url(); ?>peserta/profil" class="btn btn-light">Kembali</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>