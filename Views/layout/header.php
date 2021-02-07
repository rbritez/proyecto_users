<?php

use Configs\Messages;

$urlUser = 'http://'.$_SERVER["HTTP_HOST"].'/Views/users';
    include_once "../../Configs/Messages.php";
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
    <script type="text/javascript">
    /* MESSAGES STATUS */
    const actionResultApproved = "<?php echo Messages::MESSAGE_ACTION_RESULT_APPROVED; ?>";
    const actionResultFailed = "<?php echo Messages::MESSAGE_ACTION_RESULT_FAILED; ?>";
    const actionUserSearch = "<?php echo Messages::MESSAGE_USER_SEARCH_NO_EXIST; ?>"

    /* MESSAGES VALIDATION */
    const messageUserCharater = "<?php echo Messages::MESSAGE_USER_MAX_CHARATERS; ?>";
    const messagePasswordCharater = "<?php echo Messages::MESSAGE_PASSWORD_MAX_CHARATERS; ?>";
    const messagePaswordNoMatch = "<?php echo Messages::MESSAGE_PASSWORD_NO_MATCH; ?>";
    const messagePaswordCurrentError = "<?php echo Messages::MESSAGE_PASSWORD_CURRENT_ERROR; ?>";
    const messageEmailFormatError = "<?php echo Messages::MESSAGE_EMAIL_FORMAT_ERROR; ?>";
    const messageUserAlreadyExist = "<?php echo Messages::MESSAGE_USER_ALREADY_EXIST; ?>";
    const messageUserLastnameMaxCharater = "<?php echo Messages::MESSAGE_USER_LASTNAME_MAX_CHARATERS; ?>";
    const messageUserFirstnameMaxCharater = "<?php echo Messages::MESSAGE_USER_FIRSTNAME_MAX_CHARATERS; ?>";
    /* MESSAGES USER CREATE */
    const messageUserApprovedCreate = "<?php echo Messages::MESSAGE_USER_APPROVED_CREATE; ?>";
    const messageUserFailedCreate = "<?php echo Messages::MESSAGE_USER_FAILED_CREATE; ?>";
    /* MESSAGES USER EDIT */
    const messageUserApprovedEdit = "<?php echo Messages::MESSAGE_USER_APPROVED_EDIT; ?>";
    const messageUserFaileddEdit = "<?php echo Messages::MESSAGE_USER_FAILED_EDIT; ?>";
    /* MESSAGES USER DELETE */
    const userApprovedLow = "<?php echo Messages::MESSAGE_USER_APPROVED_LOW; ?>";
    const userFailedLow = "<?php echo Messages::MESSAGE_USER_FAILED_LOW; ?>";
    </script>
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