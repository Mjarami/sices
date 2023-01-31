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
<br><br>
<div class="row vertical-offset-100">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" align="center"><strong>Configuraciones del Sistema<strong></h3>
            </div>
            <div class="panel-heading">
                <h3 class="panel-title" align="center"> <b>Seleccione la opci&oacute;n a ejecutar:<b></h3>
            </div>
            <div class="panel-body">
                <form id='forregaci' name='forregaci' method='post' action='procesando.php'>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th> </th>
                            <th> Registrar</th>
                            <th> Consultar</th>
                        </thead>
                        <thead>
                            <th>Acciones </th>
                                <th><input type="radio" id="datai" name="datai" value="1"></th>
                                <th><input type="radio" id="datai" name="datai" value="2"></th>
                           </th>
                        </thead>
                        <thead>
                            <th>Status</th>
                            <th><input type="radio" id='datai' name="datai" value='3'/></th>
                            <th><input type="radio" id='datai' name="datai" value='4'/></th>
                        </thead>
                        <thead>
                            <th>Grupos</th>
                            <th><input type="radio" id='datai' name="datai" value='5'/></th>
                            <th><input type="radio" id='datai' name="datai" value='6'/></th>
                        </thead>
                        <thead>
                            <th>Motivos</th>
                            <th><input type="radio" id='datai' name="datai" value='7'/></th>
                            <th><input type="radio" id='datai' name="datai" value='8'/></th>
                         </thead>
                        <thead>
                            <th>Roles</th>
                            <th><input type="radio" id='datai' name="datai" value='9'/></th>
                            <th><input type="radio" id='datai' name="datai" value='10'/></th>
                        </thead>
                        <thead>
                            <th>Situaciones</th>
                            <th><input type="radio" id='datai' name="datai" value='11'/></th>
                            <th><input type="radio" id='datai' name="datai" value='12'/></th>
                        </thead>
                        <thead>
                            <th>Departamentos</th>
                            <th><input type="radio" id='datai' name="datai" value='13'/></th>
                            <th><input type="radio" id='datai' name="datai" value='14'/></th>
                        </thead>
                        <thead>
							<th>Grados</th>
							<th><input type="radio" id='datai' name="datai" value='15'/></th>
							<th><input type="radio" id='datai' name="datai" value='16'/></th>
                        </thead>
                    </table>
						<th><input class="btn-primary btn-block" type="submit"  name='Submit'  value="Procesar"></th>
                </form>
                <form data-ajax='false' id='forvolver' name='forvolver' method='post' action='../index.php'>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <br><input class="btn-primary btn-block" type="submit"  name='Submit'  value="Atr&aacute;s">
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