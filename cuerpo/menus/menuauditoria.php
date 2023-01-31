<?php
error_reporting(0);
session_start();
if($_SESSION['rol'] != 1)
{
    header('Location: ../index.php');
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
<br><br><br><br><br><br>
<div class="row vertical-offset-100">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" align="center"><strong>Auditorias</strong></h3>
            </div>
            <div class="panel-heading">
                <h3 class="panel-title" align="center">Seleccione la opci&oacute;n a ejecutar: </h3>
            </div>
            <div class="panel-body">
            <table class="table table-bordered" align="center">
				<tr>
					<td align='center'><br>
						<form id='forpersonal' name='forpersonal' method='post' action='../reportes/repparte2.php'>
                          <input type='hidden' name='auditar' id='auditar' autocomplete='off' value='1'/>
                          <input class="btn btn-primary" type='submit' name='Submit' value='Encendido del SICES'/>
						</form>
                    </td>
                 </tr>
				<tr>
					<td align='center'><br>
						<form id='forsalir' name='forsalir' method='post' action='../index.php'>
                          <input class="btn btn-primary" type='submit' name='Submit' value='Atr&aacute;s'/>
                       </form>
                    </td>
                 </tr>
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
