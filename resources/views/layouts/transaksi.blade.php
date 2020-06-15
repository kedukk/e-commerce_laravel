<!DOCTYPE HTML>
<html>
<head>
<title>Admin | MakeUpBeauty</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}" rel="stylesheet">
<!-- Tempusdominus Bbootstrap 4 -->
<link href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet">
  <!-- iCheck -->
<link href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"rel="stylesheet">
<!-- JQVMap -->
<link href="{{asset('plugins/jqvmap/jqvmap.min.css')}}"rel="stylesheet">
<!-- Theme style -->
<link href="{{asset('dist/css/adminlte.min.css')}}"rel="stylesheet">
<!-- overlayScrollbars -->
<link href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}"rel="stylesheet">
<!-- Daterange picker -->
<link href="{{asset('plugins/daterangepicker/daterangepicker.css')}}"rel="stylesheet">
<!-- summernote -->
<link href="{{asset('plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
<!-- Google Font: Source Sans Pro -->
<link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">
<link rel="shortcut icon" href="{{asset('assets/User/images/shirt.png')}}" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="{{ asset('assets/Admin/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="{{ asset('assets/Admin/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="{{ asset('assets/Admin/js/jquery-3.2.1.min.js')}}"></script> 
<!--icons-css-->
<link href="{{ asset('assets/Admin/css/font-awesome.css')}}" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<script src="{{ asset('assets/Admin/js/Chart.min.js')}}"></script>
<!--//charts-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<!--skycons-icons-->
<script src="{{ asset('assets/Admin/js/skycons.js')}}"></script>
<!--//skycons-icons-->
</head>


<body class="hold-transition sidebar-mini layout-fixed">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
  <!-- Notifications Dropdown Menu -->
<li class="dropdown head-dpdn">
    <?php 
    $id = 1;
    $admin = App\Admin::find(1);
    $notif_count = $admin->unreadNotifications->count();
    $notifications = DB::table('admin_notifications')->where('notifiable_id',$id)->where('read_at',NULL)->orderBy('created_at','desc')->get();
    ?>
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o"></i><span class="badge">{{$notif_count}}</span></a>
    <ul class="dropdown-menu">
      <li>
        <div class="notification_header">
          <h3>You have {{$notif_count}} new notification</h3>
        </div>
      </li>
      <li>
        @foreach($notifications as $notif)
        {!!$notif->data!!}
        @endforeach
      </li>
      <li>
        <div class="notification_bottom">
          <a class="btn btn-block" href="/admin/marknotifadmin">Mark as Read</a>
        </div> 
      </li>
      <div class="clearfix"></div>
    </ul>
  </li>
</ul>
<!--notification menu end -->

<!-- Notifications Dropdown Menu -->
<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">  
  <div class="profile_details">   
    <ul class="navbar-nav ml-auto">
      <li class="dropdown profile_details_drop">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <div class="profile_img"> 
            <span class="prfil-img">
              <img src="/uploads/avatars/{{ Auth::user()->profile_image }}" style="width:50px; height:50px; position:absolute; top:1px; left:-30px; border-radius:50%" alt="">
            </span> 
            <div class="user-name">
              <p>{{ Auth::user()->name }}</p>
              <span>Administrator</span>
            </div>
            <i class="fa fa-angle-down lnr"></i>
            <i class="fa fa-angle-up lnr"></i>
            <div class="clearfix"></div>  
          </div>  
        </a>
        <ul class="dropdown-menu drp-mnu">
          <li> <a href="{{ url('/admin/logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i> Logout</a>
            <form id="logout-form" action="{{ url('/admin/logout') }}" method="GET" style="display: none;">
              @csrf
            </form> 
          </li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="clearfix"> </div>
  <div class="clearfix"> </div> 
</div>
<!-- Right navbar links -->

</nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
     <img src="/assets/User/images/AdminLTELogo.png" style="height: 50px; max-width: 50px alt="noimg">
      <span class="brand-text font-weight-light">Dashboard Admin</span>
    </a>

      <!-- Sidebar Menu -->
      <div class="wrapper">
  <!-- Navbar -->

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview">
                <a href="/admin" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
               </li>

               <li class="nav-item has-treeview menu-open">
                <a href="/admin/transaksi" class="nav-link active">
                  <i class="nav-icon fa fa-user"></i>
                  <p>Transaction</p>
                </a>
               </li>

               <li class="nav-item has-treeview">
                <a href="/admin/products" class="nav-link">
                  <i class="nav-icon fas fa fa-shopping-bag"></i>
                  <p>Product</p>
                </a>
               </li>

               <li class="nav-item has-treeview">
                <a href="/admin/categories" class="nav-link">
                  <i class="nav-icon fa fa-list-alt"></i>
                  <p>Category</p>
                </a>
               </li>

                <li class="nav-item has-treeview">
                  <a href="/admin/couriers" class="nav-link">
                    <i class="nav-icon fa fa-truck"></i>
                    <p>Courier</p>
                  </a>
                </ul>
               </li>
           </nav>
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
   </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br />
    <!-- /.content-header -->
        <div class="container">
        @yield('content')
        </div>
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
     <strong>Copyright &copy; Kelompok 21 Prognet <a href="https://www.instagram.com/agusgun_sa/" target="_blank">Click Here!</a>.</strong>
  </footer>


<script src="{{ asset('assets/Admin/js/jquery.nicescroll.js')}}"></script>
<script src="{{ asset('assets/Admin/js/scripts.js')}}"></script>
<!--//scrolling js-->
<script src="{{ asset('assets/Admin/js/bootstrap.js')}}"> </script>
<script>
$('#tombol').click(function(e){
    e.preventDefault();
    $('#modalContactForm').modal();
});
</script>
<script>
  $(document).ready(function(e){
    $(".status").click(function(e){
      var index = $(".status").index(this);
      var myStatus = '';
      console.log(index);
      switch(index){
        case 0:
          myStatus = 'all';
          break;
        case 1:
          myStatus = 'unverified';
          break;
        case 2:
          myStatus = 'waiting';
          break;
        case 3:
          myStatus = 'verified';
          break;
        case 4:
          myStatus = 'delivered';
          break;
        case 5:
          myStatus = 'success';
          break;
        case 6:
          myStatus = 'canceled';
          break;
  
      }
  
      console.log(myStatus);
      jQuery.ajax({
        url: "{{url('/admin/transaksi/sort')}}",
        method: 'post',
        data: {
          _token: $('#signup-token').val(),
          status: myStatus,
        },
        success: function(result){
          $('.ganti').html(result.hasil);
        }
      });
    });
    });
  </script>
  <script>
    window.onload = function () {
    
    var options = {
        axisX: {
            interval:1,
            labelMaxWidth: 180,           
            labelAngle: -45,
            labelFontFamily:"Times New Roman"
        },
        title: {
            text: "Grafik Jumlah Transaksi Perbulan {{date('Y')}}"              
        },
        data: [              
        {
            type: "column",
            dataPoints: [
                { label: "Januari",  y: parseInt($('#bulan1').val())},
                { label: "Februari", y: parseInt($('#bulan2').val())},
                { label: "Maret", y: parseInt($('#bulan3').val())},
                { label: "April", y: parseInt($('#bulan4').val())},
                { label: "Mei",  y: parseInt($('#bulan5').val())},
                { label: "Juni",  y: parseInt($('#bulan6').val())},
                { label: "Juli",  y: parseInt($('#bulan7').val())},
                { label: "Agustus", y: parseInt($('#bulan8').val())},
                { label: "September", y: parseInt($('#bulan9').val())},
                { label: "Oktober",  y: parseInt($('#bulan10').val())},
                { label: "November",  y: parseInt($('#bulan11').val())},
                { label: "Desember",  y: parseInt($('#bulan12').val())},
            ]
        }
        ]
    };
    
    $("#chartContainer").CanvasJSChart(options);
    }
</script>    


    <script>
    function formatRupiah(angka, prefix){
      var number_string = angka.toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
  }

    function creteChart(tahun, ttlTahun, judul = ''){
        var options = {
                            axisX: {
                                interval:1,
                                labelMaxWidth: 180,           
                                labelAngle: -45,
                                labelFontFamily:"Times New Roman"
                            },
                            title: {
                                text: "Grafik Jumlah Transaksi "+judul+" Perbulan "+ttlTahun              
                            },
                            data: [              
                            {
                                type: "column",
                                dataPoints: [
                                    { label: "Januari",  y: tahun[1]},
                                    { label: "Februari", y: tahun[2]},
                                    { label: "Maret", y: tahun[3]},
                                    { label: "April", y: tahun[4]},
                                    { label: "Mei",  y: tahun[5]},
                                    { label: "Juni",  y: tahun[6]},
                                    { label: "Juli",  y: tahun[7]},
                                    { label: "Agustus", y: tahun[8]},
                                    { label: "September", y: tahun[9]},
                                    { label: "Oktober",  y: tahun[10]},
                                    { label: "November",  y: tahun[11]},
                                    { label: "Desember",  y: tahun[12]},
                                    
                                ]
                            }
                            ]
                        };
                        
                        $("#chartContainer").CanvasJSChart(options);
    }
      jQuery(document).ready(function(e){
          console.log($('#bulan1').val())
          jQuery('#bulan').change(function(e){
                jQuery.ajax({
                    url: "{{url('/report-bulan')}}",
                    method: 'post',
                    data: {
                        _token: $('#signup-token').val(),
                        bulan: $('#bulan').val(),
                        tahun: $('#tahun').val(),
                    },
                    success: function(result){
                        $('#total').text(result.data['total']);
                        $('#unverified').text(result.data['unverified']);
                        $('#expired').text(result.data['expired']);
                        $('#canceled').text(result.data['canceled']);
                        $('#verified').text(result.data['verified']);
                        $('#delivered').text(result.data['delivered']);
                        $('#success').text(result.data['success']);
                        var uang = formatRupiah(result.data['harga'],'Rp ');
                        $('#harga').text(uang);
                    }
                });
          });

          jQuery('#tahun').change(function(e){
                jQuery.ajax({
                    url: "{{url('/report-tahun')}}",
                    method: 'post',
                    data: {
                        _token: $('#signup-token').val(),
                        bulan: $('#bulan').val(),
                        tahun: $('#tahun').val(),
                    },
                    success: function(result){
                        $('#total').text(result.data_bulan['total']);
                        $('#unverified').text(result.data_bulan['unverified']);
                        $('#expired').text(result.data_bulan['expired']);
                        $('#canceled').text(result.data_bulan['canceled']);
                        $('#verified').text(result.data_bulan['verified']);
                        $('#delivered').text(result.data_bulan['delivered']);
                        $('#success').text(result.data_bulan['success']);
                        var uang = formatRupiah(result.data_bulan['harga'],'Rp ');
                        $('#harga').text(uang);

                        $('#total-tahun').text(result.data['total']);
                        $('#unverified-tahun').text(result.data['unverified']);
                        $('#expired-tahun').text(result.data['expired']);
                        $('#canceled-tahun').text(result.data['canceled']);
                        $('#verified-tahun').text(result.data['verified']);
                        $('#delivered-tahun').text(result.data['delivered']);
                        $('#success-tahun').text(result.data['success']);
                        var uang_tahun = formatRupiah(result.data['harga'],'Rp ');
                        $('#harga-tahun').text(uang_tahun);
                        
                        creteChart(result.tahun, $('#tahun').val());
                    }

                });
          });

          $(".status").click(function(e){
            var index = $(".status").index(this);
            var myStatus = '';
            switch(index){
                case 0:
                    myStatus = 'all';
                    break;
                case 1:
                    myStatus = 'unverified';
                    break;
                case 2:
                    myStatus = 'expired';
                    break;
                case 3:
                    myStatus = 'verified';
                    break;
                case 4:
                    myStatus = 'delivered';
                    break;
                case 5:
                    myStatus = 'success';
                    break;
                case 6:
                    myStatus = 'canceled';
                    break;

            }
            jQuery.ajax({
                url: "{{url('/grafik')}}",
                method: 'post',
                data: {
                    _token: $('#signup-token').val(),
                    status: myStatus,
                    tahun: $('#tahun').val(),
                },
                success: function(result){
                    creteChart(result.grafik, $('#tahun').val(), myStatus);
                }
            });
        });

      });
    </script>

<script src="{{asset('dist/js/adminlte.js')}}"></script>


<!-- mother grid end here-->
</body>
</html>                     