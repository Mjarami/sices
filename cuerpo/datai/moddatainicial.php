<?php
session_start();
if($_SESSION['rol'] != 1)
{
header('Location: ../../index.php');
exit();
}
include_once("../../clases/javascript.php");
include_once("../../clases/coneccion.php");
include_once("../../clases/registros.php");
include_once("../../clases/consultas.php");
include_once("../../clases/modificar.php");
if($_POST!=null)
{
$envio=$_POST["datai"];
}
if($_GET!=null)
{
$envio=$_GET["datai"];
}
if($envio==1)
{
if($_POST!=null)
{
$nombre=$_POST["modaci"];
}

if($_GET!=null)
{
$nombre=$_GET["modaci"];
}
$accion= new ConsultaAccionEspecifica($nombre);
$filaaccion=$accion->Consulta();
$idaci=$filaaccion['idaci'];
$nombre=$filaaccion['nomaci'];
$atras="condatainicial.php?datai=1";
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
                <h3 class="panel-title" align="center"><strong>Modificando Acci&oacute;n</strong></h3>
            </div>
                <div class="panel-body">
					<table class="table table-bordered" align="center">
					<form id="formodaci" name="formodaci" method="post" action="actdatainicial.php">
						<tr>
							<td align="center">
								<strong>Nombre</strong>
                            </td>
                            <td>
								<input class type="hidden" name="datai" id="datai" autocomplete="off" value="1"/>
								<input type="hidden" name="idaci" id="idaci" value="<?php echo $idaci;?>"/>
								<input class="form-control" type="text" name="nombre" id="nombre" autocomplete="off" value="<?php echo $nombre;?>" onkeypress="return validar6(event)" style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();"/>
                            </td>
                        <tr>
                            <td align="center" colspan="2">
                                <input class="btn btn-primary" type="submit" name="guardar" id="guardar" value="Guardar"/>
                    </form>
							</td>
						</tr>
						<tr>
							<td align="center" colspan="2"><br>
								<form data-ajax="false" id="forvolver" name="forvolver" method="post" action="<?php echo $atras;?>">
									<input class="btn btn-primary" type="submit" name="Submit" value="Atr&aacute;s"/>
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
    <?php
    }
    if($envio==2)
    {
    if($_POST!=null)
    {
        $nombre=$_POST["modest"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["modest"];
    }
    $estatus= new ConsultaEstatuEspecifico($nombre);
    $filaestatus=$estatus->Consulta();
    $idest=$filaestatus['idest'];
    $nombre=$filaestatus['nomest'];
    $atras="condatainicial.php?datai=2";
    ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: SICES:.</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
	<link href="../../fonts/font-awesome.min.css" rel="stylesheet">
	 <script src="../../js/jquery-2.2.4.min.js"></script>
	 <link href="../../css/sb-admin.css" rel="stylesheet">
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
<<div class="row vertical-offset-100">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" align="center"> Modificando Estatus </h3>
            </div>
                <div class="panel-body">
		<table class="table table-bordered" align="center">
		<form id="formodest" name="formodest" method="post" action="actdatainicial.php" role="form">
			<tr>
				<td align="center">
					<strong>Nombre</strong>
                </td>
                <td>
                    <input type="hidden" name="datai" id="datai" autocomplete="off" value="2"/>
                    <input type="hidden" name="idest" id="idest" value="<?php echo $idest;?>"/>
                    <input class="form-control" type="text" name="nombre" id="nombre" autocomplete="off" value="<?php echo $nombre;?>" onkeypress="return validar6(event)"/>
                </td>
            </tr>
            <tr>
				<td align="center" colspan="2">
					<input class=" btn btn-primary" type="submit" name="guardar" id="guardar" value="Guardar"/>
        </form>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><br>
					<form data-ajax="false" id="forvolver" name="forvolver" method="post" action="<?php echo $atras;?>">
						<input  class="btn btn-primary" type="submit" name="Submit" value="Atr&aacute;s"/>
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
<?php
}
if($envio==3)
{
    if($_POST!=null)
    {
        $nombre=$_POST["modgru"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["modgru"];
    }
    $grupos= new ConsultaGrupoEspecifico($nombre);
    $filagrupos=$grupos->Consulta();
    $idgru=$filagrupos['idgru'];
    $nombre=$filagrupos['nomgru'];
    $atras="condatainicial.php?datai=3";
    ?>
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
                <h3 class="panel-title" align="center"><strong> Modificando Grupo<strong></h3>
            </div>
         <div class="panel-body">
            <table class="table table-bordered" align="center">
            <form id="formodgru" name="formodgru" method="post" action="actdatainicial.php">
               <tr>
                  <td align="center">
                     <strong> Nombre </strong>
                  </td>
                  <td>
                     <input type="hidden" name="datai" id="datai" autocomplete="off" value="3"/>
                     <input type="hidden" name="idgru" id="idgru" value=" <?php echo $idgru;?>"/>
                     <input class="form-control" type="text" name="nombre" id="nombre" autocomplete="off" value="<?php echo $nombre;?>" onkeypress="return validar6(event)"/>
                  </td>
               </tr>
               <tr>
                  <td align="center" colspan="2">
                     <input class=" btn btn-primary" type="submit" name="guardar" id="guardar" value="Guardar"/>
                     </form>
                  </td>
               </tr>
               <tr>
                  <td align="center" colspan="2">
                     <br>
                     <form data-ajax="false" id="forvolver" name="forvolver" method="post" action="<?php echo $atras;?>">
                        <input class=" btn btn-primary" type="submit" name="Submit" value="Atr&aacute;s"/>
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
<?php
}
if($envio==4)
{
    if($_POST!=null)
    {
        $nombre=$_POST["modmot"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["modmot"];
    }
    $motivos= new ConsultaMotivoEspecifico($nombre);
    $filamotivos=$motivos->Consulta();
    $idmot=$filamotivos["idmot"];
    $nombre=$filamotivos["nommot"];
    $atras="condatainicial.php?datai=4";
    ?>
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
                <h3 class="panel-title" align="center"><strong>Modificando Motivo</strong> </h3>
            </div>
        <div class="panel-body">
			<table class="table table-bordered" align="center">
            <form id="formodmot" name="formodmot" method="post" action="actdatainicial.php">
				<tr>
					<td align="center">
						<strong>Nombre</strong>
					</td>
					<td>
						<input type="hidden" name="datai" id="datai" autocomplete="off" value="4"/>
						<input type="hidden" name="idmot" id="idmot" value="<?php echo $idmot;?>"/>
						<input class="form-control"type="text" name="nombre" id="nombre" autocomplete="off" value="<?php echo $nombre;?>" onkeypress="return validar6(event)"/>
					</td>
                </tr>
                <tr>
					<td align="center" colspan="2">
						<input class="btn btn-primary" type="submit" name="guardar" id="guardar" value="Guardar"/>
            </form>
					</td>
               </tr>
				<tr>
					<td align="center" colspan="2"><br>
						<form data-ajax="false" id="forvolver" name="forvolver" method="post" action="<?php echo $atras;?>">
							<input class="btn btn-primary" type="submit" name="Submit" value="Atr&aacute;s"/>
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
<?php
}
if($envio==5)
{
    if($_POST!=null)
    {
        $nombre=$_POST["modrol"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["modrol"];
    }
    $roles= new ConsultaRolEspecifico($nombre);
    $filaroles=$roles->Consulta();
    $idrol=$filaroles["idrol"];
    $nombre=$filaroles["nomrol"];
    $atras="condatainicial.php?datai=5";
    ?>
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
                <h3 class="panel-title" align="center"><strong> Modificando Roles</strong></h3>
            </div>
        <div class="panel-body">
			<table class="table table-bordered" align="center">
            <form id="formodrol" name="formodrol" method="post" action="actdatainicial.php">
				<tr>
					<td align="center">
						<strong>Nombre</strong>
					</td>
					<td>
						<input type="hidden" name="datai" id="datai" autocomplete="off" value="5"/>
						<input type="hidden" name="idrol" id="idrol" value="<?php echo $idrol;?>"/>
						<input class="form-control" type="text" name="nombre" id="nombre" autocomplete="off" value="<?php echo$nombre;?>" onkeypress="return validar6(event)"/>
					</td>
                </tr>
                <tr>
					<td align="center" colspan="2">
						<input class="btn btn-primary" type="submit" name="guardar" id="guardar" value="Guardar" />
            </form>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2"><br>
						 <form data-ajax="false" id="forvolver" name="forvolver" method="post" action=" <?php echo $atras;?>">
							<input class="btn btn-primary"  type="submit" name="Submit" value="Atr&aacute;s"/>
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
<?php
}
if($envio==6)
{
    if($_POST!=null)
    {
        $nombre=$_POST["modsit"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["modsit"];
    }
    $situaciones= new ConsultaSituacionEspecifica($nombre);
    $filasituaciones=$situaciones->Consulta();
    $idsit=$filasituaciones["idsit"];
    $nombre=$filasituaciones["nomsit"];
    $codigo=$filasituaciones["codsit"];
    $atras="condatainicial.php?datai=6";
    ?>
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
                <h3 class="panel-title" align="center"><strong>Modificando Situaci&oacute;n</strong></h3>
            </div>
			<div class="panel-body">
			<table class="table table-bordered" align="center">
            <form id="formodsit" name="formodsit" method="post" action="actdatainicial.php">
				<tr>
					<td align="center">
						<strong>Nombre</strong>
					</td>
                    <td align="center">
                        <strong>Codigo</strong>
                    </td>
				</tr>
                <tr>
                    <td>
                       <input type="hidden" name="datai" id="datai" autocomplete="off" value="6"/>
                       <input type="hidden" name="idsit" id="idsit" value="<?php echo $idsit;?>"/>
                       <input class="form-control" type="text" name="nombre" id="nombre" autocomplete="off" value=" <?php echo $nombre;?>" onkeypress="return validar6(event)"/>
                    </td>
                            
                    <td>
                        <input class="form-control" type="text" name="codigo" id="codigo" autocomplete="off" value="<?php echo $codigo;?>" onkeypress="return validar2(event)" style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();"/>
                    </td>
                </tr>
				<tr>
					<td align="center" colspan="2">
						<input class="btn btn-primary" type="submit" name="guardar" id="guardar" value="Guardar" />
            </form>
                  </td>
				</tr>
				<tr>
					<td align="center" colspan="2"><br>
						<form data-ajax="false" id="forvolver" name="forvolver" method="post" action="<?php echo $atras;?>">
							<input class="btn btn-primary" type="submit" name="Submit" value="Atr&aacute;s"/>
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
<?php
}
if($envio==7)
{
    if($_POST!=null)
    {
        $nombre=$_POST["moddep"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["moddep"];
    }
    $departamentos= new ConsultaDepartamentoEspecifico($nombre);
    $filadepartamentos=$departamentos->Consulta();
    $iddep=$filadepartamentos["iddep"];
    $nombre=$filadepartamentos["nomdep"];
    $idgru=$filadepartamentos["idgru"];
    $nomgru=$filadepartamentos["nomgru"];
    $atras="condatainicial.php?datai=7";
    ?>
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
                <h3 class="panel-title" align="center"><strong>Modificando Departamento</strong></h3>
            </div>
			<div class="panel-body">	
			<table class="table table-bordered" align="center">
				<form id="formoddep" name="formoddep" method="post" action="actdatainicial.php">
				<tr>
					<td align="center">
						<strong>Nombre</strong>
					</td>
					<td align="center">
						<label><strong>Grupo</strong>
					</td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="datai" id="datai" autocomplete="off" value="7"/>
						<input type="hidden" name="iddep" id="iddep" value="<?php echo $iddep; ?>">
						<input class="form-control" type="text" name="nombre" id="nombre" autocomplete="off" value="<?php echo $nombre;?>" onkeypress="return validar6(event)"/>
					</td>
					<td>
						<select class="form-control" name="grupo" id="grupo" size="1"/>
						<option value="<?php echo $idgru;?>"><?php echo $nomgru; ?></option>
							<?php
							$data= new ConsultaGrupos();
							while($filadata=$data->Consulta())
							{
							?>
						<option value="<?php echo $filadata['idgru'];?> ><?php echo
						 $filadata['nomgru'];?>" </option>
							<?php
							}
							?>
						</select></label>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<input class="btn btn-primary" type="submit" name="guardar" id="guardar" value="Guardar"/>
				</form>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2"> <br>
						<form data-ajax="false" id="forvolver" name="forvolver" method="post" action="<?php echo $atras;?>">
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
 <?php
 }
   if($envio==8)
   {
      if($_POST!=null)
      {
         $nombre=$_POST["modgra"];
      }
      if($_GET!=null)
      {
         $nombre=$_GET["modgra"];
      }
      $situaciones= new ConsultaGradoEspecifico($nombre);
      $filasituaciones=$situaciones->Consulta();
      $idgra=$filasituaciones['idgra'];
      $nombre=$filasituaciones['nomgra'];
      $atras="condatainicial.php?datai=8";
	?> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: SICES:.</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
	<link href="../../fonts/font-awesome.min.css" rel="stylesheet">
	<script src="../../js/jquery-2.2.4.min.js"></script>
	<link href="../../css/sb-admin.css" rel="stylesheet">
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
                <h3 class="panel-title" align="center"><strong> Modificando Grados</strong></h3>
            </div>
			<div class="panel-body">	
			<table class="table table-bordered" align="center">
				<form id='formodgra' name='formodgra' method='post' action='actdatainicial.php'>
				<tr>
					<td align='center'>
						<strong>Nombre</strong>
					</td>
					<td>
						<input type='hidden' name='datai' id='datai' autocomplete='off' value='8'/>   
						<input type='hidden' name='idgra' id='idgra' value='<?php echo $idgra;?>'/>
						<input type='text' name='nombre' id='nombre' autocomplete='off' value='<?php echo $nombre;?>' onkeypress='return validar9(event)'/>
                  </td>
                </tr>
                <tr>
					<td align='center' colspan='2'>
						<input class="btn btn-primary" type='submit' name='guardar' id='guardar' value='Guardar' />  
                </form>
					</td>
                </tr>
                <tr>
					<td align='center' colspan='2'><br>
						<form data-ajax='false' id='forvolver' name='forvolver' method='post' action='<?php echo $atras;?>'>               
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
	  <?php
}
?>
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
