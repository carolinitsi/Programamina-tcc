window.onload = function(){ 

    if (localStorage.ativaDarkMode == "true") {
            darckmode();
            console.log("Ativa dark mode"); 
    }
}
function verificaMode(){
    if (localStorage.ativaDarkMode !== "true") {
        localStorage.ativaDarkMode = "true";
        console.log("Ativa darckmode");
        darckmode() 
  }else{
    localStorage.ativaDarkMode = "false";
    lightMode()
    console.log("Light mode");
  }
}

function lightMode(){
    var body = document.body;
    var box_edit_user = document.querySelector(".box-editar-usuario");
    var box_edit_user_img = document.querySelector(".imagem-perfil");
    var box_edit_user_text = [...document.querySelectorAll(".input__label")];
    var box_posts = [...document.querySelectorAll(".boxpostIndividual")];
    var box_faz_post = document.querySelector(".secaoPrincipal__post");
    var legend = [...document.querySelectorAll("legend")];
    var lista_usuarias = document.querySelector(".lista_usuarias");
    var usuaria = document.querySelector(".usuaria");
    var header__logado = document.querySelector(".header__logado");

    body.style.backgroundColor = "#f3f2ef";
    header__logado.style.background="linear-gradient(68.15deg,#262529, #4f454f 16.62%, #514551, #3a363a )";

    if (lista_usuarias !== null){
        lista_usuarias.style.backgroundColor = "#ffff";
    }
    if (box_faz_post !== null ){
        box_faz_post.style.boxShadow = "20px 20px 50px 15px #e5e3e39f";
        box_faz_post.style.backgroundColor = "#ffff";
    }
    if( usuaria !== null ) {
        usuaria.style.backgroundColor = "#ffff";
    }

    for(var x = 0; x < box_posts.length;x++){
        box_posts[x].classList.remove("dark");
    }

    if (box_edit_user !== null && box_edit_user_img !== null && legend !== null && box_edit_user_text !== null ) {
        box_edit_user.style.boxShadow = "20px 20px 50px 15px #e5e3e39f";
        box_edit_user.style.backgroundColor = "#ffff";
        box_edit_user_img.style.border = "20px solid #ffff";
        legend[0].style.color = "#242320";
        legend[1].style.color = "#242320";
        

        for(var i = 0; i < box_edit_user_text.length;i++){
            box_edit_user_text[i].style.color = "#242320";
        }
    }
}

function darckmode(){
    if (localStorage.ativaDarkMode == "true") {
        var body = document.body;
        var box_edit_user = document.querySelector(".box-editar-usuario");
        var box_edit_user_img = document.querySelector(".imagem-perfil");
        var box_edit_user_text = [...document.querySelectorAll(".input__label")];
        var box_posts = [...document.querySelectorAll(".boxpostIndividual")];
        var box_faz_post = document.querySelector(".secaoPrincipal__post");
        var legend = [...document.querySelectorAll("legend")];
        var lista_usuarias = document.querySelector(".lista_usuarias");
        var usuaria = document.querySelector(".usuaria");
        var header__logado =document.querySelector(".header__logado");
        var paragrafos = [...document.querySelectorAll(".p_post")];
        
        header__logado.style.background="linear-gradient(68.15deg,rgb(26, 34, 42), rgb(30 38 46) 16.62%, rgb(26, 34, 42), rgb(35 36 37))";
        

        if (lista_usuarias !== null){
            lista_usuarias.style.backgroundColor = "rgb(26 34 42)";
        } 
        if(box_faz_post !== null){
            box_faz_post.style.boxShadow = "none";
            box_faz_post.style.backgroundColor = "rgb(26 34 42)";
        } 
        if(usuaria !== null) {
            usuaria.style.backgroundColor = "rgb(26 34 42)";
        }

        if(paragrafos !== null){
            for(var x = 0; x < paragrafos.length;x++){
                paragrafos[x].style.color = "#acaaa8";
            }
        }

        if(box_posts !== null){
            for(var y = 0; y < box_posts.length;y++){
                box_posts[y].classList.add("dark");
            }
        }
        
        body.style.backgroundColor = "#2b3743";

        box_edit_user.style.boxShadow = "none";
        box_edit_user.style.backgroundColor = "rgb(26 34 42)";
        box_edit_user_img.style.border = "20px solid rgb(26 34 42)";
        legend[0].style.color = "#ffff";
        legend[1].style.color = "#ffff";
        

        for(var i = 0; i < box_edit_user_text.length;i++){
            box_edit_user_text[i].style.color = "#ffff";
        }
    }
}

