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
if($_POST!=null)
{
    $envio=$_POST["personal"];
}
if ($_GET!=null)
{
    $envio=$_GET["personal"];
}

if ($envio==1)
{
    $data="Personas";
    $cons=1;
}
else
{
    if ($envio==2)
    {
        $data="Accesos";
        $cons=2;
    }
    else
    {
        header('Location:menus/menupersonal.php');
        exit();
    }
}

$atras="../menus/menupersonal.php";

if($cons==1)
{
?>
<!DOCTYPE html>
<head>
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: SICES:.</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
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
<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title" align="center"><strong>Registro de Nuevas <?php echo $data; ?></strong></h3>
		</div>
		<div class="panel-body">	
			 <form accept-charset="UTF-8" role="form" class="form-horizontal" id='forregpersonal' name='forregpersonal' method='post' action='personal.php'>
			 
			 <table class="table table-bordered" align="center">
			 <tr>
				<td align='center' colspan='3'>
					<strong>Apellidos y Nombres</strong>
				</td>
			</tr>				
			<tr>					 
				<td align='center' colspan='3'>
					<div class="col-xs-3">  
						<input type='hidden' name='personal' id='personal' value="1"/>
					</div>
							
					<div class="col-xs-3">
						<input class="form-control" placeholder="Apellidos" type='text' name='apellido' id='apellido' maxlength='50' onkeypress="return validar6(event)" style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();"/>
					</div>
							
					<div class="col-xs-3">						   
						<input class="form-control"  placeholder="Nombres"  type='text' name='nombre' id='nombre' maxlength='50' onkeypress="return validar6(event)" style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();"/>
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
				<td align="center">
					<div class="col-xs-4">
						<input class="form-control" placeholder="A&ntilde;o" id="ano" type="text" name="ano" size="6" maxlength="4" onkeypress="return validar2(event)" />
					</div>

					<div class="col-xs-4">
						<input class="form-control" placeholder="Mes" id="mes" type="text" name="mes" size="8" maxlength="2" onkeypress="return validar2(event)" />
					</div>
					  
					<div class="col-xs-4">
						<input class="form-control" placeholder=" D&iacute;a" id="dia" type="text" name="dia" size="2" maxlength="2" onkeypress="return validar2(event)" />
					</div>
				</td>
				<td align="center">
					<div class="col-xs-8">
						<select class="form-control" name='departamento' id='departamento'/>
							<option value="0">Seleccione</option>
							 <?php
								$data= new ConsultaDepartamentos();
								while($filadata=$data->Consulta())
								{
							   echo ("
								  <option value=".$filadata['iddep'].">".$filadata['nomdep']."</option>
								   ");
								}
							 ?>
						</select>
					</div>
				</td>				   
				<td align="center">
					<div class="col-xs-12">
						<select class="form-control" name='grado' id='grado' size='1'/>
							<option value="0">Seleccione</option>
							 <?php
								$data2= new ConsultaGrados();
								while($filadata2=$data2->Consulta())
								{
							   echo ("
								  <option value=".$filadata2['idgra'].">".$filadata2['nomgra']."</option>
								   ");
								}
							 ?>
						</select>
					</div>
				</td>			   
			</tr>
			<tr>
				<td align='center'>
					<strong>C&eacute;dula</strong>
				</td>	
				<td align='center'>
					<strong>Tel&eacute;fono Local/Casa </strong>
				</td>
				<td align='center'>
					<strong>Tel&eacute;fono Celular</strong>
				</td>
			</tr>			
			<tr>
			   <td align='center'>
			      <div class="col-xs-8">
			         <input class="form-control" placeholder=" C&eacute;dula"  type='text' name='cedula' id='cedula' size='10' maxlength='9' onkeypress="return validar7(event)" style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();"/>
			      </div>
			   </td> 				
				<td align='center'>
					<div class="col-xs-10">
						<input class="form-control" placeholder="Tel&eacute;fono Local" type='text' name='casa' id='casa' size='9' maxlength='11' onkeypress="return validar2(event)"/>
				    </div>
				</td>			
				<td align='center'>
					<div class="col-xs-10">
						<input  class="form-control" placeholder="Celular" type='text' name='celular' id='celular' size='9' maxlength='11' onkeypress="return validar2(event)"/>
					</div>
				</td>				
			</tr>
			<tr>
				<td align='center' colspan='3'>
					<strong>Correo Electr&oacute;nico</strong>
				</td>
			</tr>
			<tr>
				<td align='center' colspan='3'>
				
					<div class="col-xs-4">
						<input  class="form-control"type='text'  placeholder="Correo" name='correo' id='correo' size='6' maxlength='50' onkeypress="return validar4(event)" style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();"  />
					</div>
					
					<div class="col-xs-4">
						<input  class="form-control" placeholder="Compa&ntilde;ia"type='text' name='compania' id='compania' list='listacompania' size='6' maxlength='50' autocomplete='off' onkeypress="return validar(event)" style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();" />
					</div>
					
						<datalist  id='listacompania'>
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
						
					<div class="col-xs-3">	
						<input class="form-control" placeholder="Tipo de correo" type='text' name='tipo' id='tipo' list='listatipo' size='4' maxlength='10' autocomplete='off' onkeypress="return validar5(event)"  />
						
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
					<strong>Direcci&oacute;n</strong>
				</td>
			</tr>			
			<tr>
				<td align='center' colspan='3'>
				<div class="col-xs-12">	
					<textarea class="form-control" name='direccion' id='direccion' rows="5" cols="50" onkeypress="return validar3(event)" style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();"></textarea>
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
				<form data-ajax='false' id='forvolver' name='forvolver' method='post' action="<?php echo $atras;?>">               
					<input class="btn btn-primary" type='submit' name='Submit' value='Atr&aacute;s'/>
				</form>
				</td>
			</tr>
			</table>
		</div>
	</div>
</div>
</body>
<?php
   }
   ?>
   <?php
   if($cons==2)
   {
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: SICES:.</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
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
<br><br><br><br><br>
<div class="row vertical-offset-100">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
				<h3 class="panel-title" align="center"><strong>Activando Rol Administrativo:</strong></h3>
			</div>
			<div class="panel-body">        
				<form accept-charset="UTF-8" role="form" id='formodsit' name='formodsit' method='post' action='personal.php'>				
				<fieldset>
					<div class="form-group">
						<input type='hidden' name='personal' id='personal' autocomplete='off' value='2'/>   
						<input placeholder="Usuario" class="form-control" type='text' name='usuario' id='usuario' autocomplete='off' onkeypress="return validar4(event)"/>
					</div>
						
					<div class="form-group">
						 <input placeholder="Contrase&ntilde;a" class="form-control" type='password' name='contrasena' id='contrasena' autocomplete='off' onkeypress="return validar4(event)"/>
					</div>
					   
					<div class="form-group">
						<input placeholder="C&eacute;dula" class="form-control" type='text' name='cedula' id='cedula' autocomplete='off' onkeypress="return validar7(event)"/>
					</div>
	   
					<div class="form-group">
						<input class="btn btn-lg btn-primary btn-block" type='submit' name='guardar' id='guardar' value='Guardar' />
				</form>
					 </div>
				<form data-ajax='false' id='forvolver' name='forvolver' method='post' action="<?php echo $atras;?>">
					<input  class="btn btn-lg btn-primary btn-block" type='submit' name='Submit' value='Atr&aacute;s'/>
				</fieldset>
				</form>		
					<?php
					}
					?>
			</div>
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
