<?= $this->extend('layout/main'); ?>

<?= $this->section('menu'); ?>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="<?= base_url('/'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa fa-th-list"></i>
            <p>
                Master
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview ">
            <li class="nav-item">
                <a href="<?= base_url('pegawai'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pegawai</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('tujuan'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tujuan</p>
                </a>
            </li>
            <?php if (session()->get('userLevel') == 0) { ?>
                <li class="nav-item">
                    <a href="<?= base_url('user'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User</p>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('spt'); ?>" class="nav-link">
            <i class="nav-icon far fa fa-file"></i>
            <p>
                SPT
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('keberangkatan'); ?>" class="nav-link">
            <i class="nav-icon fa fa-plane"></i>
            <p>
                Keberangkatan
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('sppd'); ?>" class="nav-link">
            <i class="nav-icon far fa fa-file"></i>
            <p>
                SPPD
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('spj'); ?>" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
                SPJ
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('laporan'); ?>" class="nav-link active">
            <i class="nav-icon far fa fa-file"></i>
            <p>
                Laporan
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('profile'); ?>" class="nav-link">
            <i class="nav-icon far fa fa-user"></i>
            <p>
                Profile
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('logout'); ?>" class="nav-link">
            <i class="nav-icon fa fa-sign-out-alt"></i>
            <p>
                Logout
            </p>
        </a>
    </li>
</ul>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Laporan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <form action="<?= base_url('pegawaiperbulan'); ?>" method="POST">
                    <div class="card-header">
                        <h5>Laporan pegawai berangkat</h5>
                    </div>
                    <div class="card-body">
                        <label for="filterbulan">Pilih bulan</label>
                        <select name="filterbulan" id="filterbulan" class="form-control">
                            <option value="01">Januari <?= date("Y"); ?></option>
                            <option value="02">Februari <?= date("Y"); ?></option>
                            <option value="03">Maret <?= date("Y"); ?></option>
                            <option value="04">April <?= date("Y"); ?></option>
                            <option value="05">Mei <?= date("Y"); ?></option>
                            <option value="06">Juni <?= date("Y"); ?></option>
                            <option value="07">Juli <?= date("Y"); ?></option>
                            <option value="08">Agustus <?= date("Y"); ?></option>
                            <option value="09">September <?= date("Y"); ?></option>
                            <option value="10">Oktober <?= date("Y"); ?></option>
                            <option value="11">November <?= date("Y"); ?></option>
                            <option value="12">Desember <?= date("Y"); ?></option>
                        </select>
                    </div>
                    <div class="card-footer">
                        <button type="submit" target="__blank" onclick="pegawaiperbulan()" class="btn btn-primary float-right">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <form action="<?= base_url('uangkeluar'); ?>" method="POST">
                    <div class="card-header">
                        <h5>Laporan uang keluar</h5>
                    </div>
                    <div class="card-body">
                        <label for="filteruangkeluar">Input tahun</label>
                        <input type="text" required placeholder="Contoh : 2021" onkeypress="return hanyaAngka(event)" class="form-control mt-1" name="filteruangkeluar" id="filteruangkeluar">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="<?= base_url('anggaran'); ?>" method="POST">
                    <div class="card-header">
                        <h5>Laporan anggaran</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="filteranggaran">Input anggaran tersedia</label>
                                <input type="text" required placeholder="Contoh : 100000" onkeypress="return hanyaAngka(event)" class="form-control mt-1" name="anggarantersedia" id="anggarantersedia">
                            </div>
                            <div class="col-sm-6">
                                <label for="filteranggaran">Input tahun</label>
                                <input type="text" required placeholder="Contoh : 2021" onkeypress="return hanyaAngka(event)" class="form-control mt-1" name="filteranggaran" id="filteranggaran">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>

<?= $this->endSection(); ?>