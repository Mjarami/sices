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
   include_once("../../clases/validacionesphp.php");  
   //***Modifico Accion***//
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
      $idaci=$_POST["idaci"];
      $nombre=$_POST["nombre"];
      $validando=new Validaphp();
      $validando->validaL($nombre);
      $nom=$validando->consultaL();  
      if($nom=='false')
      {
         header("Location: moddatainicial.php?datai=1&modaci=$nombre");
      }
      else
      {
         $accion= new ModificarAccion($idaci,$nombre);   
         //***Modifico Accion***//
         header('Location: condatainicial.php?datai=1');
      }
   }
   if($envio==2)
   {
      $idest=$_POST["idest"];
      $nombre=$_POST["nombre"];
      $validando=new Validaphp();
      $validando->validaL($nombre);
      $nom=$validando->consultaL();  
      if($nom=='false')
      {
         header("Location: moddatainicial.php?datai=2&modest=$nombre");
      }
      else
      {
         $estatus= new ModificarEstatu($idest,$nombre);
   
         //***Modifico Accion***//
         header('Location: condatainicial.php?datai=2');
      }
   }
   if($envio==3)
   {
      $idgru=$_POST["idgru"];
      $nombre=$_POST["nombre"];
      $validando=new Validaphp();
      $validando->validaL($nombre);
      $nom=$validando->consultaL();  
      if($nom=='false')
      {
         header("Location: moddatainicial.php?datai=3&modgru=$nombre");
      }
      else
      {
         $grupos= new ModificarGrupo($idgru,$nombre);
   
         //***Modifico Accion***//
         header('Location: condatainicial.php?datai=3');
      }
   }
   if($envio==4)
   {
      $idmot=$_POST["idmot"];
      $nombre=$_POST["nombre"];
      $validando=new Validaphp();
      $validando->validaL($nombre);
      $nom=$validando->consultaL();  
      if($nom=='false')
      {
         header("Location: moddatainicial.php?datai=4&modmot=$nombre");
      }
      else
      {
         $motivos= new ModificarMotivo($idmot,$nombre);
   
         //***Modifico Accion***//
         header('Location: condatainicial.php?datai=4');
      }
   }
   if($envio==5)
   {
      $idrol=$_POST["idrol"];
      $nombre=$_POST["nombre"];
      $validando=new Validaphp();
      $validando->validaL($nombre);
      $nom=$validando->consultaL();  
      if($nom=='false')
      {
         header("Location: moddatainicial.php?datai=5&modrol=$nombre");
      }
      else
      {
         $roles= new ModificarRol($idrol,$nombre);
   
         //***Modifico Situacion***//
         header('Location: condatainicial.php?datai=5');
      }
   }
   if($envio==6)
   {
      $idsit=$_POST["idsit"];
      $nombre=$_POST["nombre"];
      $codigo=$_POST["codigo"];
      $validando=new Validaphp();
      $validando->validaL($nombre);
      $nom=$validando->consultaL();

      $validando2=new Validaphp();
      $validando2->validaN($codigo);
      $cod=$validando2->consultaN();  
      if($nom=='false')
      {
         header("Location: moddatainicial.php?datai=6&modsit=$nombre");
      }
      if($cod=='false')
      {
         header("Location: moddatainicial.php?datai=6&modsit=$nombre");
      }
      else
      {
         $situaciones= new ModificarSituacion($idsit, $nombre, $codigo);
   
         //***Modifico Situacion***//
         header('Location: condatainicial.php?datai=6');
      }
   }
   if($envio==7)
   {
      $iddep=$_POST["iddep"];
      $nombre=$_POST["nombre"];
      $idgru=$_POST['grupo'];
      $validando=new Validaphp();
      $validando->validaL($nombre);
      $nom=$validando->consultaL();  
      if($nom=='false')
      {
         header("Location: moddatainicial.php?datai=7&moddep=$nombre");
      }
      else
      {
         $departamentos= new ModificarDepartamento($iddep, $nombre, $idgru);
   
         //***Modifico Situacion***//
         header('Location: condatainicial.php?datai=7');
      }
   }
   if($envio==8)
   {
      $idgra=$_POST["idgra"];
      $nombre=$_POST["nombre"];
      $validando=new Validaphp();
      $validando->validaF($nombre);
      $nom=$validando->consultaF();  
      if($nom=='false')
      {
         header("Location: moddatainicial.php?datai=8&modgra=$nombre");
      }
      else
      {
         $grados= new ModificarGrado($idgra,$nombre);
   
         //***Modifico Situacion***//
         header('Location: condatainicial.php?datai=8');
      }
   }
?>
