
<?php 
       include_once("../crud/funcoes.php");
       session_start(); 
       $id = $_SESSION['id'];
        // $id_destinatario  =  16;
       $id_destinatario  =  $_SESSION['destinatario'];
   
       $query = "SELECT * FROM chat where id_de = $id and id_para = $id_destinatario or  id_de = $id_destinatario and id_para = $id ORDER BY chat.id asc";
       $mensagens = fazConsulta($query,'fetchAll');

       $query = "SELECT * FROM usuarios where id_usuarios = $id_destinatario";
       $usuarios = fazConsulta($query,'fetchAll');

    //    $query = "SELECT * FROM posts , usuarios where posts.id_usuario = usuarios.id_usuarios ORDER BY posts.id_posts desc";

       ?>
        
        <div id="scroll_chat">
            <?php foreach($usuarios as $usuario){?>

            <div class="cabecalho_chat">
                <img src="../crud/imagens/<?php echo $usuario['imagem']; ?>" />
                <p><?php echo $usuario['nome']; ?></p>
            </div>
            <div>
                <?php } ?> 
                    <?php
                        foreach($mensagens as $mensagem){?>
                                <?php if($mensagem['id_de'] == $id){?>
                                    <div style="margin-bottom:50px;">
                                        <div align="right" class="chat-i">
                                            <p ><?php echo $mensagem['mensagem'];?></p> 
                                        </div>
                                    </div>
                                <?php }else{  ?>
                                    <div style="display:flex;margin-bottom:50px;align-items:end;">
                                        <!-- <img src="../crud/imagens/<?php echo $usuario['imagem']; ?>" style="width:50px;height:50px;border-radius:100%;" /> -->
                                        <div align="left" class="chat-you">
                                            <p ><?php echo $mensagem['mensagem'];?></p> 
                                        </div>
                                    </div> 
                        <?php } }
                    ?>
            </div>
        </div>
<script src="../Js/openModalPerfil.js"></script>
