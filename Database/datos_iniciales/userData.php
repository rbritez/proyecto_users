<?php
include "../../Configs/Conexion.php";
    $password = password_hash('useradmin',PASSWORD_DEFAULT);
    $now = date('Y-m-d h:i:s');
    $tablaUsuarios = "INSERT INTO users(first_name,last_name,email,username,password,created_at,updated_at)
                      VALUES('admin','admin','admin@admin.com','useradmin','$password','$now','$now')";

    echo queryRun($tablaUsuarios);

?>