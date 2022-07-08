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
            <h1 class="m-0 text-dark">Resultados Por Hacer Servicio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Resultados Por Hacer Servicio</li>
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
              <form method="get" action="resultados">					
                  <label for="exampleInputEmail1">Filtros de Busqueda</label>

                    <div class="row">
                  <div class="col-md-3">
                    <label for="exampleInputEmail1">Fecha Inicio</label>
                    <input type="date" class="form-control" value="{{$f1}}" name="inicio">
                  </div>

                  <div class="col-md-3">
                    <label for="exampleInputEmail1">Fecha Fin</label>
                    <input type="date" class="form-control" value="{{$f2}}" name="fin">
                  </div>
                  
                
                 
                  <div class="col-md-2" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-primary">Buscar</button>

                  </div>
                  </form>
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>id</th>
                    <th>Fecha</th>
                    <th>Pac.</th>
                    <th>Origen</th>
                    <th>Det.</th>
                    <th>Informe.</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($resultados as $an)
                  <tr>
                  <td>{{$an->id}}</td>
                   <td>{{$an->created_at}}</td>
                    @if($an->monto > $an->abono)
                    <td style="background: yellow;" title="ESTE PACIENTE TIENE DEUDA PENDIENTE">{{$an->apellidos}} {{$an->nombres}}</td>
                    @else
                    <td>{{$an->apellidos}} {{$an->nombres}}</td>
                    @endif                  
                    <td>{{$an->lastname}} {{$an->name}}</td>
                    <td>{{$an->servicio}}</td>
                    <td>

                      @if($an->informe) 

                      <a href="resultados-desoc-{{$an->id}}" class="btn btn-danger">Reversar</a>
	
                      <a href="/modelo-informe-{{$an->id}}-{{$an->informe}}" class="btn btn-primary" target="_blank">Descargar Modelo</a>

                      <a href="resultados-guardar-{{$an->id}}" class="btn btn-success">Adjuntar Informe</a>


                      @else



                        <form action="{{'resultados-asoc-' .$an->id}}" method="get">
                                    <select class="form-control" name="informe">
                                    <option value="">Seleccione</option>
                                    @if(Session::get('sedeName') == 'PRINCIPAL')
                                    <option value="ECOGRAFIA  ABDOMINAL NORMAL.docx">ECOGRAFIA  ABDOMINAL NORMAL</option>
                                    <option value="ECOGRAFIA  DE HOMBRO NORMAL.docx">ECOGRAFIA  DE HOMBRO NORMAL</option>
                                    <option value="ECOGRAFIA  DE MAMAS - NORMAL.docx">ECOGRAFIA  DE MAMAS - NORMAL</option>
                                    <option value="ECOGRAFIA  DE RODILLA - NORMAL.docx">ECOGRAFIA  DE RODILLA - NORMAL</option>
                                    <option value="ECOGRAFIA DE HOMBRO NORMAL.docx">ECOGRAFIA DE HOMBRO NORMAL</option>
                                    <option value="ECOGRAFIA DE RODILLA NORMAL..docx">ECOGRAFIA DE RODILLA NORMAL.</option>
                                    <option value="ECOGRAFIA DE TIROIDES NORMAL.docx">ECOGRAFIA DE TIROIDES NORMAL</option>
                                    <option value="ECOGRAFIA DE TOBILLOS NORMAL.docx">ECOGRAFIA DE TOBILLOS NORMAL</option>
                                    <option value="ECOGRAFIA DOPPLER ARTERIAL MM II.docx">ECOGRAFIA DOPPLER ARTERIAL MM II</option>
                                    <option value="ECOGRAFIA DOPPLER ARTERIAL MM SS.docx">ECOGRAFIA DOPPLER ARTERIAL MM SS</option>
                                    <option value="ECOGRAFIA DOPPLER CAROTIDEO.docx">ECOGRAFIA DOPPLER CAROTIDEO</option>
                                    <option value="ECOGRAFIA PELVICA NORMAL.docx">ECOGRAFIA PELVICA NORMAL</option>

                                    <option value="ECOGRAFIA PROSTATICA NORMAL.docx">ECOGRAFIA PROSTATICA NORMAL</option>
                                    <option value="ECOGRAFIA RENAL NORMAL.docx">ECOGRAFIA RENAL NORMAL</option>
                                    <option value="ECOGRAFIA RENOVESICAL NORMAL..docx">ECOGRAFIA RENOVESICAL NORMAL.</option>
                                    <option value="ECOGRAFIA RENOVESICO PROSTATICA NORMAL.docx">ECOGRAFIA RENOVESICO PROSTATICA NORMAL</option>
                                    <option value="ECOGRAFIA TESTICULAR NORMAL..docx">ECOGRAFIA TESTICULAR NORMAL.</option>
                                    <option value="ECOGRAFIA TRANSFONTANELAR.docx">ECOGRAFIA TRANSFONTANELAR</option>
                                    <option value="MAMOGRAFIA.docx">MAMOGRAFIA</option>
                                    <option value="TAC DE  CRANEO NORMAL.docx">TAC DE  CRANEO NORMAL</option>
                                    <option value="TAC DE ABDOMEN CC NORMAL.docx">TAC DE ABDOMEN CC NORMAL</option>
                                    <option value="TAC DE CEREBRO CON CONTRASTE NORMAL.docx">TAC DE CEREBRO CON CONTRASTE NORMAL</option>

                                    <option value="TAC DE CEREBRO NORMAL.docx">TAC DE CEREBRO NORMAL</option>
                                    <option value="TAC DE COLUMNA CERVICAL - NORMAL.docx">TAC DE COLUMNA CERVICAL - NORMAL</option>
                                    <option value="TAC DE COLUMNA DORSAL NORMAL.docx">TAC DE COLUMNA DORSAL NORMAL</option>
                                    <option value="TAC DE COLUMNA LUMBAR NORMAL.docx">TAC DE COLUMNA LUMBAR NORMAL</option>
                                    <option value="TAC DE CUELLO - NORMAL.docx">TAC DE CUELLO - NORMAL</option>
                                    <option value="TAC DE MACIZO FACIAL.docx">TAC DE MACIZO FACIAL</option>
                                    <option value="TAC DE OIDO MEDIO NORMAL.docx">TAC DE OIDO MEDIO NORMAL</option>
                                    <option value="TAC DE PELVIS SC.docx">TAC DE PELVIS SC</option>

                                    <option value="TAC SENOS PARANASALES.docx">TAC SENOS PARANASALES</option>
                                    <option value="TAC TORAX NORMAL2.docx">TAC TORAX NORMAL2</option>
                                    <option value="TAC UROTEM NORMAL.docx">TAC UROTEM NORMAL</option>


                                    @else

                                </select>

                                </td>
                             

                                @endif
                                <td>

                                  <input type="hidden" name="id" value="{{$an->id}}">


                                  <input type="submit" class="btn btn-success" value="Asociar">
                                  </td>

                              </tr>
                              </form>
                              @endif




                    </td>


                    <td>
                    @if(Auth::user()->rol == 1)
                   

                         

                        
                         </td>
                          @endif
                  </tr>
                  @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>id</th>
                    <th>Fecha</th>
                    <th>Pac.</th>
                    <th>Origen</th>
                    <th>Det.</th>
                    <th>Informe.</th>
                    <th>Acciones</th>
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
