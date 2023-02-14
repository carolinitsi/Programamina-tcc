<body>
    <section class="secao_lista--post">
        <?php 
            ini_set('display_errors', 0 );
            error_reporting(0);
            include_once("funcoes.php");
            session_start();
            #PESQUISAR
                $user_logado = $_SESSION['id'];
                $pesquisa  =  $_GET['pesquisa'];
                $query = "SELECT * FROM posts , usuarios where posts.id_usuario = usuarios.id_usuarios and posts.post like '%$pesquisa%'";
                $usuarios = fazConsulta($query,'fetchAll');
                foreach($usuarios as $usuario){          
                    ?>  
                    <div class="boxpostIndividual"> 
                        <?php
                            // Esse if testa se o usuário logado é autor do post, se sim, mostra bts editar e excluir 
                            if($_SESSION['id'] == $usuario['id_usuarios']){
                                $_SESSION['id_post'] = $usuario['id_posts'];
                                include("bt_post.php");
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
                                        if($teste){
                                            // echo("Cuurido!"); ?>
                                            <div class="box_like">    
                                                <input class="span_like span_liked" value="<?php echo $count ?>" id="span_like<?php echo $usuario['id_posts']; ?>"/>                    
                                                <button class="bt_like liked" disabled id="like<?php echo $usuario['id_posts'];?>" name="" onclick="rigistraLike(<?php echo $usuario['id_posts']; ?>,<?php echo $_SESSION['id']; ?>)" value=""></button>
                                            </div>
                                        <?php
                                        }else{?>
                                            <div class="box_like">    
                                                <input class="span_like" value="<?php echo $count ?>" id="span_like<?php echo $usuario['id_posts']; ?>"/>                    
                                                <button class="bt_like" id="like<?php echo $usuario['id_posts'];?>" name="" onclick="rigistraLike(<?php echo $usuario['id_posts']; ?>,<?php echo $_SESSION['id']; ?>)" value=""></button>
                                            </div>
                                        <?php
                                            }
                                        ?>

                                    

                                <div class="boxpostIndividual-interacao">
                                    <div class="emoji-picker-container">
                                        <input data-emojiable="true" class="input_comentario" id="input_comentario<?php echo $usuario['id_posts'];?>"title="Fazer comentário" type="text" name="comentario" required value="" placeholder="   Adicione um comentario..." > 
                                        <button class="bt-comentar" onclick="enviarComentario(<?php echo $usuario['id_posts'];?>)"; type="submit" name="comentar" value=""> 
                                        </button> 
                                    </div>

                                    <div id="modal_validacao<?php echo $usuario['id_posts'];?>" class="modal_validacao">
                                        <p><strong>Ops!</strong> Você está tentando enviar um comentário vazio! 😅</p>
                                    </div>
                                </div>

                                <button class="bt_comentarios" id="bt_exibe_comentarios<?php echo $usuario['id_posts']; ?>" name="" onclick="carregar_comentarios(<?php echo $usuario['id_posts']; ?>);" value="<?php echo $usuario['id_posts']; ?>">Ver comentários</button>
                                <div class="box-comentarios" id="exibe_comentarios<?php echo $usuario['id_posts']; ?>">
                                </div>
                                </div>
                        </div>
                    </div>
                                                                
                    <?php
                        $contador = 1;  
                }

                if($contador <= 0){
                    include("../php/box_error.php");
                }
                ?> 
    </section> 
</body>
<script src="../ajax.js"></script>
