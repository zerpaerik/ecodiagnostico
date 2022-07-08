<head>
    <style type="text/css">
      {
        margin: 0;
        padding: 0;
      }
      .table-main{
       margin-left:-40px;
       margin-right:-56px;
      }
      .cl{
        margin: 0;
        padding: 0;

      }
      .truncate {
        width: 1px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
      @page {
        header: page-header;
        footer: page-footer;
      }
      footer {
        border:solid red;
      }
    </style>

    <meta charset="utf-8">

  </head>

    <body style="width:100%; position:fixed: top: 1px; ">

    <br><br>

	<div class="" style="font-size: 35px; text-align: center;margin-bottom: 15px;">
  <img src="/var/www/html/ecodiagnostico/public/logo_negro.jpeg"  style="width: 40%; color: black;"/>
	</div>

    <div  style="font-size: 15px; text-align: center;margin-bottom:-60px;margin-top: -30px;">
    <p><strong>ECODIAGNOSTICO ABANCAY</strong></p>
    <p><strong>Todos los servicios en un solo lugar</strong></p>
		<p style="margin-top: -20px;"><strong>RUC: 20490094611</strong></p>
    <p style="margin-top: -20px;"><strong>TELF: 083 635326</strong></p>
    <p style="margin-top: -10px;"><strong>Av Arenas 140</strong></p>
    <p style="margin-top: -20px;"><strong>________________________________________________________</strong>  </p>
    <p style="margin-top: -15px;font-size: 14px;text-align: center;"><strong>TICKET DE GASTO:0000{{ $gasto->id}}</strong></p>
    <p style="margin-top: -30px;"><strong>________________________________________________________</strong>  </p>

    <p style="margin-left: -80px;font-size: 14px;"><strong>FECHA:</strong> {{$gasto->created_at}} </p>

	

	</div>
    <br><br>
    <br><br>

    

  
  <table width="100%" class="table-main">
      <thead>
        <tr>
          <th style="font-size: 15px"><center>Detalle.<center></th>
          <th style="font-size: 15px"><center>Monto.<center></th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td style="font-size: 15px; line-height: 30px;" align="center">{{ $gasto->descripcion}}</td>
            <td style="font-size: 15px; line-height: 30px;" align="center">{{ $gasto->monto}}</td>
          </tr>
      </tbody>
    </table>

    <p style="font-size: 15px;margin-left:5px;">RECIBIDO POR: {{ $gasto->recibido}}</p>
    <p style="font-size: 15px;margin-left:5px;">___________________</p>
    <p style="font-size: 15px;margin-left:5px;">REGISTRADO POR: {{ $gasto->name}}</p>



    </body>
