<?php  
   class ModificarAccion extends Registros
   {  
      function __construct($idaci,$nom)
      {
         $sql="update Acciones set nomaci='$nom' where idaci='$idaci'";
         parent::__construct($sql);
      }
   }
   class ModificarEstatu extends Registros
   {  
      function __construct($idest,$nom)
      {
         $sql="update Estatus set nomest='$nom' where idest='$idest'";
         parent::__construct($sql);
      }
   }
   class ModificarGrupo extends Registros
   {  
      function __construct($idgru,$nom)
      {
	 $sql="update Grupos set nomgru='$nom' where idgru='$idgru'";
         parent::__construct($sql);
      }
   }
   class ModificarMotivo extends Registros
   {  
      function __construct($idmot,$nom)
      {
	 $sql="update Motivos set nommot='$nom' where idmot='$idmot'";
         parent::__construct($sql);
      }
   }
   class ModificarRol extends Registros
   {  
      function __construct($idrol,$nom)
      {
	 $sql="update Roles set nomrol='$nom' where idrol='$idrol'";
         parent::__construct($sql);
      }
   }
   class ModificarSituacion extends Registros
   {  
      function __construct($idsit,$nom, $cod)
      {
	 $sql="update Situaciones set nomsit='$nom', codsit='$cod' where idsit='$idsit'";
         parent::__construct($sql);
      }
   }
   class ModificarDepartamento extends Registros
   {  
      function __construct($iddep, $nom, $grupo)
      {
	 $sql="update Departamentos set nomdep='$nom', idgru='$grupo' where iddep='$iddep'";
         parent::__construct($sql);
      }
   }
   class ModificarPersona extends Registros
   {  
      function __construct($idper, $dep, $gra, $ape, $nom, $ano, $mes, $dia, $ced, $cas, $cel, $cor, $com, $tip, $dir)
      {
	 $sql="update Personas set iddep='$dep', idgra='$gra', apeper='$ape', nomper='$nom', anoper='$ano', mesper='$mes', diaper='$dia', cedper='$ced', telper='$cas', celper='$cel', corper='$cor', idcco='$com', idtco='$tip', dirper='$dir' where idper='$idper'";
         parent::__construct($sql);
      }
   }
   class ModificarAcceso extends Registros
   {  
      function __construct($rol, $idper, $usu, $con, $cod)
      {
	 $sql="update Accesos set idrol='$rol', usuacc='$usu', conacc='$con', codacc='$cod' where idper='$idper'";
         parent::__construct($sql);
      }
   }
   class ModificarAcceso2 extends Registros
   {  
      function __construct($idper, $idrol, $usu, $cod)
      {
	 $sql="update Accesos set idrol='$idrol', usuacc='$usu', codacc='$cod' where idper='$idper'";
         parent::__construct($sql);
      }
   }
   class ModificarAcceso3 extends Registros
   {  
      function __construct($rol, $idper, $usu, $con)
      {
    $sql="update Accesos set idrol='$rol', usuacc='$usu', conacc='$con' where idper='$idper'";
         parent::__construct($sql);
      }
   }
   class ModificarEstatuAcceso extends Registros
   {  
      function __construct($per, $est)
      {
	 $sql="update Accesos set idest='$est' where idper='$per'";
         parent::__construct($sql);
      }
   }
   class ModificarParte extends Registros
   {  
      function __construct($pro, $has)
      {
	 $sql="update Partes set haspar='$has' where idpro='$pro'";
         parent::__construct($sql);
      }
   }
   class ModificarGrado extends Registros
   {  
      function __construct($idgra, $gra)
      {
	 $sql="update Grados set nomgra='$gra' where idgra='$idgra'";
         parent::__construct($sql);
      }
   }
   class ModificarFoto extends Registros
   {  
      function __construct($nuevubi, $ced)
      {
    $sql="update Personas set fotper='$nuevubi' where cedper='$ced'";
         parent::__construct($sql);
      }
   }
?>
