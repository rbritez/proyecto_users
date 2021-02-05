<?php
ob_start();
session_start();
if(!isset($_SESSION['first_name'])){
    header("Location: ../../../../login.php");
    exit;
}
if(!isset($_GET['id']) || empty($_GET['id']) ){
    header("Location: index.php");
}
include("../layout/header.php");
?>
<h1 class="title">
    <div>Editar Usuario</div>
</h1>
<hr>
<div id="formRegister">
    <div id="containerMessage" style="display:none">
        <p id="errorMessage">
            error mensaje
        </p>
    </div>
    <div class="form-edit">
        <form action="" id="form">
            <div class="form-tr">
                <input type="hidden" name="id" id="id">
                <label for="first_name">NOMBRE(*):</label>
                <div class="form-td">
                    <input type="text" name="first_name" id="first_name" class="form-control" min="3" max="50" required>
                </div>
            </div>
            <div class="form-tr">
                <label for="last_name">APELLIDO(*):</label>
                <div class="form-td">
                    <input type="text" name="last_name" id="last_name" class="form-control" min="3" max="50" required>
                </div>
            </div>
            <div class="form-tr">
                <label for="username">NOMBRE DE USUARIO(*):</label>
                <div class="form-td">
                    <input type="text" name="username" id="username" onchange="validateUsername()" class="form-control"
                        min="5" max="50" required>
                </div>
            </div>
            <div class="form-tr">
                <label for="email">CORREO ELECTRONICO(*):</label>
                <div class="form-td">
                    <input type="email" name="email" id="email" class="form-control">
                </div>
            </div>
            <?php
            if($_SESSION['id'] == $_GET['id']){
        ?>
            <div class="form-tr">
                <label for="password">ACTUAL CONTRASEÑA:</label>
                <div class="form-td">
                    <input type="password" name="password_lost" id="password_lost" onchange="validatePassword()"
                        autocomplete="on" class="form-control" min="6" max="10">
                </div>
            </div>
            <div class="form-tr">
                <label for="password">NUEVA CONTRASEÑA:</label>
                <div class="form-td">
                    <input type="password" name="password" id="password" autocomplete="on" class="form-control" min="6"
                        max="10">
                </div>
            </div>
            <div class="form-tr">
                <label for="password_validate">CONFIRMAR NUEVA CONTRASEÑA:</label>
                <div class="form-td">
                    <input type="password" name="password_validate" id="password_validate" class="form-control"
                        autocomplete="on" min="6" max="10">
                </div>
            </div>
            <?php        
            }
        ?>

            <div class="form-footer">
                <button type="button" class="btn danger"><a href="index.php" class="link">Volver</a></button>
                <button type="submit" class="btn default" id='btnSave'>Guardar</button>
            </div>

        </form>
    </div>

</div>
<?php
require '../layout/modal.php';
?>
<script src="../../Public/js/users_edit.js"></script>
<script src="../../Public/js/global.js"></script>
<script src="../../Public/js/modal.js"></script>
<?php
include('../layout/footer.php');
ob_end_flush();
?>