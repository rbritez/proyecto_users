<?php
    $urlUser = 'http://'.$_SERVER["HTTP_HOST"].'/Views/users';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../../Public/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Links CSS -->
    <link rel="stylesheet" href="../../Public/css/menu.css">
    <link rel="stylesheet" href="../../Public/css/global.css">
    <link rel="stylesheet" href="../../Public/css/form.css">
    <link rel="stylesheet" href="../../Public/css/modal.css">
    <link rel="stylesheet" href="../../Public/css/footer.css">

    <title>Proyecto Usuarios</title>
</head>

<body class="container">
    <header>
        <nav>
            <ul>
                <li><a href="../home.php">Inicio</a></li>
                <li><a href="<?php echo $urlUser;?>">Usuarios</a>

                </li>
                <li class="column-right"><a href="#">
                        <?php echo $_SESSION['first_name']. ' '. $_SESSION['last_name']; ?>
                    </a>
                    <ul>
                        <li><a href="<?php echo $urlUser.'/edit.php?id='.$_SESSION['id']; ?>">Mi Perfil</a></li>
                        <li><a href="../../Controllers/UsersController.php?option=logout">Cerrar Sesion</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </header>