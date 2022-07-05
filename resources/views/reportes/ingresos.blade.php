<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EcoDiagnostico Abancay | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
  @include('layouts.navbar')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @include('layouts.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Reporte de Ingresos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Reporte</a></li>
              <li class="breadcrumb-item active">Ingresos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    @include('flash-message')
      <div class="container-fluid">
      <div class="card">
              <div class="card-header">
         


                  <form method="get" action="reporte_ingresos">					

                    <div class="row">

                    <div class="col-md-3">
                    <label for="exampleInputEmail1">Fecha Inicio</label>
                    <input type="date" class="form-control" value="{{$f1}}" name="inicio">
                  </div>

                  <div class="col-md-3">
                    <label for="exampleInputEmail1">Fecha Fin</label>
                    <input type="date" class="form-control" value="{{$f2}}" name="fin">
                  </div>
                  

                  <div class="col-md-2" style="margin-top: 1px;">
                  <button type="submit" class="btn btn-primary">Buscar</button>

                  </div>
                  </form>
                  <div class="row" style="margin-left: 5px;">

                    <div class="col-md-2">
                    <label for="exampleInputEmail1">Total</label>
                    <input type="text" disabled class="form-control" value="{{$total->monto}}">
                  </div>

                  <div class="col-md-2">
                    <label for="exampleInputEmail1">Efectivo</label>
                    <input type="text" disabled class="form-control" value="{{$efec->monto}}" >
                  </div>
                  <div class="col-md-2">
                    <label for="exampleInputEmail1">Tarjeta</label>
                    <input type="text" disabled class="form-control" value="{{$tarj->monto}}" >
                  </div>
                  <div class="col-md-2">
                    <label for="exampleInputEmail1">Depósito</label>
                    <input type="text" disabled class="form-control" value="{{$dep->monto}}">
                  </div>
                  <div class="col-md-2">
                    <label for="exampleInputEmail1">Yape</label>
                    <input type="text" disabled class="form-control" value="{{$yap->monto}}">
                  </div>
                  

                

                  </div>

              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>Origen</th>
                    <th>Detalle</th>
                    <th>Monto</th>
                    <th>Abono</th>
                    <th>TipoPago</th>
                    <th>RP</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                  @foreach($atenciones as $an)
                  <tr>
                    <td>{{date('d-M-y H:i', strtotime($an->created_at))}}</td>
                    <td>{{$an->apellidos}} {{$an->nombres}}</td>
                    <td>{{$an->lasto}} {{$an->nameo}}</td>
                    <td>{{$an->detalle}}</td>
                    <td>{{$an->monto}}</td>
                    <td>{{$an->ingreso}}</td>
                    <td >{{$an->tipo_pago}}</td>
                 
                    <td>{{substr($an->lastu,0,5)}} {{substr($an->nameu,0,5)}}</td>
                
                  
                  </tr>
                  @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Fecha</th>
                    <th>Paciente</th>
                    <th>Origen</th>
                    <th>Detalle</th>
                    <th>Monto</th>
                    <th>Abono</th>
                    <th>TipoPago</th>
                    <th>RP</th>
                  </tr>
                 
                  </tfoot>

                </table>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>Origen</th>
                    <th>Monto Abonado</th>
                    <th>TP</th>
                    <th>Sede Origen</th>
                    <th>Sede Cobro</th>
                    <th>RP</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($historial as $an)
                  <tr>
                    <td>{{$an->id}}</td>
                    <td>{{$an->created_at}}</td>
                    <td>{{$an->nombres}} {{$an->apellidos}}</td>
                    <td>{{$an->nameo}} {{$an->lasto}}</td>
                    <td>{{$an->monto}}</td>
                    <td>{{$an->tipopago}}</td>
                    <td>{{$an->sedename}}</td>
                    <td>{{$an->sedec}}</td>
                    <td>{{$an->nameu}} {{$an->lastu}}</td>

                  </tr>
                  @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>Origen</th>
                    <th>Monto Abonado</th>
                    <th>TP</th>
                    <th>Sede Origen</th>
                    <th>Sede Cobro</th>
                    <th>RP</th>
                  </tr>
                  </tfoot>
                </table>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Origen</th>
                    <th>Descripción</th>
                    <th>Monto</th>
                    <th>Registrado Por:</th>
                    <th>Fecha</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($ingresos as $client)
                  <tr>
                    <td>{{$client->origen}}</td>
                    <td>{{$client->descripcion}}</td>
                    <td>{{$client->monto}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{$client->created_at}}</td>
                    
                  </tr>
                  @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Origen</th>
                    <th>Descripción</th>
                    <th>Monto</th>
                    <th>Registrado Por:</th>
                    <th>Fecha</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
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
  </div>
  </section>

  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>


<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
