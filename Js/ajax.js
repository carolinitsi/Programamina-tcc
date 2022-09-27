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

    let curtida = like.value;
    curtida = parseInt(curtida);
    curtida=curtida + 1;
    like.value = curtida;
    console.log(curtida);
    console.log(id_post);
    console.log("session id=")
    console.log(id_users);
    btLike.style.display="none";

    const ajax = new XMLHttpRequest();
    ajax.addEventListener('load', CarregaLike);
    ajax.open('POST', '../crud/registra_like.php?id=' + id_post + '&id_user=' + id_users);
    ajax.send(); 
}

// CHAT
// function CarregaBatepapo(event) {
//     if(this.status == 200 && this.readyState==4) {
       
//        var dados = this.responseText;
//         if (dados) {
//         let texto=document.getElementById('secaoPrincipal');
//         texto.innerHTML = dados;

    
//     }
//         } else {
//         console.log('Somthing wrong happen:',this.status);
//             } 
//     }
    
//     function abreChat(id){
//         console.log(id);
//         console.log("abre chat");

//         // var pesquisa   = document.getElementById("pesquisa").value;
//         const ajax = new XMLHttpRequest();
//         ajax.addEventListener('load', CarregaBatepapo);
//         ajax.open('POST', '../php/chat.php?id=' + id);
//         ajax.send(); 
//     }
