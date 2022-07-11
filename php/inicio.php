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
                        <?php include_once("user.php");?>  
                    </div>
                </article>
                <article>
                    <div class="lista_usuarias">
                        <h2>Conheça algumas usuárias</h2>
                        <?php include_once("users.php");?>  
                    </div>
                </article>

                <div class="secaoPrincipal__post">
                        <form action="../crud/logica_usuario.php" method="POST">
                        <h2 class="secaoPrincipal__post-titulo">Compartilhe uma ideia, dica ou dúvida...</h2>

                            <label for="assunto">Assunto: </label><input id="assunto" type="text" required class="secaoPrincipal__post--assunto" name="assunto" placeholder=" Palavra chave" >
                            <textarea type="text" class="secaoPrincipal__post--post" name="post"placeholder=""></textarea>
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

    </body>
</html>


