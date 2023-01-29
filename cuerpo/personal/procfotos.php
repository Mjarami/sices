<?php
session_start();
if($_SESSION['rol'] != 1)
{
    header('Location: ../../index.php');
    exit();
}
$cedula=$_SESSION['cedula'];
include_once("../../clases/coneccion.php");
include_once("../../clases/registros.php");
include_once("../../clases/modificar.php");

if ($_FILES["ima"]["type"] == "image/gif" || $_FILES["ima"]["type"] == "image/png" || $_FILES["ima"]["type"] == "image/jpeg")
{
  if ($_FILES["ima"]["error"] > 0)
  {
    header("Location: modpersonal.php?personal=1&modper=$cedula&archivo=3");
    exit();
  }
  else
  {
    $dir="../../fotos/";
    $nuevubi= $dir.$_FILES["ima"]["name"];
    move_uploaded_file($_FILES['ima']['tmp_name'],$nuevubi);
    $foto= new ModificarFoto($nuevubi, $cedula);
    header("Location: modpersonal.php?personal=1&modper=$cedula&archivo=1");
    exit();
  }
}
else
{
  header("Location: modpersonal.php?personal=1&modper=$cedula&archivo=2");
  exit();
}
?>
