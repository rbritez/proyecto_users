<?php
include "../../Configs/Conexion.php";

    $tablaUsuarios = "CREATE TABLE users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at DATETIME,
        updated_at DATETIME,
        deleted_at DATETIME)";

    echo queryRun($tablaUsuarios);

?>