function OpenModalPerfil(){
    console.log("OpenModalPerfil");
    var modal = document.querySelector(".usuaria");
    var secao = document.querySelector(".secaoPrincipal");
    secao.classList.toggle("none");
    modal.classList.toggle("open_modal");
}

function OpenModalUsers(){
    console.log("OpenModalUsers");
    var modal_users = document.querySelector(".lista_usuarias");
    modal_users.classList.toggle("open_modal_users");
}

function OpenInfosUsers(id){
    console.log(id);
    var box = document.getElementById(id);
    box.classList.toggle("infos_users_show");
    // box.style.position = "absolute";
    // box.style.top = "30px";
}