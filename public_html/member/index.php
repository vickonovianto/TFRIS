<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>T-FRIS | Daftar Member</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link href="../src/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" media="all">

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
        <a href="../index.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>T-FRIS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>T-FRIS</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
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
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="../index.html">
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
                <li><a href="../pemesanan/create.html"><i class="fa fa-circle-o"></i> Tambah Pemesanan</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dollar"></i> <span>Pembayaran</span> <i class="fa fa-angle-left pull-right"></i>
                <ul class="treeview-menu">
                  <li><a href="../pembayaran/"><i class="fa fa-circle-o"></i> Daftar Pembayaran</a></li>
                  <li><a href="../pembayaran/create.html"><i class="fa fa-circle-o"></i> Tambah Pembayaran</a></li>
                </ul>
              </a>
            </li>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-users"></i> <span>Member</span> <i class="fa fa-angle-left pull-right"></i>
                <ul class="treeview-menu">
                  <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Daftar Member</a></li>
                  <li><a href="../member/create.html"><i class="fa fa-circle-o"></i> Tambah Member</a></li>
                </ul>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-wrench"></i> <span>Maintenance</span> <i class="fa fa-angle-left pull-right"></i>
                <ul class="treeview-menu">
                  <li><a href="../maintenance/"><i class="fa fa-circle-o"></i> Daftar Maintenance</a></li>
                  <li><a href="../maintenance/create.html"><i class="fa fa-circle-o"></i> Tambah Maintenance</a></li>
                </ul>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
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
            Daftar Member
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="../member/"> Member</a></li>
            <li class="active"> Daftar Member</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-primary">
            <?php
              $con=mysqli_connect("localhost","root","","tfris");
              // Check connection
              if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }

              $result = mysqli_query($con,"SELECT * FROM member");

              echo "<table class=\"table\">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
                  <th>Nomor HP</th>
                  <th>Lapangan</th>
                  <th>Hari Main</th>
                  <th>Jam Main</th>
                  <th>Durasi Main</th>
                  <th>Tanggal Mulai Main</th>
                  <th>Waktu Pendaftaran</th>
                </tr>
              </thead>";

              echo "<tbody>";

              $i = 0;

              while($row = mysqli_fetch_array($result))
              {
              echo "<tr>";
              $i = $i + 1;
              echo "<td>" . $i . "</td>";
              echo "<td>" . $row['nama'] . "</td>";
              echo "<td>" . $row['no_hp'] . "</td>";
              echo "<td>" . $row['id_lapangan'] . "</td>";
              echo "<td>" . $row['hari_main'] . "</td>";
              echo "<td>" . $row['jam_main'] . "</td>";
              echo "<td>" . $row['durasi_main'] . "</td>";
              echo "<td>" . $row['tanggal_mulai'] . "</td>";
              echo "<td>" . $row['waktu_daftar'] . "</td>";
              echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";

              mysqli_close($con);
            ?>
              </div><!-- /.box-body -->
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
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../src/jquery.bootstrap-touchspin.js"></script>
     <!-- bootstrap time picker -->
    <script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- Page script -->
    <script>
      $(function () {
        //Date range picker with time picker
        $('#activetime').daterangepicker({singleDatePicker: true, format: 'YYYY-MM-DD'});

        $("input[name='durasi']").TouchSpin({
                min: 1,
                max: 14,
                step: 1,
                postfix: "jam"
            });
      });

       //Timepicker
       $(".timepicker").timepicker({
          showInputs: false, 
          showMeridian: false,
          minuteStep: 30
      });
    </script>
  </body>
</html>
