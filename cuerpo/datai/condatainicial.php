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
if($_POST!=null)
{
    $envio=$_POST["datai"];
}
if ($_GET!=null)
{
    $envio=$_GET["datai"];
}
if ($envio==1)
{
    $data="Acciones";
    $cons=1;
}
else
{
    if ($envio==2)
    {
        $data="Estatus";
        $cons=2;
    }
    else
    {
        if ($envio==3)
        {
            $data="Grupos";
            $cons=3;
        }
        else
        {
            if ($envio==4)
            {
                $data="Motivos";
                $cons=4;
            }
            else
            {
                if ($envio==5)
                {
                    $data="Roles";
                    $cons=5;
                }
                else
                {
                    if ($envio==6)
                    {
                        $data="Situaciones";
                        $cons=6;
                    }
                    else
                    {
                        if ($envio==7)
                        {
                            $data="Departamentos";
                            $cons=7;
                        }
                        else
                        {
                        if ($envio==8)
                        {
                           $data="Grados";
                           $cons=8;
                        }
                        else
                        {
                           header('Location: ../menudata.php');
                           exit();
                        }
                     }
                  }
               }
            }
         }
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: SICES:.</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
	<link href="../../fonts/font-awesome.min.css" rel="stylesheet">	 
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
<br><br><br><br>
<div class="row vertical-offset-100">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title" align="center"><strong>Registro de <?php echo $data ?></strong></h3><br>
            </div>
		<div class="panel-body">
			<table  class="table table-bordered">
				<tr align="center">
					<td>
						<strong>Id</strong>
					</td>					
					<td>
					   <strong>Nombre</strong>
					</td>
						<?php
               if($cons==6)
               {
               ?>
                 <td>
                  <strong>Código</strong>
                 </td>
               <?php
               }
						   if($cons==7)
						   {
							 ?>
								 <td>
									<strong>Grupo</strong>
								 </td>
							 <?php
						   }
						?>
					<td colspan="2">
					   <strong>Procesos</strong>
					</td>
				</tr>   
				<?php
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
					$data= new ConsultaAcciones();
					$num_total_registros = $data->ConsultaPaginador();
				if($num_total_registros>=1)
					{
					$data2= new ConsultaAcciones2($TAMANO_PAGINA, $inicio);
					$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
					echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
					echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
					echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
				while($filadata=$data2->Consulta())
					{
					?>
				<tr align="center">
					<td><?php echo $filadata['idaci'];?></td>
					<td><?php echo ucwords($filadata['nomaci']);?></td>
					<td><br>
						<form id="formodaci" name="formodaci" method="post" action="moddatainicial.php">
							<input type="hidden" name="datai" id="datai" autocomplete="off" value="1"/>   
							<input type="hidden" name="modaci" id="modaci" autocomplete="off" value="<?php echo $filadata['nomaci'];?>"/>
							<input class="btn btn-primary" type="submit" name="Submit" value="Modificar"/>
						</form>
					</td>
					<td><br>
						<form id="forboraci" name="forboraci" method="post" action="bordatainicial.php">
							<input type="hidden" name="datai" 	id="datai"	 autocomplete="off" value="1"/>   
							<input type="hidden" name="boraci" id="boraci"	 autocomplete="off" value="<?php echo $filadata['nomaci'];?>"/>
							<input class="btn btn-primary" type="submit" name="Submit" value="Eliminar"/>
						</form>
					</td>
				</tr> 
				<?php
					}
				?>
			</table>
				
			<table align="center">
			<tr>
				<td align="center">
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
				<form id="paginacion" name="paginacion" method="post" action="condatainicial.php">
					<input type="hidden" name="datai" id="datai" autocomplete="off" value="<?php echo $cons ?>"/>
					<input type="hidden" name="pagina" id="pagina" autocomplete="off" value="<?php echo $i  ?>"/>
					<input class="btn btn-primary" type="submit" name="Submit" value="<?php echo $i ?>"/>
				</td>
				<td align="center">
				</form>
					<?php
						}
					}
				 }
			  }
			  else
			  {
				 ?>
				  <tr align="center">
					 <td colspan="4">No se encontraron registros </td>
				  </tr>
				   </table>
	 <?php
      }
   }
   if($cons==2)
   {
      $data= new ConsultaEstatus();
      $num_total_registros = $data->ConsultaPaginador();
      if($num_total_registros>=1)
      {
         $data2= new ConsultaEstatus2($TAMANO_PAGINA, $inicio);
         $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
         echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
         echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
         echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
         while($filadata=$data2->Consulta())
         {
	    ?>
	       <tr align="center">
	          <td><?php echo $filadata['idest'];?></td>
	          <td><?php echo $filadata['nomest'];?></td>
                  <td><br>
				  <form id="formodest" name="formodest" method="post" action="moddatainicial.php">   
                     <input type="hidden" name="datai" id="datai" autocomplete="off" value="2"/> 
                     <input type="hidden" name="modest" id="modest" autocomplete="off" value="<?php echo $filadata['nomest'];?> "/>
                     <input class="btn btn-primary" type="submit" name="Submit" value="Modificar"/>
                  </form>
				  </td>
                  <td><br>
				  <form id="forborest" name="forborest" method="post" action="bordatainicial.php">
                     <input type="hidden" name="datai" id="datai" autocomplete="off" value="2"/>
                     <input type="hidden" name="borest" id="borest" autocomplete="off" value="<?php echo $filadata['nomest'];?> "/>
                     <input class="btn btn-primary" type="submit" name="Submit" value="Eliminar"/>
                  </form></td>
	       </tr>
	    <?php
         }
         ?>
            </table>
          <table align="center">
               <tr>
                  <td align="center">
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
                     <form id="paginacion" name="paginacion" method="post" action="condatainicial.php">
                           <input type="hidden" name="datai"  id="datai"  autocomplete="off" value="<?php echo $cons?>"/>
                           <input type="hidden" name="pagina" id="pagina" autocomplete="off" value="<?php echo $i?>"/>
                           <input class="btn btn-primary" type="submit" name="Submit" value="<?php echo $i ?>"/>
                        </td><td align="center">
                     </form>
                  <?php
               }
            }
         }
      }
      else
      {
         ?>
	      <tr align="center">
	         <td colspan="4">No se encontraron registros</td>
	      </tr>
           </table>
	<?php
      }
   }
   if($cons==3)
   {
      $data= new ConsultaGrupos();
      $num_total_registros = $data->ConsultaPaginador();
      if($num_total_registros>=1)
      {
         $data2= new ConsultaGrupos2($TAMANO_PAGINA, $inicio);
         $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
         echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
         echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
         echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
         while($filadata=$data2->Consulta())
         {
	    ?>
	       <tr align="center">
	          <td><?php echo $filadata['idgru'];?></td>
	          <td><?php echo $filadata['nomgru'];?></td>
                  <td>
				  <br>
				  <form id="formodgru" name="formodgru" method="post" action="moddatainicial.php">   
                     <input type="hidden" name="datai" id="datai" autocomplete="off" value="3"/> 
                     <input type="hidden" name="modgru" id="modgru" autocomplete="off" value="<?php echo $filadata['nomgru'];?>"/>
                     <input class="btn btn-primary" type="submit" name="Submit" value="Modificar"/>
                  </form>
			   </td>
                  <td>
				  <br>
				  <form id="forborgru" name="forborgru" method="post" action="bordatainicial.php">
                     <input type="hidden" name="datai" id="datai" autocomplete="off" value="3"/>
                     <input type="hidden" name="borgru" id="borgru" autocomplete="off" value="<?php echo $filadata['nomgru'];?>"/>
                     <input class="btn btn-primary" type="submit" name="Submit" value="Eliminar"/>
                  </form></td>
	       </tr>
            <?php
         }
         ?>
            </table>
          <table align="center">
               <tr>
                  <td align="center">
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
                     <form id="paginacion" name="paginacion" method="post" action="condatainicial.php">
                           <input type="hidden" name="datai" id="datai" autocomplete="off" value="<?php echo $cons ?> "/>
                           <input type="hidden" name="pagina" id="pagina" autocomplete="off" value="<?php echo $i ?> " />
                           <input class="btn btn-primary" type="submit" name="Submit" value="<?php echo $i ?>"/>
                        </td><td align="center">
                     </form>
                  <?php
               }
            }
         }
      }
      else
      {
          ?>
	      <tr align="center">
	         <td colspan="4">No se encontraron registros</td>
	      </tr>
           </table>
	 <?php
      }
   }
   if($cons==4)
   {
      $data= new ConsultaMotivos();
      $num_total_registros = $data->ConsultaPaginador();
      if($num_total_registros>=1)
      {
         $data2= new ConsultaMotivos2($TAMANO_PAGINA, $inicio);
         $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
         echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
         echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
         echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
         while($filadata=$data2->Consulta())
         {
	   ?>
	       <tr align="center">
	          <td><?php echo $filadata['idmot'];?></td>
	          <td><?php echo $filadata['nommot'];?></td>
                  <td><br><form id="formodmot" name="formodmot" method="post" action="moddatainicial.php">   
                     <input type="hidden" name="datai" id="datai" autocomplete="off" value="4"/> 
                     <input type="hidden" name="modmot" id="modmot" autocomplete="off" value="<?php echo $filadata['nommot'];?>"/>
                     <input class="btn btn-primary" type="submit" name="Submit" value="Modificar"/>
                  </form></td>
                  <td><br><form id="forbormot" name="forbormot" method="post" action="bordatainicial.php">
                     <input type="hidden" name="datai" id="datai" autocomplete="off" value="4"/>
                     <input type="hidden" name="bormot" id="bormot" autocomplete="off" value="<?php echo $filadata['nommot'];?>"/>
                     <input class="btn btn-primary"type="submit" name="Submit" value="Eliminar"/>
                  </form></td>
	       </tr>
            <?php
         }
         ?>
            </table>
          <table  align="center">
               <tr>
                  <td align="center">
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
                     <form id="paginacion" name="paginacion" method="post" action="condatainicial.php">
                           <input type="hidden" name="datai" id="datai" autocomplete="off" value="<?php echo $cons ?>"/>
                           <input type="hidden" name="pagina" id="pagina" autocomplete="off" value="<?php echo $i ?>" />
                           <input class="btn btn-primary" type="submit" name="Submit" value="<?php echo $i ?>" />
                        </td><td align="center">
                     </form>
                  <?php
               }
            }
         }
      }
      else
      {
        ?>
	      <tr align="center">
	         <td colspan="4">No se encontraron registros</td>
	      </tr>
           </table>
	 <?php
      }
   }
   if($cons==5)
   {
      $data= new ConsultaRoles();
      $num_total_registros = $data->ConsultaPaginador();
      if($num_total_registros>=1)
      {
         $data2= new ConsultaRoles2($TAMANO_PAGINA, $inicio);
         $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
         echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
         echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
         echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
         while($filadata=$data2->Consulta())
         {
	    ?>
	       <tr align="center">
	          <td><?php echo $filadata['idrol'];?></td>
	          <td><?php echo$filadata['nomrol'];?></td>
                  <td><br><form id="formodrol" name="formodrol" method="post" action="moddatainicial.php">   
                     <input type="hidden" name="datai" id="datai" autocomplete="off" value="5"/> 
                     <input type="hidden" name="modrol" id="modrol" autocomplete="off" value="<?php echo $filadata['nomrol'];?>"/>
                     <input class="btn btn-primary"type="submit" name="Submit" value="Modificar"/>
                  </form></td>
                  <td><br><form id="forborrol" name="forborrol" method="post" action="bordatainicial.php">
                     <input type="hidden" name="datai" id="datai" autocomplete="off" value="5"/>
                     <input type="hidden" name="borrol" id="borrol" autocomplete="off" value="<?php echo $filadata['nomrol'];?>"/>
                     <input class="btn btn-primary" type="submit" name="Submit" value="Eliminar"/>
                  </form></td>
	       </tr>
           <?php
         }
        ?>
            </table>
            <table align="center">
               <tr>
                  <td align="center">
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
                     <form id="paginacion" name="paginacion" method="post" action="condatainicial.php">
                           <input type="hidden" name="datai" id="datai" autocomplete="off" value="<?php echo $cons ?>"/>
                           <input  type="hidden" name="pagina" id="pagina" autocomplete="off" value="<?php echo $i ?>"/>
                           <input class="btn btn-primary" type="submit" name="Submit" value="<?php echo $i ?>"/>
                        </td><td align="center">
                     </form>
                 <?php
               }
            }
         }
      }
      else
      {
        ?>
	      <tr align="center">
	         <td colspan="4">No se encontraron registros</td>
	      </tr>
           </table>
	 <?php
      }
   }
   if($cons==6)
   {
      $data= new ConsultaSituaciones();
      $num_total_registros = $data->ConsultaPaginador();
      if($num_total_registros>=1)
      {
         $data2= new ConsultaSituaciones2($TAMANO_PAGINA, $inicio);
         $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
         echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
         echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
         echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
         while($filadata=$data2->Consulta())
         {
            ?>
	       <tr align="center">
	          <td><?php echo $filadata['idsit'];?></td>
	          <td><?php echo $filadata['nomsit'];?></td>
            <td><?php echo $filadata['codsit'];?></td>
                  <td><br><form id="formodsit" name="formodsit" method="post" action="moddatainicial.php">   
                     <input type="hidden" name="datai" id="datai" autocomplete="off" value="6"/> 
                     <input type="hidden" name="modsit" id="modsit" autocomplete="off" value="<?php echo $filadata['nomsit'];?>"/>
                     <input class="btn btn-primary" type="submit" name="Submit" value="Modificar"/>
                  </form></td>
                  <td><br><form id="forborsit" name="forborsit" method="post" action="bordatainicial.php">
                     <input type="hidden" name="datai" id="datai" autocomplete="off" value="6"/>
                     <input type="hidden" name="borsit" id="borsit" autocomplete="off" value="<?php echo $filadata['nomsit'];?>"/>
                     <input class="btn btn-primary" type="submit" name="Submit" value="Eliminar"/>
                  </form></td>
	       </tr>
           <?php
         }
         ?>
            </table>
          <table align="center">
               <tr>
                  <td align="center">
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
                     <form id="paginacion" name="paginacion" method="post" action="condatainicial.php">
                        <input type="hidden" name="datai" id="datai" autocomplete="off" value="<?php echo $cons ?>" />   
                        <input type="hidden" name="pagina" id="pagina" autocomplete="off" value="<?php echo $i ?>" />
                        <input class="btn btn-primary" type="submit" name="Submit" value="<?php echo $i ?>" />
                        </td><td align="center">
                     </form>
                  <?php
               }
            }
         }
      }
      else
      {
         ?>
	      <tr align="center">
	         <td colspan="4">No se encontraron registros</td>
	      </tr>
           </table>
	 <?php
      }
   }
   if($cons==7)
   {
      $data= new ConsultaDepartamentos();
      $num_total_registros = $data->ConsultaPaginador();
      if($num_total_registros>=1)
      {
         $data2= new ConsultaDepartamentos2($TAMANO_PAGINA, $inicio);
         $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
         echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
         echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
         echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
         while($filadata=$data2->Consulta())
         {
	    ?>
	       <tr align="center">
	          <td> <?php echo $filadata['iddep'];?></td>
	          <td> <?php echo $filadata['nomdep'];?></td>
                  <td><?php echo $filadata['nomgru'];?></td>
                  <td><br><form id="formoddep" name="formoddep" method="post" action="moddatainicial.php">   
                     <input type="hidden" name="datai" id="datai" autocomplete="off" value="7"/> 
                     <input type="hidden" name="moddep" id="moddep" autocomplete="off" value="<?php echo $filadata['nomdep'];?> "/>
                     <input class="btn btn-primary" type="submit" name="Submit" value="Modificar"/>
                  </form></td>
                  <td><br><form id="forbordep" name="forbordep" method="post" action="bordatainicial.php">
                     <input type="hidden" name="datai" id="datai" autocomplete="off" value="7"/>
                     <input type="hidden" name="bordep" id="bordep" autocomplete="off" value= "<?php echo $filadata['nomdep'];?> "/>
                     <input class="btn btn-primary" type="submit" name="Submit" value="Eliminar"/>
                  </form></td>
	       </tr>
	   <?php
         }
         ?>
            </table>
          <table  align="center">
               <tr>
                  <td align="center">
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
                     <form id="paginacion" name="paginacion" method="post" action="condatainicial.php">
                        <input type="hidden" name="datai" id="datai" autocomplete="off" value="<?php echo $cons ?>" />   
                        <input type="hidden" name="pagina" id="pagina" autocomplete="off" value="<?php echo $i ?>" />
                        <input class="btn btn-primary" type="submit" name="Submit" value="<?php echo $i ?>" />
                        </td><td align="center">
                     </form>
                  <?php
               }
            }
         }
      }
      else
      {
          ?>
	      <tr align="center">
	         <td colspan="4">No se encontraron registros</td>
	      </tr>
           </table>
	<?php
      }
   }
   if($cons==8)
   {
      $data= new ConsultaGrados();
      $num_total_registros = $data->ConsultaPaginador();
      if($num_total_registros>=1)
      {
         $data2= new ConsultaGrados2($TAMANO_PAGINA, $inicio);
         $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
         echo "<center>N&uacute;mero de registros encontrados: " . $num_total_registros . "<br>";
         echo "Se muestran p&aacute;ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
         echo "Mostrando la p&aacute;gina " . $pagina . " de " . $total_paginas . "<p></center>";
         while($filadata=$data2->Consulta())
         {
             ?>
         <tr align='center'>
	          <td><?php echo $filadata['idgra'];?></td>
	          <td><?php echo $filadata['nomgra'];?></td>
                  <td><br><form id='formodgra' name='formodgra' method='post' action='moddatainicial.php'>   
                     <input type='hidden' name='datai' id='datai' autocomplete='off' value='8'/> 
                     <input type='hidden' name='modgra' id='modgra' autocomplete='off' value='<?php echo $filadata['nomgra'];?>'/>
                     <input  class="btn btn-primary"  type='submit' name='Submit' value='Modificar'/>
                  </form></td>
                  <td><br><form id='forborgra' name='forborgra' method='post' action='bordatainicial.php'>
                     <input type='hidden' name='datai' id='datai' autocomplete='off' value='8'/>
                     <input type='hidden' name='borgra' id='borgra' autocomplete='off' value='<?php echo $filadata['nomgra'];?>'/>
                     <input class="btn btn-primary" type='submit' name='Submit' value='Eliminar'/>
                  </form></td>
	       </tr>
         <?php
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
                     <form id='paginacion' name='paginacion' method='post' action='condatainicial.php'>
                           <input type='hidden' name='datai' id='datai' autocomplete='off' value='<?php echo $cons ?>' />
                           <input type='hidden' name='pagina' id='pagina' autocomplete='off' value='<?php echo  $i ?>' />
                           <input class="btn btn-primary" type='submit' name='Submit' value='<?php echo $i ?>' />
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
	         <td colspan='4'>No se encontraron registros</td>
	      </tr>
           </table>
	<?php
      }
   }
?>
      <table align='center' border='0' bgcolor='white'>
               </td>
            </tr>
            <tr>
            <td align="center" colspan="7">
               <form data-ajax="false" id="forvolver" name="forvolver" method="post" action="../../cuerpo/menus/menudata.php">               
                  <input class="btn btn-primary" type="submit" name="Submit" value="Atr&aacute;s"/>
               </form>
            </td>
         </tr>
      </table>
   
        </div>
    </div>
</div>
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
            "../../img/conecciones-digitales.webp",
        ], {duration: 7000, fade: 750});
    });
</script>