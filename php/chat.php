<heade>
    <meta name="viewport" content="width=device-width">
</heade>
<boby>
    <?php 
        include("../php/header-session.php");
        include("../php/cabecalho.php");
        include_once("../crud/funcoes.php");
        include_once("cabecalho.php");
        include_once("../crud/funcoes.php");

        session_start(); 
        $id = $_SESSION['id'];
        $id_destinatario  =  $_GET['id'];
        $_SESSION['destinatario'] =  $_GET['id'];

        $query = "SELECT DISTINCT nome,imagem,id_usuarios FROM chat,usuarios where chat.id_de = $id or chat.id_para = $id ORDER BY chat.id asc";
        $conversas = fazConsulta($query,'fetchAll');
    ?>  

    <div class="container_batepapo wrapper">
        <article style="top:85px;">
            <div class="usuaria">
                <button class="usuaria_close" onclick="OpenModalPerfil()"></button>
                <?php include_once("user.php");?>  
            </div>
        </article>    
        <div class="container_conversas"> 
            <!-- <h2>Mensagens</h2> -->
            <?php foreach($conversas as $conversa){?>
                <div class="conversas">
                    <img src="../crud/imagens/<?php echo $conversa['imagem']; ?>" />     
                    <li><form method="" action="chat.php"><button class="conversas_bt" name="id" value="<?php echo $conversa['id_usuarios'];?>"><p class="conversas_bt_nome"><?php echo $conversa['nome']; ?></p></button></form></li>
                </div>
            <?php }?>
        </div>
        <div class="container_chat" id="container_chat">
            <div class="batepapo_chat" id="batepapo_chat">
                <?php include("../php/chat_mensagens.php?id=$id_destinatario");?>
            </div>
            <div class="nova-mensagem_chat">
                <form method="post" action="">
                    <div class="container_input_mensagem">
                        <input type="text" class="input_mensagem" required placeholder="Digite uma mensagem..." name="input_mensagem">
                    </div>
                    <span>
                        <input type="submit" value="" class="bt_enviar_msg" name="bt_enviar_msg">
                        <input type="hidden" value="envMsg" class="bt_enviar_msg" name="env"/>
                    </span>
                </form>
            </div>
        </div>
    </div>
<script src="../Js/darkmode.js"></script>

    </body>
<?php

    if(isset($_POST['env']) && $_POST['env'] == "envMsg"){
        $mensagem = $_POST['input_mensagem'];
        $id_para = $_SESSION['destinatario'];
        $data       = date("d/m/Y h:i");
        $id_destinatario  =  $_POST['bt_enviar_msg'];

        if(empty($mensagem)){
            // echo"<code>Digite sua mensagem! </code>";
        }else{
            $query = "insert into chat (id_de, id_para,mensagem,data_mensagem) values (?,?,?,?)";
            $array = array($id,  $id_para,$mensagem,$data);
            $usuario=fazConsulta($query,'query',$array);
            if($usuario)
            {
                // echo"<code>Mensagem enviada!</code>";
            }else{
                // echo"<code>Erro ao enviar a mensagem!</code>";
            }
        }
    }
?>
