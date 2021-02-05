<?php

require_once 'global.php';

/* Conexion a la DB */

$conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');
/* verificamos que la conexion el estado de la conexion */
if ($conexion->connect_error){
    printf("fallo conexion a la de datos: ". $conexion->connect_error);
    exit;
}

if(!function_exists('queryRun')){
    /* funcion para ejecutar consultas a la DB y que devuelvan array */
    function queryRun($sql){
        global $conexion;
        $query = $conexion->query($sql);
        if ($conexion->error) {
            return ("Error SQL: ". $conexion->error);
         }
        return $query;
    }
    
    /* funcion para ejecutar consultas a la DB y que devuelva una fila */
    function queryRunFirst($sql){
        global $conexion;
        $query = $conexion->query($sql);
        if ($conexion->error) {
            return ("Error SQL: ". $conexion->error);
         }
        $row = $query->fetch_assoc();
        return $row;
    }
    
    /* funcion para ejecutar consultas a la DB y que devuelta el ID */
    function queryReturnID($sql){
        global $conexion;
        $query = $conexion->query($sql);
        if ($conexion->error) {
            return ("Error SQL: ". $conexion->error);
         }
        return $conexion->insert_id;
    }
}