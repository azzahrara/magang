<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <img src="<?= base_url('assets'); ?>/images/logo.png" style="position: absolute; width: 100px; height: auto;">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="color: #414D96; font-size:x-small">
                    KEMENTRIAN PERTANIAN<br>
                    BADAN PENELITIAN DAN PENGEMBANGAN PERTANIAN<br>
                    <b style="font-size:medium;">BALAI PENELITIAN AGROKLIMAT DAN HIDROLOGI</b><br>
                    Jl. Tentara Pelajar NO.1A, Kampus Penelitian Pertanian Cimanggu Bogor 1611<br>
                    Telepon (0251)8312760, Faksimili (0251)8323909<br>
                    WEBSITE http://balitklimat.litbang.pertanian.go.id E-MAIL balitklimat@litbang.pertanian.go.id<br>
                    <!-- SEKOLAH TINGGI ILMU KOMPUTER DAN INFORMATIKA
                    <br>MAKASSAR INDONESIA -->
                </span>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <table class="table-borderless mb-4" width="60%">
        <tr style="font-size: medium; font-weight:bold">
            <td colspan="3">
                DATA PESERTA MAGANG
            </td>
        </tr>
        <tr style="font-size: small;">
            <td width="22%">Periode</td>
            <td width="3%">:</td>
            <td width="80%"><?php
                            if ($tglawal == 'Seluruh Tanggal') { ?>
                    Seluruh Tanggal
                <?php } else { ?>
                    <?= $tglawal . ' - ' . $tglakhir ?>
                <?php } ?>
            </td>
        </tr>
        <tr style="font-size: small;">
            <td>Jenis Magang</td>
            <td>:</td>
            <td><?= $pdfjns ?></td>
        </tr>
        <tr style="font-size: small;">
            <td>Pembimbing Balai</td>
            <td>:</td>
            <td><?= $pdfpeg ?></td>
        </tr>
    </table>
    <!-- isi tabel -->
    <table class="table-bordered" width=100% cellpadding=4 cellspacing=2 style="margin-top: 5px;">
        <thead style="font-size: small;">
            <tr style="background-color: #414D96; text-align:center; color:white;">
                <th width="5%" style="text-align: center;">No.</th>
                <th width="28%">Nama</th>
                <th width="10%">Jenis Magang</th>
                <th width="15%">Asal Instansi</th>
                <th width="10%">Mulai</th>
                <th width="10%">Selesai</th>
                <th width="22%">Pembimbing</th>
            </tr>
        </thead>
        <tbody style="font-size: small;">
            <?php
            $no = 1;
            foreach ($detail as $pm) {
            ?>
                <tr>
                    <td><?= $no++ . '.' ?></td>
                    <td><?= $pm->nama_pm ?></td>
                    <td><?= $pm->jns_magang ?></td>
                    <td><?= $pm->asal_instansi_pm ?></td>
                    <td><?= $pm->tgl_mli_pm; ?></td>
                    <td><?= $pm->tgl_sls_pm; ?></td>
                    <td><?= $pm->nama_pegawai; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- untuk ttd -->
    <table class="mt-4" style="width: 100%;">
        <tr>
            <td align="right">
                <span style="font-size:small;">
                    Bogor, <?= mdate('%d %M %Y') ?>
                    <br>
                    <br>
                    <br>
                    Nama<br>
                    NIP
                    <!-- SEKOLAH TINGGI ILMU KOMPUTER DAN INFORMATIKA
                    <br>MAKASSAR INDONESIA -->
                </span>
            </td>
        </tr>
    </table>
</body>

</html>