<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>T-FRIS | Jadwal Pemakaian</title>
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
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="../plugins/fullcalendar-2.6.1/fullcalendar.min.css">
    <link rel="stylesheet" href="../plugins/fullcalendar-2.6.1/fullcalendar.print.css" media="print">

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
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>T-FRIS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>T-FRIS</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
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
            <li class="treeview active">
              <a href="index.php">
                <i class="fa fa-book"></i>
                <span>Pemesanan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Jadwal Pemakaian</a></li>
              </ul>
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
            Jadwal Pemakaian
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php"> Pemesanan</a></li>
            <li class="active"> Jadwal Pemakaian</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Tampilkan: &nbsp</h3> 
                <select required name="status_pembayaran" onChange="getEvents(this.options[this.selectedIndex].value)">
                  <option value="2">Semua pemesanan</option>
                  <option value="1">Pemesanan yang sudah dibayar</option>
                  <option value="0">Pemesanan yang belum dibayar</option>
                </select>
            </div>
            <div id="calendar"></div>
            <div class="box-footer">
              <button class="btn" style="background-color: #0073B7; color: white; border-radius: 4px; font-weight: bold;">Lapangan 1, Non-Member</button>
              <button class="btn" style="background-color: #00C0EF; color: white; border-radius: 4px; font-weight: bold;">Lapangan 1, Member</button>
              <button class="btn" style="background-color: #C30300; color: white; border-radius: 4px; font-weight: bold;">Lapangan 2, Non-Member</button>
              <button class="btn" style="background-color: #F012BE; color: white; border-radius: 4px; font-weight: bold;">Lapangan 2, Member</button>
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
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/fullcalendar-2.6.1/fullcalendar.min.js"></script>
    <!-- Page script -->
    <script>
      function getEvents(status) {  
         $.ajax({
          url: 'getevents.php?status=' + status,
          type: 'GET',
          async: false,
          success: function(response) {
            json_events = response;
          }
        })
        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week: 'week'
          },
          defaultView: 'agendaWeek',
          minTime: '08:00:00',
          maxTime: '22:00:00',
          timeFormat: 'H:mm',
          slotLabelFormat:'HH:mm',
          contentHeight: "auto",
          allDaySlot: false,
          eventClick: function(calEvent, jsEvent, view) {
          }
        });
        $('#calendar').fullCalendar('removeEvents');
        $('#calendar').fullCalendar('addEventSource', JSON.parse(json_events));    
        $('#calendar').fullCalendar('rerenderEvents' );
      }

      $(function () {
        getEvents(2);
      });

    </script>
  </body>
</html>