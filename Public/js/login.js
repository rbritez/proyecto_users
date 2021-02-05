var urlFull = window.location;
var urlCount =urlFull.href.lastIndexOf("/");
var Url = urlFull.href.substring(0, urlCount+1); 

function init(){
    let form = document.getElementById('form');
    form.addEventListener('submit', searchUser);
}

function searchUser(event){
    event.preventDefault();

    let validate = validateForm();
    if(validate.status == 400){
        return false;
    }

    const post = new XMLHttpRequest()
    const urlList = '../../Controllers/UsersController.php?option=login';
    //consulta por ajax
    post.open("POST",urlList)

    form = document.getElementById('form');
    formData = new FormData(form);

    post.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = JSON.parse(this.responseText);
            if(result.status){
                showMessage(result);
                return false;
            }

            location.href= Url+"Views/users/";
        }
    }
    post.send(formData);
}

function validateForm(){
    var userame = document.getElementById('username');
    var password =  document.getElementById('password');
    var result = {"status" : 200};
    var message = '';
    //validacion de nombres

    if((password.value.length < 6)){
        message = "Debe ingresar una contraseña mayor a 6 digitos";
    }

    if(userame.value.length < 5){
        message = 'El nombre de usuario debe tener 5 caracteres como minimo';
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
init();