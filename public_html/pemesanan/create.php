<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>T-FRIS | Tambah Pemesanan</title>
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
                      <?php echo "--- " . $_SESSION['nama_akses'] . " ---"; ?>
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
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Pemesanan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../pemesanan/"><i class="fa fa-circle-o"></i> Jadwal Pemakaian</a></li>
                <li class="active"><a href="../pemesanan/create.php"><i class="fa fa-circle-o"></i> Tambah Pemesanan</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Member</span> <i class="fa fa-angle-left pull-right"></i>
                <ul class="treeview-menu">
                  <li><a href="../member/"><i class="fa fa-circle-o"></i> Daftar Member</a></li>
                  <li><a href="../member/create.php"><i class="fa fa-circle-o"></i> Tambah Member</a></li>
                </ul>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-wrench"></i> <span>Maintenance</span> <i class="fa fa-angle-left pull-right"></i>
                <ul class="treeview-menu">
                  <li><a href="../maintenance/"><i class="fa fa-circle-o"></i> Daftar Maintenance</a></li>
                  <li><a href="../maintenance/create.php"><i class="fa fa-circle-o"></i> Tambah Maintenance</a></li>
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
            Tambah Pemesanan
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="../pemesanan/"> Pemesanan</a></li>
            <li class="active"> Tambah Pemesanan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-primary">
            <form role="form" action="insertpemesanan.php" method="post">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                      <h3 class="box-title">Pemesanan</h3>
                      <div class="form-group">
                        <label for="tambahPemesananInputNama">Nama</label>
                        <input type="text" class="form-control" id="tambahPemesananInputNama" placeholder="Masukkan nama" name="nama" required>
                      </div>
                      <div class="form-group">
                        <label>Lapangan</label>
                        <select class="form-control" required name="lapangan">
                          <option>Lapangan A</option>
                          <option>Lapangan B</option>
                        </select>
                      </div>
                      <!-- Date and time range -->
                      <div class="form-group">
                        <label>Waktu Pemakaian</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                          <input type="text" class="form-control pull-left" id="usagetime" required name="usagetime">
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                      <div class="form-group">
                        <label for="tambahPemesananInputDurasi">Durasi</label>
                        <input type="text" class="form-control" id="tambahPemesananInputDurasi" value="1" required name="durasi">
                      </div>
                      <h3 class="box-title">Pembayaran</h3>
                      <div class="form-group">
                        <label for="harga">Jumlah bayar</label>
                        <input type="text" class="form-control" id="harga" value="0" name="harga">
                      </div>
                       <input id="num_pembayaran" name="num_pembayaran" type="hidden" value="0"/>
                       <input id="totalharga" name="totalharga" type="hidden" value="0"/>
                       <input id="timestamp" name="timestamp" type="hidden" value=""/>
                      <button type ="button" class="btn" onclick="tambahPembayaran()">Tambah Pembayaran</button><br><br>
                      <div id="tabelpembayaran"></div>
                      <table class="table table-bordered" >
                        <thead>
                          <tr>
                            <th>Nomor</th>
                            <th>Jumlah Bayar</th>
                            <th>Waktu Bayar</th>
                          </tr>
                        </thead>

                        <tbody id="tambah_table">
                        </tbody>
                      </table>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.box-body -->
              <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
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
    <script src="../plugins/dateformat/date.format.js"></script>
    <!-- Page script -->
    <script>
      $(function () {
        //Date range picker with time picker
        $('#usagetime').daterangepicker({singleDatePicker: true, timePicker: true, timePickerIncrement: 30, timePicker12Hour: false, format: 'YYYY-MM-DD HH:mm'});

        $("input[name='durasi']").TouchSpin({
                min: 1,
                max: 14,
                step: 1,
                postfix: "jam"
            });

         $("input[name='harga']").TouchSpin({
                min: 0,
                max: 1000000000,
                step: 500,
                prefix: "Rp"
            });
      });

      function tambahPembayaran() {
        $('#num_pembayaran').val( function(i, oldval) {
            return ++oldval;
        });

        var x = $('#num_pembayaran').val();

        $('#totalharga').val( function(i, oldval) {
            return oldval * 1 + $("#harga").val() * 1;
        });

        var totalharga = $('#totalharga').val();

        var trWrapper = $("<tr id=\"tambah_data_" + x + "\" />");

        var now = new Date();
        var currentTimestamp = now.format("yyyy-mm-dd HH:MM:ss");
        var inputHarga = "<input type=\"hidden\" name=\"harga_" + x + "\" value=\"" + $("#harga").val() + "\"/>";
        var inputTimestamp = "<input type=\"hidden\" name=\"timestamp_" + x + "\" value=\"" + currentTimestamp + "\"/>";

        var elmNo = "<td>" + x + "</td>";
        var elmHarga = "<td>" + $("#harga").val() + "</td>";
        var elmTimestamp = "<td>" + currentTimestamp + "</td>";

        trWrapper.append(elmNo);
        trWrapper.append(elmHarga);
        trWrapper.append(elmTimestamp);
        trWrapper.append(inputHarga);
        trWrapper.append(inputTimestamp);

        $("#tambah_table").append(trWrapper);
    }


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
    </script>
  </body>
</html>
