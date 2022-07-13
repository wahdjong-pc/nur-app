<?php 
include '../koneksi/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Siswa</title>

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

  <!-- SweatAlert -->
  <link rel="stylesheet" href="../sweatalert/dist/sweetalert2.min.css">
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
    <a href="data-siswa.html" class="brand-link">
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
                <a href="data-siswa.php" class="nav-link active">
                  <p>Data Siswa</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="data-spp.php" class="nav-link">
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
            <h1 class="m-0">Data <b>Siswa</b></h1>
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
            <h3 class="card-title">Tambah Data Siswa</h3>
          </div>

          <form action="proses-siswa/proses_tambah.php" id="formUser" method="post">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
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
                      <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
  
                  <div class="form-group">
                    <label>Jenis Kelamin :</label>
  
                    <div class="form-group">
                      <select class="custom-select form-control-border" id="gender" name="gender">
                        <option value="" hidden>Pilih Jenis Kelamin</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
  
  
                  <div class="form-group">
                    <label>Tanggal Lahir :</label>
  
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                      </div>
                      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Alamat :</label>
  
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                      </div>
                      <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
  
                  <div class="form-group">
                    <label>Kelas :</label>
  
                    <div class="form-group">
                      <select class="custom-select form-control-border" id="kelas" name="kelas">
                        <option value="" hidden>Pilih Kelas</option>
                        <option value="1.A">1.A</option>
                        <option value="1.B">1.B</option>
                        <option value="1.C">1.C</option>
                        <option value="2.A">2.A</option>
                        <option value="2.B">2.B</option>
                        <option value="2.C">2.C</option>
                        <option value="3.A">3.A</option>
                        <option value="3.B">3.B</option>
                        <option value="3.C">3.C</option>
                        <option value="4.A">4.A</option>
                        <option value="4.B">4.B</option>
                        <option value="4.C">4.C</option>
                        <option value="5.A">5.A</option>
                        <option value="5.B">5.B</option>
                        <option value="5.C">5.C</option>
                        <option value="6.A">6.A</option>
                        <option value="6.B">6.B</option>
                        <option value="6.C">6.C</option>
                      </select>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
  
                  <div class="form-group">
                    <label>Semester :</label>
  
                    <div class="form-group">
                      <select class="custom-select form-control-border" id="semester" name="semester">
                        <option value="" hidden>Pilih Semester</option>
                        <option value="Semester 1">Semester 1</option>
                        <option value="Semester 2">Semester 2</option>
                      </select>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->

                  
                  <button type="submit" name="submit" class="btn btn-block btn-outline-primary">Tambah Data</button>
                </div>
              </div>
            </div>
          </form>
        </div>
         <!-- End Card -->
        <?php }else{
          $id_siswa = $_GET['id'];
             
          $query = $koneksi->query("SELECT * FROM tbl_siswa WHERE id_siswa = '$id_siswa'");

          foreach($query as $data_siswa) :
             
        ?>

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Data Siswa</h3>
          </div>

          <form action="proses-siswa/proses_edit.php" id="formUser" method="post">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                 <input type="text" hidden value="<?= $id_siswa; ?>" name="id_siswa">
                  <div class="form-group">
                    <label>Nis :</label>
  
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                      </div>
                      <input type="number" class="form-control" id="nis" name="nis" value="<?= $data_siswa['nis']; ?>" readonly>
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
                      <input type="text" class="form-control" id="nama" name="nama" value="<?= $data_siswa['nama']; ?>">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
  
                  <div class="form-group">
                    <label>Jenis Kelamin :</label>
  
                    <div class="form-group">
                      <select class="custom-select form-control-border" id="gender" name="gender" >
                        <option value="" hidden>Pilih Jenis Kelamin</option>
                        <?php if($data_siswa['jenis_kelamin'] == "Laki - Laki"){ ?>
                         <option value="Laki - Laki" selected>Laki - Laki</option>
                         <option value="Perempuan">Perempuan</option>

                        <?php }else{ ?>
                         <option value="Laki - Laki" >Laki - Laki</option>
                         <option value="Perempuan" selected>Perempuan</option>
                        <?php } ?>
                      </select>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
  
  
                  <div class="form-group">
                    <label>Tanggal Lahir :</label>
  
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                      </div>
                      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data_siswa['tgl_lahir']; ?>">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Alamat :</label>
  
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                      </div>
                      <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data_siswa['alamat']; ?>">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
  
                  <div class="form-group">
                    <label>Kelas :</label>
  
                    <div class="form-group">
                      <select class="custom-select form-control-border" id="kelas" name="kelas">
                        <option value="" hidden>Pilih Kelas</option>
                        <?php if($data_siswa['kelas'] == "1.A"){ ?>
                        <option value="1.A" selected>1.A</option>
                        <option value="1.B">1.B</option>
                        <option value="1.C">1.C</option>
                        <option value="2.A">2.A</option>
                        <option value="2.B">2.B</option>
                        <option value="2.C">2.C</option>
                        <option value="3.A">3.A</option>
                        <option value="3.B">3.B</option>
                        <option value="3.C">3.C</option>
                        <option value="4.A">4.A</option>
                        <option value="4.B">4.B</option>
                        <option value="4.C">4.C</option>
                        <option value="5.A">5.A</option>
                        <option value="5.B">5.B</option>
                        <option value="5.C">5.C</option>
                        <option value="6.A">6.A</option>
                        <option value="6.B">6.B</option>
                        <option value="6.C">6.C</option>

                        <?php } else if($data_siswa['kelas'] == "1.B"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B" selected>1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "1.C"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C" selected>1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>
                        
                         <?php } else if($data_siswa['kelas'] == "2.A"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A" selected>2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "2.B"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B" selected>2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "2.C"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C" selected>2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "3.A"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A" selected>3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "3.B"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B" selected>3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "3.C"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C" selected>3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "4.A"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A" selected>4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "4.B"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B" selected>4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "4.C"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C" selected>4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "5.A"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A" selected>5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "5.B"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B" selected>5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "5.C"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C" selected>5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "6.A"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A" selected>6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "6.B"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B" selected>6.B</option>
                         <option value="6.C">6.C</option>

                         <?php } else if($data_siswa['kelas'] == "6.C"){ ?>
                         <option value="1.A">1.A</option>
                         <option value="1.B">1.B</option>
                         <option value="1.C">1.C</option>
                         <option value="2.A">2.A</option>
                         <option value="2.B">2.B</option>
                         <option value="2.C">2.C</option>
                         <option value="3.A">3.A</option>
                         <option value="3.B">3.B</option>
                         <option value="3.C">3.C</option>
                         <option value="4.A">4.A</option>
                         <option value="4.B">4.B</option>
                         <option value="4.C">4.C</option>
                         <option value="5.A">5.A</option>
                         <option value="5.B">5.B</option>
                         <option value="5.C">5.C</option>
                         <option value="6.A">6.A</option>
                         <option value="6.B">6.B</option>
                         <option value="6.C" selected>6.C</option>
                         <?php } ?>
                      </select>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
  
                  <div class="form-group">
                    <label>Semester :</label>
  
                    <div class="form-group">
                      <select class="custom-select form-control-border" id="semester" name="semester">
                        <option value="" hidden>Pilih Semester</option>
                        <?php if($data_siswa['semester'] == "Semester 1"){ ?>
                         <option value="Semester 1" selected>Semester 1</option>
                         <option value="Semester 2">Semester 2</option>

                        <?php }else{ ?>
                         <option value="Semester 1">Semester 1</option>
                         <option value="Semester 2" selected>Semester 2</option>
                        <?php } ?>
                        
                      </select>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->

                  
                  <button type="submit" name="submit" class="btn btn-block btn-outline-primary">Edit Data</button>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </form>
        </div>
         <!-- End Card -->
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
                <h1 style="text-align: center; padding: 10px 0;"><b>Seluruh Data Siswa</b></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead style="background-color: #007bff28">
                  <tr>
                    <th style="width: 2%;">No.</th>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>JENIS KELAMIN</th>
                    <th>TANGGAL LAHIR</th>
                    <th>ALAMAT</th>
                    <th>KELAS</th>
                    <th>SEMESTER</th>
                    <th>STATUS SPP</th>
                    <th>STATUS ANGSURAN DAFTAR ULANG</th>
                    <th style="width: 15%;">AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $query = $koneksi->query("SELECT * FROM tbl_siswa");
                  
                  $no = 1;

                  while($data = $query->fetch_assoc()) :
                  
                  
                  
                  ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nis']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['jenis_kelamin']; ?></td>
                    <td><?= $data['tgl_lahir']; ?></td>
                    <td><?= $data['alamat']; ?></td>
                    <td><?= $data['kelas']; ?></td>
                    <td><?= $data['semester']; ?></td>
                    <td><?= $data['status_spp']; ?></td>
                    <td><?= $data['status_angsuran']; ?></td>
                    <td>
                      <a href="data-siswa.php?id=<?= $data['id_siswa']; ?>" class="btn btn-outline-primary btn-sm">Edit</a> 
                      <button onclick="hapus(<?= $data['id_siswa']; ?>)" class="btn btn-outline-danger btn-sm">Hapus</button>
                      <a href="#" type="button" class="btn btn-outline-dark btn-sm">Rekapitulasi</a>
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

<!-- SweetAlert -->
<script src="../sweatalert/dist/sweetalert2.all.min.js"></script>

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
      gender: {
        required: true,
      },
      tgl_lahir: {
        required: true,
      },
      alamat: {
        required: true,
      },
      kelas: {
        required: true,
      },
      semester: {
        required: true,
      }
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
      gender: {
        required: "Mohon dipilih jenis kelamin nya!",
      },
      tgl_lahir: {
        required: "Mohon dipilih tanggal lahir nya!",
      },
      alamat: {
        required: "Mohon diisi alamat nya!",
      },
      kelas: {
        required: "Mohon dipilih kelas nya!",
      },
      semester: {
        required: "Mohon dipilih semester nya!",
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

function hapus(id){
 Swal.fire({
  title: 'Apakah anda yakin menghapus data ini?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href='proses-siswa/proses_hapus.php?id='+id
  }
})
}

function isi_otomatis(){
                var nis = $("#nis").val();
                $.ajax({
                    type:"GET",
                    url: 'proses-siswa/getDataSiswa.php',
                    data:"nis="+nis ,
                    success: function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama').val(obj.nama);
                    $('#gender').val(obj.jk);
                    $('#tgl_lahir').val(obj.tgl_lahir);
                    $('#alamat').val(obj.alamat);
                    $('#kelas').val(obj.kelas);
                    $('#semester').val(obj.semester);
                }
                })
            }
</script>
</body>
</html>
