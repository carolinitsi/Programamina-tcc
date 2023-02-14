<?php
    include("../php/header-session.php");
    include("../php/cabecalho.php");
    include_once("../crud/funcoes.php");
    include_once("cabecalho.php");
    $_SESSION['time'] = time();
?>
<!DOCTYPE html>
<html lang="pt-br" class="inicio">
    <head>
        <title>ProgramaMina</title>
    </head>
    
    <body class=""> 
    <main  id="modal-edicao" class="wrapper">
        <section class="container_laterais">
            <article style="top:85px;">
                <div class="usuaria">
                    <button class="usuaria_close" onclick="OpenModalPerfil()"></button>
                    <?php include_once("user.php");?>  
                </div>
            </article>
            <article>
                <h2 class="lista_usuarias-mensagens lista_usuarias-header">Usuárias</h2>
                <h2 class="lista_usuarias-online lista_usuarias-header" onclick="mostraOnline()">Online</h2>
                <div id="lista_usuarias" class="lista_usuarias">
                    <button class="usuaria_close" onclick="OpenModalUsers()"></button>
                </div>
                <div  id="lista_mensagens" class="lista_mensagens">
                </div>
            </article>
        </section>
                
        <section id="secaoPrincipal" class="secaoPrincipal">
            <button class="publicar pulse-button"  onclick="modal_publicacao()"> + </button>
                <form class="container_criar-post">
                    <img src="../crud/imagens/<?php echo $_SESSION['user_image']; ?>"/>
                    <input required class="bt_chama_modal input_novapubli" type="" name="" placeholder="Criar nova publicação">
                    <!-- <img class="bt_chama_modal" src="../css/icones/file.png">  -->
                    <button title="Publicar">Publicar</button>
                </form>
            <?php include_once("banco_talentos-slider.php");?>  
            <?php include_once("lista_posts.php");?>
        </section>
    </main> 

          <!------------------------------------- MODAL POST ------------------------------------------------------------>
          <div id="modal_fundo" class="modal_fundo_style">
            <div class="modal_conteudo">
             <button class="fechar">X</button>
                <div class="">
                                <form class="form_publicar"action="../crud/logica_usuario.php" method="POST" enctype="multipart/form-data">
                                    <h2 class="secaoPrincipal__post-titulo">Nova publicação:</h2>
                                    <div class="secaoPrincipal__post-user">
                                        <img src="../crud/imagens/<?php echo $_SESSION['user_image'] ?>" width="50px" height="50px" alt="Foto da usuária logada"/>
                                        <p><?php echo $_SESSION['user_nome'] ?></p>
                                    </div>
                                    <textarea type="text" class="secaoPrincipal__post--post" name="post" placeholder="No que você esta pensando?" required></textarea>
                                    <div style="display:flex;">
                                        <label class="bt__file" for="bt__file">
                                            <img class="input_file_post-icon" src="../css/icones/file.png">                 
                                            <span class="">Foto</span>
                                        </label>
                                        <img id="preview_post"/>
                                    </div>
                                    <label for="assunto">Categoria: </label>
                                    <select name="assunto" id="assunto" required="required">
                                    <option value="" selected></option>
                                    <optgroup label="Tecnologias">
                                        <option class="item" value="html">Html</option>
                                        <option class="item" value="Css">Css</option>
                                        <option class="item" value="Javascript">Javascript</option>
                                        <option class="item" value="Sql">Sql</option>
                                        <option class="item" value="Php">Php</option>
                                        <option class="item" value="Node">Node</option>
                                        <option class="item" value="Ruby">Ruby</option>
                                        <option class="item" value="C">C</option>
                                        <option class="item" value="C++">C++</option>
                                        <option class="item" value="React">React</option>
                                        <option class="item" value="Vue">Vue</option>
                                        <option class="item" value="Angular">Angular</option>
                                        <option class="item" value="Outro">Outro</option>
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
                                    <input type="file"  class="input_file_post" id="bt__file" name="file" onchange="previewimagePost()">
                                    <input type="submit" class="bt_publicar" name="postar" value="Publicar">
                                </form>
                </div>
            </div>
          </div>

          
          <!------------------------------------- MODAL USUARIA ------------------------------------------------------------>
          <div id="modal_fundo" class="modal_user_background">
                <div class="modal_user_container">
                    <div id="modal_user" class="modal_user">
                    <button class="fechar">X</button>
                    </div>    
                </div>
          </div>
        
                
<!-- 
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
            
            <!-- <p class="copyright"> &copy; Copyright ProgramaMina 2022</p>
        </footer> --> 
        <script src="../Js/darkmode.js"></script>
        <script src="../Js/barra_lateral.js"></script>
        <script src="../js/ajax.js"></script>
        <script src="arquivo.js"></script>
        <script src="../Js/modal.js"></script>
        <script src="../Js/openModalPerfil.js"></script>
        <script src="../Js/modal_user.js"></script>



    </body>
</html>


