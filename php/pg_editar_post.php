<?php   
    include("../php/header-session.php");
    include("../php/cabecalho.php");
    include_once("../crud/funcoes.php");
    session_start();
    $id = $_POST['editar']; 
    $query = "SELECT * FROM posts where id_posts = $id";
    $usuarios = fazConsulta($query,'fetchAll');
    foreach($usuarios as $usuario){          
    }
?> 

<body class="">
    <section class="conteudoEditar">
        <div class="edit_post-user">
            <?php if(isset($_SESSION['user_image'])){?>
                <img class="" src="../crud/imagens/<?php echo $_SESSION['user_image']; ?>"/>
            <?php } ?>
            <p class="edit_post-user-nome"><?php  echo $_SESSION['user_nome'];?></p>
        </div>
        <form class="conteudoEditar_form" action="../crud/logica_usuario.php" method="POST" enctype="multipart/form-data">
            <legend class="esconde">Editar post</legend>
            <p class="esconde">ID:<input type="text" class="" name="id_post" value="<?php echo $usuario['id_posts']; ?>"></p>
            <?php if(isset($usuario['imagem_post'])){?>
                <img class="boxpostIndividual__cabecalho--imagem" src="../crud/imagens/<?php echo $usuario['imagem_post']; ?>"/>
            <?php } ?>
            <input type="file" required  class="" id="file" name="file">
            <label for="caixa_assunto">Assunto:<input type="text" class="conteudoEditar_assunto" id="caixa_assunto" name="assunto" value="<?php echo $usuario['assunto']; ?>"></p>
            <textarea type="text" class="conteudoEditar_post" rows='25' cols='100' name="post"  value=""> <?php echo $usuario['post']; ?> </textarea>
            <input type="submit" class="bt_padrao--grande" name="editar_post" value="Salvar">
        </form>
            <h4> <font color="red">  <?php 
            if (isset($_SESSION['msg']))
                {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?> </font></h4>
        </div>
    </section>
</body>

