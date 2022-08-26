<?php 
    $query = "SELECT * FROM posts , usuarios where posts.id_usuario = usuarios.id_usuarios ORDER BY posts.id_posts desc";
    $usuarios = fazConsulta($query,'fetchAll');?>
  <head>
    <link href="../css/emoji.scss" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/emoji.scss" rel="stylesheet">

</head>
    <div class="secao_lista--post">

        <?php foreach($usuarios as $usuario){?>
        
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
                        <div class="user-infos">
                            <p class="user-infos-nome"><?php echo $usuario['nome']; ?></p> 
                            <p class="user-infos-competencias"><?php echo $usuario['competencias']; ?></p> 
                            <p class="user-infos-data"><?php echo $usuario['data_post']; ?></p>
                        </div>
                    </div>
                    <div class="boxpostIndividual-conteudo"> 
                        <h3 class="boxpostIndividual__cabecalho--titulo"><?php echo $usuario['assunto']; ?></h3> 
                        <p class="p_post"><?php echo $usuario['post']; ?> </p>
                        <?php if(isset($usuario['imagem_post'])){?>
                        <img class="boxpostIndividual__cabecalho--imagem" src="../crud/imagens/<?php echo $usuario['imagem_post']; ?>"/>
                        <?php } ?>
                        <div class="box_like">    
                            <input class="span_like" value="<?php echo $usuario['curtida']; ?>" id="span_like<?php echo $usuario['id_posts']; ?>"/>                    
                            <button class="bt_like" id="like<?php echo $usuario['id_posts'];?>" name="" onclick="rigistraLike(<?php echo $usuario['id_posts']; ?>)" value=""></button>
                        </div>

                        <div class="boxpostIndividual-interacao">
                            <form action="../crud/logica_usuario.php" method="post">
                                <div class="emoji-picker-container">
                                    <input data-emojiable="true" class="input_comentario" title="Fazer comentário" type="text" name="comentario" required value="" placeholder="   Adicione um comentario..." > 
                                    <button class="bt-comentar" type="submit" name="comentar" value="<?php echo $usuario['id_posts'];?>"> 
                                    </button> 
                                </div>
                            </form>
                        </div>

                        <button class="bt_comentarios" id="bt_exibe_comentarios" name="" onclick="carregar_comentarios(<?php echo $usuario['id_posts']; ?>);" value="<?php echo $usuario['id_posts']; ?>">Ver comentários</button>
                        <div class="box-comentarios" id="exibe_comentarios<?php echo $usuario['id_posts']; ?>">
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


