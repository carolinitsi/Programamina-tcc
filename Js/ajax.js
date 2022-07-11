function carregar_comentarios(comentario){
    var page = "comentarios.php";
    var i = comentario;
    var div = "#exibe_comentarios"+i;
    var bt_vermenos = "#bt_esconde_comentarios"+i;
    var paragrafos = ".p-comentario";

    $(`${div}`).toggle(' show');
    // $(`${bt_vermenos}`).toggle(' mostra');


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

    // function CarregaSucesso(event) {
    //     if(this.status == 200 && this.readyState==4) {
           
    //        var dados = this.responseText;
    //         if (dados) {
    //         let texto=document.getElementById('modal_edit_conteudo');
    //         texto.innerHTML = dados;
    //         // if (localStorage.ativaDarkMode == "true") {
    //         //     var box_posts = [...document.querySelectorAll(".boxpostIndividual")];
    //         //     var paragrafos = [...document.querySelectorAll(".p_post")];
    
    //         //     for(var x = 0; x < box_posts.length;x++){
    //         //         box_posts[x].classList.add("dark");
    //         //     }
    //         //     for(var y = 0; y < paragrafos.length;y++){
    //         //         paragrafos[y].style.color = "#acaaa8";
    //         //     }
    
    //         // }
    //     }
    //         } else {
    //         console.log('Somthing wrong happen:',this.status);
    //             } 
    //     }
        
    //     function sucesso(id){
    //             const ajax = new XMLHttpRequest();
    //             ajax.addEventListener('load', CarregaSucesso);
    //             ajax.open('POST', '../edicao_concluida.html');
    //             ajax.send(); 
    //     }
    

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

function rigistraLike(id_post,id_user){
    let like = document.getElementById('span_like'+id_post);
    let btLike = document.getElementById('like'+id_post);

    let curtida = like.value;
    curtida = parseInt(curtida);
    curtida=curtida + 1;
    like.value = curtida;
    console.log(curtida);
    console.log(id_user);


    const ajax = new XMLHttpRequest();
    ajax.addEventListener('load', CarregaLike);
    ajax.open('POST', '../crud/registra_like.php?id=' + id_post);
    ajax.send(); 
}