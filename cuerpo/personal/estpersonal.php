<?php
   session_start();
   if($_SESSION['rol'] != 1)
   {
      header('Location: ../../index.php');
      exit();
   }
   include_once("../../clases/coneccion.php");
   include_once("../../clases/registros.php");
   include_once("../../clases/consultas.php");
   include_once("../../clases/modificar.php");
  
   if($_POST!=null)
   {
      $envio=$_POST["personal"];    
   }
   elseif($_GET!=null)
   {
      $envio=$_GET["personal"];
   }
   else
   {
      header('Location: conpersonal.php?personal=1');
      exit();
   }

   if($envio==2)
   {   
      //***Modifico Estatus***//
      $cedula=$_POST["estper"];
      $estatu=$_POST["estatus"];
 
      $conesta= new ConsultaEstatuEspecifico($estatu);
      $filaconesta=$conesta->Consulta();
      $idest=$filaconesta['idest'];

      $personas= new ConsultaPersonaEspecifico($cedula);
      $filapersonas=$personas->Consulta();
      $idper=$filapersonas['idper'];

      $estatus= new ModificarEstatuAcceso($idper, $idest);
      //***Modifico Estatus***//
      header('Location: conpersonal.php?personal=1');
      exit();
   }
?>
