<?php
session_start();
if($_SESSION['rol'] != 1)
{
    header('Location: ../../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: SICES:.</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
	<link href="../../fonts/font-awesome.min.css" rel="stylesheet">
	<script src="../../js/jquery-2.2.4.min.js"></script>
	<link href="../../css/sb-admin.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="./">SICES<sup><small><span class="label label-danger">v1.0</span></small></sup> </a>
        </div>
    </nav>
</div>
<br><br><br><br><br><br>
<div class="row vertical-offset-100">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" align="center"><strong>Personal</strong></h3>
            </div>
            <div class="panel-heading">
                <h3 class="panel-title" align="center"> Seleccione la opción a ejecutar: </h3>
            </div>
            <div class="panel-body" align="center">
                <form id='formenper' name='formenper' method='post' action='procesando.php'>
				<fieldset>
                    <table class="table table-bordered table-hover" align="center">
                        <thead>
                            <th> Acciones: </th>
                            <th> Registrar</th>
                            <th> Consultar</th>
                        </thead>
                        <thead>
                            <th> Persona </th>
                            <th><input type="radio" id="personal" name="personal" value="1"></th>
                            <th><input type="radio" id="personal" name="personal" value="2"></th>
                        </th>
                        </thead>
                        <thead>
                            <th>Accesos</th>
                            <th><input type="radio" id='personal' name="personal" value='3'/></th>
                            <th><input type="radio" id='personal' name="personal" value='4'/></th>
                        </thead>				
                    </table>					
                    <th><input class=" btn btn-primary btn-block" type="submit"  name='Submit' value="Procesar"></th>
                	</fieldset>
				</form>
                <form data-ajax='false' id='forvolver' name='forvolver' method='post' action='../index.php'>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <br>
                            <input class="btn btn-primary btn-block" type="submit"  name='Submit'  value="Atr&aacute;s">
                        </thead>

                        </form>
                    </table>
            </div>
        </div>
    </div>
</div>
<?php
include("../footer.php");
?>
</div>
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