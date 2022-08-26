<?php
    include("../php/header-session.php");
    include("../php/cabecalho.php");
    include_once("../crud/funcoes.php");
    include_once("cabecalho.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>ProgramaMina</title>
    </head>
    
    <body class="">
        
        <main  id="modal-edicao" class="wrapper">
                
            <section id="secaoPrincipal" class="secaoPrincipal">
                <article style="left:0px; position:absolute;">
                    <div class="usuaria">
                        <button class="usuaria_close" onclick="OpenModalPerfil()"></button>
                        <?php include_once("user.php");?>  
                    </div>
                </article>
                <article>
                    <div class="lista_usuarias">
                        <button class="usuaria_close" onclick="OpenModalUsers()"></button>
                        <?php include_once("users.php");?>  
                    </div>
                </article>

                <div class="secaoPrincipal__post">
                        <form action="../crud/logica_usuario.php" method="POST" enctype="multipart/form-data">
                            <h2 class="secaoPrincipal__post-titulo">Faça uma publicação:</h2>
                            <label for="assunto">Assunto: </label><input id="assunto" type="text" required class="secaoPrincipal__post--assunto" name="assunto" placeholder=" Palavra chave" >
                            <textarea type="text" class="secaoPrincipal__post--post" name="post"placeholder=""></textarea>
                            <label class="bt__file" for="bt__file"><img class="input_file_post-icon" src="../css/icones/file.png">                 
                                <span class="">Foto</span>
                                <img id="preview"/>
                            </label>
                            <input type="file"  class="input_file_post" id="bt__file" name="file" onchange="previewimagePost()">
                            <input type="submit" class="bt_padrao--grande" name="postar" value="Postar">
                        </form>
                </div>
                <?php include_once("lista_posts.php");?>
            </section>
        </main> 
        

        <footer class="rodape">
            <!-- <div class="rodape__mensagem" id="secao-contato">
                <form action="crud/logica_usuario.php" method="post"> 
                    <h2>Contate-nos:</h2>
                    <label for="email_remetente">Email: </label>
                    <input class="rodade__email" type="text" name="email_remetente" id="email_remetente" placeholder="    seuemail@gmail.com">
                    <label for="mensagem">Mensagem: </label>
                    <textarea class="rodape__mensagem" type="text" name="mensagem" id="mensagem" placeholder="   Insira sua mensagem"></textarea></br>
                    <input class="bt_padrao--grande" type="submit" id='enviar' name='enviar' value="Enviar">           
                </form>
            </div>   -->
            
            <p class="copyright"> &copy; Copyright ProgramaMina 2022</p>
        </footer>

        
     

        <script src="ajax.js"></script>
        <script src="arquivo.js"></script>
        <script src="../Js/modal.js"></script>
        <script src="../Js/openModalPerfil.js"></script>

    </body>
</html>


