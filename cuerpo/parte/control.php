<?php
error_reporting(0);
date_default_timezone_set('America/Caracas');
include_once("../../clases/coneccion.php");
include_once("../../clases/consultas.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: SICES:.</title>
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
<br><br><br><br>
<?php
if($_GET!=null)
{
    $ape=$_GET["ape"];
    $nom=$_GET["nom"];
    $fec=$_GET["fec"];
    $hor=$_GET["hor"];
    $aci=$_GET["aci"];
    $ced=$_GET["ced"];
?>
<div class="row vertical-offset-100">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
				<br><h3 class="panel-title" align="center">Control de Entrada y Salida del Personal</h3><br>
            </div>
            <div class="panel-body">
                <table class="table table-bordered" align="center">
                    <tr>
                        <h1>
                            <strong>
                                <?php
                                    if($aci==2)
                                    {
                                        echo "Hasta Ma&ntilde;ana: ";
                                    }
                                    else
                                    {
                                        echo "Bienvenido: ";
                                    }
                                ?>
                            </strong>
                        </h1>
                    </tr>
                    <tr>
                        <th>
                            <?php
                                $proceso= new ConsultaPersonaEspecifico($ced);
                                $filaproceso=$proceso->Consulta();
                                $foto=$filaproceso['fotper'];
                                if($foto!=null)
                                {
                                    ?>
                                    <img src="<?php echo $foto;?>" width="200">
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <img src="../../img/silueta.png" width="200">
                                    <?php
                                }
                            ?>
                            <br>
                        </th>
                        <th colspan="2"><h1><strong>
                            <?php
                                echo strtoupper($ape)."<br>".strtoupper($nom);
                            ?></strong></h1>
                        </th>
                    </tr>
                    <tr>
                        <th colspan='2'><h1> <strong>
                            <?php
                                echo "Fecha: " . date('Y-m-d') . "<br>";
                                echo " Hora: " . date('H:i:s') . "<br>";
                                ?></strong></h1>
                        </th>
                    </tr>
                    <tr>
                        <form id='forperpre' name='forperpre' method='post' action='control.php'>
                            <td align='center' colspan='2'>
                                <input class="btn btn-primary"  type='submit' name='Submit' value="Nuevo Ingreso"/>
                            </td>
                        </form>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
}
else
{
    $completa=date('Y-m-d H:i:s');
    include("../../clases/javascript.php");
    include("../../clases/validaformu.php");
?>
<div class="row vertical-offset-100">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" align="center"><strong>Control de Entrada y Salida del Personal</strong></h3>
            </div>
			<div class="panel-heading">
                <h3 class="panel-title" align="center"> </h3>
            </div>
            <div class="panel-body">
				<form id='forcon' name='forcon' method='post' action='regparte.php'>
				<table class="table table-bordered" align="center">
				<tr>
					<td align='center' colspan='2'><h1> <strong>
						<?php
							echo "Fecha: " . date('Y-m-d') . "<br>";
							echo " Hora: " . date('H:i:s') . "<br>";
                        ?></strong></h1>
                    </td>
                </tr>
				<tr>
					<th colspan="2" align="center">
						<strong>Ingresa tu C&oacute;digo de Empleado: </strong>
                    </th>
                </tr>
                <tr>
					<td align='center' colspan='2'>
						<input class="form-control" placeholder="C&oacute;digo de Empleado" type='text' name='codigo' id='codigo' autocomplete='off' onkeypress='return validar7(event)'/>
                    </td>
                </tr>
                <tr>
					<td align='center'>
						<input class="btn btn-primary" type='button' name='Submit' value='Ingresar' onclick="valida_envia_forcon()"/>
                    </td>
                    <td align='center'>
						<input class="btn btn-primary" type='reset' name='Reset' value='Borrar'>
                    </td>
                </tr>
                </form>
                <tr>
                <form id='forregvisitante' name='forregvisitante' method='post' action='regvisitante.php'>
                    <td align='center' colspan='2'>
						<input class="btn btn-primary" type='submit' name='Submit' value='Visitantes'/>
                    </td>
                </form>
                </tr>
                <tr>
				<form id='forsalir' name='forsalir' method='post' action='../login/destruir.php'>
					<td align='center' colspan='2'>
						<input class="btn btn-primary" type='submit' name='Submit' value='Salir'/>
                    </td>
                </form>
                </tr>
				</table>
<?php
}
?>
            </div>
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
            "../../img/conecciones-digitales.webp",
        ], {duration: 7000, fade: 750});
    });
</script>
