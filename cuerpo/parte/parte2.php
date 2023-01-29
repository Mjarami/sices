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
$personal=$_GET["personal"];
$buscando=$_GET["buscando"];
$fecha=date('Y-m-d');
if($personal==1)
{
   $Reporte="Datos de personal";
}
elseif($personal==2)
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
    <button  class="btn btn-primary" onclick="imprimir()">Reporte de <?php echo $Reporte; ?>  del d&iacute;a <?php echo $fecha; ?></button>
</div>
<br>

<div class="consulta" id="consulta">
    <!--<table id='tblExport' class="table table-bordered">-->
   <table class="table table-bordered" align="center">
      <?php
         if($personal==1)
         {
            ?>
	    <tr align='center'>
               <td>
	          <strong>Dpto.</strong>
	       </td>
	       <td>
	          <strong>Grado</strong>
	       </td>
               <td>
	          <strong>Codigo Empleado</strong>
	       </td>
	       <td>
	          <strong>C&eacute;dula</strong>
	       </td>
	       <td>
	          <strong>Apellidos</strong>
	       </td>
	       <td>
	          <strong>Nombres</strong>
	       </td>
	       <td>
	          <strong>Tel&eacute;fono</strong>
	       </td>
	       <td>
	          <strong>Celular</strong>
	       </td>
	       <td>
	          <strong>Correo</strong>
	       </td>
	       <td>
	          <strong>Direcci&oacute;n</strong>
	       </td>
	    </tr>
            <?php
         }
      ?>
      <?php
         if($personal==2)
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
           if($personal==1)
           {
              if ($_GET["report"]!=null)
              {
                 $personas= new ConsultaPersonas();
                 $num_total_registros = $personas->ConsultaPaginador();
              }
              else
              {
                 $personas= new ConsultaPersonaEspecifico3($buscando);
                 $num_total_registros = $personas->ConsultaPaginador();
              }
              if($num_total_registros>=1)
              {
                 while($filadata=$personas->Consulta())
                 {
                    $esta= new ConsultaAccesoEspecifico($filadata['cedper']);
                    $filaesta=$esta->Consulta();
                    $nomest=$filaesta['nomest'];
                    $codper=$filaesta['codacc'];
                    ?>
                    <tr align='center'>
                       <td><?php echo ucwords($filadata['nomdep']);?></td>
                       <td><?php echo ucwords($filadata['nomgra']);?></td>
                       <td><?php echo $codper;?></td>
                       <td><?php echo $filadata['cedper'];?></td>
                       <td><?php echo ucwords($filadata['apeper']);?></td>
                       <td><?php echo ucwords($filadata['nomper']);?></td>
                       <td><?php echo $filadata['telper'];?></td>
                       <td><?php echo $filadata['celper'];?></td>
                       <?php
                          $email=$filadata['corper']."@".$filadata['nomcco'].".".$filadata['nomtco'];
                       ?>
                       <td><?php echo $email;?></td>
                       <td><?php echo ucwords($filadata['dirper']);?></td>
                    </tr>
                    <?php
                 }
                 ?>
                 </table>
                 <?php
              }
              else
              {
                 echo ("
	            <tr align='center'>
	               <td colspan='11'>Busqueda con ningun resultado</td>
	            </tr>
                 ");
              }
              ?>
           </table>
           <?php
        }
        if($personal==2)
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
