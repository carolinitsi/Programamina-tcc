window.onload = function(){ 
    console.log("carregou");

    if (localStorage.ativaDarkMode === "true") {
            darckmode();
            console.log("darkmode");
    }
}

function verificaMode(){
    console.log("verifica mode"); 

    if (localStorage.ativaDarkMode == "true") {
        localStorage.ativaDarkMode = "false";
        console.log("Ativa darckmode");
        lightMode();
  }else{
        localStorage.ativaDarkMode = "true";
        darckmode();
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
    var container_chat = document.querySelector(".container_chat");
    var container_input_mensagem = document.querySelector(".container_input_mensagem");
    var container_conversas = document.querySelector(".container_conversas");
    var conversas_bt = document.querySelector(".conversas_bt_nome");
    var header__menu_buttons = document.querySelector(".header__menu-buttons");
    var bt_home_link = [...document.querySelectorAll(".bt_home-link")];
    var bt_sair = document.querySelector(".bt_sair");
    var banco_card =  [...document.querySelectorAll(".banco_card")];
    var container_criarpost = document.querySelector(".container_criar-post");
    var lista_mensagens = document.querySelector(".lista_mensagens");
    var lista_usuarias_online = document.querySelector(".lista_usuarias-online"); 
    var lista_header = document.querySelector(".lista_usuarias-header");
    var modal_conteudo = [...document.querySelectorAll(".modal_conteudo")];
    var textarea = document.querySelector(".secaoPrincipal__post--post");
    var input_novapubli = document.querySelector(".input_novapubli");
    var input_pesquisa = document.querySelector(".pesquisa-input");
    var bt_barra = [...document.querySelectorAll(".bt_barra-lateral")];
    var bt_barra_imagem = [...document.querySelectorAll(".bt_barra_lateral-img")];
    var bt_darkmode = document.querySelector(".bt_darkmode");
    var input_mensagem = document.querySelector(".input_mensagem");
    var input_comentario = [...document.querySelectorAll(".emoji-wysiwyg-editor")];
    var modal_user_container = document.querySelector(".modal_user_container");
    var modal_user_cabecalho = document.querySelector(".modal_user_cabecalho");
    var modal_user = document.querySelector(".modal_user");

    // var cabecalho_chat = document.querySelector(".cabecalho_chat");

    body.style.backgroundColor = "#f3f2ef";
    header__logado.style.background="#5c295b";

    if(modal_user !== null){
        modal_user.classList.remove("dark");
    }

    if(modal_user_cabecalho !== null){
        modal_user_cabecalho.classList.remove("dark");
    }

    if(modal_user_container !== null){
        modal_user_container.classList.remove("dark");
    }

    if (input_comentario !== null){
        for(var y = 0; y < input_comentario.length; y++){
        input_comentario[y].style.backgroundColor="#FAF6FF";
        }
    } 

    if (input_mensagem !== null){
        input_mensagem.style.backgroundColor="#F0F8FF";
    } 

    if (bt_darkmode !== null){
        bt_darkmode.classList.remove("white");
    } 

    if (bt_barra !== null){
        for(var y = 0; y < bt_barra.length; y++){
            bt_barra[y].style.backgroundColor="#f8f7f8";
            bt_barra[y].style.color="black";
        }
    } 

    if (bt_barra_imagem !== null){
        for(var y = 0; y < bt_barra_imagem.length; y++){
            bt_barra_imagem[y].classList.remove("white");
        }
    } 

    if (input_pesquisa !== null){
        input_pesquisa.style.backgroundColor="#837e887d";
    } 

    if (input_novapubli !== null){
        input_novapubli.style.backgroundColor="#FAF6FF";
    } 

    if (textarea !== null){
        textarea.classList.remove("dark");
    } 

    if (modal_conteudo !== null){
         console.log("modal_conteudo");
         for(var y = 0; y < modal_conteudo.length; y++){
             modal_conteudo[y].classList.remove("dark");
         }
     } 

    if (box_edit_user !== null){
        box_edit_user.classList.remove("dark");
    }

    if (box_edit_user_img !== null){
        box_edit_user_img.style.border = "20px solid #ffff";
    } 
    
    // if (box_edit_user !== null){
    //     box_edit_user.style.boxShadow = "none";
    // } 

    if (lista_mensagens !== null){
        lista_mensagens.classList.remove("dark");
    } 

    if (lista_usuarias_online !== null){
        lista_usuarias_online.classList.remove("dark");
    } 

    if (lista_header !== null){
        lista_header.classList.remove("dark");
    } 

    if (container_criarpost !== null){
        container_criarpost.classList.remove("dark");
    } 

    if (bt_sair !== null){
        bt_sair.style.filter = "brightness(0.5)";
    } 

    if (header__menu_buttons !== null){
        header__menu_buttons.style.backgroundColor = "transparent";
    } 

    if (container_conversas !== null){
        container_conversas.style.backgroundColor = "#ffff";
    } 

    if (conversas_bt !== null){
        conversas_bt.style.color = "#0000";
    } 

    if (container_input_mensagem !== null){
        container_input_mensagem.style.backgroundColor = "#ffff";
    } 
    if (container_chat !== null){
        container_chat.style.backgroundColor = "#ffff";
    } 

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

    for(var x = 0; x < lista_mensagens.length;x++){
        lista_mensagens[x].classList.remove("dark");
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

    if (bt_home_link !== null){
        for(var i = 0; i < bt_home_link.length;i++){
            bt_home_link[i].style.filter = "brightness(0.5)";
        }
    } 

    if(banco_card !== null){
        for(var z = 0; z < banco_card.length;z++){
            banco_card[z].classList.remove("dark");
        }
    }

    if(container_criarpost !== null){
        for(var z = 0; z < container_criarpost.length;z++){
            container_criarpost[z].classList.remove("dark");
        }
    } 
  
    legend[0].style.color = "#0000";
    legend[1].style.color = "#0000";
    
    for(var y = 0; y < box_edit_user_text.length;y++){
        box_edit_user_text[y].style.color = "#0000";
    }
}

function darckmode(){
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
        var container_chat = document.querySelector(".container_chat");
        var container_input_mensagem = document.querySelector(".container_input_mensagem");
        var container_conversas = document.querySelector(".container_conversas");
        var conversas_bt = document.querySelector(".conversas_bt_nome");
        var header__menu_buttons = document.querySelector(".header__menu-buttons");
        var bt_home_link = [...document.querySelectorAll(".bt_home-link")];
        var bt_sair = document.querySelector(".bt_sair");
        var banco_card =  [...document.querySelectorAll(".banco_card")];
        var container_criarpost = document.querySelector(".container_criar-post");
        var lista_header = document.querySelector(".lista_usuarias-mensagens .lista_usuarias-header");
        var lista_mensagens = document.querySelector(".lista_mensagens");
        var lista_usuarias_online = document.querySelector(".lista_usuarias-online"); 
        var lista_header = document.querySelector(".lista_usuarias-header");
        var modal_conteudo = [...document.querySelectorAll(".modal_conteudo")];
        var textarea = document.querySelector(".secaoPrincipal__post--post");
        var input_novapubli = document.querySelector(".input_novapubli");
        var input_pesquisa = document.querySelector(".pesquisa-input");
        var bt_barra = [...document.querySelectorAll(".bt_barra-lateral")];
        var bt_barra_imagem = [...document.querySelectorAll(".bt_barra_lateral-img")];
        var bt_darkmode = document.querySelector(".bt_darkmode");
        var input_mensagem = document.querySelector(".input_mensagem");
        var input_comentario = [...document.querySelectorAll(".emoji-wysiwyg-editor")];
        var modal_user_container = document.querySelector(".modal_user_container");
        var modal_user_cabecalho = document.querySelector(".modal_user_cabecalho");
        var modal_user = document.querySelector(".modal_user");

        // var cabecalho_chat = document.querySelector(".cabecalho_chat");

        body.style.backgroundColor = "#2b3743";
        header__logado.style.background="linear-gradient(68.15deg,rgb(26, 34, 42), rgb(30 38 46) 16.62%, rgb(26, 34, 42), rgb(35 36 37))";


        if(modal_user !== null){
            modal_user.classList.add("dark");
        }

        if(modal_user_cabecalho !== null){
            modal_user_cabecalho.classList.add("dark");
        }

        if(modal_user_container !== null){
            modal_user_container.classList.add("dark");
        }
        if (input_comentario !== null){
            for(var y = 0; y < input_comentario.length; y++){
            input_comentario[y].style.backgroundColor="rgba(65, 63, 68, 0.49)";
            }
        } 

        if (input_mensagem !== null){
            input_mensagem.style.backgroundColor="rgba(65, 63, 68, 0.49)";
        } 

        if (bt_darkmode !== null){
            bt_darkmode.classList.add("white");
        } 

        if (bt_barra_imagem !== null){
            for(var y = 0; y < bt_barra_imagem.length; y++){
                bt_barra_imagem[y].classList.add("white");
            }
        } 

        if (bt_barra !== null){
            for(var y = 0; y < bt_barra.length; y++){
                bt_barra[y].style.backgroundColor="#413f447d";
                bt_barra[y].style.color="#ffff";
            }
        } 

        if (input_pesquisa !== null){
            input_pesquisa.style.backgroundColor="#413f447d";
        } 

        if (input_novapubli !== null){
            input_novapubli.style.backgroundColor="#413f447d";
        } 

        if (modal_conteudo !== null){
            console.log("modal_conteudo");
            for(var y = 0; y < modal_conteudo.length; y++){
                modal_conteudo[y].classList.add("dark");
            }
        } 
        
        if (textarea !== null){
            textarea.classList.add("dark");
        } 

        if (bt_sair !== null){
            bt_sair.style.filter = "brightness(2)";
        } 

        if (bt_home_link !== null){
            for(var i = 0; i < bt_home_link.length;i++){
                bt_home_link[i].style.filter = "brightness(2)";
            }
        } 

        if (header__menu_buttons !== null){
            header__menu_buttons.style.backgroundColor = "rgb(26 34 42)";
        } 

        if (conversas_bt !== null){
            conversas_bt.style.color = "#ffff";
        } 
        
        if (container_conversas !== null){
            container_conversas.style.backgroundColor = "rgb(26 34 42)";
        } 
        if (container_input_mensagem !== null){
            container_input_mensagem.style.backgroundColor = "rgb(26 34 42)";
        } 
        if (container_chat !== null){
            container_chat.style.backgroundColor = "rgb(26 34 42)";
        } 
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

        if(banco_card !== null){
            for(var z = 0; z < banco_card.length;z++){
                banco_card[z].classList.add("dark");
            }
        }       

        if(lista_header !== null){
            for(var z = 0; z < lista_header.length;z++){
                lista_header[z].classList.add("dark");
            }
        }

        if (container_criarpost !== null){
            container_criarpost.classList.add("dark");
        } 

        if (lista_header !== null){
            lista_header.classList.add("dark");
        } 

        if (lista_usuarias_online !== null){
            lista_usuarias_online.classList.add("dark");
        } 

        if (lista_mensagens !== null){
            lista_mensagens.classList.add("dark");
        }
        
        if (box_edit_user_img !== null){
            box_edit_user_img.style.border = "20px solid rgb(26 34 42)";
        } 

        if (box_edit_user !== null){
            box_edit_user.classList.add("dark");
        } 
        
        if (box_edit_user !== null){
            box_edit_user.style.boxShadow = "none";
        } 

        legend[0].style.color = "#ffff";
        legend[1].style.color = "#ffff";   

        for(var y = 0; y < box_edit_user_text.length;y++){
            box_edit_user_text[y].style.color = "#ffff";
        }
}

