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
                <article style="left:0px; position:absolute; top:85px;">
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
                            <label for="assunto">Categoria: </label>
                            <select name="assunto" id="assunto" required="required">
                            <option value="" selected></option>
                            <optgroup label="Tecnologias">
                              <option value="html">Html</option>
                              <option value="Css">Css</option>
                              <option value="Javascript">Javascript</option>
                              <option value="Sql">Sql</option>
                              <option value="Php">Php</option>
                              <option value="Node">Node</option>
                              <option value="Ruby">Ruby</option>
                              <option value="C">C</option>
                              <option value="C++">C++</option>
                              <option value="React">React</option>
                              <option value="Vue">Vue</option>
                              <option value="Angular">Angular</option>
                              <option value="Outro">Outro</option>
                            </optgroup>
                            <optgroup label="Áreas">
                                <option value="Frontend">Frontend</option>
                                <option value="Backend">Backend</option>
                                <option value="Engenharia de software">Engenharia de software</option>
                                <option value="Ciência de dados">Ciência de dados</option>
                                <option value="Gestão de Tecnologia da Informação">Gestão de Tecnologia da Informação</option>
                                <option value="Jogos Digitais">Jogos Digitais</option>
                                <option value="Robótica">Robótica</option>
                                <option value="Segurança da informação">Segurança da informação</option>
                                <option value="Arquiteto de redes">Arquiteto de redes</option>
                                <option value="Ciência de dados">Ciência de dados</option>
                            </optgroup>
                            </select>
                            <textarea type="text" class="secaoPrincipal__post--post" name="post" placeholder="" required></textarea>
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

          <!------------------------------------- MODAL EDITAR PERFIL ------------------------------------------------------------>

         -->
                

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


