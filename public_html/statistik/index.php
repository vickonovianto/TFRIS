<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>T-FRIS | Statistik</title>
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
            <li class="treeview">
              <a href="#">
                <i class="fa fa-wrench"></i> <span>Maintenance</span> <i class="fa fa-angle-left pull-right"></i>
                <ul class="treeview-menu">
                  <li><a href="../maintenance/"><i class="fa fa-circle-o"></i> Daftar Maintenance</a></li>
                 <?php if (isset($_SESSION['kode_maintenance']) && $_SESSION['kode_maintenance'][0] == "1") {
                    echo "<li><a href=\"../maintenance/create.php\"><i class=\"fa fa-circle-o\"></i> Tambah Maintenance</a></li>";
                  } ?>
                </ul>
              </a>
            </li>
            <li class="treeview active">
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
            Statistik
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Statistik</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <!-- BAR CHART -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Statistik Keuangan Tahun : &nbsp</h3> 

                        <select id="tahun" required name="tahun" onChange="getData(this.options[this.selectedIndex].value)">
                        </select>
                      
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:230px"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <div class="legendChart">
                <button class="btn btn-default margin">Pengeluaran</button>
                <button class="btn btn-success margin">Pemasukan</button>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>



    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="../plugins/chartjs/Chart.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      function getData(tahun) {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

         $.ajax({
          url: 'getpengeluaran.php?tahun=' + tahun,
          type: 'GET',
          async: false,
          success: function(response) {
            // var arr = response;
            var obj = JSON.parse(response);
            pengeluaran = [];
            for (var x in obj) {
              if (obj[x] == null) {
                pengeluaran.push(0);
              } else {
                pengeluaran.push(obj[x]);
              }
            }
            //var datapengeluaran = $.map(obj, function(el) { return el });
             // window.alert(pengeluaran);
          }
        })

          $.ajax({
          url: 'getpemasukan.php?tahun=' + tahun,
          type: 'GET',
          async: false,
          success: function(response) {
            // var arr = response;
            var obj = JSON.parse(response);
            pemasukan = [];
            for (var x in obj) {
              if (obj[x] == null) {
                pemasukan.push(0);
              } else {
                pemasukan.push(obj[x]);
              }
            }
            //var datapengeluaran = $.map(obj, function(el) { return el });
             // window.alert(pemasukan);
          }
        })

         // window.alert(arr);

        var areaChartData = {
          labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "Desember"],
          datasets: [
            {
              label: "Pemasukan",
              fillColor: "rgba(210, 214, 222, 1)",
              strokeColor: "rgba(210, 214, 222, 1)",
              pointColor: "rgba(210, 214, 222, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [pengeluaran[0], pengeluaran[1], pengeluaran[2], pengeluaran[3], pengeluaran[4], pengeluaran[5], pengeluaran[6], pengeluaran[7], pengeluaran[8], pengeluaran[9], pengeluaran[10], pengeluaran[11]]
            },
            {
              label: "Pengeluaran",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [pemasukan[0], pemasukan[1], pemasukan[2], pemasukan[3], pemasukan[4], pemasukan[5], pemasukan[6], pemasukan[7], pemasukan[8], pemasukan[9], pemasukan[10], pemasukan[11]]
            }
          ]
        };

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        barChartData.datasets[1].fillColor = "#00a65a";
        barChartData.datasets[1].strokeColor = "#00a65a";
        barChartData.datasets[1].pointColor = "#00a65a";
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
      }

      $(function () {
        var date = new Date();
        var y = date.getFullYear();
        getData(y);

        $.ajax({
          url: 'getyears.php',
          type: 'GET',
          async: false,
          success: function(response) {
            $("#tahun").append(response);
          }
        })
      });
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