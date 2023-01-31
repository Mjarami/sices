<?php
session_start();
if($_SESSION['rol'] != 1)
{
    header('Location: ../../index.php');
    exit();
}
include_once("../../clases/coneccion.php");
include_once("../../clases/consultas.php");
$fecha=$_GET["fecha"];
$p=$_GET["p"];
$fechaactual=date('Y-m-d');
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
                <div class="img"><img src="../../img/fabrica.jpg" border="0" width='100' height='100'/></div>
                <div class="text">
                  Nombre de Empresa<br><br>
                  <strong style="font-size:20px;"></strong>
               </div>
            </td>
        </tr>
    </table>
</div>
	<table border="0" width="100%">
        <tr>
            <td align="right">
                <?php echo $fechaactual;?>
            </td>
        </tr>
    </table>

<div style="display:block; text-align:center;">
    <!-- <input type="button" id="export" value="Generar Archivo" />-->
    <button  class="btn btn-primary" onclick="imprimir()">Parte del d&iacute;a <?php echo $fecha; ?></button>
</div>
<div class="consulta" id="consulta">
    <!--<table id='tblExport' class="table table-bordered">-->
    <table class="table table-bordered">
        <thead>
        <tr align='center'>
            <td>
                <strong>N&deg;</strong>
            </td>
            <td>
                <strong>Grado</strong>
            </td>
            <td colspan='2'>
                <strong>Apellidos y Nombres</strong>
            </td>
            <td>
                <strong>Código</strong>
            </td>
            <td>
                <strong>Situaci&oacute;n</strong>
            </td>
            <td colspan='2'>
                <strong>Desde</strong>
            </td>
            <td colspan='2'>
                <strong>Hasta</strong>
            </td>
            <td>
                <strong>Observaci&oacute;n</strong>
            </td>
        </tr>
        </thead>
        <tbody>
        <?php
        if($p==1)
        {
        
        $data= new ConsultaParteDiarioCivil($fecha);
        $cont=0;
        $num_total_registros = $data->ConsultaPaginador();
        if($num_total_registros>=1)
        {
            while($filadata=$data->Consulta())
            {
                $cont=$cont+1;?>
                <tr align='center'>
                <td><?php echo $cont;?></td>
                <td><?php echo ucwords($filadata['nomgra']);?></td>
                <td><?php echo ucwords($filadata['apeper']);?></td>
                <td><?php echo ucwords($filadata['nomper']);?></td>
                <td><?php echo ucwords($filadata['codsit']);?></td>
                <td><?php echo ucwords($filadata['nomsit']);?></td>
                <?php
                if($filadata['idsit']!=1)
                {
                    if($filadata['idsit']==2 || $filadata['idsit']==3 || $filadata['idsit']==4 || $filadata['idsit']==5)
                    {?>
                        <td><?php echo $filadata['fecpro'];?></td>
                        <td>No a ingresado a la AMAB</td>
                        <td><?php echo $filadata['haspar'];?></td>
                        <td>No se a retirado de la AMAB</td><?php
                    }
                    else
                    {
                        $proce1= new ConsultaProcesoEspecifico2($filadata['idper']);
                        $filaproce1=$proce1->Consulta();
                        $num_total_registros1 = $proce1->ConsultaPaginador();
                        if($num_total_registros1>=1)
                        {
                            if($filaproce1['idsit']==6 || $filaproce1['idsit']==7)
                            {?>
                                <td><?php echo $filaproce1['fecpro'];?></td>
                                <td>No a ingresado a la AMAB</td><?php
                            }
                            else
                            {?>
                                <td><?php echo $filaproce1['fecpro'];?></td>
                                <td><?php echo $filaproce1['horpro'];?></td><?php
                            }
                        }
                        else
                        {?>
                            <td><?php echo $filadata['fecpro'];?></td>
                            <td>No a ingresado a las instalaciones</td><?php
                        }
                        $proce2= new ConsultaProcesoEspecifico3($filadata['idper'], $fecha);
                        $filaproce2=$proce2->Consulta();
                        $num_total_registros2 = $proce2->ConsultaPaginador();
                        if($num_total_registros2>=1)
                        {?>
                            <td><?php echo $filaproce2['fecpro'];?></td>
                            <td><?php echo $filaproce2['horpro'];?></td><?php
                        }
                        else
                        {?>
                            <td colspan='2'><?php echo "No se a retirado";?></td><?php
                        }
                    }
                }
                else
                {
                    $proce3= new ConsultaProcesoEspecifico2($filadata['idper']);
                    $filaproce3=$proce3->Consulta();
                    $num_total_registros3 = $proce3->ConsultaPaginador();
                    if($num_total_registros3>=1)
                    {?>
                        <td><?php echo $filaproce3['fecpro'];?></td>
                        <td><?php echo $filaproce3['horpro'];?></td><?php
                    }
                    else
                    {?>
                        <td colspan='2'>No a ingresado a la AMAB</td><?php
                    }
                    $proce4= new ConsultaProcesoEspecifico3($filadata['idper'], $fecha);
                    $filaproce4=$proce4->Consulta();
                    $num_total_registros4 = $proce4->ConsultaPaginador();
                    if($num_total_registros4>=1)
                    {?>
                        <td><?php echo $filaproce4['fecpro'];?></td>
                        <td><?php echo $filaproce4['horpro'];?></td><?php
                    }
                    else
                    {?>
                        <td colspan='2'><?php echo "No se a retirado";?></td><?php
                    }
                }
                ?>
                <td><?php echo $filadata['obspar'];?></td>
                </tr><?php
            }
        }
        else
        {
            echo ("
	       <tr align='center'>
	             <td colspan='11'>No se encontraron registros</td>
	          </tr>
               </table>
	    ");
        }
        }
        ?>
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
