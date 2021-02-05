<?php
ob_start();
session_start();
if(!isset($_SESSION['first_name'])){
    header("Location: ../../../../index.php");
    exit;
}
include("../layout/header.php");
?>
<h1 class="title">
    <div id="title-list">Lista de Usuarios</div>
    <div id="title-create">Nuevo Usuario</div>
</h1>
<hr>
<button class="btn default" id='btnAdd' onclick="showForm(true)">Nuevo Usuario</button>
<div id="listRecords">
    <table class="table">
        <thead>
            <tr>
                <th>Nombre y Apellido</th>
                <th>Nombre de Usuario</th>
                <th>Email</th>
                <th>Activo Desde</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="loadRecords">
            <!-- Lista Generada con JS -->
        </tbody>
    </table>
</div>

<?php
require 'create.php';
?>
<?php
require '../layout/modal.php';
?>

<script src="../../Public/js/modal.js"></script>
<script src="../../Public/js/users_index.js"></script>
<script src="../../Public/js/global.js"></script>

<?php
include('../layout/footer.php');
ob_end_flush();
?>