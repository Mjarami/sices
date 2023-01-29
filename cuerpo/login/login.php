<?php
   error_reporting(0);
   session_start();
   if($_SESSION['rol'] == 1)
   {
       header('Location: destruir.php');
       exit();
   }
   $usuario="";
   $contrasena="";
   if ($_POST)
   {
       $usuario = $_POST['usuario'];
       $contrasena = sha1($_POST['contrasena']);
   }
   
   include("../../clases/validaformu.php");

   if($usuario!="" && $contrasena!="")
   {
       include_once("../../clases/coneccion.php");
       include_once("../../clases/registros.php");
       include_once("../../clases/consultas.php");
       $log= new ConsultaAccesoEspecifico2($usuario, $contrasena);
       $filalog=$log->Consulta();
       $num_total_registros=$log->ConsultaPaginador();
       $modulo="Pase";
       if($num_total_registros>=1)
       {
           $rol=$filalog['idrol'];
           $ced=$filalog['cedper'];
           if($rol==1)
           {
               $conadm= new ConsultaPersonaEspecifico2($ced);
               $filaconadm=$conadm->Consulta();
               $idper=$filaconadm['idper'];
               $fechanew=date('Y-m-d');
               $horanew=date('h:i:s');
               $num_total_registros2=$conadm->ConsultaPaginador();
               if($num_total_registros2>=1)
               {
                   $conaud= new ConsultaAuditoriaEspecifica($fechanew);
                   $num_total_registros3=$conaud->ConsultaPaginador();
                   if($num_total_registros3>=1)
                   {
                       $proceso= new Proceso (1 , 1, $idper, $fechanew, $horanew);
                       $conproce= new ConsultaProcesoEspecifico($idper);
                       $filaconproce=$conproce->Consulta();
                       $idpro=$filaconproce['idpro'];
                       $auditoria= new Auditoria ($idpro, 6, $modulo);
                   }
                   else
                   {
                       $proceso= new Proceso (1 , 1, $idper, $fechanew, $horanew);
                       $conproce= new ConsultaProcesoEspecifico($idper);
                       $filaconproce=$conproce->Consulta();
                       $idpro=$filaconproce['idpro'];
                       $auditoria= new Auditoria ($idpro, 5, $modulo);
                   }
               }
               $_SESSION['rol']=$rol;
               $_SESSION['ced']=$ced;
               header('Location: ../index.php');
               exit();
           }
           else
           {
               echo "<script language='javascript'>
            alert ('Usted no posee privilegios administrativos');
            window.location='../../index.php';
            </script>";
           }
       }
       else
       {
           echo "<script language='javascript'>
         alert ('Datos incorrectos o se encuentra inactivo');
         window.location='../../index.php';
         </script>";
       }
   }
   else
   {
      include("../../clases/javascript.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>.: SICES:.</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
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
                <h3 class="panel-title" align="center"><strong>Acceso del Administrador</strong></h3>
            </div>
            <div class="panel-heading">
                <h3 class="panel-title" align="center">Ingresa tus datos de acceso:</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" id="forlog" name="forlog" method="post" action="login.php">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Usuario" type="text" name="usuario" id="usuario" autocomplete="off" onkeypress="return validar4(event)"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Contrase&ntilde;a" type="password" name="contrasena" id="contrasena" autocomplete="off" onkeypress="validar4(event)"/>
                        </div>
                            <input class="btn btn-lg btn-primary btn-block" type='button' name='Submit' value="Ingresar" onclick="valida_envia_forlog()">
                            <input class="btn btn-lg btn-primary btn-block" type="reset"  name='reset'  value="Borrar">
                    </fieldset>
                </form>

                 <form accept-charset="UTF-8" role="form" id='forauxiliar' name='forauxiliar' method='post' action='auxiliar.php'>
                    <input class="btn btn-lg btn-primary btn-block" type="submit"  name='Submit'  value="Atr&aacute;s">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
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
