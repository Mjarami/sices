<?php
error_reporting(0);
session_start();
if ($_SESSION['rol'] == 1) {
    header('Location: destruir.php');
    exit();
}
include("../../clases/javascript.php");
include("../../clases/validaformu.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:SICES:.</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/estilos.css" rel="stylesheet" type="text/css">
    <link href="../../fonts/font-awesome.min.css" rel="stylesheet">
    <link href="../../css/sb-admin.css" rel="stylesheet">
    <script src="../../js/jquery-2.2.4.min.js"></script>
</head>

<body>
    <br><br><br><br>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="./">SICES<sup><small><span
                                class="label label-danger">v1.0</span></small></sup> </a>
            </div>
        </nav>
    </div>
    <header>
        <div class="col-md-12 text-center">
            <b>BIENVENIDOS AL SICES</b>
        </div>
        <div id="cintillo" class="col-md-12">
            <div class="marquesina">
                <ul class="col-md-12 text-center">
                    <li>"El fracaso es la manera de empezar de nuevo, pero más inteligente"</li>
                    <li>"El único lugar en que el éxito viene antes que el trabajo es en el diccionario"</li>
                    <li>"No cuentes los días, haz que los días cuenten"</li>
                    <li>"Hoy va a ser tu gran día"</li>
                    <li>"La felicidad no es algo hecho. Proviene de tus propias acciones"</li>
                    <li>"Todo es práctica"</li>
                    <li>"Es posible que las lecciones te gusten o que te parezcan irrelevantes y tontas, pero no hay errores, sólo lecciones"</li>
                    <li>"Este es tu momento"</li>
                </ul>
            </div>
        </div>
    </header>
    <br><br><br><br>
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary" align="center">
                <div class="panel-heading center">
                    <h3 class="panel-title" align="center">Ingresa tus datos de acceso:</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" id='forauxiliar' name='forauxiliar' method='post'
                        action='regauxiliar.php'>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="C&eacute;dula" type="text" name="cedula"
                                    id="cedula" autocomplete="off" onkeypress="return validar7(event)"
                                    style="text-transform:lowercase;"
                                    onkeyup="javascript:this.value=this.value.toLowerCase();" />
                            </div>
                            <input class="btn btn-lg btn-primary btn-block" type='button' name='Submit'
                                value="Registrarse" onclick="valida_envia_forauxiliar()">
                            <input class="btn btn-lg btn-primary btn-block" type="reset" name='Reset' value="Borrar">
                        </fieldset>
                    </form>

                    <form accept-charset="UTF-8" role="form" id='forlogeo' name='forlogeo' method='post'
                        action='login.php'>
                        <input class="btn btn-lg btn-primary btn-block" type="submit" name='Submit' value="Ingresar">
                    </form>
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
<script src="../../js/jquery.easing.min.js"></script>
<script src="../../js/jquery.easy-ticker.js"></script>
<script>
    $(document).ready(function () {
        var dd = $('.marquesina').easyTicker({
            direction: 'up',
            easing: 'easeInOutBack',
            speed: 'slow',
            interval: 16000,
            height: 'auto',
            visible: 1,
            mousePause: 0
        }).data('easyTicker');
    });
</script>
<script>
    $(document).ready(function () {
        $.backstretch([
            "../../img/conecciones-digitales.webp",
        ], { duration: 7000, fade: 750 });
    });
</script>