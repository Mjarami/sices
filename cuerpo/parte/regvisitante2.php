<?php
include_once("../../clases/coneccion.php");
include_once("../../clases/registros.php");
include_once("../../clases/consultas.php");
include_once("../../clases/modificar.php");

if ($_POST != null) {
    if ($_POST["cedula"] != "" && $_POST["cedula"] != null && $_POST["cedula"] != " " && $_POST["apellido"] != "" && $_POST["apellido"] != null && $_POST["apellido"] != " " && $_POST["nombre"] != "" && $_POST["nombre"] != null && $_POST["nombre"] != " ") {
        $cedula = $_POST["cedula"];
        $apellido = $_POST["apellido"];
        $nombre = $_POST["nombre"];
    } else {
        header("Location: regvisitante.php");
        exit();
    }
} else {
    header('Location: regvisitante.php');
    exit();
}
$persona = new Persona(3, 29, $apellido, $nombre, 0, 0, 0, $cedula, 000, 000, 'ninguno', 1, 1, 'ninguna');
$conaux = new ConsultaPersonaEspecifico2($cedula);
$filaconaux = $conaux->Consulta();
$idper = $filaconaux['idper'];
$fechanew = date('Y-m-d');
$horanew = date('H:i:s');
$num_total_registros = $conaux->ConsultaPaginador();
if ($num_total_registros >= 1) {
    $contrasena = sha1($cedula);
    $accesos = new Acceso(4, $idper, $cedula, $contrasena, 000);
    $proceso = new Proceso(1, 1, $idper, $fechanew, $horanew);
    $conproce = new ConsultaProcesoEspecifico($idper);
    $filaconproce = $conproce->Consulta();
    $idpro = $filaconproce['idpro'];
    $auditoria = new Auditoria($idpro, 1, "Visitantes");
    echo "<script language='javascript'>
      alert ('Bienvenido Sr(a) $apellido $nombre');
      window.location='control.php';
      </script>";
} else {
    header('Location: regvisitante.php');
    exit();
}
?>