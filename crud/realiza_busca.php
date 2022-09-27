<body class="fadeIn">
    <section class="secao_lista--post">
        <?php 
            ini_set('display_errors', 0 );
            error_reporting(0);
            include_once("funcoes.php");
            session_start();
            #PESQUISAR
                $pesquisa  =  $_GET['pesquisa'];
                $query = "SELECT * FROM posts , usuarios where posts.id_usuario = usuarios.id_usuarios and posts.post like '%$pesquisa%'";
                $usuarios = fazConsulta($query,'fetchAll');
                foreach($usuarios as $usuario){          
                ?>  
                <div class="boxpostIndividual"> 
                    <div class="user">
                        <img src="../crud/imagens/<?php echo $usuario['imagem']; ?>" />
                        <div class="user-infos">
                            <p class="user-infos-nome"><?php echo $usuario['nome']; ?></p> 
                            <p class="user-infos-competencias"><?php echo $usuario['competencias']; ?></p> 
                        </div>
                    </div>    
                    <div class="boxpostIndividual-conteudo"> 
                    <?php if(isset($usuario['imagem_post'])){?>
                        <img class="boxpostIndividual__cabecalho--imagem" src="../crud/imagens/<?php echo $usuario['imagem_post']; ?>"/>
                        <?php } ?>  
                        <p class="p_post"><?php echo $usuario['post']; ?></p>
                        <form action="../crud/logica_usuario.php" method="post">
                            <input class="input_comentario" type="text" name="comentario" required value="" placeholder="   Adicione um comentario..." ><button class="bt-comentar" type="submit" name="comentar" value="<?php echo $usuario['id_posts'];?>"> </button>  
                        </form>   
                        <button class="bt_comentarios" id="bt_exibe_comentarios" name="" onclick="carregar_comentarios(<?php echo $usuario['id_posts']; ?>);" value="<?php echo $usuario['id_posts']; ?>">Ver comentários</button>
                        <div class="box-comentarios" id="exibe_comentarios<?php echo $usuario['id_posts']; ?>"> </div>
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
