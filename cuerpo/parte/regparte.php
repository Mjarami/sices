<?php
   include_once("../../clases/coneccion.php");
   include_once("../../clases/registros.php");
   include_once("../../clases/consultas.php");
   include_once("../../clases/validacionesphp.php");
   include_once("../../clases/modificar.php");
   if($_POST!=null)
   {
      $codigo=$_POST["codigo"];
   }
   else
   {
      header('Location: control.php');
      exit();
   }
   $proceso= new ConsultaAccesoEspecifico3($codigo);
   $filaproceso=$proceso->Consulta();
   $idper=$filaproceso['idper'];
   $ape=$filaproceso['apeper'];
   $nom=$filaproceso['nomper'];
   $ced=$filaproceso['cedper'];
   $proce= new ConsultaProcesoEspecifico($idper);
   $filaproce=$proce->Consulta();
   $raci=$filaproce['idaci'];
   $fecha=$filaproce['fecpro'];
   $hora=$filaproce['horpro'];
   $fechanew=date('Y-m-d');
   $horanew=date('H:i:s');
   if($filaproceso>=1)
   {
      if($raci==2 && $fecha==$fechanew)
      {
         echo "<script language='javascript'>
         alert ('Este usuario ya se ha retirado de las instalaciones');
         window.location='control.php';
         </script>";
      }
      else
      {
         if($fecha==$fechanew)
         {
            $aci=2;
         }
         else
         {
            $aci=1;
         }
         if($_POST["situacion"]!=null)
         {
            $situacion=$_POST["situacion"];           
            if($aci==1)
            {
               $proceso= new Proceso($aci, $situacion, $idper, $fechanew, $horanew);
               $hasta=$_POST["ano"]."-".$_POST["mes"]."-".$_POST["dia"];
               $observacion=$_POST["observacion"];
               $conproce= new ConsultaProcesoEspecifico($idper);
               $filaconproce=$conproce->Consulta();
               $idpro=$filaconproce['idpro'];
               $parte= new Parte($idpro, $hasta, $observacion);
               echo "<script language='javascript'>
               alert ('Usuario agregado al parte');
               window.location='inasistencia.php';
               </script>";
            }
            else
            {
               echo "<script language='javascript'>
               alert ('Este usuario ya se encuentra en el parte y por ende no puede agregarse nuevamente');
               window.location='inasistencia.php';
               </script>";
            }
         }
         else
         {
            if($aci==2)
            {
               if($filaproce['idsit']!=1)
               {
                  $aci=1;
                  $proceso= new Proceso(1, 1, $idper, $fechanew, $horanew);
               }
               else
               {
                  $proceso= new Proceso($aci, 1, $idper, $fechanew, $horanew);
               }
               $conproce= new ConsultaProcesoEspecifico2($idper);
               $filaconproce=$conproce->Consulta();
               $idpro=$filaconproce['idpro'];
               $hasta=$filaconproce['fecpro'];
               $parte= new ModificarParte($idpro, $fechanew);
            }
            else
            {
               if($filaproce['idsit']!=1)
               {
                  $proceso= new Proceso(1, 1, $idper, $fechanew, $horanew);
               }
               else
               {
                  $proceso= new Proceso($aci, 1, $idper, $fechanew, $horanew);
               }
               $conproce= new ConsultaProcesoEspecifico($idper);
               $filaconproce=$conproce->Consulta();
               $idpro=$filaconproce['idpro'];
               $observacion="Sin novedad";
               $parte= new Parte($idpro, $hasta, $observacion);
            }
            header("Location: control.php?ape=$ape&nom=$nom&fec=$fechanew&hor=$horanew&aci=$aci&ced=$ced");
            exit();
         }
      }
   }
   else
   {
      header('Location: control.php');
      exit();
   }
?>
