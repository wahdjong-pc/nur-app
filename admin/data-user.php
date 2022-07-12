<?php 
include '../koneksi/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data User</title>

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
    <a href="data-user.html" class="brand-link">
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
                <a href="data-user.php" class="nav-link active">
                  <p>Data User</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="data-siswa.php" class="nav-link">
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
            <h1 class="m-0">Data <b>User</b></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-4">
           <?php if(empty($_GET)) { ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah data user</h3>
              </div>

              <form action="proses-user/proses_tambah.php" id="formUser" method="post">
              <div class="card-body">

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
                  <label>Jabatan :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" class="form-control" id="jabatan" name="jabatan">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Username :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" class="form-control" id="username" name="username">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Password :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <button type="submit" class="btn btn-block btn-outline-primary" name="submit">Tambah Data</button>
              </div>
              <!-- /.card-body -->
            </form>
            </div>
            <!-- /.card -->
            <?php }else{

             $id_user = $_GET['id'];
             
             $query = $koneksi->query("SELECT * FROM tbl_user WHERE id_user = '$id_user'");

             foreach($query as $data_user) :
             
            ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit data user</h3>
              </div>

              <form action="proses-user/proses_edit.php" id="formUser" method="post">
              <div class="card-body">
              <input type="text" hidden value="<?= $id_user; ?>" name="id_user">
                <div class="form-group">
                  <label>Nama :</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" value="<?= $data_user['nama']; ?>" class="form-control" id="nama" name="nama">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Jabatan :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" value="<?= $data_user['jabatan']; ?>" class="form-control" id="jabatan" name="jabatan">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Username :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="text" value="<?= $data_user['username']; ?>" class="form-control" id="username" name="username">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Password :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-dot-circle"></i></span>
                    </div>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <button type="submit" class="btn btn-block btn-outline-primary" name="submit">Edit Data</button>
              </div>
              <!-- /.card-body -->
              <?php endforeach; ?>
            </form>
            </div>
            <!-- /.card -->






            <?php }?>
          </div>
        </div>
        <!-- /.row -->

        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h1 style="text-align: center; padding: 10px 0;"><b>Seluruh Data User</b></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="width: 2%;">No.</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $query = $koneksi->query("SELECT * FROM tbl_user");
                  
                  $no = 1;

                  while($data = $query->fetch_assoc()) :
                  
                  
                  
                  ?>
                  <tr>
                    <td><?= $no++;?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['jabatan']; ?></td>
                    <td><?= $data['username']; ?></td>
                    <td><?= $data['password']; ?></td>
                    <td>
                      <a href="data-user.php?id=<?= $data['id_user']; ?>" class="btn btn-outline-primary btn-sm">Edit</a> 
                      <button onclick="hapus(<?= $data['id_user']; ?>)" class="btn btn-outline-danger btn-sm">Hapus</button>
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
      nama: {
        required: true,
      },
      jabatan: {
        required: true,
      },
      username: {
        required: true,
      },
      password: {
        required: true,
        minlength: 4
      },
    },
    messages: {
      nama: {
        required: "Mohon diisi nama nya!",
      },
      jabatan: {
        required: "Mohon diisi jabatan nya!",
      },
      username: {
        required: "Mohon diisi username nya!",
      },
      password: {
        required: "Mohon diisi password nya!",
        minlength: "minimal 4 karakter"
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
    window.location.href='proses-user/proses_hapus.php?id='+id
  }
})
}


</script>
</body>
</html>
