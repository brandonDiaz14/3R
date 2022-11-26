<?php 
class DB{
    private static $conexion=NULL;
    private function __construct(){}

    public static function conectar(){
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$conexion = new PDO('mysql:host=bg63uxah9japlulqupmb-mysql.services.clever-cloud.com; dbname=bg63uxah9japlulqupmb', 'u6zvugqlb96cufhl', 'MbeMrzOgSE5uaYVypkFU', $pdo_options); 
        return self::$conexion; 
    }
}
?>