<div class="bts_post">
    <form action="pg_editar_post.php" method="post">
        <button class="bt_editar_post" class="bt_editar_post"type="submit" name="editar" title="Editar publicação" value="<?php echo $usuario['id_posts']; ?>"></button>
    </form> 
    <!-- <form action="../crud/logica_usuario.php" method="post"> -->
        <button class="bt_deletar_post" type="submit" name="deletar" title="Excluir publicação" value="<?php echo $usuario['id_posts']; ?>"onclick = "confirma_excluir(<?php echo $usuario['id_posts']; ?>)">  </button>  
    <!-- </form>  -->
</div>

<!-- MODAL EXCLUIR POST -->

<div id="modal_fundo-exclusão" class="modal_fundo_style">
    <div class="modal_conteudo" style="top:100px;height: 270px;">
            <h2>Excluir publicação?</h2>
            <p>Tem certeza que deseja excluir essa publicação?  <?php echo $usuario['id_posts']; ?> 😢</p>
            <div class="modal_fundo-exclusão buttons">
                <button class="modal_fundo-exclusão cancelar"type="button"  onclick = "cancel(<?php echo $usuario['id_posts']; ?>)">Cancelar</button>
                <button class="modal_fundo-exclusão sim" type="button"  onclick = "exclui(<?php echo $usuario['id_posts']; ?>)">Sim</button>
            </div>
    </div>
</div>

<script type="text/javascript">

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
        document.location.reload(true);
        const ajax = new XMLHttpRequest();
        ajax.open('GET', '../crud/logica_usuario.php?deletar='+ id_post);
        ajax.send(); 
    }

</script>