<?php
   session_start();
   if($_SESSION['rol'] != 1)
   {
      header('Location: ../../index.php');
      exit();
   }
   include_once("../../clases/coneccion.php");
   include_once("../../clases/registros.php");
   include_once("../../clases/borrar.php");
   include_once("../../clases/consultas.php");     
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
         $nombre=$_POST["boraci"];
      }
      if($_GET!=null)
      {
         $nombre=$_GET["boraci"];
      }   
      //***Borro Accion***//
      $accion= new BorrarAccion($nombre);
      //***Borro Accion***//
      header('Location: condatainicial.php?datai=1');
   }
   if($envio==2)
   {
      if($_POST!=null)
      {
         $nombre=$_POST["borest"];
      }
      if($_GET!=null)
      {
         $nombre=$_GET["borest"];
      }   
      //***Borro Estatu***//
      $estatu= new BorrarEstatu($nombre);
      //***Borro Estatu***//
      header('Location: condatainicial.php?datai=2');
   }
   if($envio==3)
   {
      if($_POST!=null)
      {
         $nombre=$_POST["borgru"];
      }
      if($_GET!=null)
      {
         $nombre=$_GET["borgru"];
      }   
      //***Borro Grupo***//
      $grupos= new BorrarGrupo($nombre);
      //***Borro Grupo***//
      header('Location: condatainicial.php?datai=3');
   }
   if($envio==4)
   {
      if($_POST!=null)
      {
         $nombre=$_POST["bormot"];
      }
      if($_GET!=null)
      {
         $nombre=$_GET["bormot"];
      }   
      //***Borro Motivo***//
      $motivos= new BorrarMotivo($nombre);
      //***Borro Motivo***//
      header('Location: condatainicial.php?datai=4');
   }
   if($envio==5)
   {
      if($_POST!=null)
      {
         $nombre=$_POST["borrol"];
      }
      if($_GET!=null)
      {
         $nombre=$_GET["borrol"];
      }   
      //***Borro Rol***//
      $motivos= new BorrarRol($nombre);
      //***Borro Rol***//
      header('Location: condatainicial.php?datai=5');
   }
   if($envio==6)
   {
      if($_POST!=null)
      {
         $nombre=$_POST["borsit"];
      }
      if($_GET!=null)
      {
         $nombre=$_GET["borsit"];
      }   
      //***Borro Situaciones***//
      $situaciones= new BorrarSituacion($nombre);
      //***Borro Situaciones***//
      header('Location: condatainicial.php?datai=6');
   }
   if($envio==7)
   {
      if($_POST!=null)
      {
         $nombre=$_POST["bordep"];
      }
      if($_GET!=null)
      {
         $nombre=$_GET["bordep"];
      }   
      //***Borro Departamento***//
      $departamento= new BorrarDepartamento($nombre);
      //***Borro Departamento***//
      header('Location: condatainicial.php?datai=7');
   }
   if($envio==8)
   {
      if($_POST!=null)
      {
         $nombre=$_POST["borgra"];
      }
      if($_GET!=null)
      {
         $nombre=$_GET["borgra"];
      }   
      //***Borro Grado***//
      $grado= new BorrarGrado($nombre);
      //***Borro Grado***//
      header('Location: condatainicial.php?datai=8');
   }
?>
