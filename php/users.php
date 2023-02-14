<?php
    include_once("../crud/funcoes.php");

    $query = "SELECT * FROM usuarios  where user_online = 1 ORDER BY email desc";
    $usuarios = fazConsulta($query,'fetchAll');?>

        <?php foreach($usuarios as $usuario){
            ?>
            <div class="box__users">
                <img title="Ver informações" src="../crud/imagens/<?php echo $usuario['imagem']; ?>"onclick ="OpenInfosUsers(<?php echo $usuario['id_usuarios']; ?>)" class="user" width="40px"/>

                <div class="infos_users" id="<?php echo $usuario['id_usuarios']; ?>">
                <?php if(isset($usuario['nome']))?>
                    <li style="border:solid 1px green;"><img src="../css/icones/menu-perfil.png"/><strong><?php echo $usuario['nome'];?></strong></li>
                    <li><?php echo $usuario['profissao']; ?></li>
                    <li><img src="../css/icones/competencias.png"/><?php echo $usuario['competencias'];?></li>
                    <!-- <li><button onclick ="abreChat(<?php echo $usuario['id_usuarios']; ?>)">Mensagem</button></li> -->
                    <li><form method="get" action="chat.php"><button name="id" value="<?php echo $usuario['id_usuarios']; ?>">Enviar mensagem</button></form></li>

                </div>
            </div>
        <?php
        }

?>