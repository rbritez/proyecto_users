<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/css/login.css">
    <title>Document</title>
</head>

<body>
    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Iniciar Sesion</h1>
            </div>
            <div id="containerMessage" style="display:none">
                <p id="errorMessage">
                    error mensaje
                </p>
            </div>
            <form action="" id="form">
                <div class="login-form">
                    <div class="control-group">
                        <input type="text" class="login-field" name="username" placeholder="usuario" id="username">
                        <label class="login-field-icon fui-user" for="login-name"></label>
                    </div>

                    <div class="control-group">
                        <input type="password" class="login-field" name="password" placeholder="contraseña"
                            autocomplete="on" id="password">
                        <label class="login-field-icon fui-lock" for="login-pass"></label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-large btn-block">Entrar</button>

                </div>
            </form>
        </div>
    </div>
</body>
<script src="Public/js/login.js"></script>

</html>