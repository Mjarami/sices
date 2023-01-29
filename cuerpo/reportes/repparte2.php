<?php
error_reporting(0);
session_start();
if($_SESSION['rol'] != 1)
{
    header('Location: ../../index.php');
    exit();
}
include_once("../../clases/coneccion.php");
include_once("../../clases/consultas.php");
$a=$_POST["auditar"];
$anoa=date('Y');
$mesa=date('m');
$diaa=date('d');
$fecha=$anoa."-".$mesa."-".$diaa;
if($a==1)
{
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
                    <a class="navbar-brand" href="./">SICES<sup><small><span class="label label-danger">v1.0</span></small></sup> </a>
                </div>
            </nav>
        </div>
        <br><br><br>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" align="center"><strong>Puestas en marcha del sices</strong></h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered" align="center">
                        <tr align='center'>
                            <td>
                                <strong>Fecha</strong>
                            </td>
                            <td>
                                <strong>Hora</strong>
                            </td>
                            <td>
                                <strong>Motivo</strong>
                            </td>
                            <td>
                                <strong>Cedula</strong>
                            </td>
                            <td>
                                <strong>Usuario</strong>
                            </td>
                            <td>
                                <strong>Acción</strong>
                            </td>
                            <td>
                                <strong>Lugar</strong>
                            </td>
                        </tr>
                        <?php
                            $TAMANO_PAGINA = 5;
                            $pagina = $_POST["pagina"];
                            if (!$pagina)
                            {
                                $inicio = 0;
                                $pagina=1;
                            }
                            else
                            {
                                $inicio =($pagina - 1) * $TAMANO_PAGINA;
                            }
                            $data= new ConsultaAuditoriaIniciosSices();
                            $num_total_registros = $data->ConsultaPaginador();
                            if($num_total_registros>=1)
                            {
                                $data2= new ConsultaAuditoriaIniciosSices2($TAMANO_PAGINA, $inicio);
                                $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
                                echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
                                echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
                                $cont=0;
                                while($filadata=$data2->Consulta())
                                {
                                    ?>
                                    <tr align='center'>
                                        <td><?php echo ucwords($filadata['fecpro']);?></td>
                                        <td><?php echo ucwords($filadata['horpro']);?></td>
                                        <td><?php echo ucwords($filadata['nommot']);?></td>
                                        <td><?php echo ucwords($filadata['cedper']);?></td>
                                        <td><?php echo ucwords($filadata['apeper'])." ".ucwords($filadata['nomper']);?></td>
                                        <td><?php echo ucwords($filadata['nomaci']);?></td>
                                        <td><?php echo ucwords($filadata['lugaud']);?></td>
                                    </tr>
                                    <?php
                                }
                                echo ("
                                    </table>
                                    <table align='center'>
                                        <tr>
                                            <td align='center'>
                                ");
                                if ($total_paginas > 1)
                                {
                                    for ($i=1;$i<=$total_paginas;$i++)
                                    {
                                        if ($pagina == $i)
                                        {
                                            //si muestro el índice de la página actual, no coloco enlace
                                            echo ("$pagina</td><td align='center'>");
                                        }
                                        else
                                        {
                                            //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
                                            ?>
                                                <form id='paginacion' name='paginacion' method='post' action='repparte2.php'>
                                                    <input type='hidden' name='auditar' id='auditar' autocomplete='off' value='1' />
                                                    <input type='hidden' name='pagina' id='pagina' autocomplete='off' value="<?php echo $i ?>"/>
                                                    <input type='submit' name='Submit' value="<?php echo $i ?>" />
                                            </td>
                                            <td align='center'>
                                                </form>
                                                <?php
                                        }
                                    }
                                }
                            }
                            else
                            {
                                ?>
                                    <tr align='center'>
                                        <td colspan='10'>No se encontraron registros</td>
                                    </tr>
                                </table>
                                <?php
                            }
}
else
{
    ?>
        <tr align='center'>
	       <td colspan='10'>No se encontraron registros</td>
	   </tr>
    </table>
    <?php
}
?>
    <table align='center' border='0' bgcolor='white'>
        </td>
        </tr>
        <tr>
            <td align='center' colspan='7'>
                <?php
                if($_POST["new"]!=null)
                {
                    echo("
                               <script language='JavaScript'>
                                  var newWindow=window.open('../parte/parte3.php?auditar=1', 'temp', 'left=150', 'top=200', 'height=1000', 'width=1000', 'scrollbar=no', 'location=no', 'resizable=no,menubar=no');
                                  window.close();
                               </script>
                            ");
                }
                ?>
                <form data-ajax='false' id='forimprimirparte' name='forimprimirparte' method='post' action='repparte2.php'>
                    <input type='hidden' name='new' id='new' autocomplete='off' value="1" />
                    <input type='hidden' name='auditar' id='auditar' autocomplete='off' value='1' />
                    <input class="btn btn-primary" type='submit' name='Submit' value='Imprimir'/>
                </form>
            </td>

            <td>
                <form data-ajax='false' id='forvolver' name='forvolver' method='post' action='../menus/menuauditoria.php'>
                    <input  class="btn btn-primary"  type='submit' name='Submit' value='Atr&aacute;s'/>
                </form>
            </td>
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
