<?php
include_once("../../clases/coneccion.php");
include_once("../../clases/registros.php");
include_once("../../clases/consultas.php");
include_once("../../clases/modificar.php");

if($_POST!=null)
{
    $cedu=$_POST["cedula"];
    if($_POST["apellido"]!="" && $_POST["apellido"]!=null && $_POST["apellido"]!=" " && $_POST["nombre"]!="" && $_POST["nombre"]!=null && $_POST["nombre"]!=" ")
    {
        $cedula=$_POST["cedula"];
        $apellido=$_POST["apellido"];
        $nombre=$_POST["nombre"];
    }
    else
    {
        header("Location: regauxiliar.php?cedula=$cedu");
        exit();
    }
}
else
{
    header("Location: regauxiliar.php?cedula=$cedu");
    exit();
}
$persona= new Persona(1, 7, $apellido, $nombre, 0, 0, 0, $cedula, 000, 000, 'ninguno', 1, 1, 'ninguna');
$conaux= new ConsultaPersonaEspecifico2($cedula);
$filaconaux=$conaux->Consulta();
$idper=$filaconaux['idper'];
$fechanew=date('Y-m-d');
$horanew=date('h:i:s');
$num_total_registros=$conaux->ConsultaPaginador();
if($num_total_registros>=1)
{
    $contrasena=sha1($cedula);
    $accesos= new Acceso(2, $idper, $cedula, $contrasena, 000);
    $proceso= new Proceso (1 , 1, $idper, $fechanew, $horanew);
    $conproce= new ConsultaProcesoEspecifico($idper);
    $filaconproce=$conproce->Consulta();
    $idpro=$filaconproce['idpro'];
    $conaud= new ConsultaAuditoriaEspecifica($fechanew);
    $num_total_registros3=$conaud->ConsultaPaginador();
    $modulo="Pase";
    if($num_total_registros3>=1)
    {
        $auditoria= new Auditoria ($idpro, 6, $modulo);
        header("Location: ../parte/control.php");
        exit();
    }
    else
    {
        $auditoria= new Auditoria ($idpro, 5, $modulo);
        header("Location: ../parte/control.php");
        exit();
    }
}
else
{
    header('Location: auxiliar.php');
    exit();
}
?>
