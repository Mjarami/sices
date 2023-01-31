<?php
   error_reporting(0);
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
      $data="Personal Civil";
      $cons=1;
   }
   else
   {
      if ($envio==2)
      {
         $data="Accesos Administrativos";
         $cons=2;
      }
      else
      {
         header('Location: ../menudata.php');
         exit();
      }
   }
?>
<!DOCTYPE html>
<head>
   <meta content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>.:SICES:.</title>
   <link href="../../css/bootstrap.css" rel="stylesheet">
   <link href="../../fonts/font-awesome.min.css" rel="stylesheet">
   <link href="../../css/sb-admin.css" rel="stylesheet">
   <script src="../../js/jquery-2.2.4.min.js"></script>
   <script>
      $(document).ready(function()
      {
         $("#export").click(function(e)
         {
            window.open('data:application/vnd.ms-excel,' + encodeURIComponent( $('#consulta').html()));
            e.preventDefault();
         });
      });
   </script>
</head>
<body>
   <br>
   <div class="panel panel-primary">
      <div class="panel-heading">
         <h3 class="panel-title" align="center"><strong>Consulta del  <?php echo $data; ?> </strong></h3>
      </div>
      <div class="panel-body">
         <table class="table table-bordered" align="center">
            <?php
               if($cons==1)
               {
                  ?>
	          <tr align='center'>
		     <td>
		        <strong>Dpto.</strong>
		     </td>
		     <td>
			<strong>Grado</strong>
		     </td>
                     <td>
			<strong>Codigo Empleado</strong>
		     </td>
		     <td>
			<strong>C&eacute;dula</strong>
		     </td>
		     <td>
			<strong>Apellidos</strong>
		     </td>
		     <td>
			<strong>Nombres</strong>
		     </td>
                     <?php
                        if($_POST["ver"]==2)
                        {
                           ?>
                           <td>
			      <strong>Tel&eacute;fono</strong>
		           </td>
		           <td>
			      <strong>Celular</strong>
		           </td>
		           <td>
			      <strong>Correo</strong>
		           </td>
		           <td>
			      <strong>Direcci&oacute;n</strong>
		           </td>
		           <td colspan='2'>
			      <strong>Procesos</strong>
		           </td>
                           <?php
                        }
                        else
                        {
                           ?>
		           <td colspan='2'>
			      <strong>Procesos</strong>
		           </td>
                           <?php
                        }
                     ?>
	          </tr>
                  <?php
               }
               if($cons==2)
               {
                  ?>
	          <tr align='center'>
		     <td>
		        <strong>Rol</strong>
		     </td>
		     <td>
			<strong>Status</strong>
		     </td>
		     <td>
			<strong>C&eacute;dula</strong>
		     </td>
		     <td>
			<strong>Usuario</strong>
		     </td>
		     <td>
			<strong>C&oacute;digo</strong>
		     </td>
		     <td colspan='2'>
			<strong>Procesos</strong>
		     </td>
	          </tr>
                  <?php
               }
               $TAMANO_PAGINA = 5;
               $pagina = $_POST["pagina"];
               if (!$pagina)
               {
                  $inicio = 0;
                  $pagina=1;
               }
               else
               {
                  $inicio =($pagina - 1) * $TAMANO_PAGINA;
               }
               if($cons==1)
               {
                  if($_POST['buscando']!=null)
                  {
                     $TAMANO_PAGINA = 5;
                     $pagina = $_POST["pagina"];
                     if (!$pagina)
                     {
                        $inicio = 0;
                        $pagina=1;
                     }
                     else
                     {
                        $inicio =($pagina - 1) * $TAMANO_PAGINA;
                     }
                     $buscando=$_POST['buscando'];
                     $personas= new ConsultaPersonaEspecifico3($buscando);
                     $num_total_registros = $personas->ConsultaPaginador();
                     if($num_total_registros>=1)
                     {
                        $data2= new ConsultaPersonaEspecifico4($buscando, $TAMANO_PAGINA, $inicio);
                        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                        echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
                        echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
                        echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
                        while($filadata1=$data2->Consulta())
                        {
                           $esta= new ConsultaAccesoEspecifico($filadata1['cedper']);
                           $filaesta=$esta->Consulta();
                           $nomest=$filaesta['nomest'];
                           $codper=$filaesta['codacc'];
                           ?>
                           <tr align='center'>
                              <td><?php echo ucwords($filadata1['nomdep']);?></td>
                              <td><?php echo ucwords($filadata1['nomgra']);?></td>
                              <td><?php echo $codper;?></td>
                              <td><?php echo $filadata1['cedper'];?></td>
                              <td><?php echo ucwords($filadata1['apeper']);?></td>
                              <td><?php echo ucwords($filadata1['nomper']);?></td>
                              <?php
                                 if($_POST["ver"]==2)
                                 {
                                    ?>
                                    <td><?php echo $filadata1['telper'];?></td>
                                    <td><?php echo $filadata1['celper'];?></td>
                                    <?php
                                       $email=$filadata1['corper']."@".$filadata1['nomcco'].".".$filadata1['nomtco'];
                                    ?>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo ucwords($filadata1['dirper']);?></td>
                                    <?php
                                 }
                                 else
                                 {
                                    ?>
                                    <?php
                                 }
                              ?>
                              
                              <td>
                                 <br>
                                 <form id='formodper' name='formodper' method='post' action='modpersonal.php'>
                                    <input type='hidden' name='personal' id='personal' autocomplete='off' value='1'/>
                                    <input type='hidden' name='modper' id='modper' autocomplete='off' value="<?php echo $filadata1['cedper'];?>"/>
                                    <input class="btn btn-primary" type='submit' name='Submit' value='Modificar'/>
                                 </form>
                              </td>
                              <td>
                                 <br>
                                 <form id='forborper' name='forborper' method='post' action='estpersonal.php'>
                                    <input type='hidden' name='personal' id='personal' autocomplete='off' value='2'/>
                                    <input type='hidden' name='estper' id='estper' autocomplete='off' value="<?php echo $filadata1['cedper'];?>"/>
                                    <select name='estatus' id='estatus' size='1'/> 
                                       <option value="<?php echo $nomest;?>"><?php echo $nomest;?></option>");
                                       <?php
                                          $data= new ConsultaEstatus();
                                          while($filadata=$data->Consulta())
                                          {
                                             echo ("
                                                <option value=".$filadata['nomest'].">".$filadata['nomest']."</option>
                                             ");
                                          }
                                       ?>
                                    </select>
                                    <input class="btn btn-primary" type='submit' name='Submit' value='Cambiar'/>
                                 </form>
                              </td>
                           </tr>
                           <?php
                        }
            ?>
            </table>
            <table align="center">
               <tr>
                  <td align='center'>
	             <?php
                        if ($total_paginas > 1)
	                {
	                   for ($i=1;$i<=$total_paginas;$i++)
                           {
                              if ($pagina == $i)
                              {
                                 //si muestro el índice de la página actual, no coloco enlace
                                 echo ("$pagina</td><td align='center'>");
                              }
                              else
	                      {
                                    //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
                                 ?>
                                 <form id='paginacion' name='paginacion' method='post' action='conpersonal.php'>
	                               <input type='hidden' name='personal' id='personal' autocomplete='off' value="1" />
                                       <input type='hidden' name='buscando' id='buscando' autocomplete='off' value="<?php echo $buscando ?>"/>
                                       <input type='hidden' name='pagina' id='pagina' autocomplete='off' value="<?php echo $i ?>" />
                                       <input class="btn btn-primary"  type='submit' name='Submit' value="<?php echo $i ?>" />  
                                    </td>
                                    <td align='center'>
                                 </form>
	 	                 <?php
	                      }
	                   }
                        }
                     }
                     else
                     {
                        echo ("
	                   <tr align='center'>
	                      <td colspan='11'>Busqueda con ningun resultado</td>
	                   </tr>
                        ");
                     }
                     ?>
                     <tr>
                        <td colspan='12'>
                           <?php
                              if($_POST["ver"]==2)
                              {
                                 ?>
                                 <form id='paginacion' name='paginacion' method='post' action='conpersonal.php'>
                                    <input type='hidden' name='personal' id='personal' autocomplete='off' value="1" />
                                    <input type='hidden' name='ver' id='ver' autocomplete='off' value="1" />
                                    <input type='hidden' name='buscando' id='buscando' autocomplete='off' value="<?php echo $buscando ?>"/>
                                    <input class="btn btn-primary"  type='submit' name='submit' value="Ocultar" />
                                 </form>
                                 <?php
                              }
                              else
                              {
                                 ?>
                                 <form id='paginacion' name='paginacion' method='post' action='conpersonal.php'>
                                    <input type='hidden' name='personal' id='personal' autocomplete='off' value="1" />
                                    <input type='hidden' name='ver' id='ver' autocomplete='off' value="2" />
                                    <input type='hidden' name='buscando' id='buscando' autocomplete='off' value="<?php echo $buscando ?>"/>
                                    <input class="btn btn-primary"  type='submit' name='submit' value="Ver +" />
                                 </form>
                                 <?php
                              }
                              if($_POST["new"]!=null)
                              {
                                 echo("
                                    <script language='JavaScript'>
                                       var newWindow=window.open('../parte/parte2.php?buscando=$buscando&personal=1', 'temp', 'left=150', 'top=200', 'height=1000', 'width=1000', 'scrollbar=no', 'location=no', 'resizable=no,menubar=no');
                                       window.close();
                                    </script>
                                 ");
                              }
                           ?>
                           <center><br>
                              <form data-ajax='false' id='forimprimirparte' name='forimprimirparte' method='post' action='conpersonal.php'>
                                 <input type='hidden' name='new' id='new' autocomplete='off' value="1" />
                                 <input type='hidden' name='personal' id='personal' autocomplete='off' value="1" />
                                 <input type='hidden' name='buscando' id='buscando' autocomplete='off' value="<?php echo $buscando ?>"/>
                                 <input class="btn btn-primary" type='submit' name='Submit' value='Imprimir'/>
                              </form>
                              <form id='forbusven' name='forbusven' method='post' action='conpersonal.php'>
                                 <input type='hidden' name='personal' id='personal' autocomplete='off' value='1' />
                                 <input type='hidden' name='buscando' id='buscando' autocomplete='off' value=''/>
                                 <input class='btn btn-primary' type='submit' name='Submit' value='Todo el personal'/>
                              </form>
                           </center>
                        </td>
                     </tr>
                  </table>
               </center>
      <?php
   }
   else
   {
      $data= new ConsultaPersonas();
      $num_total_registros = $data->ConsultaPaginador();
      if($num_total_registros>=1)
      {
         $data2= new ConsultaPersonas2($TAMANO_PAGINA, $inicio);
         $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
         echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
         echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
         echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
         while($filadata=$data2->Consulta())
         {
            $concodper= new ConsultaAccesoEspecifico($filadata['cedper']);
            $filaconcodper=$concodper->Consulta();
            $codper=$filaconcodper['codacc'];
	    $email=$filadata['corper']."@".$filadata['nomcco'].".".$filadata['nomtco'];
            ?>
            <tr align='center'>
               <td><?php echo ucwords($filadata['nomdep']);?></td>
               <td><?php echo ucwords($filadata['nomgra']);?></td>
               <td><?php echo $codper;?></td>
               <td><?php echo $filadata['cedper'];?></td>
               <td><?php echo ucwords($filadata['apeper']);?></td>
               <td><?php echo ucwords($filadata['nomper']);?></td>
               <?php
                  if($_POST["ver"]==2)
                  {?>
                     <td><?php echo $filadata['telper'];?></td>
                     <td><?php echo $filadata['celper'];?></td>
                     <td><?php echo $email;?></td>
                     <td><?php echo ucwords($filadata['dirper']);?></td>
                     <?php
                  }
                  else
                  {
                     ?>
                     <?php
                  }
               ?>
               <td><br>
                  <form id='formodper' name='formodper' method='post' action='modpersonal.php'>
                     <input type='hidden' name='personal' id='personal' autocomplete='off' value='1'/>
                     <input type='hidden' name='modper' id='modper' autocomplete='off' value="<?php echo $filadata['cedper'];?>"/>
                     <input class="btn btn-primary" type='submit' name='Submit' value='Modificar'/>
                  </form>
               </td>
               <td><br>
                  <form id='forborper' name='forborper' method='post' action='estpersonal.php'>
                     <input type='hidden' name='personal' id='personal' autocomplete='off' value='2'/>
                     <input type='hidden' name='estper' id='estper' autocomplete='off' value="<?php echo $filadata['cedper'];?>"/>
                     <select name='estatus' id='estatus' size='1'/>
                        <?php
                           $esta= new ConsultaAccesoEspecifico($filadata['cedper']);
                           $filaesta=$esta->Consulta();
                           $nomest=$filaesta['nomest'];
                        ?>
                        <option value="<?php echo $nomest;?>"><?php echo $nomest;?></option>");
                        <?php
                           $data= new ConsultaEstatus();
                           while($filadata=$data->Consulta())
                           {
                              echo ("
	                         <option value=".$filadata['nomest'].">".$filadata['nomest']."</option>
                              ");
                           }
                        ?>
                     </select>
                     <input  class="btn btn-primary" type='submit' name='Submit' value='Cambiar'/>
                  </form>
               </td>
            </tr>
            <?php
         }
         ?>
         </table>
         <table align="center">
            <tr>
               <td align='center'>
	          <?php
	 if ($total_paginas > 1)
	 {
	    for ($i=1;$i<=$total_paginas;$i++)
            {
               if ($pagina == $i)
               {
                  //si muestro el índice de la página actual, no coloco enlace
                  echo ("$pagina</td><td align='center'>");
               }
               else
	       {
                  //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
                  ?>
                        <form id='paginacion' name='paginacion' method='post' action='conpersonal.php'>
		           <input type='hidden' name='personal' id='personal' autocomplete='off' value="1" />
                           <input type='hidden' name='pagina' id='pagina' autocomplete='off' value="<?php echo $i ?>" />
                           <input class="btn btn-primary"  type='submit' name='Submit' value="<?php echo $i ?>" />
                     </td>
                     <td align='center'>
                        </form>
	 	        <?php
	       }
	    }
         }
      }
      else
      {
         ?>
	    <tr align='center'>
	       <td colspan='11'>No se encontraron registros</td>
	    </tr>
         </table>
         <?php
      }
      if($_POST["ver"]==2)
      {
         ?>
         <form id='paginacion' name='paginacion' method='post' action='conpersonal.php'>
            <input type='hidden' name='personal' id='personal' autocomplete='off' value="1" />
            <input type='hidden' name='ver' id='ver' autocomplete='off' value="1" />
            <input type='hidden' name='pagina' id='pagina' autocomplete='off' value="<?php echo $pagina ?>" />
            <input class="btn btn-primary"  type='submit' name='submit' value="Ocultar" />
         </form>
         <?php
      }
      else
      {
         ?>
         <form id='paginacion' name='paginacion' method='post' action='conpersonal.php'>
            <input type='hidden' name='personal' id='personal' autocomplete='off' value="1" />
            <input type='hidden' name='ver' id='ver' autocomplete='off' value="2" />
            <input type='hidden' name='pagina' id='pagina' autocomplete='off' value="<?php echo $pagina ?>" />
            <input class="btn btn-primary"  type='submit' name='submit' value="Ver +" />
         </form>
         <?php
      }
      if($_POST["new"]!=null)
      {
         echo("
            <script language='JavaScript'>
               var newWindow=window.open('../parte/parte2.php?report=0&personal=1', 'temp', 'left=150', 'top=200', 'height=1000', 'width=1000', 'scrollbar=no', 'location=no', 'resizable=no,menubar=no');
               window.close();
            </script>
         ");
      }
      ?>
      <center><br>
         <form data-ajax='false' id='forimprimirparte' name='forimprimirparte' method='post' action='conpersonal.php'>
            <input type='hidden' name='new' id='new' autocomplete='off' value="1" />
            <?php
               if($_POST["ver"]==2)
               {
                  ?>
                  <input type='hidden' name='ver' id='ver' autocomplete='off' value="2" />
                  <?php
               }
               else
               {
                  ?>
                  <input type='hidden' name='ver' id='ver' autocomplete='off' value="1" />
                  <?php
               }
            ?>
            <input type='hidden' name='personal' id='personal' autocomplete='off' value="1" />
            <input class="btn btn-primary" type='submit' name='Submit' value='Imprimir'/>
         </form>
         <?php
   }
   ?>
         </td>
      </tr>
   </table>
   <br>
   <form id='forbusper' name='forbusper' method='post' action='conpersonal.php'>
      <table align='center'>
         <tr>
            <td align='center'>
               <center>
                  <input type='hidden' name='personal' id='personal' autocomplete='off' value='1' />
	          <input type='text' name='buscando' id='buscando' autocomplete='off' onkeypress='return validar10(event)'/>
	    </td>
	    <td align='center'>
                  <input class='btn btn-primary' type='submit' name='Submit' value='Buscar' />
               </center>
            </td>		 
         </tr>
      </table>
   </form>
   <br>
   <?php
}
if($cons==2)
{
   if($_POST['buscando']!=null)
   {
      $TAMANO_PAGINA = 5;
      $pagina = $_POST["pagina"];
      if (!$pagina)
      {
         $inicio = 0;
         $pagina=1;
      }
      else
      {
         $inicio =($pagina - 1) * $TAMANO_PAGINA;
      }
      $buscando=$_POST['buscando'];
      $accesos= new ConsultaAccesoEspecifico4($buscando);
      $num_total_registros = $accesos->ConsultaPaginador();
      if($num_total_registros>=1)
      {
         $data2= new ConsultaAccesoEspecifico5($buscando, $TAMANO_PAGINA, $inicio);
         $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
         echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
         echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
         echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
         while($filadata=$data2->Consulta())
         {
            ?>
            <tr align='center'>
            <td><?php echo ucwords($filadata['nomrol']);?></td>
            <td><?php echo ucwords($filadata['nomest']);?></td>
            <td><?php echo $filadata['cedper'];?></td>
            <td><?php echo $filadata['usuacc'];?></td>
            <td><?php echo $filadata['codacc'];?></td>
            <td><br>
                <form id='formodper' name='formodper' method='post' action='modpersonal.php'>
                    <input type='hidden' name='personal' id='personal' autocomplete='off' value='2'/>
                    <input type='hidden' name='modper' id='modper' autocomplete='off' value="<?php echo $filadata['cedper'];?> "/>
                    <input class="btn btn-primary" type='submit' name='Submit' value='Modificar'/>
                </form></td>
            </tr><?php
         }
         ?>
         </table>
         <table align="center">
            <tr>
               <td align='center'>
	          <?php
         if ($total_paginas > 1)
	 {
	    for ($i=1;$i<=$total_paginas;$i++)
            {
               if ($pagina == $i)
               {
                  //si muestro el índice de la página actual, no coloco enlace
                  echo ("$pagina</td><td align='center'>");
               }
               else
	       {
                  //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
                  ?>
                        <form id='paginacion' name='paginacion' method='post' action='conpersonal.php'>
		           <input type='hidden' name='personal' id='personal' autocomplete='off' value="2" />
                           <input type='hidden' name='buscando' id='buscando' autocomplete='off' value="<?php echo $buscando ?>"/>
                           <input type='hidden' name='pagina' id='pagina' autocomplete='off' value="<?php echo $i ?>" />
                           <input class="btn btn-primary"  type='submit' name='Submit' value="<?php echo $i ?>" />
                     </td>
                     <td align='center'>
                        </form>
	 	        <?php
	       }
	    }
         }
      }
      else
      {
         echo ("
	    <tr align='center'>
	       <td colspan='6'>Busqueda con ningun resultado</td>
	    </tr>
         ");
      }
      ?>
            <tr>
               <td colspan='12'>
                  <?php
                     if($_POST["new"]!=null)
                     {
                        echo("
                           <script language='JavaScript'>
                              var newWindow=window.open('../parte/parte2.php?buscando=$buscando&personal=2', 'temp', 'left=150', 'top=200', 'height=1000', 'width=1000', 'scrollbar=no', 'location=no', 'resizable=no,menubar=no');
                              window.close();
                           </script>
                        ");
                     }
                  ?>
                  <center><br>
                     <form data-ajax='false' id='forimprimirparte' name='forimprimirparte' method='post' action='conpersonal.php'>
                        <input type='hidden' name='new' id='new' autocomplete='off' value="2" />
                        <input type='hidden' name='personal' id='personal' autocomplete='off' value="2" />
                        <input type='hidden' name='buscando' id='buscando' autocomplete='off' value="<?php echo $buscando ?>"/>
                        <input class="btn btn-primary" type='submit' name='Submit' value='Imprimir'/>
                     </form>
                     <form id='forbusven' name='forbusven' method='post' action='conpersonal.php'>
                        <input type='hidden' name='personal' id='personal' autocomplete='off' value='2' />
                        <input type='hidden' name='buscando' id='buscando' autocomplete='off' value=''/>
                        <input class='btn btn-primary' type='submit' name='Submit' value='Todos los accesos'/>
                     </form>
                  </center>
               </td>
            </tr>
         </table>
      </center>
      <?php
   }
   else
   {
      $data= new ConsultaAccesos();
      $num_total_registros = $data->ConsultaPaginador();
      if($num_total_registros>=1)
      {
         $data2= new ConsultaAccesos2($TAMANO_PAGINA, $inicio);
         $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
      echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
      echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
      echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
      while($filadata=$data2->Consulta())
      {
         ?>
         <tr align='center'>
            <td><?php echo ucwords($filadata['nomrol']);?></td>
            <td><?php echo ucwords($filadata['nomest']);?></td>
            <td><?php echo $filadata['cedper'];?></td>
            <td><?php echo $filadata['usuacc'];?></td>
            <td><?php echo $filadata['codacc'];?></td>
            <td><br>
                <form id='formodper' name='formodper' method='post' action='modpersonal.php'>
                    <input type='hidden' name='personal' id='personal' autocomplete='off' value='2'/>
                    <input type='hidden' name='modper' id='modper' autocomplete='off' value="<?php echo $filadata['cedper'];?> "/>
                    <input class="btn btn-primary" type='submit' name='Submit' value='Modificar'/>
                </form></td>
            </tr><?php
        }
        ?>
        </table>
        <table align='center'>
	   <tr>
	      <td align='center'>
	         <?php
		    if ($total_paginas > 1)
		    {
		       for ($i=1;$i<=$total_paginas;$i++)
		       {
		          if ($pagina == $i)
			  {
			     //si muestro el índice de la página actual, no coloco enlace
			     echo ("$pagina</td><td align='center'>");
			  }
			  else
			  {
                             //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
                             ?>
			     <form id='paginacion' name='paginacion' method='post' action='conpersonal.php'>
			           <input type='hidden' name='personal' id='personal' autocomplete='off' value="<?php echo $cons ?>" />
				   <input type='hidden' name='pagina' id='pagina' autocomplete='off' value="<?php echo $i ?> "/>
				   <input class=" btn btn-primary" type='submit' name='Submit' value="<?php echo $i ?> "/>
				</td><td align='center'>
                             </form>
                             <?php
			  }
		       }
		    }
		 }
		 else
		 {
                       ?>
		       <tr align='center'>
		          <td colspan='6'>No se encontraron registros</td>
		       </tr>
                    </table>
		    <?php
		 }
                 if($_POST["new"]!=null)
                 {
                    echo("
                       <script language='JavaScript'>
                          var newWindow=window.open('../parte/parte2.php?report=0&personal=2', 'temp', 'left=150', 'top=200', 'height=1000', 'width=1000', 'scrollbar=no', 'location=no', 'resizable=no,menubar=no');
                          window.close();
                       </script>
                    ");
                 }
                 ?>
                 <center><br>
                    <form data-ajax='false' id='forimprimirparte' name='forimprimirparte' method='post' action='conpersonal.php'>
                       <input type='hidden' name='new' id='new' autocomplete='off' value="2" />
                       <input type='hidden' name='personal' id='personal' autocomplete='off' value="2" />
                       <input class="btn btn-primary" type='submit' name='Submit' value='Imprimir'/>
                    </form>
                 <?php
     }
     ?>
         </td>
      </tr>
   </table>
   <br>
   <form id='forbusper' name='forbusper' method='post' action='conpersonal.php'>
      <table align='center'>
         <tr>
            <td align='center'>
               <center>
                  <input type='hidden' name='personal' id='personal' autocomplete='off' value='2' />
	          <input type='text' name='buscando' id='buscando' autocomplete='off' onkeypress='return validar10(event)'/>
	    </td>
	    <td align='center'>
                  <input class='btn btn-primary' type='submit' name='Submit' value='Buscar' />
               </center>
            </td>		 
         </tr>
      </table>
   </form>
   <br>
   <?php
   }
	      ?>
	      <table  align="center">
	            </td>
		 </tr>
		 <tr>
		    <td align='center' colspan='7'>
		       <form data-ajax='false' id='forvolver' name='forvolver' method='post' action='../../cuerpo/menus/menupersonal.php'>
                          <input class="btn btn-primary"  type='submit' name='Submit' value='Atr&aacute;s'/>
		       </form>
		    </td>
		 </tr>
	      </table>
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
