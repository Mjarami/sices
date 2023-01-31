<?php
error_reporting(0);
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
    $envio=$_POST["personal"];
    $cedula=$_POST["modper"];
}
else
{
	if($_GET!=null)
	{
    	$envio=$_GET["personal"];
    	$cedula=$_GET["modper"];
    	$archivo=$_GET["archivo"];
	}
	else
	{
    	header('Location: conpersonal.php?personal=1');
    	exit();
	}
}

if($envio==1)
{
    $persona= new ConsultaPersonaEspecifico($cedula);
    $filapersona=$persona->Consulta();
    $idper=$filapersona['idper'];
    $departamento=$filapersona['nomdep'];
    $grado=$filapersona['nomgra'];
    $apellido=$filapersona['apeper'];
    $nombre=$filapersona['nomper'];
    $ano=$filapersona['anoper'];
    $mes=$filapersona['mesper'];
    $dia=$filapersona['diaper'];
    $cedula=$filapersona['cedper'];
    $telefono=$filapersona['telper'];
    $celular=$filapersona['celper'];
    $correo=$filapersona['corper'];
    $compania=$filapersona['nomcco'];
    $tipo=$filapersona['nomtco'];
    $direccion=$filapersona['dirper'];
    $foto=$filapersona['fotper'];
?>
<!DOCTYPE html>
<head>
   	<meta content="text/html; charset=utf-8" />
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
<br><br>
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title" align="center"><strong>Modificando Datos de Personas</strong>  </h3>
        </div>
    <div class="panel-body">
			<table class="table table-bordered" align="center">
				<tr>
					<td align='center' colspan='3'>
						<?php
							if($archivo==1)
							{
								echo "<script language='javascript'>
      							alert ('Archivo subido');
    							</script>";
							}
							else
							{
								if($archivo==2)
								{
									echo "<script language='javascript'>
      									alert ('Archivo invalido');
    								</script>";
								}
								else
								{
									if($archivo==3)
									{
										echo "<script language='javascript'>
      										alert ('Error al subir archivo');
    									</script>";
									}
								}
							}
							if($foto!=null)
                            {
                            	?>
                                <img src="<?php echo $foto;?>" width="200">
                                <?php
                            }
                            else
                            {
                            	?>
                                <img src="../../img/silueta.png" width="200">
                                <?php
                            }
                      	?>
                      	<form name="rima" enctype="multipart/form-data" action="procfotos.php" method="post">
							<input id="ima" name="ima" type="file" />
							<?php
								$_SESSION['cedula'] = $cedula;
							?>
							<input type="submit" value="Subir archivo" />
						</form>
					</td>
				</tr>
				<tr>
					<form id='formodper' name='formodper' method='post' action='actpersonal.php'>
					<td align='center' colspan='3'>
						<strong> Apellidos y Nombres</strong>
					</td>
				</tr>
				<tr>
					<td align='center' colspan='3'>
				
						<input type='hidden' name='personal' id='personal' value="1"/>
				
				
						<input type='hidden' name='idper' id='idper' value="<?php echo $idper;?>"/>
			
					<div class="col-xs-6">
						<input class="form-control" type='text' name='apellido' id='apellido' maxlength='50' autocomplete='off' value="<?php echo $apellido;?>" onkeypress="return validar6(event)"  style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
					</div>	
					
					<div class="col-xs-6">
						<input class="form-control" type='text' name='nombre' id='nombre' maxlength='50' autocomplete='off' value="<?php echo $nombre;?>" onkeypress="return validar6(event)"  style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
					</div>	
					
					</td>
				</tr>
				<tr>
					<td align='center'>
						<strong>Fecha de Nacimiento</strong>
					</td>
					<td align='center'>
						<strong>Departamento</strong>
					</td>
					<td align='center'>
						<strong>Grado</strong>
					</td>
				</tr>
				<tr>
					<td align='center'>
					<div class="col-xs-4">
						<input class="form-control" id="ano" type="text" name="ano" size="4" maxlength="4" value="<?php echo $ano;?>" onkeypress="return validar2(event)" />
					</div>
					
					<div class="col-xs-4">
						<input class="form-control"  id="mes" type="text" name="mes" size="2" maxlength="2" value="<?php echo $mes;?>" onkeypress="return validar2(event)" />
					</div>
					
					<div class="col-xs-4">
						<input class="form-control" id="dia" type="text" name="dia" size="2" maxlength="2" value="<?php echo $dia;?>" onkeypress="return validar2(event)" />
					</div>
					
					</td>
					<td align='center'>
					<div class="col-xs-8">
						<select  class="form-control" name='departamento' id='departamento' size='1'/>
						<option value="<?php echo $departamento;?>"><?php echo $departamento;?></option>
						<?php
						$data= new ConsultaDepartamentos();
						while($filadata=$data->Consulta())
						{
							echo ("
						   <option value=".$filadata['nomdep'].">".$filadata['nomdep']."</option>
							");
						}
						?>
						</select>
					</div>
					
					</td>
					<td align='center'>
					<div class="col-xs-12">
						<select class="form-control" name='grado' id='grado' size='1'/>
						<option value="<?php echo $grado;?>"><?php echo $grado;?></option>
						<?php
						$data= new ConsultaGrados();
						while($filadata=$data->Consulta())
						{
							echo ("
						   <option value=".$filadata['nomgra'].">".$filadata['nomgra']."</option>
							");
						}
						?>
						</select>
					</div>
					</td>
				</tr>
				<tr>
					<td align='center'>
						<strong></strong>
					</td>
					<td align='center' colspan='2'>
						<strong>Tel&eacute;fonos: </strong>
					</td>
				</tr>
				<tr>
					<td align='center'>
						<strong> C&eacute;dula </strong>
					</td>
					<td align='center'>
						<strong> Tel&eacute;fono Local </strong>
					</td>
					<td align='center'>
						<strong> Tel&eacute;fono Celular </strong>
					</td>
				</tr>
				<tr>
					<td align='center'>
						<div class="col-xs-8">
							<input class="form-control" type='text' name='cedula' id='cedula' size='7' maxlength='9' autocomplete='off' value="<?php echo $cedula;?>" onkeypress="return validar7(event)"/>
						</div>
					</td>
					<td align='center'>
						<div class="col-xs-10">
							<input class="form-control" type='text' name='casa' id='casa' size='9' maxlength='11' autocomplete='off' value="<?php echo $telefono;?>" onkeypress="return validar2(event)"/>
						</div>
					</td>
					<td align='center'>
						<div class="col-xs-12">
							<input class="form-control" type='text' name='celular' id='celular' size='9' maxlength='11' autocomplete='off' value="<?php echo $celular;?>" onkeypress="return validar2(event)"/>
						</div>
					</td>
				</tr>
				<tr>
					<td align='center' colspan='3'>
						<strong>Correo Electr&oacute;nico </strong>
					</td>
				</tr>
				<tr>
					<td align='center' colspan='3'>
					<div class="col-xs-4">
						<input class="form-control" type='text' name='correo' id='correo' maxlength='50' autocomplete='off' value="<?php echo $correo;?>" onkeypress="return validar4(event)" />
					</div>
					
					<div class="col-xs-4">
						<input class="form-control" type='text' name='compania' id='compania' list='listacompania' size='6' maxlength='50' autocomplete='off' value="<?php echo $compania;?>" onkeypress="return validar5(event)" />
						<datalist id='listacompania'>
							<?php
							$companias= new ConsultaCompaniaCorreo();
							while($filacompanias=$companias->Consulta())
							{
								echo ("
						   <option value=".$filacompanias['nomcco'].">".$filacompanias['nomcco']."</option>
							");
							}
							?>
						</datalist>
					</div>
						
					<div class="col-xs-4">
						<input class="form-control" type='text' name='tipo' id='tipo' list='listatipo' size='4' maxlength='10' autocomplete='off' value="<?php echo $tipo;?>" onkeypress="return validar(event)" />
						<datalist id='listatipo'>
							<?php
							$tipos= new ConsultaTipoCorreo();
							while($filatipos=$tipos->Consulta())
							{
								echo ("
						   <option value=".$filatipos['nomtco'].">".$filatipos['nomtco']."</option>
							");
							}
							?>
						</datalist>
					</div>
					</td>
				</tr>
				<tr>
					<td align='center' colspan='3'>
						<strong> Direcci&oacute;n </strong>
					</td>
				</tr>
				<tr>
					<td align='center' colspan='3'>
					<div class="col-xs-12">
						<textarea class="form-control" name='direccion' id='direccion' rows="5" cols="50" autocomplete='off' onkeypress="return validar3(event)"><?php echo $direccion;?></textarea>
					</div>
					</td>
				</tr>
				<tr>
					<td align='center' colspan='3'>
						<input class="btn btn-primary" type='submit' name='guardar' id='guardar' value='Guardar'/>
			</form>
			</td>
			</tr>
			<tr>
				<td align='center' colspan='3'>
					<br>
					<form data-ajax='false' id='forvolver' name='forvolver' method='post' action='conpersonal.php?personal=1'>
						<input class="btn btn-primary" type='submit' name='Submit' value='Atr&aacute;s'/>
					</form>
				</td>
			</tr>
		</table>
		</div>
	</div>
</div>
</
>
</html>
<?php
}
?>
<?php
if($envio==2)
{
    $acceso= new ConsultaAccesoEspecifico($cedula);
    $filaacceso=$acceso->Consulta();
    $idper=$filaacceso['idper'];
    $rol=$filaacceso['nomrol'];
    $usuario=$filaacceso['usuacc'];
    $codigo=$filaacceso['codacc'];
?>
<br><br><br><br><br>
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
			<a class="navbar-brand" href="./">SICES <sup><small><span class="label label-danger">v1.0</span></small></sup> </a>
        </div>
    </nav>
</div>
<br><br><br>
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title" align="center"><strong>Modificando Acceso Administrativo</strong></h3>
		</div>
    <div class="panel-body">
		<table class="table table-bordered" align="center">
		<form accept-charset="UTF-8" id='formodper' name='formodper' method='post' action='actpersonal.php'>
		<tr>
			<td align='center'>
				<label><strong>Rol</strong>
			</td>
			<td align='center'>
				<strong>Usuario</strong>
			</td>
			<td align='center'>
				<strong>C&oacute;digo de empleado</strong>
			</td>
		</tr>
		<tr>
			<td align='center'>
			<div class="col-xs-12">
				<select class="form-control" name='rol' id='rol' size='1'/>
					<option value="<?php echo $rol;?>"><?php echo $rol;?></option>
						<?php
						$data= new ConsultaRoles();
						while($filadata=$data->Consulta())
						{
							echo ("
						   <option value=".$filadata['nomrol'].">".$filadata['nomrol']."</option>
							");
						}
						?>
				</select></label>
				</div>
			</td>
			<td align='center'>
				<input type='hidden' name='personal' id='personal' value="2"/>
				<input type='hidden' name='idper' id='idper' value="<?php echo $idper;?>"/>
				<div class="col-xs-12">
				<input class="form-control" type='text' name='usuario' id='usuario' maxlength='50' autocomplete='off'  value="<?php echo $usuario;?>" onkeypress="return validar7(event)"/>
				</div>
			</td>
			<td>
			<?php
				do
				{
					if($_POST['modificar']==2)
					{
						if($_POST['genera']!=null)
						{
							$string=randomText($tamaño);
							$data= new ConsultaCodigoEspecifico($string);
							$num_total_registros = $data->ConsultaPaginador();
							if($num_total_registros>=1)
							{
								$denuevo=1;
							}
							else
							{
								?>
								<input type='text' name='codigo' id='codigo' value="<?php echo $string; ?>"/>
								<?php
								$denuevo=0;
							}
						}
						else
						{
							?>
							<input type='text' name='codigo' id='codigo' value="<?php echo $codigo; ?>"/><?php
							$denuevo=0;
						}
					}
					else
					{
						if($_POST['genera']!=null)
						{
							$string=randomText($tamaño);
							$data= new ConsultaCodigoEspecifico($string);
							$num_total_registros = $data->ConsultaPaginador();
							if($num_total_registros>=1)
							{
								$denuevo=1;
							}
							else
							{
								?>
								<input type='hidden' name='codigo' id='codigo' value="<?php echo $string; ?>"/><?php
								echo $string;
								$denuevo=0;
							}
						}
						else
						{
							?>
							<input type='hidden' name='codigo' id='codigo' value="<?php echo $codigo; ?>"/><?php
							echo $codigo;
							$denuevo=0;
						}
					}
				}
				while($denuevo==1);
			?>
			</td>
		</tr>
		<tr>
			<td align='center' colspan='3'>
				<input class="btn btn-primary" type='submit' name='guardar' id='guardar' value='Guardar'/>
		</form>
			</td>
		</tr>
		<tr>
			<?php
				$modifica=$_POST['modificar'];
				if($modifica==2)
				{
					?>
					<td align='center' colspan='3'><br>
						<form accept-charset="UTF-8" role="form" id='forgencod' name='forgencod' method='post' action='modpersonal.php'>
							<input type='hidden' name='modificar' id='modificar' value="<?php echo $modifica;?>"/>
							<input type='hidden' name='genera' id='genera' value="1"/>
							<input type='hidden' name='personal' id='personal' value="2"/>
							<input type='hidden' name='modper' id='modper' value="<?php echo $cedula;?>"/>
							<input class="btn btn-primary" type='submit' name='guardar' id='guardar' value="Generar C&oacute;digo"/>
						</form>
						<form accept-charset="UTF-8" role="form" id='formodcod' name='formodcod' method='post' action='modpersonal.php'>
							<input type='hidden' name='modificar' id='modificar' value="1"/>
							<input type='hidden' name='personal' id='personal' value="2"/>
							<input type='hidden' name='modper' id='modper' value="<?php echo $cedula;?>"/>
							<input class="btn btn-primary" type='submit' name='guardar' id='guardar' value="Desactivar Modificar C&oacute;digo"/>
						</form>
					</td>
					<?php
				}
				else
				{
					?>
					<td align='center' colspan='3'><br>
						<form accept-charset="UTF-8" role="form" id='forgencod' name='forgencod' method='post' action='modpersonal.php'>
							<input type='hidden' name='modificar' id='modificar' value="<?php echo $modifica;?>"/>
							<input type='hidden' name='genera' id='genera' value="1"/>
							<input type='hidden' name='personal' id='personal' value="2"/>
							<input type='hidden' name='modper' id='modper' value="<?php echo $cedula;?>"/>
							<input class="btn btn-primary" type='submit' name='guardar' id='guardar' value="Generar C&oacute;digo"/>
						</form>
						<form accept-charset="UTF-8" role="form" id='formodcod' name='formodcod' method='post' action='modpersonal.php'>
							<input type='hidden' name='modificar' id='modificar' value="2"/>
							<input type='hidden' name='personal' id='personal' value="2"/>
							<input type='hidden' name='modper' id='modper' value="<?php echo $cedula;?>"/>
							<input class="btn btn-primary" type='submit' name='guardar' id='guardar' value="Activar Modificar C&oacute;digo"/>
						</form>
					</td>
					<?php
				}
			?>		
		</tr>
		<tr>
			<td align='center' colspan='3'><br>
				<form accept-charset="UTF-8" role="form" data-ajax='false' id='forvolver' name='forvolver' method='post' action='conpersonal.php?personal=2'>
					<input class="btn btn-primary" type='submit' name='Submit' value='Atr&aacute;s'/>
				</form>
			</td>
		</tr>
		</table>
	<?php
	}
	?>
		</div>
	</div>
</div>
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
