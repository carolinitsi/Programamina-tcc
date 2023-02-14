<?php 
    include("../php/header-session.php");
    include("../php/cabecalho.php");
    include_once("funcoes.php");
    if(!$_SESSION['logado'])
    {
    header('location:index.html');
    }

    $id = $_SESSION['id'];
                $query = "SELECT * FROM  usuarios where id_usuarios = $id";
                $usuarios = fazConsulta($query,'fetchAll');
                foreach($usuarios as $usuario){          
?>  
<body>
<main id="secaoPrincipal">
    <div class="box-editar-usuario">
        <img src="imagens/<?php echo $usuario['imagem']; ?>" class="imagem-perfil" width="100px"/>
        <section class="box-editar-email" >
            <form action="logica_usuario.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend style="padding-left:40px;"><a href="../php/inicio.php" title="Voltar"><img class="box-editar-arrow" src="../css/icones/arrow-left.png" class="" width="100px"/></a>Editar informações <img class="box-editar-senha-icon" src="../css/icones/editar-perfil.png"></legend>
                    <label class="input">
                        <input type="text" id="nome" class="box-editar-email" name="nome" value="<?php echo $usuario['nome']; ?>">
                        <span class="input__label">Nome:</span>
                    </label> 
                    <label class="input">
                        <input type="text" id="profissao" class="box-editar-email" name="profissao" value="<?php echo $usuario['profissao']; ?>">
                        <span class="input__label">Profissão:</span>
                    </label>
                    <label class="input">
                        <input type="text" id="competencias" class="box-editar-email" name="competencias" value="<?php echo $usuario['competencias']; ?>">
                        <span class="input__label">Competências:</span>
                    </label>  
                    <label class="input">
                        <input type="text" id="email" class="box-editar-email" name="email" value="<?php echo $usuario['email']; ?>"  >
                        <span class="input__label">Email:</span>
                    </label>              
                    <button class="bt_editar-perfil" type="submit" name="editar_perfil" value="<?php echo $usuario['id_usuarios'];?>"> Salvar </button>
                </fieldset> 
            </form> 
        </section>
        <section class="box-editar-senha">
            <form action="./logica_usuario.php" method="post"> 
                <fieldset> 
                    <legend>Alterar senha <img class="box-editar-senha-icon" src="../css/icones/cadeado.png"></legend>
                    <label class="input">
                        <input type="password" class="box-editar-email" minlength="4" name="senha_atual" id="senha_atual" placeholder=" Senha atual"/>
                        <span class="input__label" id="label-senha_atual">Senha atual:</span>
                    </label>  
                    <label class="input">
                        <input type="password" class="box-editar-email" minlength="4" name="nova_senha" id="nova_senha" placeholder=" Nova senha"/>
                        <span class="input__label">Nova senha:</span>
                    </label> 
                    <button type="submit" id='alterar' class="bt_editar-perfil" name='alterar' value="">  Alterar senha </button>         
                </fieldset> 
            </form>
            <span class="session_mensagem"> 
                <?php 
                    if (isset($_SESSION['msg']))
                        {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                ?> 
            </span>
            
        </section>
        <form class="box-editar-imagem"action="logica_usuario.php" method="post" enctype="multipart/form-data">
            <label class="label_edita_file" for="bt_edita_file"><img class="box-editar-file-icon" src="../css/icones/editar-imagem.png">                 
                <span class="">Editar foto</span>
            </label>
            <input type="file"   id="bt_edita_file" name="file" value="<?php echo $usuario['imagem']; ?>" onchange="previewimage()">
            <img id="preview"/>
            <button class="bt_salvar_foto" type="submit" name="editar_foto_perfil" value="<?php echo $usuario['id_usuarios'];?>"> Salvar </button>
        </form>     
    </div>
</main>                                                         
    <?php
    }                   
    ?>
    <script src="../Js/darkmode.js"></script>
</body>

           
