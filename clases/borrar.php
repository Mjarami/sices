<?php
   class BorrarAccion extends Registros
   {  
      function __construct($nom)
      {
         $sql="delete from Acciones where nomaci='$nom'";
         parent::__construct($sql);
      }
   }
   class BorrarEstatu extends Registros
   {  
      function __construct($nom)
      {
         $sql="delete from Estatus where nomest='$nom'";
         parent::__construct($sql);
      }
   }
   class BorrarGrupo extends Registros
   {  
      function __construct($nom)
      {
         $sql="delete from Grupos where nomgru='$nom'";
         parent::__construct($sql);
      }
   }
   class BorrarMotivo extends Registros
   {  
      function __construct($nom)
      {
         $sql="delete from Motivos where nommot='$nom'";
         parent::__construct($sql);
      }
   }
   class BorrarRol extends Registros
   {  
      function __construct($nom)
      {
         $sql="delete from Roles where nomrol='$nom'";
         parent::__construct($sql);
      }
   }
   class BorrarSituacion extends Registros
   {  
      function __construct($nom)
      {
         $sql="delete from Situaciones where nomsit='$nom'";
         parent::__construct($sql);
      }
   }
   class BorrarDepartamento extends Registros
   {  
      function __construct($nom)
      {
         $sql="delete from Departamentos where nomdep='$nom'";
         parent::__construct($sql);
      }
   }
   class BorrarGrado extends Registros
   {  
      function __construct($nom)
      {
         $sql="delete from Grados where nomgra='$nom'";
         parent::__construct($sql);
      }
   }
?>
