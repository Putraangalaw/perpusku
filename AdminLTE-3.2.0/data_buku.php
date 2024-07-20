<?php
require('controller/islogin.php');
require('db/database.php');

$db = new Database();

$db->query('SELECT * FROM admins');
$hasil = $db->get();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scaled">
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font; Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href=".plugins/datatables-bs4/css/dataTables.bootsrap4.min.css">
    <link rel="stylesheet" href=".plugins/datatables-responsive/css/responsive.bootsrap4.min.css">
    <link rel="stylesheet" href=".plugins/datatables-buttons/css/buttons.bootsrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


    <?php
    require('template/header.php');
    ?>

    <?php
    require('template/siderbar.php');
    ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
       <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Data Admin</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Data Buku</li>
           </ol>
          </div>
        </div>
       </div><!-- /. container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Buku</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>NO Induk</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tahun</th>
                        <th>Penerbit</th>
                        <th>Subjek</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($hasil as $row) {
                        ?>
                            <tr>
                                <td>
                                    <img style="width: 100px; height: auto;" src="<?= 'data:image/jpeg;base64,' . $row['photo'] ?>" alt=" ">
                                </td>
                                <td><?= $row('no_induk') ?></td>
                                <td><?= $row('judul') ?></td>
                                <td><?= $row('penulis') ?></td>
                                <td><?= $row('tahun') ?></td>
                                <td><?= $row('penerbit') ?></td>
                                <td><?= $row('subjek') ?></td>
                                <td>

                                <div class="btn-group">
                                  <button type="button" class="btn btn-info btn-x5">
                                    <a class="text-light" href="input_buku.php?no=<?php echo $row('no_induk') ?>">
                                    Edit
                                    </a>
                                   </button>

                                   <button type="button" class="btn btn-danger btn-xs">
                                    <a class="text-light" href="controller/delete_buku.php?no=<?php echo $row['no_induk'] ?>">
                                     Hapus
                                    </a>
                                   </button>

                                  </div>
                                 </td>
                                </tr>
                               <?php
                               }
                               ?>
                               </tbody>
                              </table>
                            </div >
                              <!-- /.card-body -->
                             </div>
                              <!-- /.card -->
                            </div>
                              <!-- /.col -->
                            </div>
                              <!-- /.row -->
                              </div>
                             <!-- /.container-fluid -->
                            </section>
                            <!-- /.content -->
                            </div>
                            <!-- /.content-wrapper -->

                          <?php>
                          require('template/footer.php');
                          ?>

                          <!-- Control Sidebar -->
                          <aside class="control-sidebar control-sidebar-dark">
                            <!-- Control sidebar content goes here -->
                          </aside>
                            <!-- /.content-wrapper -->
                          </div>
                          <!-- /.wrapper -->

                          <!-- jQuery -->
                          <script src="plugins/jquery.min.js"></script>
                          <!-- Bootsrap 4 -->
                          <script src="plugins/bootstrap/js/bootstrap.bunle.min.js"></script>
                          <!-- DataTables & plugins -->
                          <script src="plugins/datatables/jquery.dataTables.min.js"></script>
                          <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
                          <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
                          <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
                          <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
                          <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
                          <script src="plugins/jszip/jszip.min.js"></script>
                          <script src="plugins/pdfmake/pdfmake.min.js"></script>
                          <script src="plugins/pdfmake/vfs_fonts.js"></script>
                          <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
                          <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
                          <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
                          <!-- AdminLTE App -->
                          <script src="dist/js/adminlte.min.js"></script>
                          <!-- AdminLTE for demo purpose -->
                          <script src="dist/js/adminlte.min.js"></script>
                          <!-- AdminLTE for demo purpose -->
                          <script src="dist/js/demo.js"></script>
                          <!-- Page specific script -->
                          <script>
                            $(function() {
                              $("#example1").DataTables({
                                "responsive": true,
                                "lengthChange": false,
                                "autoWidth": false,
                                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                              }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                              $('#example2').DataTable({
                                "paging": true,
                                "lengthChange": false,
                                "searching": false,
                                "ordering": true,
                                "info": true,
                                "autoWidth": false,
                                "responsive":true,
                              });
                            });
                            </script>
                            </body>

                            </html>