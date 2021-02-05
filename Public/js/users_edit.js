function init(){
    var id =getParameterByName('id');
    showUser(id);
    let form = document.getElementById('form');
    form.addEventListener('submit', updateUser);
}

function showUser(id){
    
    const post = new XMLHttpRequest()
    const urlList = '../../Controllers/UsersController.php?option=show';
    //consulta por ajax
    post.open("POST",urlList)
    formData = new FormData();
    formData.append("id", id);
    post.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = JSON.parse(this.responseText);
            if(result == 0){
                showModal('Resultado Fallido',
                    'No existe el usuario que intenta buscar. Volver a <a href="index.php">Listado de Usuarios</a>');
                return false;
            }
            document.getElementById('id').value = id;
            loadForm(result);
        }
    }
    post.send(formData);
}

function updateUser(event){
    event.preventDefault();
    
    let validate = validateForm();
    if(validate.status == 400){
        return false;
    }

    form = document.getElementById('form');
    var formData = new FormData(form);
    const post = new XMLHttpRequest()
    const urlList = '../../Controllers/UsersController.php?option=storeOrUpdate'

    //consulta por ajax
    post.open("POST",urlList)

    post.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = JSON.parse(this.responseText)
            if(result.status != 1){
                showModal('Resultado Fallido ','Usuario no fue Editado.</br>'+result.status);
                return false;
            }
            console.log(result);
            showModal('Resultado Exitoso','Usuario Editado con Exito');
        }
    }
    post.send(formData)
    form.reset();
}

function loadForm(result){
    document.getElementById('first_name').value = result.first_name;
    document.getElementById('last_name').value = result.last_name;
    document.getElementById('username').value = result.username;
    document.getElementById('email').value = result.email;
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function validatePassword(){
    password_lost = document.getElementById('password_lost').value;
    id = document.getElementById('id').value;

    const post = new XMLHttpRequest()
    const urlList = '../../Controllers/UsersController.php?option=validatePassword';

    //consulta por ajax
    post.open("POST",urlList,true)
    formData = new FormData();
    formData.append("password_lost", password_lost);
    formData.append("id", id);
    
    post.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = JSON.parse(this.responseText);
            if(result.status != 1){
                console.log('password false',result);
                localStorage.setItem('statusPassword', 0);
            }else{
                localStorage.setItem('statusPassword', 1);
            }
            
        }
    }
    post.send(formData); 
}

init();