<?php
error_reporting(0);
date_default_timezone_set('America/Caracas');
session_start();
if($_SESSION['rol'] != 1)
{
    header('Location: ../../index.php');
    exit();
}
include_once("../../clases/coneccion.php");
include_once("../../clases/consultas.php");
include("../../clases/javascript.php");
$completa=date('Y-m-d h:i:s');
$ano=date('Y');
$mes=date('m');
$dia=date('d');
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: SICES:.</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
	<link href="../../fonts/font-awesome.min.css" rel="stylesheet">
	<link href="../../css/sb-admin.css" rel="stylesheet">  
	<script src="../../js/jquery-2.2.4.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="./">SICES<sup><small><span class="label label-danger">v1.0</span></small></sup></a>
        </div>
    </nav>
</div>
<br><br><br>
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title" align="center"><strong>Registrar motivo de la Inasistencia</strong> </h3>
        </div>
        <div class="panel-body">
		<table class="table table-bordered" align="center">
		<form  accept-charset="UTF-8" role="form" id='forlog' name='forlog' method='post' action='regparte.php'>
			<tr>
				<td align='center' colspan='4'><h1><strong>
					<?php
                                echo "Fecha: " . date('Y-m-d') . "<br>";
                                echo " Hora: " . date('H:i:s') . "<br>";
                    ?>
				</td></strong></h1>
			</tr>
			<tr>
				<td><strong>
					C&oacute;digo de Empleado:
				</td></strong>

				<td><strong>
					Situaci&oacute;n:
				</td></strong>

				<td><strong>
					Fecha Hasta:
				</td></strong>
			</tr>
			<tr>
				<td align='center'>
					<input class="form-control" placeholder="C&oacute;digo de Empleado" type='text' name='codigo' id='codigo' autocomplete='off' onkeypress="return validar7(event)"/>
				</td>
				
				<td>
					<select class="form-control" name='situacion' id='situacion' size='1'/>
					<option value="0">Seleccione</option>
					<?php
					$data= new ConsultaSituaciones();
					while($filadata=$data->Consulta())
					{
						echo ("
								 <option value=".$filadata['idsit'].">".$filadata['nomsit']."</option>
								  ");
					}
					?>
					</select></label>
				</td>
				<td>
				<div class="col-xs-3">
					<input  class="form-control" id="ano" type="text" name="ano" size="4" maxlength="4" onkeypress="return validar2(event)" value="<?php echo $ano;?>"/>
				</div>
				
				<div class="col-xs-3">
					<input  class="form-control" id="mes" type="text" name="mes" size="2" maxlength="2" onkeypress="return validar2(event)" value="<?php echo $mes;?>"/>
				</div>
				
				<div class="col-xs-3">
					<input  class="form-control" id="dia" type="text" name="dia" size="2" maxlength="2" onkeypress="return validar2(event)" value="<?php echo $dia;?>"/>
				</div>
				</td>
				
			</tr>
				
			<tr>           
				<td align="center" colspan='4'><strong>
					Observaci&oacute;n
				</td></strong>
			</tr>
			
			<tr>           
				<td align='center' colspan='4'>
				<div class="col-xs-12">
					<input class="form-control" type='text' align="center" name='observacion' id='observacion' size="4" autocomplete='off' onkeypress="return validar8(event)"/>
				</div>
				</td>
			</tr>
		
			<tr>
				<td align='center' colspan='4'>
					<input class="btn btn-primary" type='submit' name='Submit' value='Ingresar'/>
					<input class="btn btn-primary" type='reset' name='Reset' value='Borrar'>
				</td>
			</tr>
		</form>
			<tr>
				<form id='forsalir' name='forsalir' method='post' action='../index.php'>
					<td align='center' colspan='4'>
						<input class="btn btn-primary" type='submit' name='Submit' value='Atr&aacute;s'/>
					</td>
				</form>
			</tr>
	</table>
			
        </div>
    </div>
</div>
<?php
include("../footer.php");
?>
</body>
</html>
<script src="../../js/bootstrap.js"></script>
<script src="../../js/jquery-backstretch.js"></script>
<script>
    $(document).ready(function(){
        $.backstretch([
            "../../img/fondosices1280x1024.jpg",
        ], {duration: 7000, fade: 750});
    });
</script>
