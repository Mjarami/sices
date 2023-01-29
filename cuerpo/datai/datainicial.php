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
include_once("../../clases/validacionesphp.php");
if($_POST!=null)
{
    $envio=$_POST["datai"];
}
if($_GET!=null)
{
    $envio=$_GET["datai"];
}
$menu="Location: ../cuerpo/menus/menudata.php";
if($envio==1)
{
    //***Registro Accion***//
    if($_POST!=null)
    {
        $nombre=$_POST["regdatai"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["regdatai"];
    }
    $validando=new Validaphp();
    $validando->validaL($nombre);
    $nom=$validando->consultaL();
    if($nom=='false')
    {
        header('Location: regdatainicial.php?datai=1');
        exit();
    }
    else
    {
        $acciones= new ConsultaAccionEspecifica($nombre);
        $filaacciones=$acciones->Consulta();
        if($filaacciones>=1)
        {
            header('Location: condatainicial.php?datai=1');
            exit();
        }
        else
        {
            $acciones= new Accion($nombre);
            header('Location: condatainicial.php?datai=1');
            exit();
        }
        //***Registro Accion***//
        header($menu);
    }
}
if($envio==2)
{
    //***Registro Estatu***//
    if($_POST!=null)
    {
        $nombre=$_POST["regdatai"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["regdatai"];
    }
    $validando=new Validaphp();
    $validando->validaL($nombre);
    $nom=$validando->consultaL();
    if($nom=='false')
    {
        header('Location: regdatainicial.php?datai=2');
        exit();
    }
    else
    {
        $estatus= new ConsultaEstatuEspecifico($nombre);
        $filaestatus=$estatus->Consulta();
        if($filaestatus>=1)
        {
            header('Location: condatainicial.php?datai=2');
            exit();
        }
        else
        {
            $estatus= new Estatu($nombre);
            header('Location: condatainicial.php?datai=2');
            exit();
        }
        //***Registro Estatu***//
        header($menu);
    }
}
if($envio==3)
{
    //***Registro Grupo***//
    if($_POST!=null)
    {
        $nombre=$_POST["regdatai"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["regdatai"];
    }
    $validando=new Validaphp();
    $validando->validaL($nombre);
    $nom=$validando->consultaL();
    if($nom=='false')
    {
        header('Location: regdatainicial.php?datai=3');
        exit();
    }
    else
    {
        $grupos= new ConsultaGrupoEspecifico($nombre);
        $filagrupos=$grupos->Consulta();
        if($filagrupos>=1)
        {
            header('Location: condatainicial.php?datai=3');
            exit();
        }
        else
        {
            $grupos= new Grupo($nombre);
            header('Location: condatainicial.php?datai=3');
            exit();
        }
        //***Registro Grupo***//
        header($menu);
    }
}
if($envio==4)
{
    //***Registro Motivo***//
    if($_POST!=null)
    {
        $nombre=$_POST["regdatai"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["regdatai"];
    }
    $validando=new Validaphp();
    $validando->validaL($nombre);
    $nom=$validando->consultaL();
    if($nom=='false')
    {
        header('Location: regdatainicial.php?datai=4');
        exit();
    }
    else
    {
        $motivos= new ConsultaMotivoEspecifico($nombre);
        $filamotivos=$motivos->Consulta();
        if($filamotivos>=1)
        {
            header('Location: condatainicial.php?datai=4');
            exit();
        }
        else
        {
            $motivos= new Motivo($nombre);
            header('Location: condatainicial.php?datai=4');
            exit();
        }
        //***Registro Motivo***//
        header($menu);
    }
}
if($envio==5)
{
    //***Registro Roles***//
    if($_POST!=null)
    {
        $nombre=$_POST["regdatai"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["regdatai"];
    }
    $validando=new Validaphp();
    $validando->validaL($nombre);
    $nom=$validando->consultaL();
    if($nom=='false')
    {
        header('Location: regdatainicial.php?datai=5');
        exit();
    }
    else
    {
        $roles= new ConsultaRolEspecifico($nombre);
        $filaroles=$roles->Consulta();
        if($filaroles>=1)
        {
            header('Location: condatainicial.php?datai=5');
            exit();
        }
        else
        {
            $roles= new Rol($nombre);
            header('Location: condatainicial.php?datai=5');
            exit();
        }
        //***Registro Roles***//
        header($menu);
    }
}
if($envio==6)
{
    //***Registro Situaciones***//
    if($_POST!=null)
    {
        $nombre=$_POST["regdatai"];
        $codigo=$_POST["codigo"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["regdatai"];
        $codigo=$_GET["codigo"];
    }
    $validando=new Validaphp();
    $validando->validaL($nombre);
    $nom=$validando->consultaL();

    $validando2=new Validaphp();
    $validando2->validaN($codigo);
    $cod=$validando2->consultaN();
    if($nom=='false')
    {
        header('Location: regdatainicial.php?datai=6');
        exit();
    }
    if($cod=='false')
    {
        header("Location: moddatainicial.php?datai=6&modsit=$nombre");
    }
    else
    {
        $situacion= new ConsultaSituacionEspecifica($nombre);
        $filasituacion=$situacion->Consulta();
        if($filasituacion>=1)
        {
            header('Location: condatainicial.php?datai=6');
            exit();
        }
        else
        {
            $situacion= new Situacion($nombre, $codigo);
            header('Location: condatainicial.php?datai=6');
            exit();
        }
        //***Registro Situaciones***//
        header($menu);
    }
}
if($envio==7)
{
    //***Registro Departamentos***//
    if($_POST!=null)
    {
        $nombre=$_POST["regdatai"];
        $grupo=$_POST["grupo"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["regdatai"];
        $grupo=$_GET["grupo"];
    }
    $validando=new Validaphp();
    $validando->validaL($nombre);
    $nom=$validando->consultaL();
    if($nom=='false' || $grupo==0)
    {
        header('Location: regdatainicial.php?datai=7');
        exit();
    }
    else
    {
        $departamento= new ConsultaDepartamentoEspecifico($nombre);
        $filadepartamento=$departamento->Consulta();
        if($filadepartamento>=1)
        {
            header('Location: condatainicial.php?datai=7');
            exit();
        }
        else
        {
            $departamento= new Departamento($grupo, $nombre);
            header('Location: condatainicial.php?datai=7');
            exit();
        }
        //***Registro Departamentos***//
        header($menu);
    }
}
if($envio==8)
{
    //***Registro Grados***//
    if($_POST!=null)
    {
        $nombre=$_POST["regdatai"];
    }
    if($_GET!=null)
    {
        $nombre=$_GET["regdatai"];
    }
    $validando=new Validaphp();
    $validando->validaF($nombre);
    $nom=$validando->consultaF();
    if($nom=='false')
    {
        header('Location: regdatainicial.php?datai=8');
        exit();
    }
    else
    {
        $grado= new ConsultaGradoEspecifico($nombre);
        $filagrado=$grado->Consulta();
        if($filagrado>=1)
        {
            header('Location: condatainicial.php?datai=8');
            exit();
        }
        else
        {
            $grado= new Grado($nombre);
            header('Location: condatainicial.php?datai=8');
            exit();
        }
        //***Registro Grados***//
        header($menu);
    }
}
?>
