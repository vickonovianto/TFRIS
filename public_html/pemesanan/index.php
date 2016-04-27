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
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Pemesanan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Jadwal Pemakaian</a></li>
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
            Jadwal Pemakaian
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="../member/"> Pemesanan</a></li>
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
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" id="edit-close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Pemesanan</h4>
                  </div>
                  <form action="update.php" method="post">
                  <div class="modal-body" id="edit-body">
                    
                  </div>
                  <div class="modal-footer ">
                    <?php if (isset($_SESSION['kode_pemesanan']) && $_SESSION['kode_pemesanan'][3] == "1") { ?>
                      <button type="button" id="deletebtn" class="btn btn-danger btn-lg pull-left" ><span class="glyphicon glyphicon-remove"></span>Delete</button>
                    <?php } ?>
                    <?php if (isset($_SESSION['kode_pemesanan']) && $_SESSION['kode_pemesanan'][2] == "1") { ?>
                      <button type="submit" id="updatebtn" class="btn btn-primary btn-lg pull-right" ><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                    <?php } ?>
                  </div>
                  </form>
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
                    <h4 class="modal-title custom_align" id="Heading">Delete Pemesanan</h4>
                  </div>
                  <div class="modal-body">
                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp Apakah Anda yakin akan menghapus pemesanan ini?</div>
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
            <div class="box-footer">
              <button class="btn" style="background-color: #0073B7; color: white; border-radius: 4px; font-weight: bold;">Lapangan 1, Non-Member</button>
              <button class="btn" style="background-color: #00C0EF; color: white; border-radius: 4px; font-weight: bold;">Lapangan 1, Member</button>
              <button class="btn" style="background-color: #C30300; color: white; border-radius: 4px; font-weight: bold;">Lapangan 2, Non-Member</button>
              <button class="btn" style="background-color: #F012BE; color: white; border-radius: 4px; font-weight: bold;">Lapangan 2, Member</button>
              <?php if (isset($_SESSION['kode_pemesanan']) && $_SESSION['kode_pemesanan'][0] == "1") { ?>
                <button type="button" class="btn btn-success pull-right" onclick="location.href='../pemesanan/create.php';">Tambah Pemesanan</button>
              <?php } ?>
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
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/fullcalendar-2.6.1/fullcalendar.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
    <script src="../plugins/dateformat/date.format.js"></script>
    <script src="../plugins/jquery-number/jquery.number.js"></script>
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
            // window.alert('Event: ' + calEvent.id);
            event_id = calEvent.id;
            if (calEvent.backgroundColor == "#00C0EF" || calEvent.backgroundColor == "#F012BE") {
              member = 1;
              $('#updatebtn').prop('disabled', true);
              $('#deletebtn').prop('disabled', true);
            } else {
              member = 0;
              $('#updatebtn').prop('disabled', false);
              $('#deletebtn').prop('disabled', false);
            }
            loadEditData();
          }
        });
        $('#calendar').fullCalendar('removeEvents');
        $('#calendar').fullCalendar('addEventSource', JSON.parse(json_events));    
        $('#calendar').fullCalendar('rerenderEvents' );
      }

      $(function () {
        getEvents(2);

        $("#edit-close").click(function(event) {
          $("#edit-body").empty();
        });  
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

        function loadEditData() {   
        $.ajax({
          url: 'loadeditdata.php?id=' + event_id + '&member=' + member,
          type: 'GET',
          async: false,
          success: function(response) {
            $("#edit-body").append(response); 
            $('#edit').modal('show');  
             $("input[name='tambahPemesananInputDurasi']").TouchSpin({
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
          }
        })
      }

      function tambahPembayaran() {
        
        $('#num_pembayaran_edit').val( function(i, oldval) {
            return oldval * 1 + 1;
        });

        var x = $('#num_pembayaran_edit').val();
        var i = $('#num_pembayaran_db').val();
        i = i * 1 + x * 1;

        $('#totalharga').val( function(i, oldval) {
            return oldval * 1 + $("#harga").val() * 1;
        });

         $('#id_pemesanan').val( function(i, oldval) {
            return event_id;
        });

        var totalharga = $('#totalharga').val();

        var trWrapper = $("<tr id=\"tambah_data_" + x + "\" />");

        var now = new Date();
        var currentTimestamp = now.format("yyyy-mm-dd HH:MM:ss");
        var inputHarga = "<input type=\"hidden\" name=\"harga_" + x + "\" value=\"" + $("#harga").val() + "\"/>";
        var inputTimestamp = "<input type=\"hidden\" name=\"timestamp_" + x + "\" value=\"" + currentTimestamp + "\"/>";

        var elmNo = "<td>" + i + "</td>";
        var elmHarga = "<td>" + "Rp. " + $.number($("#harga").val(), 0, ',', '.') + "</td>";
        var displayTimestamp = now.format("yyyy-mm-dd HH:MM");
        var elmTimestamp = "<td>" + displayTimestamp + "</td>";

        trWrapper.append(elmNo);
        trWrapper.append(elmHarga);
        trWrapper.append(elmTimestamp);
        trWrapper.append(inputHarga);
        trWrapper.append(inputTimestamp);

        $("#tambah_table").append(trWrapper);

    }

     $("#deletebtn").click(function(event) {
          $('#delete').modal('show');  
        });  

     $("#delete_yes").click(function(event) {
          $.ajax({
            url: 'delete.php?id=' + event_id,
            type: 'GET',
            async: false,
            success: function(response) {
              location.reload();
            }
          })
        });
    </script>
  </body>
</html>