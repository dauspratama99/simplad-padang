<?php

namespace App\Controllers;

use App\Models\Pegawai;

class LaporanController extends BaseController
{
    public function index()
    {
        echo view('view_laporan');
    }

    public function pegawaiperbulan()
    {
        $bulan = $this->request->getPost('filterbulan');
        $tahun = date("Y");
        $db = \Config\Database::connect();
        $query = $db->query("SELECT detailsptKodeSpt, detailsptNip, sptKode,
        pegawaiNip, pegawaiNama, pegawaiJabatan, pegawaiGolongan, pegawaiAlamat, 
        keberangkatanSpt, keberangkatanTujuan, tujuanNamaTempat, sptTanggalKegiatan 
        FROM tb_spt JOIN tb_detail_spt ON sptKode = detailsptKodeSpt
        JOIN tb_keberangkatan ON keberangkatanSpt = sptKode
        JOIN tb_tujuan ON keberangkatanTujuan = tujuanId
        JOIN tb_pegawai ON pegawaiNip = detailsptNip 
        WHERE MONTH(sptTanggalKegiatan) = '$bulan' and YEAR(sptTanggalKegiatan) = '$tahun'
        GROUP BY detailsptNip");

        $data = [
            'pegawai' => $query->getResultArray(),
            'bulan' => $bulan,
            'tahun' => $tahun
        ];

        echo view('laporan/laporan_pegawai_perbulan', $data);
    }

    public function uangkeluar()
    {
        $tahun = $this->request->getPost('filteruangkeluar');
        $db = \Config\Database::connect();
        $query = $db->query("SELECT pembiayaanKode, pembiayaanKodeBerangkat, pembiayaanSppd, pembiayaanPokok, pembiayaanTransportasi, pembiayaanPenginapan,
        pembiayaanLainLain, pembiayaanTotal, keberangkatanKode, keberangkatanSpt, keberangkatanTanggalMulai FROM tb_pembiayaan
        JOIN tb_keberangkatan ON keberangkatanKode = pembiayaanKodeBerangkat WHERE YEAR(keberangkatanTanggalMulai) = '$tahun'");

        $data = [
            'uangkeluar' => $query->getResultArray(),
            'tahun' => $tahun
        ];

        echo view('laporan/laporan_uang_keluar', $data);
    }

    public function anggaran()
    {
        $anggarantersedia = $this->request->getPost('anggarantersedia');
        $tahun = $this->request->getPost('filteranggaran');
        $db = \Config\Database::connect();
        $query = $db->query("SELECT pembiayaanKodeBerangkat, keberangkatanKode,
        keberangkatanTanggalMulai, SUM(pembiayaanTotal) as total FROM tb_pembiayaan
        JOIN tb_keberangkatan ON pembiayaanKodeBerangkat = keberangkatanKode WHERE YEAR(keberangkatanTanggalMulai) = '$tahun'");

        $data = [
            'anggaran' => $query->getResultArray(),
            'tahun' => $tahun,
            'anggarantersedia' => $anggarantersedia
        ];

        echo view('laporan/laporan_anggaran', $data);
    }
}
