<?php 
    include_once("../crud/funcoes.php");
    $contador = 0;
    $id = $_POST["comentario"];
    session_start(); 

    $query = "SELECT * FROM comentarios, usuarios where usuarios.id_usuarios = comentarios.id_usuario and id_post = $id ORDER BY id_comentario desc";
    $usuarios = fazConsulta($query,'fetchAll');
    foreach($usuarios as $usuario){          
?>  
    <div class="box-comentario-individual" data-box  id="box-comentario-individual<?php echo($id); ?>">
        <div class="container-comentario">
            <img class="user-comentario" src="../crud/imagens/<?php echo $usuario['imagem']; ?>" class="" width="30px"/>
            <div class="container-comentario-infos">
                <span><?php echo $usuario['nome']; ?></span>
                <p><?php echo $usuario['comentario'];?></p>
            </div>
            <?php
                // Esse if testa se o usuário logado é autor do comentario, se sim, mostra bts editar e excluir 
                if($_SESSION['id'] == $usuario['id_usuarios']){
                    $_SESSION['id_usuarios'] = $usuario['id_usuario'];
                    // include("bt_post.php");
                    ?>
                <ul class="opcoes_comentarios">
                    <!-- <li><button>Editar</button></li> -->
                    <li><button title="Excluir" onclick = "confirma_excluir_comentario(<?php echo $usuario['id_comentario']; ?>)">🗑</button></li>
                </ul>
                <?php
                } 
                ?> 
        </div>
    </div>
    <div id="modal_fundo-exclusão<?php echo $usuario['id_comentario']; ?>" class="modal_fundo_style modal_fundo-exclusão">
    <div class="modal_conteudo" style="top:100px;height: 270px;">
            <h2>Excluir comentário:</h2>
            <p>Tem certeza que deseja excluir esse comentário? 💬 </p>
            <div class="modal_fundo-exclusão buttons">
                <button class="modal_fundo-exclusão cancelar"type="button"  onclick = "cancel_comentario(<?php echo $usuario['id_comentario']; ?>)">Cancelar</button>
                <button class="modal_fundo-exclusão sim" type="button"  onclick = "exclui_comentario(<?php echo $usuario['id_comentario']; ?>)">Sim</button>
            </div>
    </div>
</div>
<?php
    $contador = $contador + 1;  
}

if($contador <= 0){
    echo ('<div class="box-comentario-individual" id="box-comentario-individual'.$id.'"> <p class="p-comentario"> Ainda não há comentários nesse post!</p></div>');
 }
?> 


<script type="text/javascript">

    function confirma_excluir_comentario(id_comentario){
        console.log(id_comentario);
        var modal = document.getElementById("modal_fundo-exclusão"+id_comentario);
        modal.style.display = "block";
        console.log(modal);
    }

    function cancel_comentario(id_comentario){
        var modal = document.getElementById("modal_fundo-exclusão"+id_comentario);
        modal.style.display = "none";
    }

    function exclui_comentario(id_comentario){
        var modal = document.getElementById("modal_fundo-exclusão"+id_comentario);
        modal.style.display = "none";
        document.location.reload(true);
        const ajax = new XMLHttpRequest();
        ajax.open('GET', '../crud/logica_usuario.php?deletar_comentario='+ id_comentario);
        ajax.send(); 
    }

</script>

