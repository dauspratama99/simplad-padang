<!DOCTYPE html>
<html>

<head>
    <title>Laporan Uang Keluar</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo.png">
    <style type="text/css">
        .head {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        .body {
            border-collapse: collapse;
            border: 1px;
            border-color: black;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        table tr td {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <center>
        <table class="head" width="625">
            <tr>
                <td><img src="<?= base_url(); ?>/assets/images/logo.png" width="90" height="90"></td>
                <td>
                    <center>
                        <font size="4">PEMERINTAHAN PROVINSI SUMATERA BARAT</font><br>
                        <font size="5"><b>DINAS PERKEBUNAN</b></font><br>
                        <font size="2">Alamat : Jalan Rasuna Said No. 77 Padang</font><br>
                        <font size="2"><i>Email : dinasperkebunan@gmail.com Kode Pos : 67116 Telp./Fax (0811) 232311</i></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <table width="625" class="head">
                <tr>
                    <td class="text2">Padang, <?= date("d M Y"); ?></td>
                </tr>
            </table>
        </table>
        <table class="head" style="margin-bottom: 20px;">
            <tr>
                <td>Laporan Data Uang Keluar</td>
            </tr>
            <tr>
                <td style="text-align: center;">Tahun : <?= $tahun; ?> </td>
            </tr>
        </table>
        <table border="1" class="body" width="625">
            <thead>
                <tr style="height: 25px;">
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>SPT</th>
                    <th>Pokok</th>
                    <th>Transportasi</th>
                    <th>Penginapan</th>
                    <th>Lain-lain</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                $total = 0;
                foreach ($uangkeluar as $row) : $no++ ?>
                    <tr style="height: 20px; text-align: center;">
                        <td> <?= $no; ?></td>
                        <td> <?= $row['keberangkatanTanggalMulai']; ?></td>
                        <td> <?= $row['pembiayaanSppd']; ?></td>
                        <td>Rp. <?= $row['pembiayaanPokok']; ?></td>
                        <td>Rp. <?= $row['pembiayaanTransportasi']; ?></td>
                        <td>Rp. <?= $row['pembiayaanPenginapan']; ?></td>
                        <td>Rp. <?= $row['pembiayaanLainLain']; ?></td>
                        <td>Rp. <?= $row['pembiayaanTotal']; ?></td>
                    </tr>
                <?php $total += $row['pembiayaanTotal'];
                endforeach; ?>
                <tr style="text-align: center;">
                    <td colspan="7">Total</td>
                    <td style="font-weight: bold;">Rp. <?= number_format($total, 2, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
    </center>
</body>

<script>
    window.print();
</script>

</html>