
    function confirma_excluir(id_post){
        var modal = document.getElementById("modal_fundo-exclusão");
        modal.style.display = "block";
    }

    function cancel(){
        var modal = document.getElementById("modal_fundo-exclusão");
        modal.style.display = "none";
    }

    function exclui(id_post){
        var modal = document.getElementById("modal_fundo-exclusão");
        modal.style.display = "none";
        console.log(id_post);
        document.location.reload(true);
        const ajax = new XMLHttpRequest();
        ajax.open('GET', '../crud/logica_usuario.php?deletar='+ id_post);
        ajax.send(); 
    }
