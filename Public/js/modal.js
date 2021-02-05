if(document.getElementById("btnModal")){
  var modal = document.getElementById("tvesModal");
  var btn = document.getElementById("btnModal");
  var span = document.getElementsByClassName("close")[0];
  var body = document.getElementsByTagName("body")[0];

  function showModal(title,message){

    modal.style.display = "block";
    body.style.position = "static";
    body.style.height = "100%";
    body.style.overflow = "hidden";

    notificationTitle = document.getElementById('notification-title');
    notificationTitle.innerHTML = title;

    notificationMessage = document.getElementById('notification-message');
    notificationMessage.innerHTML = message;
  }

  btn.onclick = function() {
    modal.style.display = "block";
    body.style.position = "static";
    body.style.height = "100%";
    body.style.overflow = "hidden";
  }

  span.onclick = function() {
    modal.style.display = "none";
    body.style.position = "inherit";
    body.style.height = "auto";
    body.style.overflow = "visible";
    window.location.reload(); 
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";

      body.style.position = "inherit";
      body.style.height = "auto";
      body.style.overflow = "visible";
      window.location.reload(); 
    }
  }
}