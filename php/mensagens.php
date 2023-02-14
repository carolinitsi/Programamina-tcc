<?php
    include_once("../crud/funcoes.php");
    session_start(); 

    $id = $_SESSION['id'];
    $query = "SELECT DISTINCT nome,imagem,id_usuarios,user_online,id_de,id_para FROM chat,usuarios where chat.id_de = $id or chat.id_para = $id GROUP BY nome  ORDER BY chat.id desc";
    $mensagens = fazConsulta($query,'fetchAll');?>

        <?php foreach($mensagens as $mensagem){
            if(intval($mensagem['id_de']) === $id OR intval($mensagem['id_para']) === $id){
            ?>
            <ul class="box__mensagens">
                <li>        
                    <form method="" action="chat.php"><button class="conversas_bt" name="id" value="<?php echo $mensagem['id_usuarios'];?>"><p class="conversas_bt_nome"><?php echo $mensagem['nome']; ?></p></button></form>
                    <img src="../crud/imagens/<?php echo $mensagem['imagem']; ?>" />
                    <?php if($mensagem['user_online'] === 1){?>
                        <div class="online" title="Online"></div>
                    <?php } ?> 
                </li>
            </ul>
        <?php
        }
        }

?>