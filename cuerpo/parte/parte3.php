<?php
session_start();
if($_SESSION['rol'] != 1)
{
    header('Location: ../../index.php');
    exit();
}
include_once("../../clases/coneccion.php");
include_once("../../clases/consultas.php");
include_once("../../clases/javascript.php");
$a=$_GET["auditar"];
$fecha=date('Y-m-d');
if($a==1)
{
   $Reporte="Modulo Pase";
}
if($a==2)
{
   $Reporte="Datos de acceso";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:SICES:.</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
	<link href="../../fonts/font-awesome.min.css" rel="stylesheet">
	<script src="../../js/jquery-2.2.4.min.js"></script>
	<link href="../../css/sb-admin.css" rel="stylesheet">  
    <script>
        $(document).ready(function()
        {
            $("#export").click(function(e)
            {
                window.open('data:application/vnd.ms-excel,' + encodeURIComponent( $('#consulta').html()));
                e.preventDefault();
            });
        });
    </script>
</head>
<body>
<div class="letterhead" style="margin-bottom:80px;">
    <table border="0" width="100%">
        <tr>
            <td align="left">
                <div class="img"><img src="../img/escudo_umbv.jpg" border="0" width='100' height='100'/></div>
            </td>
            <td align="center">
                <div class="text">
                    Rep&uacute;blica Bolivariana de Venezuela<br>
                    Ministerio del Poder Popular para la Defensa<br>
                    Viceministerio del Poder Popular para la Defensa<br>
                    Universidad Militar Bolivariana de Venezuela<br>
                    Academia Militar de la Aviación Bolivariana<br>
                    Grupo Académico<br><br>
                    <strong style="font-size:20px;"></strong>
                </div>
            </td>
            <td align="right">
                <div class="img"><img src="../img/escudo_amab.jpg" border="0" width='100' height='100'/></div>
            </td>
        </tr>
    </table>
</div>

<div style="display:block; text-align:center;">
    <!-- <input type="button" id="export" value="Generar Archivo" />-->
    <button  class="btn btn-primary" onclick="imprimir()">Reporte del <?php echo $Reporte; ?>  de la fecha <?php echo $fecha; ?></button>
</div>
<br>

<div class="consulta" id="consulta">
  <!--<table id='tblExport' class="table table-bordered">-->
  <div class="panel-heading">
    <h3 class="panel-title" align="center"><strong>Puestas en marcha del sices</strong></h3>
  </div>
  <table class="table table-bordered" align="center">
      <?php
         if($a==1)
         {
            ?>
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
         }
      ?>
      <?php
         if($a==2)
         {
            ?>
	    <tr align='center'>
               <td>
	          <strong>Rol</strong>
	       </td>
	       <td>
	          <strong>Status</strong>
	       </td>
	       <td>
	          <strong>C&eacute;dula</strong>
	       </td>
	       <td>
	          <strong>Usuario</strong>
	       </td>
	       <td>
	          <strong>C&oacute;digo</strong>
	       </td>
	    </tr>
            <?php
         }
      ?>
        <tbody>
        <?php
           if($a==1)
           {
              $data= new ConsultaAuditoriaIniciosSices();
              $num_total_registros = $data->ConsultaPaginador();
              if($num_total_registros>=1)
              {
                while($filadata=$data->Consulta())
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
           </table>
           <?php
          }
        if($a==2)
        {
           if ($_GET["report"]!=null)
           {
              $accesos= new ConsultaAccesos();
              $num_total_registros = $accesos->ConsultaPaginador();
           }
           else
           {
              $accesos= new ConsultaAccesoEspecifico4($buscando);
              $num_total_registros = $accesos->ConsultaPaginador();
           }
           
           if($num_total_registros>=1)
           {
              while($filadata=$accesos->Consulta())
              {
                 ?>
                 <tr align='center'>
                    <td><?php echo ucwords($filadata['nomrol']);?></td>
                    <td><?php echo ucwords($filadata['nomest']);?></td>
                    <td><?php echo $filadata['cedper'];?></td>
                    <td><?php echo $filadata['usuacc'];?></td>
                    <td><?php echo $filadata['codacc'];?></td>
                 </tr><?php
              }
              ?>
              </table>
              <?php
           }
           else
           {
              echo ("
	         <tr align='center'>
	            <td colspan='6'>Busqueda con ningun resultado</td>
	         </tr>
              ");
           }
        }
        ?>
<div class="letterhead" style="margin-bottom:80px;">
    <table border="0" width="100%">
        <tr>
            <td align="center">
                <div class="text">
                   <br><br>
                   ____________________________________<br>
                   CNEL. CARLOS ARTURO ROMERO PADRÓN<br>
                   COMANDANTE DEL GRUPO ACADÉMICO<br><br>
                   ¡CHAVEZ VIVE… LA PATRIA SIGUE!<br>
                   “INDEPENDENCIA Y PATRIA SOCIALISTA… VIVIREMOS Y VENCEREMOS”<br>
                   LA FORTUNA AYUDA A LOS AUDACES
                   <strong style="font-size:20px;"></strong>
                </div>
            </td>
        </tr>
    </table>
</div>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function ()
    {
        $("#btnExport").click(function ()
        {
            $("#tblExport").btechco_excelexport(
                {
                    containerid: "tblExport", datatype: $datatype.Table
                });
        });
    });
    function imprimir()
    {
        window.print();
    }
</script>
</body>
</html>
