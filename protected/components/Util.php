<?php
class Util extends CApplicationComponent
{
    public static function connexion($host,$user,$password)
    {
        $conexion = mysql_connect($host, $user, $password) or die (mysql_error());
        if (!$conexion) 
        {
             die('No se pudo realizar la conexion al manejador: ' . mysql_error());
        }
        return $conexion;
    }
    public static function selectdb($host,$user,$password,$database)
    {
        $conexion = Util::connexion($host, $user, $password);
        mysql_select_db($database, $conexion) or die (mysql_error());
        return $conexion;
    }
    public static function connect()
    {
        $dsn=Yii::app()->db->connectionString;
        $dsn=str_replace(substr($dsn,0,11),"",$dsn);
        $host=substr($dsn,0,strpos($dsn,";"));
        $database=substr($dsn,strpos($dsn,"=")+1);
        $user=Yii::app()->db->username;
        $password=Yii::app()->db->password;
        return $conexion=Util::selectdb($host, $user, $password, $database);
    }
    
    public static function getid($name)
    {
        if (Yii::app()->user->IsGuest)
            return "";
        $conexion = Util::connect();
        $query="SELECT `id_user` FROM `usuario` WHERE `nombre_usuario`='".$name."'";
        $r=mysql_query($query,$conexion) or die (mysql_error());
        $id=mysql_fetch_array($r);
        $id=$id["id_user"];
        return $id;
    }
    public static function getName($id)
    {
        $conexion = Util::connect();
        $query="SELECT `nombre`,`apellido` FROM `datos_personales` WHERE `id_user`=".$id;
        $r=mysql_query($query,$conexion) or die (mysql_error());
        $data=mysql_fetch_array($r);
            $name=$data["nombre"];
            $ape=$data["apellido"];
            if($ape==null||$ape==""||$ape==" ")
            {
                return $name;
            }return $name." ".$ape;
    }
    
    public static function login($name,$pass)
    {
        $identity=new UserIdentity($name,$pass);
        $identity->authenticate();
        Yii::app()->user->login($identity,0);
            
            if (Yii::app()->user->IsGuest)
                throw new CException('Something really has happened: you could not get logged in after registration. Please use the login form to login.');
    }
    
    public static function Exlogin($name,$id)
    {
        if($id!=null)//si se conoce el id
        {
            $conexion = Util::connect();
            $query="SELECT `clave`, `nombre_usuario` FROM `usuario` WHERE `id_user`=".$id;
            $r=mysql_query($query,$conexion) or die (mysql_error());
            $data=mysql_fetch_array($r);
            $login=$data["nombre_usuario"];
            $password=$data["clave"];
            
            $identity=new UserIdentity($login,$password);
            $identity->authenticate();
            Yii::app()->user->login($identity,0);
            
            if (Yii::app()->user->IsGuest)
                throw new CException('Something really has happened: you could not get logged in after registration. Please use the login form to login.');
        }elseif($name!=null)//si se conoce el nombre
        {
            $conexion = Util::connect();
            $query="SELECT `clave` FROM `usuario` WHERE `nombre_usuario`='".$name."'";
            $r=mysql_query($query,$conexion) or die (mysql_error());
            $data=mysql_fetch_array($r);
            $password=$data["clave"];
            
            $identity=new UserIdentity($name,$password);
            $identity->authenticate();
            Yii::app()->user->login($identity,0);
            
            if (Yii::app()->user->IsGuest)
                throw new CException('Something has happened: you could not get logged in after registration. Please use the login form to login.');
        }else
            throw new CException('Something has happened: you could not get logged in after registration. Please use the login form to login.');
    }
    
    public static function isEmpresa($name)
    {
        if(Yii::app()->user->isGuest)
            return false;
        $conexion = Util::connect();
        $query="SELECT `id_user` FROM `usuario` WHERE `nombre_usuario`='".$name."'";
        $r=mysql_query($query,$conexion) or die (mysql_error());
        $id=mysql_fetch_array($r);
        $id=$id["id_user"];
        if($id==null)
            return false;
        $query="SELECT * FROM `empresa` WHERE `id_user`=".$id;
        $r=mysql_query($query,$conexion) or die (mysql_error());
        $n=  mysql_num_rows($r);
        if($n>0)
            return true;
        return false;
    }
    public static function isAdmin($name)
    {
        if(Yii::app()->user->isGuest)
            return false;
        $conexion = Util::connect();
        $query="SELECT `id_user` FROM `usuario` WHERE `nombre_usuario`='".$name."'";
        $r=mysql_query($query,$conexion) or die (mysql_error());
        $id=mysql_fetch_array($r);
        $id=$id["id_user"];
        if($id==null)
            return false;
        $query="SELECT * FROM `administrador` WHERE `id_user`=".$id;
        $r=mysql_query($query,$conexion) or die (mysql_error());
        $n=  mysql_num_rows($r);
        if($n>0)
            return true;
        return false;
    }
    public static function isChofer($name)
    {
        if(Yii::app()->user->isGuest)
            return false;
        $conexion = Util::connect();
        $query="SELECT `id_user` FROM `usuario` WHERE `nombre_usuario`='".$name."'";
        $r=mysql_query($query,$conexion) or die (mysql_error());
        $id=mysql_fetch_array($r);
        $id=$id["id_user"];
        if($id==null)
            return false;
        $query="SELECT * FROM `chofer` WHERE `id_user`=".$id;
        $r=mysql_query($query,$conexion) or die (mysql_error());
        $n=  mysql_num_rows($r);
        if($n>0)
            return true;
        return false;
    }
    public static function isOperador($name)
    {
        if(Yii::app()->user->isGuest)
            return false;
        $conexion = Util::connect();
        $query="SELECT `id_user` FROM `usuario` WHERE `nombre_usuario`='".$name."'";
        $r=mysql_query($query,$conexion) or die (mysql_error());
        $id=mysql_fetch_array($r);
        $id=$id["id_user"];
        if($id==null)
            return false;
        $query="SELECT * FROM `operador` WHERE `id_user`=".$id;
        $r=mysql_query($query,$conexion) or die (mysql_error());
        $n=  mysql_num_rows($r);
        if($n>0)
            return true;
        return false;
    }
    
    
    public static function getTipoUsuario($name)
     {
        if(Yii::app()->user->isGuest)
            return null;
        $conexion = Util::connect();
        $query="SELECT `id_user` FROM `usuario` WHERE `nombre_usuario`='".$name."'";
        $r=mysql_query($query,$conexion) or die (mysql_error());
        $id=mysql_fetch_array($r);
        $id=$id["id_user"];
        if($id==null)
            return null;
        $query="SELECT * FROM `administrador` WHERE `id_user`=".$id;
        $r=mysql_query($query,$conexion) or die (mysql_error());
        $n=  mysql_num_rows($r);
        if($n>0)
        {
            return 'Administrador';
        }
            $query="SELECT * FROM `empresa` WHERE `id_user`=".$id;
            $r=mysql_query($query,$conexion) or die (mysql_error());
            $n=  mysql_num_rows($r);
        if($n>0)
        {
            return 'Empresa';
        }
            $query="SELECT * FROM `chofer` WHERE `id_user`=".$id;
            $r=mysql_query($query,$conexion) or die (mysql_error());
            $n=  mysql_num_rows($r);
        if($n>0)
        {
            return 'Chofer';
        }
            $query="SELECT * FROM `operador` WHERE `id_user`=".$id;
            $r=mysql_query($query,$conexion) or die (mysql_error());
            $n=  mysql_num_rows($r);
        if($n>0)
        {
            return 'Operador';
        }
        return null;    
     }
}


?>

