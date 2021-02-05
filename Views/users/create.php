<div id="formRegister" style="display:none">
    <div id="containerMessage" style="display:none">
        <p id="errorMessage">
            error mensaje
        </p>
    </div>

    <form action="" id="form">
        <div class="form-tr">
            <label for="first_name">NOMBRE:</label>
            <div class="form-td">
                <input type="text" name="first_name" id="first_name" class="form-control" min="2" max="50" required>
            </div>
        </div>
        <div class="form-tr">
            <label for="last_name">APELLIDO:</label>
            <div class="form-td">
                <input type="text" name="last_name" id="last_name" class="form-control" min="2" max="50" required>
            </div>
        </div>
        <div class="form-tr">
            <label for="username">NOMBRE DE USUARIO:</label>
            <div class="form-td">
                <input type="text" name="username" id="username" class="form-control" onchange="validateUsername()"
                    min="5" max="50" required>
            </div>
        </div>
        <div class="form-tr">
            <label for="email">CORREO ELECTRONICO:</label>
            <div class="form-td">
                <input type="email" name="email" id="email" class="form-control">
            </div>
        </div>
        <div class="form-tr">
            <label for="password">CONTRASEÑA:</label>
            <div class="form-td">
                <input type="password" name="password" id="password" autocomplete="on" class="form-control" min="6"
                    max="10" required>
            </div>
        </div>
        <div class="form-tr">
            <label for="password_validate">CONFIRMAR CONTRASEÑA:</label>
            <div class="form-td">
                <input type="password" name="password_validate" id="password_validate" class="form-control"
                    autocomplete="on" min="6" max="10" required>
            </div>
        </div>
        <div class="form-footer">
            <button type="button" class="btn danger" onclick="formCancel()">Volver</button>
            <button type="submit" class="btn default" id='btnSave'>Guardar</button>
        </div>

    </form>
</div>