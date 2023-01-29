<?php
   if (isset($_REQUEST['datai']))
   {
      $envio=$_POST["datai"];
      if ($envio==1)
      {
         header('Location: ../datai/regdatainicial.php?datai=1');
         exit();
      }
      if ($envio==2)
      {
         header('Location: ../datai/condatainicial.php?datai=1');
         exit();
      }
      if ($envio==3)
      {
         header('Location: ../datai/regdatainicial.php?datai=2');
         exit();
      }
      if ($envio==4)
      {
         header('Location: ../datai/condatainicial.php?datai=2');
         exit();
      }
      if ($envio==5)
      {
         header('Location: ../datai/regdatainicial.php?datai=3');
         exit();
      }
      if ($envio==6)
      {
         header('Location: ../datai/condatainicial.php?datai=3');
         exit();
      }
      if ($envio==7)
      {
         header('Location: ../datai/regdatainicial.php?datai=4');
         exit();
      }
      if ($envio==8)
      {
         header('Location: ../datai/condatainicial.php?datai=4');
         exit();
      }
      if ($envio==9)
      {
         header('Location: ../datai/regdatainicial.php?datai=5');
         exit();
      }
      if ($envio==10)
      {
         header('Location: ../datai/condatainicial.php?datai=5');
         exit();
      }
      if ($envio==11)
      {
         header('Location: ../datai/regdatainicial.php?datai=6');
         exit();
      }
      if ($envio==12)
      {
         header('Location: ../datai/condatainicial.php?datai=6');
         exit();
      }
      if ($envio==13)
      {
         header('Location: ../datai/regdatainicial.php?datai=7');
         exit();
      }
      if ($envio==14)
      {
         header('Location: ../datai/condatainicial.php?datai=7');
         exit();
      }
      if ($envio==15)
      {
         header('Location: ../datai/regdatainicial.php?datai=8');
         exit();
      }
      if ($envio==16)
      {
         header('Location: ../datai/condatainicial.php?datai=8');
         exit();
      }
   }
   if (isset($_REQUEST['personal']))
   {
      $envio=$_POST["personal"];
      if ($envio==1)
      {
         header('Location: ../personal/regpersonal.php?personal=1');
         exit();
      }
      if ($envio==2)
      {
         header('Location: ../personal/conpersonal.php?personal=1');
         exit();
      }
      if ($envio==3)
      {
         header('Location: ../personal/regpersonal.php?personal=2');
         exit();
      }
      if ($envio==4)
      {
         header('Location: ../personal/conpersonal.php?personal=2');
         exit();
      }
   }
   else
   {
      header('Location: ../index.php');
      exit();
   }
?>
