<?php
session_start();
if($_SESSION['rol'] != 1)
{
    header('Location: ../../index.php');
    exit();
}
include_once("../../clases/javascript.php");
include_once("../../clases/coneccion.php");
include_once("../../clases/registros.php");
include_once("../../clases/consultas.php");
include_once("../../clases/validacionesphp.php");
include_once("../../clases/modificar.php");
if($_POST!=null)
{
    $envio=$_POST["personal"];
}
if($_GET!=null)
{
    $envio=$_GET["personal"];
}
$menu="Location: ../cuerpo/menus/menupersonal.php";
if($envio==1)
{
    //***Registro Persona***//
    if($_POST!=null)
    {
        $departamento=$_POST["departamento"];
        $grado=$_POST["grado"];
        $apellido=$_POST["apellido"];
        $nombre=$_POST["nombre"];
        $ano=$_POST['ano'];
        $mes=$_POST['mes'];
        $dia=$_POST['dia'];
        $cedula=$_POST["cedula"];
        $casa=$_POST["casa"];
        $celular=$_POST["celular"];
        $correo=$_POST["correo"];
        $compania=$_POST["compania"];
        $tipo=$_POST["tipo"];
        $direccion=$_POST["direccion"];
    }
    else
    {
        header('Location: regpersonal.php?personal=1');
        exit();
    }
    $validando=new Validaphp();
    $validando->validaA($apellido);
    $ape=$validando->consultaA();
    if($ape=='false')
    {
        header('Location: regpersonal.php?personal=1');
        exit();
    }
    $validando2=new Validaphp();
    $validando2->validaA($nombre);
    $nom=$validando2->consultaA();
    if($nom=='false')
    {
        header('Location: regpersonal.php?personal=1');
        exit();
    }
    $validando3=new Validaphp();
    $validando3->validaB($cedula);
    $ced=$validando3->consultaB();
    if($ced=='false')
    {
        header('Location: regpersonal.php?personal=1');
        exit();
    }
    $validando4=new Validaphp();
    $validando4->validaN($casa);
    $cas=$validando4->consultaN();
    if($cas=='false')
    {
        header('Location: regpersonal.php?personal=1');
        exit();
    }
    $validando5=new Validaphp();
    $validando5->validaN($celular);
    $cel=$validando5->consultaN();
    if($cel=='false')
    {
        header('Location: regpersonal.php?personal=1');
        exit();
    }
    $validando6=new Validaphp();
    $validando6->validaC($correo);
    $cor=$validando6->consultaC();
    if($cor=='false')
    {
        header('Location: regpersonal.php?personal=1');
        exit();
    }
    $validando7=new Validaphp();
    $validando7->validaL($compania);
    $cco=$validando7->consultaL();
    if($cco=='false')
    {
        header('Location: regpersonal.php?personal=1');
        exit();
    }
    $validando8=new Validaphp();
    $validando8->validaD($tipo);
    $tco=$validando8->consultaD();
    if($tco=='false')
    {
        header('Location: regpersonal.php?personal=1');
        exit();
    }
    $validando9=new Validaphp();
    $validando9->validaE($direccion);
    $dir=$validando9->consultaE();
    if($dir=='false')
    {
        header('Location: regpersonal.php?personal=1');
        exit();
    }
    $validando10=new Validaphp();
    $validando10->validaN($departamento);
    $dep=$validando10->consultaN();
    if($dep=='false')
    {
        header('Location: regpersonal.php?personal=1');
        exit();
    }
    $validando11=new Validaphp();
    $validando11->validaN($grado);
    $gra=$validando11->consultaN();
    if($gra=='false')
    {
        header('Location: regpersonal.php?personal=1');
        exit();
    }
    else
    {
        $personas= new ConsultaPersonaEspecifico($cedula);
        $filapersonas=$personas->Consulta();
        if($filapersonas>=1)
        {
            header('Location: conpersonal.php?personal=1');
            exit();
        }
        else
        {
            $comcor= new ConsultaCompaniaCorreoEspecifica($compania);
            $filacomcor=$comcor->Consulta();
            $companianew=$filacomcor['idcco'];
            $tipcor= new ConsultaTipoCorreoEspecifico($tipo);
            $filatipcor=$tipcor->Consulta();
            $tiponew=$filatipcor['idtco'];
            $personas= new Persona($departamento, $grado, $apellido, $nombre, $ano, $mes, $dia, $cedula, $casa, $celular, $correo, $companianew, $tiponew, $direccion);
            $accesos= new ConsultaPersonaEspecifico($cedula);
            $filaaccesos=$accesos->Consulta();
            $idper=$filaaccesos['idper'];
            $fechanew=date('Y-m-d');
            $horanew=date('H:i:s');
            $ced=$_SESSION['ced'];
            $conced= new ConsultaAccesoEspecifico($ced);
            $filaconced=$conced->Consulta();
            $idacc=$filaconced['idacc'];
            $proceso= new Proceso2(3, $idacc, $idper, $fechanew, $horanew);
            $conproce= new ConsultaProcesoEspecifico($idper);
            $filaconproce=$conproce->Consulta();
            $idpro=$filaconproce['idpro'];
            $auditoria= new Auditoria($idpro, 2, "Personal");
            do
            {
                $string=randomText($tamaño);
                $data= new ConsultaCodigoEspecifico($string);
                $num_total_registros = $data->ConsultaPaginador();
                if($num_total_registros>=1)
                {
                    $denuevo=1;
                }
                else
                {
                    $codigo=$string;
                    $denuevo=0;
                }
            }
            while($denuevo==1);
            $conacc= new ConsultaAccesoEspecifico($cedula);
            $filaconacc=$conacc->Consulta();
            if($filaconacc>=1)
            {
               header('Location: conpersonal.php?personal=1');
               exit();
            }
            else
            {
               $accesos= new Acceso(3, $idper, $cedula, $contrasena, $codigo);
               header('Location: conpersonal.php?personal=1');
               exit();
            }
        }
        //***Registro Persona***//
        header($menu);
    }
}
if($envio==2)
{
    if($_POST!=null)
    {
        $usuario=$_POST["usuario"];
        $contrasena=sha1($_POST["contrasena"]);
        $cedula=$_POST["cedula"];
    }
    else
    {
        header('Location: regpersonal.php?personal=2');
        exit();
    }
    $personas= new ConsultaPersonaEspecifico($cedula);
    $filapersonas=$personas->Consulta();
    $idper=$filapersonas['idper'];
    if($filapersonas>=1)
    {
        $rol=1;
        $personas= new ModificarAcceso3($rol, $idper, $usuario, $contrasena);
        $fechanew=date('Y-m-d');
        $horanew=date('H:i:s');
        $ced=$_SESSION['ced'];
        $conced= new ConsultaAccesoEspecifico($ced);
        $filaconced=$conced->Consulta();
        $idacc=$filaconced['idacc'];
        $proceso= new Proceso2(3, $idacc, $idper, $fechanew, $horanew);
        $conproce= new ConsultaProcesoEspecifico($idper);
        $filaconproce=$conproce->Consulta();
        $idpro=$filaconproce['idpro'];
        $auditoria= new Auditoria($idpro, 3, "Accesos");

        header('Location: conpersonal.php?personal=2');
        exit();
    }
    else
    {
        echo "<script language='javascript'>
         alert ('Disculpe, la cedula indicada no se encuentra asignada a ningun usuario');
         window.location='regpersonal.php?personal=2';
         </script>";
        exit();
    }
    //***Registro Persona***//
    header($menu);
}
?>
