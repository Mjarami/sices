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
$p=$_POST["personal"];
if($_POST["anoa"]!=null && $_POST["mesa"]!=null && $_POST["diaa"]!=null)
{
    $anoa=$_POST["anoa"];
    $mesa=$_POST["mesa"];
    $diaa=$_POST["diaa"];
    $fecha=$anoa."-".$mesa."-".$diaa;
}
else
{
    $anoa=date('Y');
    $mesa=date('m');
    $diaa=date('d');
    $fecha=$anoa."-".$mesa."-".$diaa;
}
if($p==1)
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
			<h3 class="panel-title" align="center"><strong>Parte Diario Personal Civil</strong></h3>
		</div>
	<div class="panel-body">
	<table class="table table-bordered" align="center">
	<caption>
		<form data-ajax='false' id='forbuscar' name='forbuscar' method='post' action='repparte.php'>
			<h4 align="center">Consulta del parte del: </h4>
		<fieldset>	
		<div class="row vertical-offset-100">
			<div class="col-md-4 col-md-offset-4">				
				<input align="center" type="text" name="anoa" id="anoa" list="lia" size="5" maxlength="4" autocomplete="off" onkeypress="return validar2(event)" value="<?php echo $anoa; ?>" />				
				<input type="text" name="mesa" id="mesa" list="lia2" size="5" maxlength="2" autocomplete="off" onkeypress="return validar2(event)" value="<?php echo $mesa; ?>" />		
				<input type="text" name="diaa" id="diaa" list="lia3" size="5" maxlength="2" autocomplete="off" onkeypress="return validar2(event)" value="<?php echo $diaa; ?>"/>
			<datalist id="lia">
				<?php
				$anosumar=$anoa-5;
				for($a=$anosumar; $a<=$anoa; $a++)
				{?>
					<option value="<?php echo $a; ?>"><?php echo $a; ?></option><?php
				}
				?>
			</datalist>
			<datalist id="lia2">
				<?php
				$messumar=12;
				for($a=1; $a<=$messumar; $a++)
				{?>
					<option value="<?php echo $a; ?>"><?php echo $a; ?></option><?php
				}
				?>
			</datalist>
			<datalist id="lia3">
				<?php
				$diasumar=31;
				for($a=1; $a<=$diasumar; $a++)
				{?>
					<option value="<?php echo $a; ?>"><?php echo $a; ?></option><?php
				}
				?>
			</datalist>
                        <input type='hidden' name='personal' id='personal' value='1'/>
			<input class="btn btn-primary" type='submit' name='buscar' id='buscar' value='Buscar' />
	<fieldset>	
	</caption>
		</div>	
	</div>	
    </form>

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

$data= new ConsultaParteDiarioCivil($fecha);
$num_total_registros = $data->ConsultaPaginador();
if($num_total_registros>=1)
{
    $data2= new ConsultaParteDiarioCivil2($fecha, $TAMANO_PAGINA, $inicio);
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
    echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
    echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
    echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
    $cont=0;
    while($filadata=$data2->Consulta())
    {
        $cont=$cont+1;?>
        <tr align='center'>
        <td><?php echo $cont;?></td>
        <td><?php echo ucwords($filadata['nomgra']);?></td>
        <td><?php echo ucwords($filadata['apeper']);?></td>
        <td><?php echo ucwords($filadata['nomper']);?></td>
        <td><?php echo ucwords($filadata['nomsit']);?></td>
        <?php
        if($filadata['idsit']!=1)
        {
            if($filadata['idsit']==2 || $filadata['idsit']==3 || $filadata['idsit']==4 || $filadata['idsit']==6 || $filadata['idsit']==7 || $filadata['idsit']==10 || $filadata['idsit']==12 || $filadata['idsit']==16 || $filadata['idsit']==17 || $filadata['idsit']==20 || $filadata['idsit']==21 || $filadata['idsit']==23 || $filadata['idsit']==25 || $filadata['idsit']==27 || $filadata['idsit']==30 || $filadata['idsit']==32)
            {?>
                <td><?php echo $filadata['fecpro'];?></td>
                <td>No ha ingresado a la AMAB</td>
                <td><?php echo $filadata['haspar'];?></td>
			<td>No se ha retirado de la AMAB</td><?php
            }
            else
            {
                $proce1= new ConsultaProcesoEspecifico2($filadata['idper']);
                $filaproce1=$proce1->Consulta();
                $num_total_registros1 = $proce1->ConsultaPaginador();
                if($num_total_registros1>=1)
                {
                    if($filaproce1['idsit']==5 || $filaproce1['idsit']==8 || $filaproce1['idsit']==9 || $filaproce1['idsit']==13 || $filaproce1['idsit']==14 || $filaproce1['idsit']==18 || $filaproce1['idsit']==19 || $filaproce1['idsit']==22 || $filaproce1['idsit']==24 || $filaproce1['idsit']==26 || $filaproce1['idsit']==28 || $filaproce1['idsit']==29 || $filaproce1['idsit']==31)
                    {?>
                        <td><?php echo $filaproce1['fecpro'];?></td>
                        <td>No ha ingresado a la AMAB</td><?php
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
                    <td>No ha ingresado a la AMAB</td><?php
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
                <td colspan='2'>No ha ingresado a la AMAB</td><?php
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
                           <form id='paginacion' name='paginacion' method='post' action='repparte.php'>
                                 <input type='hidden' name='personal' id='personal' autocomplete='off' value='1' />
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
                                  var newWindow=window.open('../parte/parte.php?fecha=$fecha&p=1', 'temp', 'left=150', 'top=200', 'height=1000', 'width=1000', 'scrollbar=no', 'location=no', 'resizable=no,menubar=no');
                                  window.close();
                               </script>
                            ");
                }
                ?>
                <form data-ajax='false' id='forimprimirparte' name='forimprimirparte' method='post' action='repparte.php'>
                    <input type='hidden' name='new' id='new' autocomplete='off' value="1" />
                    <input type='hidden' name='personal' id='personal' autocomplete='off' value='1' />
                    <input type='hidden' name='anoa' id='anoa' autocomplete='off' value="<?php echo $anoa; ?>" />
                    <input type='hidden' name='mesa' id='mesa' autocomplete='off' value="<?php echo $mesa; ?>" />
                    <input type='hidden' name='diaa' id='diaa' autocomplete='off' value="<?php echo $diaa; ?>" />
                    <input class="btn btn-primary" type='submit' name='Submit' value='Imprimir'/>
                </form>
            </td>
<?php
}
if($p==2)
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
			<h3 class="panel-title" align="center"><strong>Parte Diario Personal Militar</strong></h3>
		</div>
	<div class="panel-body">
	<table class="table table-bordered" align="center">
	<caption>
		<form data-ajax='false' id='forbuscar' name='forbuscar' method='post' action='repparte.php'>
			<h4 align="center">Consulta del parte del: </h4>
		<fieldset>	
		<div class="row vertical-offset-100">
			<div class="col-md-4 col-md-offset-4">				
				<input align="center" type="text" name="anoa" id="anoa" list="lia" size="5" maxlength="4" autocomplete="off" onkeypress="return validar2(event)" value="<?php echo $anoa; ?>" />				
				<input type="text" name="mesa" id="mesa" list="lia2" size="5" maxlength="2" autocomplete="off" onkeypress="return validar2(event)" value="<?php echo $mesa; ?>" />		
				<input type="text" name="diaa" id="diaa" list="lia3" size="5" maxlength="2" autocomplete="off" onkeypress="return validar2(event)" value="<?php echo $diaa; ?>"/>
			<datalist id="lia">
				<?php
				$anosumar=$anoa-5;
				for($a=$anosumar; $a<=$anoa; $a++)
				{?>
					<option value="<?php echo $a; ?>"><?php echo $a; ?></option><?php
				}
				?>
			</datalist>
			<datalist id="lia2">
				<?php
				$messumar=12;
				for($a=1; $a<=$messumar; $a++)
				{?>
					<option value="<?php echo $a; ?>"><?php echo $a; ?></option><?php
				}
				?>
			</datalist>
			<datalist id="lia3">
				<?php
				$diasumar=31;
				for($a=1; $a<=$diasumar; $a++)
				{?>
					<option value="<?php echo $a; ?>"><?php echo $a; ?></option><?php
				}
				?>
			</datalist>
                        <input type='hidden' name='personal' id='personal' value='2'/>
			<input class="btn btn-primary" type='submit' name='buscar' id='buscar' value='Buscar' />
	<fieldset>	
	</caption>
		</div>	
	</div>	
    </form>

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

$data= new ConsultaParteDiarioMilitar($fecha);
$num_total_registros = $data->ConsultaPaginador();
if($num_total_registros>=1)
{
    $data2= new ConsultaParteDiarioMilitar2($fecha, $TAMANO_PAGINA, $inicio);
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
    echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
    echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
    echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
    $cont=0;
    while($filadata=$data2->Consulta())
    {
        $cont=$cont+1;?>
        <tr align='center'>
        <td><?php echo $cont;?></td>
        <td><?php echo ucwords($filadata['nomgra']);?></td>
        <td><?php echo ucwords($filadata['apeper']);?></td>
        <td><?php echo ucwords($filadata['nomper']);?></td>
        <td><?php echo ucwords($filadata['nomsit']);?></td>
        <?php
        if($filadata['idsit']!=1)
        {
            if($filadata['idsit']==2 || $filadata['idsit']==3 || $filadata['idsit']==4 || $filadata['idsit']==6 || $filadata['idsit']==7 || $filadata['idsit']==10 || $filadata['idsit']==12 || $filadata['idsit']==16 || $filadata['idsit']==17 || $filadata['idsit']==20 || $filadata['idsit']==21 || $filadata['idsit']==23 || $filadata['idsit']==25 || $filadata['idsit']==27 || $filadata['idsit']==30 || $filadata['idsit']==32)
            {?>
                <td><?php echo $filadata['fecpro'];?></td>
                <td>No ha ingresado a la AMAB</td>
                <td><?php echo $filadata['haspar'];?></td>
			<td>No se ha retirado de la AMAB</td><?php
            }
            else
            {
                $proce1= new ConsultaProcesoEspecifico2($filadata['idper']);
                $filaproce1=$proce1->Consulta();
                $num_total_registros1 = $proce1->ConsultaPaginador();
                if($num_total_registros1>=1)
                {
                    if($filaproce1['idsit']==5 || $filaproce1['idsit']==8 || $filaproce1['idsit']==9 || $filaproce1['idsit']==13 || $filaproce1['idsit']==14 || $filaproce1['idsit']==18 || $filaproce1['idsit']==19 || $filaproce1['idsit']==22 || $filaproce1['idsit']==24 || $filaproce1['idsit']==26 || $filaproce1['idsit']==28 || $filaproce1['idsit']==29 || $filaproce1['idsit']==31)
                    {?>
                        <td><?php echo $filaproce1['fecpro'];?></td>
                        <td>No ha ingresado a la AMAB</td><?php
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
                    <td>No ha ingresado a la AMAB</td><?php
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
                <td colspan='2'>No ha ingresado a la AMAB</td><?php
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
                           <form id='paginacion' name='paginacion' method='post' action='repparte.php'>
                                 <input type='hidden' name='personal' id='personal' autocomplete='off' value='2' />
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
                                  var newWindow=window.open('../parte/parte.php?fecha=$fecha&p=2', 'temp', 'left=150', 'top=200', 'height=1000', 'width=1000', 'scrollbar=no', 'location=no', 'resizable=no,menubar=no');
                                  window.close();
                               </script>
                            ");
                }
                ?>
                <form data-ajax='false' id='forimprimirparte' name='forimprimirparte' method='post' action='repparte.php'>
                    <input type='hidden' name='new' id='new' autocomplete='off' value="2" />
                    <input type='hidden' name='personal' id='personal' autocomplete='off' value='2' />
                    <input type='hidden' name='anoa' id='anoa' autocomplete='off' value="<?php echo $anoa; ?>" />
                    <input type='hidden' name='mesa' id='mesa' autocomplete='off' value="<?php echo $mesa; ?>" />
                    <input type='hidden' name='diaa' id='diaa' autocomplete='off' value="<?php echo $diaa; ?>" />
                    <input class="btn btn-primary" type='submit' name='Submit' value='Imprimir'/>
                </form>
            </td>
<?php
}
if($p==3)
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
			<h3 class="panel-title" align="center"><strong>Parte Diario Personal General</strong></h3>
		</div>
	<div class="panel-body">
	<table class="table table-bordered" align="center">
	<caption>
		<form data-ajax='false' id='forbuscar' name='forbuscar' method='post' action='repparte.php'>
			<h4 align="center">Consulta del parte del: </h4>
		<fieldset>	
		<div class="row vertical-offset-100">
			<div class="col-md-4 col-md-offset-4">				
				<input align="center" type="text" name="anoa" id="anoa" list="lia" size="5" maxlength="4" autocomplete="off" onkeypress="return validar2(event)" value="<?php echo $anoa; ?>" />				
				<input type="text" name="mesa" id="mesa" list="lia2" size="5" maxlength="2" autocomplete="off" onkeypress="return validar2(event)" value="<?php echo $mesa; ?>" />		
				<input type="text" name="diaa" id="diaa" list="lia3" size="5" maxlength="2" autocomplete="off" onkeypress="return validar2(event)" value="<?php echo $diaa; ?>"/>
			<datalist id="lia">
				<?php
				$anosumar=$anoa-5;
				for($a=$anosumar; $a<=$anoa; $a++)
				{?>
					<option value="<?php echo $a; ?>"><?php echo $a; ?></option><?php
				}
				?>
			</datalist>
			<datalist id="lia2">
				<?php
				$messumar=12;
				for($a=1; $a<=$messumar; $a++)
				{?>
					<option value="<?php echo $a; ?>"><?php echo $a; ?></option><?php
				}
				?>
			</datalist>
			<datalist id="lia3">
				<?php
				$diasumar=31;
				for($a=1; $a<=$diasumar; $a++)
				{?>
					<option value="<?php echo $a; ?>"><?php echo $a; ?></option><?php
				}
				?>
			</datalist>
                        <input type='hidden' name='personal' id='personal' value='3'/>
			<input class="btn btn-primary" type='submit' name='buscar' id='buscar' value='Buscar' />
	<fieldset>	
	</caption>
		</div>	
	</div>	
    </form>

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

$data= new ConsultaParteDiario($fecha);
$num_total_registros = $data->ConsultaPaginador();
if($num_total_registros>=1)
{
    $data2= new ConsultaParteDiario2($fecha, $TAMANO_PAGINA, $inicio);
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
    echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
    echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
    echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
    $cont=0;
    while($filadata=$data2->Consulta())
    {
        $cont=$cont+1;?>
        <tr align='center'>
        <td><?php echo $cont;?></td>
        <td><?php echo ucwords($filadata['nomgra']);?></td>
        <td><?php echo ucwords($filadata['apeper']);?></td>
        <td><?php echo ucwords($filadata['nomper']);?></td>
        <td><?php echo ucwords($filadata['nomsit']);?></td>
        <?php
        if($filadata['idsit']!=1)
        {
            if($filadata['idsit']==2 || $filadata['idsit']==3 || $filadata['idsit']==4 || $filadata['idsit']==6 || $filadata['idsit']==7 || $filadata['idsit']==10 || $filadata['idsit']==12 || $filadata['idsit']==16 || $filadata['idsit']==17 || $filadata['idsit']==20 || $filadata['idsit']==21 || $filadata['idsit']==23 || $filadata['idsit']==25 || $filadata['idsit']==27 || $filadata['idsit']==30 || $filadata['idsit']==32)
            {?>
                <td><?php echo $filadata['fecpro'];?></td>
                <td>No ha ingresado a la AMAB</td>
                <td><?php echo $filadata['haspar'];?></td>
			<td>No se ha retirado de la AMAB</td><?php
            }
            else
            {
                $proce1= new ConsultaProcesoEspecifico2($filadata['idper']);
                $filaproce1=$proce1->Consulta();
                $num_total_registros1 = $proce1->ConsultaPaginador();
                if($num_total_registros1>=1)
                {
                    if($filaproce1['idsit']==5 || $filaproce1['idsit']==8 || $filaproce1['idsit']==9 || $filaproce1['idsit']==13 || $filaproce1['idsit']==14 || $filaproce1['idsit']==18 || $filaproce1['idsit']==19 || $filaproce1['idsit']==22 || $filaproce1['idsit']==24 || $filaproce1['idsit']==26 || $filaproce1['idsit']==28 || $filaproce1['idsit']==29 || $filaproce1['idsit']==31)
                    {?>
                        <td><?php echo $filaproce1['fecpro'];?></td>
                        <td>No ha ingresado a la AMAB</td><?php
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
                    <td>No ha ingresado a la AMAB</td><?php
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
                <td colspan='2'>No ha ingresado a la AMAB</td><?php
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
                           <form id='paginacion' name='paginacion' method='post' action='repparte.php'>
                                 <input type='hidden' name='personal' id='personal' autocomplete='off' value='3' />
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
                                  var newWindow=window.open('../parte/parte.php?fecha=$fecha&p=3', 'temp', 'left=150', 'top=200', 'height=1000', 'width=1000', 'scrollbar=no', 'location=no', 'resizable=no,menubar=no');
                                  window.close();
                               </script>
                            ");
                }
                ?>
                <form data-ajax='false' id='forimprimirparte' name='forimprimirparte' method='post' action='repparte.php'>
                    <input type='hidden' name='new' id='new' autocomplete='off' value="3" />
                    <input type='hidden' name='personal' id='personal' autocomplete='off' value='3' />
                    <input type='hidden' name='anoa' id='anoa' autocomplete='off' value="<?php echo $anoa; ?>" />
                    <input type='hidden' name='mesa' id='mesa' autocomplete='off' value="<?php echo $mesa; ?>" />
                    <input type='hidden' name='diaa' id='diaa' autocomplete='off' value="<?php echo $diaa; ?>" />
                    <input class="btn btn-primary" type='submit' name='Submit' value='Imprimir'/>
                </form>
            </td>
<?php
}
?>
            <td>
                <form data-ajax='false' id='forvolver' name='forvolver' method='post' action='../menus/menuparte.php'>
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
