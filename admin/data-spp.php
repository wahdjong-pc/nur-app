<?php 
include '../koneksi/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data SPP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="data-spp.html" class="brand-link">
      <span class="brand-text font-weight-light">APP SPP & ANGSURAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a class="d-block"><b>Alexander Pierce</b></a>
          <a class="d-block">Jabatan</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="home.php" class="nav-link">
                  <p>Home</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="data-user.php" class="nav-link ">
                  <p>Data User</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="data-siswa.php" class="nav-link ">
                  <p>Data Siswa</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="data-spp.php" class="nav-link active">
                  <p>Data Pembayaran SPP</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="data-angsuran.php" class="nav-link">
                  <p>Data Angsuran</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data <b>Pembayaran SPP</b></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php if(empty($_GET)) { ?>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data Pembayaran SPP</h3>
          </div>
          <!-- /.card-header -->
          <?php

          // mengambil kode bayar dengan kode paling besar
          $query = $koneksi->query("SELECT max(kode_bayar) as kodeBayar FROM tbl_spp");

          $data_kode = mysqli_fetch_array($query);
          $kode_bayar = $data_kode['kodeBayar'];
          
          // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
          // dan diubah ke integer dengan (int)
          $urutan = (int) substr($kode_bayar, 8, 8);
          
          // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
          $urutan++;
          
          // membentuk kode barang baru
          // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
          // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
          // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
          $tgl = date("dny");
          $huruf = "T-". $tgl;
          
          $kode_bayar = $huruf . sprintf("%08s", $urutan);
          
          
          ?>
          <form action="proses-spp/proses_tambah.php" id="formUser" method="post">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Kode Pembayaran :</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" value="<?= $kode_bayar;?>" class="form-control" id="kodebayar" name="kodebayar" readonly>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Nis :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="number" class="form-control" id="nis" name="nis" onkeyup="isi_otomatis()">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Nama :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nama" name="nama" readonly>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Kelas :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" class="form-control" id="kelas" name="kelas" readonly>
                  </div>
                  <!-- /.input group -->
                  
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Semester :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" class="form-control" id="semester" name="semester" readonly>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>

              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Status SPP :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" class="form-control" id="status_spp" name="status_spp" readonly>
                  </div>
                  <!-- /.input group -->

                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Jumlah Bayar :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar">
                  </div>
                  <!-- /.input group -->

                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Tanggal Bayar :</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar">
                  </div>
                  <!-- /.input group -->
                  
                </div>
                <!-- /.input group -->


                <div class="form-group">
                  <label>Untuk Bulan :</label>

                  <div class="form-group">
                    <select class="custom-select form-control-border" id="bulan" name="bulan">
                      <option value="" hidden>Pilih Bulan</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">Septemer</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>
                    </select>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->


                <div class="form-group">
                  <label>Tahun :</label>

                  <div class="form-group">
                    <select class="custom-select form-control-border" id="tahun" name="tahun">
                      <option value="" hidden>Pilih Tahun</option>
                      <?php for ($x = 2022; $x <= 2100; $x++) {  ?>

                      <option value="<?= $x ?>"><?= $x; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- /.input group -->
                </div>
                
                <!-- /.form group -->
                <button type="submit" name="submit" class="btn btn-block btn-outline-primary">Tambah Data Pembayaran SPP</button>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </form>
        </div>
        <!-- /.card -->
        <?php }else{
          $kode_bayar = $_GET['kode-bayar'];
             
          $query = $koneksi->query("SELECT * FROM tbl_spp WHERE kode_bayar = '$kode_bayar'");

          foreach($query as $data_spp) :
             
        ?>

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Data Pembayaran SPP</h3>
          </div>
          <!-- /.card-header -->
          <form action="proses-spp/proses_edit.php" id="formUser" method="post">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Kode Pembayaran :</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" value="<?= $data_spp['kode_bayar'];?>" class="form-control" id="kodebayar" name="kodebayar" readonly>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Nis :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="number" class="form-control" id="nis" name="nis" value="<?= $data_spp['nis'] ?>" readonly>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Nama :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data_spp['nama'] ?>" readonly>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Kelas :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $data_spp['kelas'] ?>" readonly>
                  </div>
                  <!-- /.input group -->
                  
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Semester :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" class="form-control" id="semester" name="semester" value="<?= $data_spp['semester'] ?>" readonly>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>

              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Status SPP :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" class="form-control" id="status_spp" name="status_spp" value="<?= $data_spp['status_spp'] ?>" readonly>
                  </div>
                  <!-- /.input group -->

                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Jumlah Bayar :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" value="<?= $hasil_rupiah = number_format($data_spp['jumlah_bayar'],0,',','.'); ?>">
                  </div>
                  <!-- /.input group -->

                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Tanggal Bayar :</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" value="<?= $data_spp['tgl_bayar'] ?>">
                  </div>
                  <!-- /.input group -->
                  
                </div>
                <!-- /.input group -->


                <div class="form-group">
                  <label>Untuk Bulan :</label>

                  <div class="form-group">
                    <select class="custom-select form-control-border" id="bulan" name="bulan">
                     <?php if($data_spp['bulan'] == "Januari"){ ?>
                      <option value="" hidden>Pilih Bulan</option>
                      <option value="Januari" selected>Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">Septemer</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>

                     <?php } else if($data_spp['bulan'] == "Februari"){ ?>
                     <option value="" hidden>Pilih Bulan</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari" selected>Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">Septemer</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>

                     <?php } else if($data_spp['bulan'] == "Maret"){ ?>
                     <option value="" hidden>Pilih Bulan</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret" selected>Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">Septemer</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>

                      <?php } else if($data_spp['bulan'] == "April"){ ?>
                     <option value="" hidden>Pilih Bulan</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April" selected>April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">Septemer</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>

                      <?php } else if($data_spp['bulan'] == "Mei"){ ?>
                     <option value="" hidden>Pilih Bulan</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei" selected>Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">Septemer</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>

                      <?php } else if($data_spp['bulan'] == "Juni"){ ?>
                     <option value="" hidden>Pilih Bulan</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni" selected>Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">Septemer</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>

                      <?php } else if($data_spp['bulan'] == "Juli"){ ?>
                     <option value="" hidden>Pilih Bulan</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli" selected>Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">Septemer</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>

                      <?php } else if($data_spp['bulan'] == "Agustus"){ ?>
                     <option value="" hidden>Pilih Bulan</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus" selected>Agustus</option>
                      <option value="September">Septemer</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>

                      <?php } else if($data_spp['bulan'] == "September"){ ?>
                     <option value="" hidden>Pilih Bulan</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September" selected>Septemer</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>

                      <?php } else if($data_spp['bulan'] == "Oktober"){ ?>
                     <option value="" hidden>Pilih Bulan</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">Septemer</option>
                      <option value="Oktober" selected>Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>

                      <?php } else if($data_spp['bulan'] == "November"){ ?>
                     <option value="" hidden>Pilih Bulan</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">Septemer</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November" selected>November</option>
                      <option value="Desember">Desember</option>

                      <?php } else if($data_spp['bulan'] == "Desember"){ ?>
                     <option value="" hidden>Pilih Bulan</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">Septemer</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember" selected>Desember</option>
                     <?php } ?>
                    </select>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->


                <div class="form-group">
                  <label>Tahun :</label>

                  <div class="form-group">
                    <select class="custom-select form-control-border" id="tahun" name="tahun">
                     <?php for ($x = 2022; $x <= 2025; $x++) {  ?>

                      <?php if($x == $data_spp['tahun']) {  ?>
                      <option value="<?= $x ?>" selected><?= $x; ?></option>
                      <?php }else { ?>
                      <option value="<?= $x ?>"><?= $x; ?></option>
                      <?php } ?>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- /.input group -->
                </div>
                
                <!-- /.form group -->
                <button type="submit" name="submit" class="btn btn-block btn-outline-primary">Edit Data Pembayaran SPP</button>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <?php endforeach; ?>
        </form>
        </div>
        <!-- /.card -->
        <?php } ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h1 style="text-align: center; padding: 10px 0;"><b>Seluruh Data SPP</b></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="width: 2%;">No.</th>
                    <th>KODE PEMBAYARAN</th>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                    <th>SEMESTER</th>
                    <th>STATUS SPP</th>
                    <th>NOMINAL</th>
                    <th>TANGGAL BAYAR</th>
                    <th>BULAN</th>
                    <th>TAHUN</th>
                    <th>STATUS BAYAR</th>
                    <th>AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $query = $koneksi->query("SELECT * FROM tbl_spp");
                  
                  $no = 1;

                  while($data = $query->fetch_assoc()) :
                  ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td style="color: green;"><?= $data['kode_bayar'] ?></td>
                    <td><?= $data['nis'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['kelas'] ?></td>
                    <td><?= $data['semester'] ?></td>
                    <td><?= $data['status_spp'] ?></td>
                    <td style="color: blue;"><?= $hasil_rupiah = "Rp " . number_format($data['jumlah_bayar'],2,',','.'); ?>
                    </td>

                    <td><?= $data['tgl_bayar'] ?></td>
                    <td><?= $data['bulan'] ?></td>
                    <td><?= $data['tahun'] ?></td>
                    <td><?= $data['status_bayar'] ?></td>
                    <td style="width: 10%;">
                      <a href="data-spp.php?kode-bayar=<?= $data['kode_bayar'] ?>" class="btn btn-outline-primary btn-sm">Edit</a> 
                      <a href="#" class="btn btn-outline-danger btn-sm">Hapus</a>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; 2022  All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  $(function () {
  $('#formUser').validate({
    rules: {
      nis: {
        required: true,
        minlength: 7,
        maxlength: 7,
      },
      nama: {
        required: true,
      },
      kelas: {
        required: true,
      },
      semester: {
        required: true,
      },
      status_spp: {
        required: true,
      },
      jumlah_bayar: {
        required: true,
      },
      tgl_bayar: {
        required: true,
      },
      bulan: {
        required: true,
      },
      tahun: {
        required: true,
      },
      
    },
    messages: {
      nis: {
        required: "Mohon diisi nama nya!",
        minlength: "Minimal 7 angka",
        maxlength: "Maksimal 7 angka",
      },
      nama: {
        required: "Mohon diisi nama nya!",
      },
      kelas: {
        required: "Mohon dipilih kelas nya!",
      },
      semester: {
        required: "Mohon dipilih semester nya!",
      },
      status_spp: {
        required: "Mohon dipilih status nya!",
      },
      jumlah_bayar: {
        required: "Mohon diisi jumlah bayar nya!",
      },
      tgl_bayar: {
        required: "Mohon diisi tanggal bayar nya!",
      },
      bulan: {
        required: "Mohon dipilih bulan nya!",
      },
      tahun: {
        required: "Mohon dipilih tahun nya!",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

function isi_otomatis(){
                var nis = $("#nis").val();
                $.ajax({
                    type:"GET",
                    url: 'proses-spp/getDataNis.php',
                    data:"nis="+nis ,
                    success: function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama').val(obj.nama);
                    $('#kelas').val(obj.kelas);
                    $('#semester').val(obj.semester);
                    $('#status_spp').val(obj.status_spp);
                }
                })
            }


// Mengubah format rupiah
var rupiah = document.getElementById('jumlah_bayar');
        rupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat ketik nominal di form kolom input
            // gunakan fungsi formatRupiah() untuk mengubah nominal angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value);
        });
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa             = split[0].length % 3,
            rupiah             = split[0].substr(0, sisa),
            ribuan             = split[0].substr(sisa).match(/\d{3}/gi);
 
            // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
 
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }


 
</script>
</body>
</html>
