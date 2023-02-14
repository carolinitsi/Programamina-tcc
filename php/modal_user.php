<?php 
    include_once("../crud/funcoes.php");
    session_start();

    $id = $_GET['id'];
    $query = "SELECT * FROM posts , usuarios where posts.id_usuario = $id and usuarios.id_usuarios = $id ORDER BY posts.id_posts desc";
    $usuarios = fazConsulta($query,'fetchAll');
    $user_logado = $_SESSION['id'];

?>
    <?php foreach($usuarios as $usuario){?> 
    <div class="modal_user_cabecalho">
        <button class="modal_user_close" onclick="modal_user_close()">x</button>
        <img class="modal_user_cabecalho--img" src="../crud/imagens/<?php echo $usuario['imagem']; ?>" />
       <div class="modal_user_cabecalho--infos">
            <h6><?php echo $usuario['nome']; ?></h6> 
            <div>
                <p> 💼 <?php echo $usuario['profissao']; ?></p>
                <p> 💻 <?php echo $usuario['competencias']; ?></p>
            </div>
        </div>
    </div>
    <?php
} 
?> 

        <div class="secao_lista--post">

                <?php foreach($usuarios as $usuario){
                            // Esse if testa se o usuário logado é autor do post, se sim, mostra bts editar e excluir 
                            if($_SESSION['id'] == $usuario['id_usuarios']){
                                $_SESSION['id_post'] = $usuario['id_posts'];
                                // include("bt_post.php");
                                ?>
                                <div class="bts_post">
                                <form action="pg_editar_post.php" method="post">
                                    <button class="bt_editar_post" class="bt_editar_post"type="submit" name="editar" title="Editar publicação" value="<?php echo $usuario['id_posts']; ?>"></button>
                                </form> 
                            </div> <?php
                            } 
                        ?> 
                        <div class="boxpostIndividual-main"> 
                            <div class="user">
                                <img src="../crud/imagens/<?php echo $usuario['imagem']; ?>" />
                                    <?php if($usuario['user_online'] === 1){?>
                                        <div class="online" title="Online"></div>
                                    <?php } ?> 
                                <div class="user-infos">
                                    <p class="user-infos-nome"><?php echo $usuario['nome']; ?></p> 
                                    <p class="user-infos-competencias"><?php echo $usuario['competencias']; ?></p> 
                                    <p class="user-infos-data"><?php echo $usuario['data_post']; ?></p>
                                </div>
                            </div>
                            <div class="boxpostIndividual-conteudo">
                            <?php if(isset($usuario['imagem_post'])){?>
                                <img class="boxpostIndividual__cabecalho--imagem" src="../crud/imagens/<?php echo $usuario['imagem_post']; ?>"/>
                                <?php } ?> 
                                <!-- <p class="p_post"><?php echo $usuario['id_posts']; ?> </p> -->
                                <p class="p_post"><?php echo $usuario['post']; ?> </p>

                                <?php 
                                    $id_post = $usuario['id_posts'];
                                    $count = 0;
                                    $query_like = "SELECT * FROM likes WHERE id_post = $id_post ";
                                    $likes = fazConsulta($query_like,'fetchAll');
                                    foreach($likes as $like){
                                        $count = $count + 1;
                                    };

                                    $queryVerifyLike = "SELECT * FROM likes WHERE id_post = $id_post and id_user = $user_logado ";
                                    $teste = fazConsulta($queryVerifyLike,'fetchAll');
                                        if($teste){?>
                                            <div class="box_like">    
                                            <input class="span_like span_liked" value="<?php echo $count ?>" id="span_like<?php echo $usuario['id_posts']; ?>"/>                    
                                            <button class="bt_like liked" disabled id="like<?php echo $usuario['id_posts'];?>" name="" onclick="rigistraLike(<?php echo $usuario['id_posts']; ?>,<?php echo $_SESSION['id']; ?>)" value=""></button>
                                        </div><?php
                                        }else{?>
                                            <div class="box_like">    
                                            <input class="span_like" value="<?php echo $count ?>" id="span_like<?php echo $usuario['id_posts']; ?>"/>                    
                                            <button class="bt_like" id="like<?php echo $usuario['id_posts'];?>" name="" onclick="rigistraLike(<?php echo $usuario['id_posts']; ?>,<?php echo $_SESSION['id']; ?>)" value=""></button>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
        
                        
                    </div>
                    
                    <div id="modal_fundo-exclusão<?php echo $usuario['id_posts']; ?>" class="modal_fundo_style modal_fundo-exclusão">
                        <div class="modal_conteudo" style="top:100px;height: 270px;">
                            <h2>Excluir publicação?</h2>
                            <p>Tem certeza que deseja excluir essa publicação? 😢</p>
                            <div class="modal_fundo-exclusão buttons">
                                <button class="modal_fundo-exclusão cancelar"type="button"  onclick = "cancel(<?php echo $usuario['id_posts']; ?>)">Cancelar</button>
                                <button class="modal_fundo-exclusão sim"     type="button"  onclick = "exclui(<?php echo $usuario['id_posts']; ?>)">Sim</button>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
                <?php
                }
                ?> 
                
        </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/ajax.js"></script>
<script src="../js/emojis/config.min.js"></script>
<script src="../js/emojis/util.min.js"></script>
<script src="../js/emojis/jquery.emojiarea.min.js"></script>
<script src="../js/emojis/emoji-picker.min.js"></script>
<script src="../js/slider.js"></script>