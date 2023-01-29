<?php
   class Registros
   {
      function __construct($sql)
      {
         mysql_query($sql, Conectar::con());
      }
   }   
   class Accion extends Registros
   {	  
      function __construct($nom)
      {
         $sql="insert into Acciones (nomaci) values ('".$nom."')";
         parent::__construct($sql);
      }
   }
   class Estatu extends Registros
   {  
      function __construct($nom)
      {
         $sql="insert into Estatus (nomest) values ('".$nom."')";
         parent::__construct($sql);
      }
   }
   class Grupo extends Registros
   {  
      function __construct($nom)
      {
         $sql="insert into Grupos (nomgru) values ('".$nom."')";
         parent::__construct($sql);
      }
   }
   class Motivo extends Registros
   {  
      function __construct($nom)
      {
         $sql="insert into Motivos (nommot) values ('".$nom."')";
         parent::__construct($sql);
      }
   }
   class Rol extends Registros
   {  
      function __construct($nom)
      {
         $sql="insert into Roles (nomrol) values ('".$nom."')";
         parent::__construct($sql);
      }
   }
   class Situacion extends Registros
   {  
      function __construct($nom, $cod)
      {
         $sql="insert into Situaciones (nomsit, codsit) values ('".$nom."', '".$cod."')";
         parent::__construct($sql);
      }
   }
   class Departamento extends Registros
   {  
      function __construct($idgru, $nom)
      {
         $sql="insert into Departamentos (idgru, nomdep) values ('".$idgru."', '".$nom."')";
         parent::__construct($sql);
      }
   }
   class Persona extends Registros
   {  
      function __construct($dep, $gra, $ape, $nom, $ano, $mes, $dia, $ced, $cas, $cel, $cor, $com, $tip, $dir)
      {
         $sql="insert into Personas (iddep, idgra, apeper, nomper, anoper, mesper, diaper, cedper, telper, celper, corper, idcco, idtco, dirper) values ('".$dep."', '".$gra."', '".$ape."', '".$nom."', '".$ano."', '".$mes."', '".$dia."', '".$ced."', '".$cas."', '".$cel."', '".$cor."', '".$com."', '".$tip."', '".$dir."')";
         parent::__construct($sql);
      }
   }
   class Acceso extends Registros
   {  
      function __construct($rol, $idper, $usu, $con, $cod)
      {
         $sql="insert into Accesos (idrol, idest, idper, usuacc, conacc, codacc) values ( '".$rol."', 2,'".$idper."', '".$usu."', '".$con."', '".$cod."')";
         parent::__construct($sql);
      }
   }
   class Proceso extends Registros
   {  
      function __construct($aci, $sit, $per, $fec, $hor)
      {
         $sql="insert into Procesos (idaci, idsit, idper, fecpro, horpro) values ('".$aci."', '".$sit."', '".$per."', '".$fec."', '".$hor."')";
         parent::__construct($sql);
      }
   }
   class Proceso2 extends Registros
   {  
      function __construct($aci, $acc, $per, $fec, $hor)
      {
         $sql="insert into Procesos (idaci, idacc, idper, fecpro, horpro) values ('".$aci."', '".$acc."', '".$per."', '".$fec."', '".$hor."')";
         parent::__construct($sql);
      }
   }
   class Auditoria extends Registros
   {  
      function __construct($pro, $idmot, $lug)
      {
         $sql="insert into Auditorias (idpro, idmot, lugaud) values ('".$pro."', '".$idmot."', '".$lug."')";
         parent::__construct($sql);
      }
   }
   class Parte extends Registros
   {  
      function __construct($idpro, $has, $obs)
      {
         $sql="insert into Partes (idpro, haspar, obspar) values ('".$idpro."', '".$has."', '".$obs."')";
         parent::__construct($sql);
      }
   }
   class Grado extends Registros
   {  
      function __construct($gra)
      {
         $sql="insert into Grados (nomgra) values ('".$gra."')";
         parent::__construct($sql);
      }
   }
   class VisitaMilitar extends Registros
   {  
      function __construct($per, $uni)
      {
         $sql="insert into VisitaMilitar (idper, univis) values ('".$per."', '".$uni."')";
         parent::__construct($sql);
      }
   }
?>
