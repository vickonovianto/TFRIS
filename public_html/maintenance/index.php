<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>T-FRIS | Daftar Maintenance</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link href="../src/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>T-FRIS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>T-FRIS</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <?php session_start(); if(isset($_SESSION['id_user'])) { ?>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                      <?php echo $_SESSION['username']; echo "<br>"; ?>
                      <?php echo "<small>" . $_SESSION['nama_akses'] . "</small>"; ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <button class="btn btn-danger btn-flat" onclick="signOut()">Sign out</button>
                    </div>
                  </li>
                </ul>
              </li>
              <?php } else { ?>
              <li>
                <a href="../login/">Sign In</a>
              </li>
              <?php } ?>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li>
              <a href="../index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Pemesanan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../pemesanan/"><i class="fa fa-circle-o"></i> Jadwal Pemakaian</a></li>
                <?php if (isset($_SESSION['kode_pemesanan']) && $_SESSION['kode_pemesanan'][0] == "1") { ?>
                    <li><a href="../pemesanan/create.php"><i class="fa fa-circle-o"></i> Tambah Pemesanan</a></li>
                <?php } ?>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Member</span> <i class="fa fa-angle-left pull-right"></i>
                <ul class="treeview-menu">
                  <li><a href="../member/"><i class="fa fa-circle-o"></i> Daftar Member</a></li>
                  <?php if (isset($_SESSION['kode_member']) && $_SESSION['kode_member'][0] == "1") {
                    echo "<li><a href\"../member/create.php\"><i class=\"fa fa-circle-o\"></i> Tambah Member</a></li>";
                  } ?>
                </ul>
              </a>
            </li>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-wrench"></i> <span>Maintenance</span> <i class="fa fa-angle-left pull-right"></i>
                <ul class="treeview-menu">
                  <li  class="active"><a href="#"><i class="fa fa-circle-o"></i> Daftar Maintenance</a></li>
                  <?php if (isset($_SESSION['kode_maintenance']) && $_SESSION['kode_maintenance'][0] == "1") {
                    echo "<li><a href=\"../maintenance/create.php\"><i class=\"fa fa-circle-o\"></i> Tambah Maintenance</a></li>";
                  } ?>
                </ul>
              </a>
            </li>
            <li class="treeview">
              <a href="../statistik/">
                <i class="fa fa-bar-chart"></i>
                <span>Statistik</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Maintenance
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="../maintenance/"> Maintenance</a></li>
            <li class="active"> Daftar Maintenance</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-danger">
            <div class="box-body">
            <?php
              $con=mysqli_connect("localhost","root","","tfris");
              // Check connection
              if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }

              $result = mysqli_query($con,"SELECT * FROM maintenance");

              echo "<table id=\"tablemaintenance\" class=\"table table-bordered table-striped\">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Deskripsi</th>
                  <th>Jumlah Bayar</th>
                  <th>Waktu Pembayaran</th>";
                  if (isset($_SESSION['kode_maintenance']) && $_SESSION['kode_maintenance'][2] == "1") {
                    echo "<th class=\"text-center\">Edit</th>";
                  }
                  if (isset($_SESSION['kode_maintenance']) && $_SESSION['kode_maintenance'][3] == "1") {
                    echo "<th class=\"text-center\">Delete</th>";
                  }
                echo "</tr></thead>";

              echo "<tbody>";

              $i = 0;

              while($row = mysqli_fetch_array($result))
              {
              echo "<tr>";
              $i = $i + 1;
              echo "<td>" . $i . "</td>";
              echo "<td>" . $row['deskripsi'] . "</td>";
              echo "<td>" . "Rp. " . number_format($row['jumlah_bayar'], 0, ',', '.') . "</td>";
              $date=date_create($row['waktu_bayar']);
              $waktu_bayar = date_format($date, "Y-m-d H:i");
              echo "<td>" . $waktu_bayar . "</td>";
              if (isset($_SESSION['kode_maintenance']) && $_SESSION['kode_maintenance'][2] == "1") {
                echo "<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Edit\"><button class=\"btn btn-primary btn-xs center-block edit\" id=\"" . $row['id_maintenance'] . "\" data-title=\"Edit\" data-toggle=\"modal\" data-target=\"#edit\"><span class=\"glyphicon glyphicon-pencil\"></span></button></p></td>";                
              }
              if (isset($_SESSION['kode_maintenance']) && $_SESSION['kode_maintenance'][3] == "1") {
                echo "<td><p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\"><button class=\"btn btn-danger btn-xs center-block delete\" id=\"" . $row['id_maintenance'] . "\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"#delete\"><span class=\"glyphicon glyphicon-trash\"></span></button></p></td>";
              }


              echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";

              mysqli_close($con);
            ?>
              <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" id="edit-close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Maintenance</h4>
                  </div>
                  <div class="modal-body" id="edit-body">
                    
                  </div>
                  <div class="modal-footer ">
                    <button type="button" id="updatebtn" class="btn btn-primary btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                  </div>
                </div>
                <!-- /.modal-content --> 
              </div>
              <!-- /.modal-dialog --> 
            </div>
                
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete Maintenance</h4>
                  </div>
                  <div class="modal-body">
                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp Apakah Anda yakin akan menghapus maintenance ini?</div>
                  </div>
                  <div class="modal-footer ">
                    <button type="button" class="btn btn-success" id="delete_yes"><span class="glyphicon glyphicon-ok-sign"></span> Ya</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Tidak</button>
                  </div>
                </div>
                <!-- /.modal-content --> 
              </div>
              <!-- /.modal-dialog --> 
            </div>
            </div>
              <div class="box-footer">
                <?php if (isset($_SESSION['kode_maintenance']) && $_SESSION['kode_maintenance'][0] == "1") {
                  echo "<button type=\"button\" class=\"btn btn-success pull-right\" onclick=\"location.href='../maintenance/create.php';\">Tambah Maintenance</button>";
                } ?>
              </div>
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../src/jquery.bootstrap-touchspin.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Page script -->
    <script>
       function signOut() {   
        $.ajax({
          url: '../login/logout.php',
          type: 'GET',
          async: false,
          success: function(response) {
            location.reload();
          }
        })
      }

       $(function() {
        $("button.delete").click(function(event) {
          maintenance_id = this.id;
        });  

        $("button.edit").click(function(event) {
          maintenance_id = this.id;
          $.ajax({
            url: 'loadeditdata.php?id=' + maintenance_id,
            type: 'GET',
            async: false,
            success: function(response) {
              $("#edit-body").append(response);

               $("input[name='harga']").TouchSpin({
                  min: 0,
                  max: 1000000000,
                  step: 500,
                  prefix: "Rp"
                });    
            }
          })
        });     

        $("#delete_yes").click(function(event) {
          $.ajax({
            url: 'delete.php?id=' + maintenance_id,
            type: 'GET',
            async: false,
            success: function(response) {
              location.reload();
            }
          })
        });

         $("#edit-close").click(function(event) {
          $("#edit-body").empty();
        });  

         $("#updatebtn").click(function(event)  {
          var editdata = { "id" : maintenance_id, "deskripsi" : $("textarea").val(), "jumlah_bayar" : $("input[name='harga']").val() }
          //window.alert(maintenance_id);
          $.ajax({
            url: 'update.php',
            type: 'POST',
            data: editdata,
            async: false,
            success: function(response) {
              location.reload();
            }
          })
        });

         $('#tablemaintenance').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });

      });
    </script>
  </body>
</html>
