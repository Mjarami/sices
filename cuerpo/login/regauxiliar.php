<?php
include_once("../../clases/coneccion.php");
include_once("../../clases/registros.php");
include_once("../../clases/consultas.php");
include_once("../../clases/modificar.php");
include_once("../../clases/javascript.php");
if($_POST!=null)
{
    if($_POST["cedula"]!="" && $_POST["cedula"]!=null && $_POST["cedula"]!=" ")
    {
        $cedula=$_POST["cedula"];
    }
    else
    {
        header('Location: auxiliar.php');
        exit();
    }
}
elseif($_GET!=null)
{
    if($_GET["cedula"]!="" && $_GET["cedula"]!=null && $_GET["cedula"]!=" ")
    {
        $cedula=$_GET["cedula"];
    }
    else
    {
        header('Location: auxiliar.php');
        exit();
    }
}
else
{
    header('Location: auxiliar.php');
    exit();
}
$conaux= new ConsultaPersonaEspecifico2($cedula);
$filaconaux=$conaux->Consulta();
$idper=$filaconaux['idper'];
$fechanew=date('Y-m-d');
$horanew=date('h:i:s');
$num_total_registros=$conaux->ConsultaPaginador();
if($num_total_registros>=1)
{
    $proceso= new Proceso(1 , 1, $idper, $fechanew, $horanew);
    $conproce= new ConsultaProcesoEspecifico($idper);
    $filaconproce=$conproce->Consulta();
    $idpro=$filaconproce['idpro'];
    $conaud= new ConsultaAuditoriaEspecifica($fechanew);
    $num_total_registros3=$conaud->ConsultaPaginador();
    $modulo="Pase";
    if($num_total_registros3>=1)
    {
        $auditoria= new Auditoria ($idpro, 6, $modulo);
        header("Location: ../parte/control.php");
        exit();
    }
    else
    {
        $auditoria= new Auditoria ($idpro, 5, $modulo);
        header("Location: ../parte/control.php");
        exit();
    }
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:SICES:.</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/sb-admin.css" rel="stylesheet">
	 <script src="../../js/jquery-2.2.4.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="./">SICES<sup><small><span class="label label-danger">v1.0</span></small></sup> </a>
        </div>
    </nav>
</div>
<br><br><br><br><br><br><br><br>
<div class="row vertical-offset-100">
    <div class="col-md-4 col-md-offset-4">
		<div class="panel panel-primary">		
			<div class="panel-heading">
				<h3 class="panel-title" align="center"><strong>Registro de Guardia Acad&eacute;mico</strong></h3>
			</div>
			<div class="panel-heading">
				<h3 class="panel-title" align="center">Ingresa tus datos de acceso:</h3>
			</div>
			<div class="panel-body">				
			<form class="form-horizontal"id='forregaux' name='forregaux' method='post' action='regauxiliar2.php'>			
				<div class="form-group" align="center">
					<label class="col-lg-2 control-label">C&eacute;dula:</label>
						<div class="col-md-8">
							<?php echo $cedula;?>
							<input type='hidden' name='cedula' id='cedula' autocomplete='off' value="<?php echo $cedula;?>" />
						 </div>
				</div>				  
				<div class="form-group">
					<label class="col-lg-2 control-label">Apellidos</label>
					<div class="col-md-8">
						<input class="form-control" placeholder="Apellidos" type='text' name='apellido' id='apellido' autocomplete='off' onkeypress="return validar6(event)" style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();"/>
					</div>
				</div>			
				<div class="form-group">
					<label class="col-lg-2 control-label">Nombres</label>
						<div class="col-md-8">
							<input class="form-control" placeholder="Nombres" type='text' name='nombre' id='nombre' autocomplete='off' onkeypress="return validar6(event)" style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();"/>
						</div>
				</div>				
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<input class="btn btn-primary" type='submit' name='Submit' value='Ingresar'/>
						<input class="btn btn-primary" type='reset' name='reset' value='Borrar'/>
					</div>
				</div>		
            </form>			
                <div class="col-lg-offset-2 col-lg-10">
                    <form id='forauxiliar' name='forauxiliar' method='post' action='auxiliar.php'>
                        <div class="col-lg-offset-2 col-lg-10">
                            <input class="btn btn-primary" type="submit" name='Submit' value="Atr&aacute;s">
                        </div>
                    </form>
				</div>			
			</div>
		</div>
	</div>
</div>
<?php
include("../footer.php");
?>
</body>
</html>
<?php
}
?>
<script src="../../js/bootstrap.js"></script>
<script src="../../js/jquery-backstretch.js"></script>
<script>
    $(document).ready(function(){
        $.backstretch([          
            "../../img/fondosices1280x1024.jpg",
        ], {duration: 7000, fade: 750});
    });
</script>

