function carregar_comentarios(comentario){
    var page = "comentarios.php";
    var i = comentario;
    var div = "#exibe_comentarios"+i;
    // var bt = document.getElementById(`bt_exibe_comentarios${i}`);

    // console.log(bt);
    // bt.innerHTML="Ver menos";

    $(`${div}`).toggle(' show_comentarios');


    $.ajax({
        type:'POST',
        dataType:'html',
        url: page,
        beforeSend: function () {
            $(`${div}`).html("carregando... ");
        },
        data: {comentario:comentario},
        success: function(msg){ 
            $(`${div}`).html(msg);
        }
    });
}
// Lista pesquisa post
    function CarregaListaPosts(event) {
    if(this.status == 200 && this.readyState==4) {
       
       var dados = this.responseText;
        if (dados) {
        let texto=document.getElementById('secaoPrincipal');
        texto.innerHTML = dados;
        if (localStorage.ativaDarkMode == "true") {
            var box_posts = [...document.querySelectorAll(".boxpostIndividual")];
            var paragrafos = [...document.querySelectorAll(".p_post")];

            for(var x = 0; x < box_posts.length;x++){
                box_posts[x].classList.add("dark");
            }
            for(var y = 0; y < paragrafos.length;y++){
                paragrafos[y].style.color = "#acaaa8";
            }

        }
    }
        } else {
        console.log('Somthing wrong happen:',this.status);
            } 
    }
    
    function carregar_page_busca(id){
        console.log(id);
            var pesquisa   = document.getElementById("pesquisa").value;
            const ajax = new XMLHttpRequest();
            ajax.addEventListener('load', CarregaListaPosts);
            ajax.open('POST', '../crud/realiza_busca.php?pesquisa=' + pesquisa);
            ajax.send(); 
    }
 
function CarregaListaCards(event) {
    if(this.status == 200 && this.readyState==4) {
       
       var dados = this.responseText;
        if (dados) {
        let texto=document.getElementById('banco_talentos-cards');
        texto.innerHTML = dados;
        // if (localStorage.ativaDarkMode == "true") {
        //     var box_posts = [...document.querySelectorAll(".boxpostIndividual")];
        //     var paragrafos = [...document.querySelectorAll(".p_post")];

        //     for(var x = 0; x < box_posts.length;x++){
        //         box_posts[x].classList.add("dark");
        //     }
        //     for(var y = 0; y < paragrafos.length;y++){
        //         paragrafos[y].style.color = "#acaaa8";
        //     }
        // }
    }
}
}    
function carregar_cards(){
    console.log("chamu ajax")
        var pesquisa   = document.getElementById("banco_talentos-input").value;
        console.log(pesquisa);
        const ajax = new XMLHttpRequest();
        ajax.addEventListener('load', CarregaListaCards);
        ajax.open('POST', '../crud/realiza_busca_cards.php?pesquisa=' + pesquisa);
        ajax.send(); 
}

// Modal edita post
function CarregaModalEdit(event) {
    if(this.status == 200 && this.readyState==4) {
       
       var dados = this.responseText;
        if (dados) {
        let texto=document.getElementById('modal_edit_conteudo');
        texto.innerHTML = dados;
    }
        } else {
        console.log('Somthing wrong happen:',this.status);
            } 
    }
    
    function carregar_modal_edit(id){
        console.log(id);
            var id   = document.getElementById("bt_editar_post").value;
            const ajax = new XMLHttpRequest();
            ajax.addEventListener('load', CarregaModalEdit);
            ajax.open('POST', '../php/pg_editar_post.php?id_post=' + id);
            ajax.send(); 
    }
   

//CURTIDAS  
function CarregaLike(event) {
    if(this.status == 200 && this.readyState==4) {
       
        var dados = this.responseText;
         if (dados) {
            console.log('entrou no if');
            // let texto=document.getElementById('span_like');
            // texto.innerHTML = dados;
     }
         } else {
         console.log('Somthing wrong happen:',this.status);
             } 
     }

function rigistraLike(id_post,id_users){
    let like = document.getElementById('span_like'+id_post);
    let btLike = document.getElementById('like'+id_post);

    let curtida = 0;
    curtida=like.value;
    curtida = parseInt(curtida);
    curtida=curtida + 1;
    like.value = curtida;
    console.log(like);
    console.log(curtida);
    console.log(id_post);
    console.log("session id=")
    console.log(id_users);
    btLike.style.filter = "invert(1)";
    btLike.setAttribute("disabled", "disabled");
    like.style.color="#a3a2a3";

    const ajax = new XMLHttpRequest();
    ajax.addEventListener('load', CarregaLike);
    ajax.open('POST', '../crud/registra_like.php?id=' + id_post + '&id_user=' + id_users);
    ajax.send(); 
}

// COMENTARIO
// function CarregaListaPosts(event) {
//     if(this.status == 200 && this.readyState==4) {
       
//        var dados = this.responseText;
//         if (dados) {
//         let texto=document.getElementById('secaoPrincipal');
//         texto.innerHTML = dados;
//         if (localStorage.ativaDarkMode == "true") {
//             var box_posts = [...document.querySelectorAll(".boxpostIndividual")];
//             var paragrafos = [...document.querySelectorAll(".p_post")];

//             for(var x = 0; x < box_posts.length;x++){
//                 box_posts[x].classList.add("dark");
//             }
//             for(var y = 0; y < paragrafos.length;y++){
//                 paragrafos[y].style.color = "#acaaa8";
//             }

//     }
//     }
//         } else {
//         console.log('Somthing wrong happen:',this.status);
//             } 
//     }
    
function enviarComentario(id_post){
    console.log("enviando comentario...");
    var comentario   = document.querySelector("#input_comentario"+id_post).value;
    var validacao = document.querySelector('#modal_validacao'+id_post);       
    if (!comentario){
        console.log("Comentario vazio");
        validacao.classList.toggle("modal_validacao-animation");
    }else{
        console.log(id_post);
        // comentario.innerHTML= " ";
        comentario.value=" ";
        // $("#input_comentario"+id_post).val(" ");
        // $("#input_comentario"+id_post).html(" ");

        const ajax = new XMLHttpRequest();
        ajax.open('GET', '../crud/logica_usuario.php?comentario=' + comentario + '&comentar=' + id_post);
        ajax.send(); 
    }
}

// BANCO TALENTOS
function CarregaListaTalentos(event) {
    if(this.status == 200 && this.readyState==4) {
       
       var dados = this.responseText;
        if (dados) {
        let texto=document.getElementById('secaoPrincipal');
        texto.innerHTML = dados;
        if (localStorage.ativaDarkMode == "true") {
            var banco_talentos_pesquisar = document.querySelector(".banco_talentos-pesquisar");
            var banco_card_infos = [...document.querySelectorAll(".banco_card-infos")]
            // var paragrafos = [...document.querySelectorAll(".p_post")];

                banco_talentos_pesquisar.classList.add("dark");
            
            for(var y = 0; y < banco_card_infos.length;y++){
                banco_card_infos[y].classList.add("dark");
            }

        }
        } else {
        console.log('Somthing wrong happen:',this.status);
            } 
    }
}
    
    function carregar_bancotalentos(){
            const ajax = new XMLHttpRequest();
            ajax.addEventListener('load', CarregaListaTalentos);
            ajax.open('POST', '../php/banco_talentos.php');
            ajax.send(); 
    }