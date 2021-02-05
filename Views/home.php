<?php
ob_start();
session_start();
if(!isset($_SESSION['first_name'])){
    $host= $_SERVER["HTTP_HOST"];
    header("Location: http://".$host);
    exit;
}
include("layout/header.php");
?>
<h1>Bienvenido </h1>
<hr>
<div class="image">
    <img src="../Public/img/nada_para_ver.jpg" alt="" sizes="" srcset="">
</div>
<p style="margin-bottom: 50px;">Puede continuar en <a href="<?php echo 'users/index.php'?>">Listado de Usuarios</a></p>


<?php
include('layout/footer.php');
ob_end_flush();
?>