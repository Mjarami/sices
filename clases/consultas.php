<?php
   class Consultas
   {
      public $consulta;
      public $resultado;

      function __construct($sql)
      {
         $this->consulta=mysql_query($sql, Conectar::con());
      }
      
      function Consulta()
      {
         $this->resultado=mysql_fetch_array($this->consulta);
         return $this->resultado;
      }

      function ConsultaPaginador()
      {
         $this->resultado=mysql_num_rows($this->consulta);
         return $this->resultado;
      }
   }
   class ConsultaAcciones extends Consultas
   {
      function __construct()
      {
         $sql="select * from Acciones";
         parent::__construct($sql);
      }
   }
   class ConsultaAcciones2 extends Consultas
   {
      function __construct($tamano, $inicio)
      {
         $sql="select * from Acciones limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }  
   class ConsultaAccionEspecifica extends Consultas
   {
      function __construct($nom)
      {
         $sql="select * from Acciones where nomaci='$nom'";
         parent::__construct($sql);
      }
   }
   class ConsultaEstatus extends Consultas
   {
      function __construct()
      {
         $sql="select * from Estatus";
         parent::__construct($sql);
      }
   }
   class ConsultaEstatus2 extends Consultas
   {
      function __construct($tamano, $inicio)
      {
         $sql="select * from Estatus limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }   
   class ConsultaEstatuEspecifico extends Consultas
   {
      function __construct($nom)
      {
         $sql="select * from Estatus where nomest='$nom'";
         parent::__construct($sql);
      }
   }
   class ConsultaGrupos extends Consultas
   {
      function __construct()
      {
         $sql="select * from Grupos";
         parent::__construct($sql);
      }
   }  
   class ConsultaGrupos2 extends Consultas
   {
      function __construct($tamano, $inicio)
      {
         $sql="select * from Grupos limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }
   class ConsultaGrupoEspecifico extends Consultas
   {
      function __construct($nom)
      {
         $sql="select * from Grupos where nomgru='$nom'";
         parent::__construct($sql);
      }
   }
   class ConsultaMotivos extends Consultas
   {
      function __construct()
      {
         $sql="select * from Motivos";
         parent::__construct($sql);
      }
   }
   class ConsultaMotivos2 extends Consultas
   {
      function __construct($tamano, $inicio)
      {
         $sql="select * from Motivos limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }
   class ConsultaMotivoEspecifico extends Consultas
   {
      function __construct($nom)
      {
         $sql="select * from Motivos where nommot='$nom'";
         parent::__construct($sql);
      }
   }
   class ConsultaRoles extends Consultas
   {
      function __construct()
      {
         $sql="select * from Roles";
         parent::__construct($sql);
      }
   }
   class ConsultaRoles2 extends Consultas
   {
      function __construct($tamano, $inicio)
      {
         $sql="select * from Roles limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }
   class ConsultaRolEspecifico extends Consultas
   {
      function __construct($nom)
      {
         $sql="select * from Roles where nomrol='$nom'";
         parent::__construct($sql);
      }
   }
   class ConsultaSituaciones extends Consultas
   {
      function __construct()
      {
         $sql="select * from Situaciones";
         parent::__construct($sql);
      }
   }
   class ConsultaSituaciones2 extends Consultas
   {
      function __construct($tamano, $inicio)
      {
         $sql="select * from Situaciones limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }
   class ConsultaSituacionEspecifica extends Consultas
   {
      function __construct($nom)
      {
         $sql="select * from Situaciones where nomsit='$nom'";
         parent::__construct($sql);
      }
   }
   class ConsultaDepartamentos extends Consultas
   {
      function __construct()
      {
         $sql="select Departamentos.iddep, Departamentos.idgru, Departamentos.nomdep, Grupos.idgru, Grupos.nomgru from Departamentos, Grupos where Departamentos.idgru=Grupos.idgru";
         parent::__construct($sql);
      }
   }
   class ConsultaDepartamentos2 extends Consultas
   {
      function __construct($tamano, $inicio)
      {
         $sql="select Departamentos.iddep, Departamentos.idgru, Departamentos.nomdep, Grupos.idgru, Grupos.nomgru from Departamentos, Grupos where Departamentos.idgru=Grupos.idgru limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }
   class ConsultaDepartamentoEspecifico extends Consultas
   {
      function __construct($nom)
      {
         $sql="select Departamentos.iddep, Departamentos.idgru, Departamentos.nomdep, Grupos.idgru, Grupos.nomgru from Departamentos, Grupos where Departamentos.idgru=Grupos.idgru and nomdep like '%$nom%'";
         parent::__construct($sql);
      }
   }
   class ConsultaCompaniaCorreo extends Consultas
   {
      function __construct()
      {
         $sql="select * from CompaniaCorreo";
         parent::__construct($sql);
      }
   }
   class ConsultaCompaniaCorreoEspecifica extends Consultas
   {
      function __construct($nom)
      {
         $sql="select * from CompaniaCorreo where nomcco='$nom'";
         parent::__construct($sql);
      }
   }
   class ConsultaTipoCorreo extends Consultas
   {
      function __construct()
      {
         $sql="select * from TipoCorreo";
         parent::__construct($sql);
      }
   }
   class ConsultaTipoCorreoEspecifico extends Consultas
   {
      function __construct($nom)
      {
         $sql="select * from TipoCorreo where nomtco='$nom'";
         parent::__construct($sql);
      }
   }
   class ConsultaPersonas extends Consultas
   {
      function __construct()
      {
         $sql="select Personas.idper, Personas.iddep, Personas.cedper, Personas.apeper, Personas.nomper, Personas.anoper, Personas.mesper, Personas.diaper, Personas.telper, Personas.celper, Personas.corper, Personas.idcco, Personas.idtco, Personas.dirper, Personas.idgra, Departamentos.iddep, Departamentos.nomdep, CompaniaCorreo.idcco, CompaniaCorreo.nomcco, TipoCorreo.idtco, TipoCorreo.nomtco, Grados.idgra, Grados.nomgra from Personas, Departamentos, CompaniaCorreo, TipoCorreo, Grados where Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and Personas.idgra=Grados.idgra";
         parent::__construct($sql);
      }
   }
   class ConsultaPersonas2 extends Consultas
   {
      function __construct($tamano, $inicio)
      {
         $sql="select Personas.idper, Personas.iddep, Personas.cedper, Personas.apeper, Personas.nomper, Personas.anoper, Personas.mesper, Personas.diaper, Personas.telper, Personas.celper, Personas.corper, Personas.idcco, Personas.idtco, Personas.dirper, Personas.idgra, Departamentos.iddep, Departamentos.nomdep, CompaniaCorreo.idcco, CompaniaCorreo.nomcco, TipoCorreo.idtco, TipoCorreo.nomtco, Grados.idgra, Grados.nomgra from Personas, Departamentos, CompaniaCorreo, TipoCorreo, Grados where Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and Personas.idgra=Grados.idgra limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }
   class ConsultaPersonaEspecifico extends Consultas
   {
      function __construct($ced)
      {
         $sql="select Personas.idper, Personas.iddep, Personas.cedper, Personas.apeper, Personas.nomper, Personas.anoper, Personas.mesper, Personas.diaper, Personas.telper, Personas.celper, Personas.corper, Personas.idcco, Personas.idtco, Personas.dirper, Personas.idgra, Personas.fotper, Departamentos.iddep, Departamentos.nomdep, CompaniaCorreo.idcco, CompaniaCorreo.nomcco, TipoCorreo.idtco, TipoCorreo.nomtco, Grados.idgra, Grados.nomgra from Personas, Departamentos, CompaniaCorreo, TipoCorreo, Grados where Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and cedper='$ced' and Personas.idgra=Grados.idgra";
         parent::__construct($sql);
      }
   }
   class ConsultaPersonaEspecifico2 extends Consultas
   {
      function __construct($ced)
      {
         $sql="select * from Personas where cedper='$ced'";
         parent::__construct($sql);
      }
   }
   class ConsultaPersonaEspecifico3 extends Consultas
   {
      function __construct($bus)
      {
         $sql="select Personas.idper, Personas.iddep, Personas.cedper, Personas.apeper, Personas.nomper, Personas.anoper, Personas.mesper, Personas.diaper, Personas.telper, Personas.celper, Personas.corper, Personas.idcco, Personas.idtco, Personas.dirper, Personas.idgra, Departamentos.iddep, Departamentos.nomdep, CompaniaCorreo.idcco, CompaniaCorreo.nomcco, TipoCorreo.idtco, TipoCorreo.nomtco, Grados.idgra, Grados.nomgra, Accesos.idper, Accesos.codacc from Personas, Departamentos, CompaniaCorreo, TipoCorreo, Grados, Accesos where Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and cedper='$bus' and Personas.idgra=Grados.idgra and Accesos.idper=Personas.idper or Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and Personas.nomper like '%$bus%' and Personas.idgra=Grados.idgra and Accesos.idper=Personas.idper or Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and Personas.apeper like '%$bus%' and Personas.idgra=Grados.idgra and Accesos.idper=Personas.idper or Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and Grados.nomgra='$bus' and Personas.idgra=Grados.idgra and Accesos.idper=Personas.idper or Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and Departamentos.nomdep='$bus' and Personas.idgra=Grados.idgra and Accesos.idper=Personas.idper or Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and Accesos.codacc='$bus' and Personas.idgra=Grados.idgra and Accesos.idper=Personas.idper";
         parent::__construct($sql);
      }
   }
   class ConsultaPersonaEspecifico4 extends Consultas
   {
      function __construct($bus, $tamano, $inicio)
      {
         $sql="select Personas.idper, Personas.iddep, Personas.cedper, Personas.apeper, Personas.nomper, Personas.anoper, Personas.mesper, Personas.diaper, Personas.telper, Personas.celper, Personas.corper, Personas.idcco, Personas.idtco, Personas.dirper, Personas.idgra, Departamentos.iddep, Departamentos.nomdep, CompaniaCorreo.idcco, CompaniaCorreo.nomcco, TipoCorreo.idtco, TipoCorreo.nomtco, Grados.idgra, Grados.nomgra, Accesos.idper, Accesos.codacc from Personas, Departamentos, CompaniaCorreo, TipoCorreo, Grados, Accesos where Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and cedper='$bus' and Personas.idgra=Grados.idgra and Accesos.idper=Personas.idper or Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and Personas.nomper like '%$bus%' and Personas.idgra=Grados.idgra and Accesos.idper=Personas.idper or Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and Personas.apeper like '%$bus%' and Personas.idgra=Grados.idgra and Accesos.idper=Personas.idper or Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and Grados.nomgra='$bus' and Personas.idgra=Grados.idgra and Accesos.idper=Personas.idper or Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and Departamentos.nomdep='$bus' and Personas.idgra=Grados.idgra and Accesos.idper=Personas.idper or Personas.iddep=Departamentos.iddep and Personas.idcco=CompaniaCorreo.idcco and Personas.idtco=TipoCorreo.idtco and Accesos.codacc='$bus' and Personas.idgra=Grados.idgra and Accesos.idper=Personas.idper limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }
   class ConsultaAccesos extends Consultas
   {
      function __construct()
      {
         $sql="select Accesos.idrol, Accesos.idest, Accesos.idper, Accesos.usuacc, Accesos.codacc, Personas.idper, Personas.cedper, Estatus.idest, Estatus.nomest, Roles.idrol, Roles.nomrol from Accesos, Personas, Estatus, Roles where Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol";
         parent::__construct($sql);
      }
   }
   class ConsultaAccesos2 extends Consultas
   {
      function __construct($tamano, $inicio)
      {
         $sql="select Accesos.idrol, Accesos.idest, Accesos.idper, Accesos.usuacc, Accesos.codacc, Personas.idper, Personas.cedper, Estatus.idest, Estatus.nomest, Roles.idrol, Roles.nomrol from Accesos, Personas, Estatus, Roles where Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }
   class ConsultaAccesoEspecifico extends Consultas
   {
      function __construct($ced)
      {
         $sql="select Accesos.idacc, Accesos.idrol, Accesos.idest, Accesos.idper, Accesos.usuacc, Accesos.codacc, Personas.idper, Personas.cedper, Estatus.idest, Estatus.nomest, Roles.idrol, Roles.nomrol from Accesos, Personas, Estatus, Roles where Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol and Personas.cedper='$ced'";
         parent::__construct($sql);
      }
   }
   class ConsultaAccesoEspecifico2 extends Consultas
   {
      function __construct($usu, $pas)
      {
         $sql="select Accesos.idrol, Accesos.idest, Accesos.idper, Accesos.usuacc, Accesos.conacc, Accesos.codacc, Personas.idper, Personas.cedper, Estatus.idest, Estatus.nomest, Roles.idrol, Roles.nomrol from Accesos, Personas, Estatus, Roles where Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol and Accesos.usuacc='$usu' and Accesos.conacc='$pas' and Accesos.idest='1'";
         parent::__construct($sql);
      }
   }
   class ConsultaAccesoEspecifico3 extends Consultas
   {
      function __construct($cod)
      {
         $sql="select Accesos.idrol, Accesos.idest, Accesos.idper, Accesos.usuacc, Accesos.conacc, Accesos.codacc, Personas.idper, Personas.cedper, Personas.apeper, Personas.nomper, Estatus.idest, Estatus.nomest, Roles.idrol, Roles.nomrol from Accesos, Personas, Estatus, Roles where Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol and Accesos.codacc='$cod'";
         parent::__construct($sql);
      }
   }
   class ConsultaAccesoEspecifico4 extends Consultas
   {
      function __construct($bus)
      {
         $sql="select Accesos.idrol, Accesos.idest, Accesos.idper, Accesos.usuacc, Accesos.conacc, Accesos.codacc, Personas.idper, Personas.cedper, Personas.apeper, Personas.nomper, Estatus.idest, Estatus.nomest, Roles.idrol, Roles.nomrol from Accesos, Personas, Estatus, Roles where Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol and Accesos.codacc='$bus' or Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol and Personas.cedper='$bus' or Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol and Roles.nomrol='$bus' or Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol and Accesos.usuacc='$bus' or Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol and Estatus.nomest='$bus'";
         parent::__construct($sql);
      }
   }
   class ConsultaAccesoEspecifico5 extends Consultas
   {
      function __construct($bus, $tamano, $inicio)
      {
         $sql="select Accesos.idrol, Accesos.idest, Accesos.idper, Accesos.usuacc, Accesos.conacc, Accesos.codacc, Personas.idper, Personas.cedper, Personas.apeper, Personas.nomper, Estatus.idest, Estatus.nomest, Roles.idrol, Roles.nomrol from Accesos, Personas, Estatus, Roles where Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol and Accesos.codacc='$bus' or Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol and Personas.cedper='$bus' or Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol and Roles.nomrol='$bus' or Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol and Accesos.usuacc='$bus' or Accesos.idper=Personas.idper and Accesos.idest=Estatus.idest and Accesos.idrol=Roles.idrol and Estatus.nomest='$bus' limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }
   class ConsultaProcesoEspecifico extends Consultas
   {
      function __construct($per)
      {
         $sql="select idpro, idper, idaci, idsit, fecpro, horpro from Procesos where idper='$per' order by idpro desc limit 1";
         parent::__construct($sql);
      }
   }
   class ConsultaProcesoEspecifico2 extends Consultas
   {
      function __construct($per)
      {
         $sql="select idpro, idper, idaci, idsit, fecpro, horpro from Procesos where idper='$per' and idaci='1' order by idpro desc limit 1";
         parent::__construct($sql);
      }
   }
   class ConsultaProcesoEspecifico3 extends Consultas
   {
      function __construct($per, $fech)
      {
         $sql="select idpro, idper, idaci, fecpro, horpro from Procesos where idper='$per' and idaci='2' and fecpro='$fech' order by idpro desc limit 1";
         parent::__construct($sql);
      }
   }
   class ConsultaAuditoriaEspecifica extends Consultas
   {
      function __construct($fech)
      {
         $sql="select Auditorias.idpro, Auditorias.idmot, Procesos.idpro, Procesos.idper, Procesos.fecpro from Auditorias, Procesos where Auditorias.idpro=Procesos.idpro and Procesos.fecpro='$fech'";
         parent::__construct($sql);
      }
   }
   class ConsultaAuditoriaIniciosSices extends Consultas
   {
      function __construct()
      {
         $sql="select Auditorias.idpro, Auditorias.idmot, Auditorias.lugaud, Procesos.idpro, Procesos.idper, Procesos.fecpro, Procesos.horpro, Motivos.idmot, Motivos.nommot, Personas.idper, Personas.nomper, Personas.apeper, Personas.cedper, Acciones.idaci, Acciones.nomaci from Auditorias, Procesos, Motivos, Personas, Acciones where Auditorias.idpro=Procesos.idpro and Auditorias.idmot='5' and Motivos.idmot=Auditorias.idmot and Personas.idper=Procesos.idper and Acciones.idaci=Procesos.idaci ORDER BY fecpro DESC";
         parent::__construct($sql);
      }
   }
   class ConsultaAuditoriaIniciosSices2 extends Consultas
   {
      function __construct($tamano, $inicio)
      {
         $sql="select Auditorias.idpro, Auditorias.idmot, Auditorias.lugaud, Procesos.idpro, Procesos.idper, Procesos.fecpro, Procesos.horpro, Motivos.idmot, Motivos.nommot, Personas.idper, Personas.nomper, Personas.apeper, Personas.cedper, Acciones.idaci, Acciones.nomaci from Auditorias, Procesos, Motivos, Personas, Acciones where Auditorias.idpro=Procesos.idpro and Auditorias.idmot='5' and Motivos.idmot=Auditorias.idmot and Personas.idper=Procesos.idper and Acciones.idaci=Procesos.idaci ORDER BY fecpro DESC limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }
   class ConsultaParteDiario extends Consultas
   {
      function __construct($fech)
      {
         $sql="select Personas.idper, Personas.apeper, Personas.nomper, Personas.idgra, Accesos.idrol, Accesos.idper, Procesos.idpro, Procesos.idper, Procesos.idaci, Procesos.idsit, Procesos.fecpro, Procesos.horpro, Partes.idpro, Partes.haspar, Partes.obspar, Situaciones.idsit, Situaciones.nomsit, Grados.idgra, Grados.nomgra from Personas, Accesos, Procesos, Partes, Situaciones, Grados where Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra";
         parent::__construct($sql);
      }
   }
   class ConsultaParteDiario2 extends Consultas
   {
      function __construct($fech ,$tamano, $inicio)
      {
         $sql="select Personas.idper, Personas.apeper, Personas.nomper, Personas.idgra, Accesos.idrol, Accesos.idper, Procesos.idpro, Procesos.idper, Procesos.idaci, Procesos.idsit, Procesos.fecpro, Procesos.horpro, Partes.idpro, Partes.haspar, Partes.obspar, Situaciones.idsit, Situaciones.nomsit, Grados.idgra, Grados.nomgra from Personas, Accesos, Procesos, Partes, Situaciones, Grados where Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }
   class ConsultaParteDiarioCivil extends Consultas
   {
      function __construct($fech)
      {
         $sql="select Personas.idper, Personas.apeper, Personas.nomper, Personas.idgra, Accesos.idrol, Accesos.idper, Procesos.idpro, Procesos.idper, Procesos.idaci, Procesos.idsit, Procesos.fecpro, Procesos.horpro, Partes.idpro, Partes.haspar, Partes.obspar, Situaciones.idsit, Situaciones.nomsit, Situaciones.codsit, Grados.idgra, Grados.nomgra from Personas, Accesos, Procesos, Partes, Situaciones, Grados where Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='CDDNO' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='TSU' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='ING' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='LIC'";
         parent::__construct($sql);
      }
   }
   class ConsultaParteDiarioCivil2 extends Consultas
   {
      function __construct($fech ,$tamano, $inicio)
      {
         $sql="select Personas.idper, Personas.apeper, Personas.nomper, Personas.idgra, Accesos.idrol, Accesos.idper, Procesos.idpro, Procesos.idper, Procesos.idaci, Procesos.idsit, Procesos.fecpro, Procesos.horpro, Partes.idpro, Partes.haspar, Partes.obspar, Situaciones.idsit, Situaciones.nomsit, Situaciones.codsit, Grados.idgra, Grados.nomgra from Personas, Accesos, Procesos, Partes, Situaciones, Grados where Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='CDDNO' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='TSU' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='ING' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='LIC' limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }
   class ConsultaParteDiarioMilitar extends Consultas
   {
      function __construct($fech)
      {
         $sql="select Personas.idper, Personas.apeper, Personas.nomper, Personas.idgra, Accesos.idrol, Accesos.idper, Procesos.idpro, Procesos.idper, Procesos.idaci, Procesos.idsit, Procesos.fecpro, Procesos.horpro, Partes.idpro, Partes.haspar, Partes.obspar, Situaciones.idsit, Situaciones.nomsit, Situaciones.codsit, Grados.idgra, Grados.nomgra from Personas, Accesos, Procesos, Partes, Situaciones, Grados where Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='GJ' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='MG' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='GD' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='GB' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='CNEL' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='TCNEL' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='MAY' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='CAP' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='1TTE' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='TTE' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='SS' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='SA' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='SM1' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='SM2' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='SM3' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='S1' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='S2' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='C/1' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='C/2' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='S/D' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='S/R' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='S/A'";
         parent::__construct($sql);
      }
   }
   class ConsultaParteDiarioMilitar2 extends Consultas
   {
      function __construct($fech ,$tamano, $inicio)
      {
         $sql="select Personas.idper, Personas.apeper, Personas.nomper, Personas.idgra, Accesos.idrol, Accesos.idper, Procesos.idpro, Procesos.idper, Procesos.idaci, Procesos.idsit, Procesos.fecpro, Procesos.horpro, Partes.idpro, Partes.haspar, Partes.obspar, Situaciones.idsit, Situaciones.nomsit, Situaciones.codsit, Grados.idgra, Grados.nomgra from Personas, Accesos, Procesos, Partes, Situaciones, Grados where Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='GJ' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='MG' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='GD' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='GB' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='CNEL' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='TCNEL' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='MAY' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='CAP' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='1TTE' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='TTE' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='SS' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='SA' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='SM1' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='SM2' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='SM3' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='S1' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='S2' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='C/1' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='C/2' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='S/D' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='S/R' or Personas.idper=Procesos.idper and Personas.idper=Accesos.idper and Accesos.idrol='3' and Procesos.idpro=Partes.idpro and Procesos.fecpro='$fech' and Procesos.idsit=Situaciones.idsit and Grados.idgra=Personas.idgra and Grados.nomgra='S/A' limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }

   class ConsultaGrados extends Consultas
   {
      function __construct()
      {
         $sql="select * from Grados";
         parent::__construct($sql);
      }
   }
   class ConsultaGrados2 extends Consultas
   {
      function __construct($tamano, $inicio)
      {
         $sql="select * from Grados limit $tamano offset $inicio";
         parent::__construct($sql);
      }
   }
   class ConsultaGradoEspecifico extends Consultas
   {
      function __construct($nom)
      {
         $sql="select * from Grados where nomgra='$nom'";
         parent::__construct($sql);
      }
   }
   class ConsultaGradoEspecifico2 extends Consultas
   {
      function __construct($cod)
      {
         $sql="select * from Grados where idgra='$cod'";
         parent::__construct($sql);
      }
   }
   class ConsultaCodigoEspecifico extends Consultas
   {
      function __construct($cod)
      {
         $sql="select * from Accesos where codacc='$cod'";
         parent::__construct($sql);
      }
   }
?>
