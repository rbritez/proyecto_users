
function validateForm(){
    var firstName = document.getElementById('first_name');
    var lastName = document.getElementById('last_name');
    var userame = document.getElementById('username');
    var email = document.getElementById('email');
    var lostPassword =  document.getElementById('password_lost');
    var password =  document.getElementById('password');
    var validatePassword = document.getElementById('password_validate');
    
    var message = '';
    var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    var result = {"status" : 200};

    if((password) && ((!lostPassword) || (lostPassword && lostPassword.value.length > 0))){

        if(password.value !== validatePassword.value){
            message = "Las contraseñas no coinciden";
        }
    
        if((password.value.length < 6) || (validatePassword.value.length < 6)){
            message = "Debe ingresar una contraseña mayor a 6 digitos";
        }
        
        if(lostPassword &&  localStorage.getItem("statusPassword") == 0){
            message = "La contraseña actual ingresada es incorrecta";
        }
    }

    if(email.value.length > 0 && !emailRegex.test(email.value)){    
        message = "El formato del email ingresado es incorrecto";
    }

    if(userame.value.length < 5){
        message = 'El nombre de usuario debe tener 5 caracteres como minimo';
    }
    
    res = localStorage.getItem("statusUsername");
    if(res == 0){
        message = 'El nombre de usuario ya existe';
    }

    if(lastName.value.length < 3){
        message = 'El apellido debe tener 3 caracteres como minimo';
    }

    if(firstName.value.length < 3 ){
        message = 'El nombre debe tener 3 caracteres como minimo';
    }

    if(message != ''){
        result = {
            "status" : 400,
            "message" : message,
        };   
    }

    showMessage(result)
    return result; 
}

function showMessage(result){
    if(result.status == 400){
        document.getElementById('containerMessage').style.display = 'block';
        showError = document.getElementById('errorMessage');
        showError.innerHTML = result.message;
        return false;
    }else{
        document.getElementById('containerMessage').style.display = 'none';
    }

}

function validateUsername(){
    username = document.getElementById('username').value;
    id = document.getElementById('id');

    const post = new XMLHttpRequest()
    const urlList = '../../Controllers/UsersController.php?option=validateUsername';
    //consulta por ajax
    post.open("POST",urlList,true)
    formData = new FormData();
    formData.append("username", username);
    if(id){
        formData.append("id", id.value);
    }

    post.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = JSON.parse(this.responseText);
            if(result.status != 1){
                console.log(result);
                localStorage.setItem('statusUsername', 0);
            }else{
                console.log(result);
                localStorage.setItem('statusUsername', 1);
            }
            
        }
    }
    post.send(formData); 
}

function deleteUser(id){

    const post = new XMLHttpRequest()
    const urlList = '../../Controllers/UsersController.php?option=delete';
    //consulta por ajax
    post.open("POST",urlList)
    formData = new FormData();
    formData.append("id", id);
    post.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = JSON.parse(this.responseText);

            if(result.status != 1){
                showModal('Resultado Fallido ','Usuario no se Eliminado.</br>'+result.status);
                return false;
            }
            showModal('Resultado Exitoso','Usuario Eliminado con Exito');
        }
    }
    post.send(formData);
}