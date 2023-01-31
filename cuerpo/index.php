<?php
session_start();
if ($_SESSION['rol'] != 1) {
    header('Location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:SICES:.</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../fonts/font-awesome.min.css" rel="stylesheet">
    <link href="../css/sb-admin.css" rel="stylesheet">
    <script src="../js/jquery-2.2.4.min.js"></script>
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
    <br><br><br>
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <br>
                    <h2 class="panel-title" align="center"><strong>Panel Principal del Administrador</strong></h2><br>
                </div>
                <div class="panel-body">
                    <div class="panel-heading">
                        <h3 class="panel-title" align="center"> <strong>Selecciona la opci&oacute;n a ejecutar:</strong>
                        </h3>
                    </div>
                    <form accept-charset="UTF-8" role="form" id="forcondat" name="forcondat" method="post"
                        action="parte/control.php">
                        <fieldset>
                            <div class="form-group">
                                <input type='hidden' name='datai' id='datai' autocomplete='off' />
                                <input class="btn btn-lg btn-primary btn-block" type="submit" name='Submit'
                                    value="Iniciar Control">
                            </div>
                        </fieldset>
                    </form>
                    <form accept-charset="UTF-8" role="form" id="forpersonal" name="forpersonal" method="post"
                        action="menus/menupersonal.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="btn btn-lg btn-primary btn-block" type="submit" name='Submit'
                                    value="Personal">
                                <input type='hidden' name='personal' id='personal' autocomplete='off' />
                            </div>
                        </fieldset>
                    </form>
                    <form accept-charset="UTF-8" role="form" id="forregina" name="forregina" method="post"
                        action="parte/inasistencia.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="btn btn-lg btn-primary btn-block" type="submit" name='Submit'
                                    value="Inasistencia">
                                <input type='hidden' name='inasistencia' id='inasistencia' autocomplete='off' />
                            </div>
                        </fieldset>
                    </form>
                    <form accept-charset="UTF-8" role="form" id="forconpar" name="forconpar" method="post"
                        action="menus/menuparte.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="btn btn-lg btn-primary btn-block" type="submit" name='Submit'
                                    value="Reportes">
                                <input type='hidden' name='inasistencia' id='inasistencia' autocomplete='off' />
                            </div>
                        </fieldset>
                    </form>
                    <form accept-charset="UTF-8" role="form" id="forcondat" name="forcondat" method="post"
                        action="menus/menudata.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="btn btn-lg btn-primary btn-block" type="submit" name='Submit'
                                    value="Datos del Sistema">
                                <input type='hidden' name='datai' id='datai' autocomplete='off' />
                            </div>
                        </fieldset>
                    </form>
                    <form accept-charset="UTF-8" role="form" id="forconaud" name="forconaud" method="post"
                        action="menus/menuauditoria.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="btn btn-lg btn-primary btn-block" type="submit" name='Submit'
                                    value="Auditorias">
                                <input type='hidden' name='datai' id='datai' autocomplete='off' />
                            </div>
                        </fieldset>
                    </form>
                    <form accept-charset="UTF-8" role="form" id="forsalir" name="forsalir" method="post"
                        action="login/destruir.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="btn btn-lg btn-primary btn-block" type="submit" name='Submit'
                                    value="Cerrar Sesi&oacute;n">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>
<script src="../js/bootstrap.js"></script>
<script src="../js/jquery-backstretch.js"></script>
<script>
    $(document).ready(function () {
        $.backstretch([
            "../img/conecciones-digitales.webp",
        ], { duration: 7000, fade: 750 });
    });
</script>