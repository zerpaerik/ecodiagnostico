

<head>
    <style type="text/css">
      {
        margin: 0;
        padding: 0;
      }
      .table-main{
       margin-left:-45px;
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
		<img src="/var/www/html/sistemaEcoDiagnostico Abancay/public/image.png"  style="width: 40%; color: black;"/>
	</div>

    <div  style="font-size: 15px; text-align: center;margin-bottom:-60px;margin-top: -30px;">
    <p><strong>ECODIAGNÒSTICO ABANCAY-{{Session::get('sedeName')}}</strong></p>
		<p style="margin-top: -20px;"><strong>RUC: 20490094611</strong></p>
    <p style="margin-top: -10px;"><strong>Av Arenas 140</strong></p>
    <p style="margin-top: -10px;"><strong>ECODIAGNOSTICO INTEGRAL, todos los servicios en un solo lugar.!!!</strong></p>




    <p style="margin-top: -20px;"><strong>________________________________________________________</strong>  </p>
    <p style="margin-top: -15px;font-size: 14px;text-align: center;"><strong>RECIBO PAGO A CUENTA Nº:0000{{$ticket->id}}</strong></p>
    <p style="margin-top: -30px;"><strong>________________________________________________________</strong>  </p>

    <p style="margin-left: -80px;font-size: 14px;"><strong>FECHA:</strong> {{ date('d/m/Y h:i a', strtotime($ticket->created_at)) }}</p>

	

	</div>
    <br><br>
    <div  style="font-size: 15px; text-align: left;margin-bottom:-20px;margin-top: 20px;">
		<p style="margin-left: -40px;"><strong>PACIENTE:</strong> {{$ticket->apellidos}},{{$ticket->nombres}}</p>
    <p style="margin-left: -40px;margin-top: -10px;"><strong>DNI:</strong> {{ $ticket->dni}}</p>
	
	</div>
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
            <td style="font-size: 15px; line-height: 30px;" align="center">CUENTA POR COBRAR</td>
            <td style="font-size: 15px; line-height: 30px;" align="center">{{ $ticket->monto}}</td>
          </tr>
      </tbody>
    </table>




    <br>


	<table width="100%">
      <tbody>
        <tr>
          <td style="width: 100%;">
            <table width="100%">
              <tbody>
                   

                    <tr>
                      <td align="left" style="font-size: 15px;margin-left:150px;">MONTO</td>
                      <td align="right" style="font-size: 15px;margin-left:150px;">{{ $ticket->total}}</td>
                    </tr>
					<tr>
                      <td align="left" style="font-size: 15px;margin-left:150px;">PAGADO</td>
                      <td align="right" style="font-size: 15px;margin-left:150px;">{{ $ticket->monto}}</td>
                    </tr>
                    <tr>
                      <td align="left" style="font-size: 15px;margin-left:150px;">RESTA</td>
                      <td align="right" style="font-size: 15px;margin-left:150px;">{{ $ticket->resta}}</td>
                    </tr>
					<tr>
                      <td align="left" style="font-size: 15px;margin-left:150px;">TIPO DE PAGO</td>
                      <td align="right" style="font-size: 15px;margin-left:150px;">{{ $ticket->tipopago}}</td>
                    </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>

	

    

    </body>
