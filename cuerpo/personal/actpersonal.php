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
//***Modifico Persona***//
if($_GET!=null)
{
    $envio=$_GET["personal"];
}
if($_POST!=null)
{
    $envio=$_POST["personal"];
}
else
{
    header('Location: conpersonal.php?personal=1');
    exit();
}

if($envio==1)
{
    $idper=$_POST["idper"];
    $departamento=$_POST["departamento"];
    $grado=$_POST["grado"];
    $apellido=$_POST["apellido"];
    $nombre=$_POST["nombre"];
    $ano=$_POST["ano"];
    $mes=$_POST["mes"];
    $dia=$_POST["dia"];
    $cedula=$_POST["cedula"];
    $casa=$_POST["casa"];
    $celular=$_POST["celular"];
    $correo=$_POST["correo"];
    $compania=$_POST["compania"];
    $tipo=$_POST["tipo"];
    $direccion=$_POST["direccion"];

    $er="Location: modpersonal.php?personal=1&modper=".$cedula."";

    $validando=new Validaphp();
    $validando->validaA($apellido);
    $ape=$validando->consultaA();

    $validando2=new Validaphp();
    $validando2->validaA($nombre);
    $nom=$validando2->consultaA();

    $validando3=new Validaphp();
    $validando3->validaB($cedula);
    $ced=$validando3->consultaB();

    $validando4=new Validaphp();
    $validando4->validaN($casa);
    $cas=$validando4->consultaN();

    $validando5=new Validaphp();
    $validando5->validaN($celular);
    $cel=$validando5->consultaN();

    $validando6=new Validaphp();
    $validando6->validaC($correo);
    $cor=$validando6->consultaC();

    $validando7=new Validaphp();
    $validando7->validaL($compania);
    $cco=$validando7->consultaL();

    $validando8=new Validaphp();
    $validando8->validaD($tipo);
    $tco=$validando8->consultaD();



    if($ape=='false')
    {
        header($er);
        exit();
    }
    elseif($nom=='false')
    {
        header($er);
        exit();
    }
    elseif($ced=='false')
    {
        header($er);
        exit();
    }
    elseif($cas=='false')
    {
        header($er);
        exit();
    }
    elseif($cel=='false')
    {
        header($er);
        exit();
    }
    elseif($cor=='false')
    {
        header($er);
        exit();
    }
    elseif($cco=='false')
    {
        header($er);
        exit();
    }
    elseif($tco=='false')
    {
        header($er);
        exit();
    }
    else
    {
        $depar= new ConsultaDepartamentoEspecifico($departamento);
        $filadepar=$depar->Consulta();
        $deparnew=$filadepar['iddep'];
        $comcor= new ConsultaCompaniaCorreoEspecifica($compania);
        $filacomcor=$comcor->Consulta();
        $companianew=$filacomcor['idcco'];
        $tipcor= new ConsultaTipoCorreoEspecifico($tipo);
        $filatipcor=$tipcor->Consulta();
        $tiponew=$filatipcor['idtco'];
        $congrado= new ConsultaGradoEspecifico($grado);
        $filacongrado=$congrado->Consulta();
        $gradonew=$filacongrado['idgra'];
        

        //***Modifico Persona***//
        $persona= new ModificarPersona($idper ,$deparnew, $gradonew, $apellido, $nombre, $ano, $mes, $dia, $cedula, $casa, $celular, $correo, $companianew, $tiponew, $direccion);
        //***Modifico Persona***//
        header('Location: conpersonal.php?personal=1');
        exit();
    }
}

if($envio==2)
{
    $idper=$_POST["idper"];
    $rol=$_POST["rol"];
    $usuario=$_POST["usuario"];
    $codigo=$_POST["codigo"];
    $role= new ConsultaRolEspecifico($rol);
    $filarole=$role->Consulta();
    $idrol=$filarole['idrol'];
    //***Modifico Acceso***//
    $acceso= new ModificarAcceso2($idper, $idrol, $usuario, $codigo);
    //***Modifico Acceso***//
    header('Location: conpersonal.php?personal=2');
    exit();
}
?>
