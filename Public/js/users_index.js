var urlFull = window.location;
var urlCount =urlFull.href.lastIndexOf("/");
var Url = urlFull.href.substring(0, urlCount+1); 
var form;
var statusUsername = 1;

function init(){
    showForm(false);
    list();
    let form = document.getElementById('form');
    form.addEventListener('submit', storeOrUpdate);
    
}

function showForm(flag){
    if(flag){
        document.getElementById('listRecords').style.display = 'none';
        document.getElementById('formRegister').style.display = 'block';
        document.getElementById('btnAdd').style.display = 'none';
        document.getElementById('title-create').style.display = 'block';
        document.getElementById('title-list').style.display = 'none';
    }else{
        document.getElementById('listRecords').style.display = 'block';
        document.getElementById('formRegister').style.display = 'none';
        document.getElementById('btnAdd').style.display = 'block';
        document.getElementById('title-create').style.display = 'none';
        document.getElementById('title-list').style.display = 'block';
    }
}

function formCancel(){
    showForm(false);
    window.location.reload(); 
}

function list(){
    const post = new XMLHttpRequest()
    const urlList = '../../Controllers/UsersController.php?option=index'

     //consulta por ajax
     post.open("POST",urlList)

     post.onreadystatechange = function(){
         if(this.readyState == 4 && this.status == 200){
             /* console.log(this.responseText);*/             
             var result = JSON.parse(this.responseText)
            createTable(result);    
         }
     }
     post.send()
}

function storeOrUpdate(event){
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
                console.log(result.status);
                showModal(userFailedLow,messageUserFailedCreate+'</br>'+result.status);
                return false;
            }
            showModal(userApprovedLow,messageUserApprovedCreate);
        }
    }
    post.send(formData)
    form.reset();
}

function createTable(result){
    var tabla = '';
    result.forEach(reg => {
        tabla+= "<tr id="+reg.id+">"+
                    "<td>"+reg.name+"</td>"+
                    "<td>"+reg.username+"</td>"+
                    "<td>"+reg.email+"</td>"+
                    "<td>"+reg.create_date+"</td>"+
                    "<td>"+
                        "<a href='"+Url+"edit.php?id="+reg.id+"' type='button' class='btn default'>Editar</a> "+
                        "<a type='button' onclick='deleteUser("+reg.id+")' class='btn danger'>Eliminar</a>"+
                    "</td>"+
                "</tr>";    
     });

    

    document.getElementById("loadRecords").innerHTML=tabla;
}


init();