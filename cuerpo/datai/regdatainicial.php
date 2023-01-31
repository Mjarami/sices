<?php
session_start();
if ($_SESSION['rol'] != 1) {
    header('Location: ../../index.php');
    exit();
}
include_once("../../clases/coneccion.php");
include_once("../../clases/consultas.php");
include("../../clases/javascript.php");
if ($_POST != null) {
    $envio = $_POST["datai"];
} elseif ($_GET != null) {
    $envio = $_GET["datai"];
}

if ($envio == 1) {
    $data = "Acciones";
    $cons = 1;
} else {
    if ($envio == 2) {
        $data = "Estatus";
        $cons = 2;
    } else {
        if ($envio == 3) {
            $data = "Grupos";
            $cons = 3;
        } else {
            if ($envio == 4) {
                $data = "Motivos";
                $cons = 4;
            } else {
                if ($envio == 5) {
                    $data = "Roles";
                    $cons = 5;
                } else {
                    if ($envio == 6) {
                        $data = "Situaciones";
                        $cons = 6;
                    } else {
                        if ($envio == 7) {
                            $data = "Departamentos";
                            $cons = 7;
                        } else {
                            if ($envio == 8) {
                                $data = "Grados";
                                $cons = 8;
                            } else {
                                header('Location: ../menus/menudata.php');
                                exit();
                            }
                        }
                    }
                }
            }
        }
    }
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
            <a class="navbar-brand" href="./">SICES<sup>
                    <small><span class="label label-danger">v1.0</span></small>
                </sup> </a>
        </div>
    </nav>
</div>

<br><br><br>

<div class="row vertical-offset-100">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" align="center"><strong>Registro de <?php echo $data; ?></strong></h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered" align="center">
                    <form class="form-horizontal" role="form" method="post" id="forregdataini" name='forregdataini'
                          action="datainicial.php">
                        <tr>
                            <td align='center'>
                                <input type='hidden' name='datai' id='datai' value="<?php echo $cons; ?>"/>
                                <input class="form-control" placeholder="Nombre" type='text' name='regdatai'
                                       id='regdatai'
                                       autocomplete='off' <?php if ($cons == 8) { ?> onkeypress="return validar9(event)" <?php } else { ?> onkeypress="return validar6(event)" <?php } ?>
                                       style="text-transform:lowercase;"
                                       onkeyup="javascript:this.value=this.value.toLowerCase();"/>

                            </td>
                            <?php
                                if ($cons == 6) {
                                ?>
                                <td align='center'>
                                    <input class="form-control" placeholder="codigo" type='text' name='codigo'
                                       id='codigo'
                                       autocomplete='off' <?php if ($cons == 8) { ?> onkeypress="return validar9(event)" <?php } else { ?> onkeypress="return validar2(event)" <?php } ?>
                                       style="text-transform:lowercase;"
                                       onkeyup="javascript:this.value=this.value.toLowerCase();"/>
                                </td>
                            <?php
                            }
                            ?>
                            <?php
                                if ($cons == 7) {
                                ?>
                                <td align='center'>
                                    <select class="form-control" name='grupo' id='grupo' size='1'/>
                                    <option value="0">Elije Grupo</option>

                                    <?php
                                    $data = new ConsultaGrupos();
                                    while ($filadata = $data->Consulta()) {
                                        echo("
	                                       <option value=" . $filadata['idgru'] . ">" . $filadata['nomgru'] . "</option>
                                            ");
                                    }
                                    ?>
                                    </select></label>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td align='center' colspan='3'>
                                <input class="btn btn-primary" type='submit' name='guardar' id='guardar'
                                       value='Guardar'/>
                    </form>
                    </td>
                    </tr>
                    <tr>
                        <td align='center' colspan='2'><br>

                            <form data-ajax='false' id='forvolver' name='forvolver' method='post'
                                  action='../menus/menudata.php'>
                                <input class="btn btn-primary" type='submit' name='Submit' value='Atr&aacute;s'/>
                            </form>
                        </td>
                    </tr>
                </table>
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
</body>
</html>
<script src="../../js/bootstrap.js"></script>
<script src="../../js/jquery-backstretch.js"></script>

<script>
    $(document).ready(function () {
        $.backstretch([
            "../../img/conecciones-digitales.webp",
        ], {duration: 7000, fade: 750});
    });
</script>