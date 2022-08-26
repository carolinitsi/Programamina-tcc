<?php
    include_once("../crud/funcoes.php");

    $query = "SELECT * FROM usuarios  ORDER BY email desc";
    $usuarios = fazConsulta($query,'fetchAll');?>

        <?php foreach($usuarios as $usuario){
            ?>
            <div class="box__users">
                <img title="Ver informações" src="../crud/imagens/<?php echo $usuario['imagem']; ?>"onclick ="OpenInfosUsers(<?php echo $usuario['id_usuarios']; ?>)" class="user" width="40px"/>

                <div class="infos_users" id="<?php echo $usuario['id_usuarios']; ?>">
                <?php if(isset($usuario['nome']))?>
                    <li><img src="../css/icones/menu-perfil.png"/><strong><?php echo $usuario['nome'];?></strong></li>
                    <li><?php echo $usuario['profissao']; ?></li>
                    <li><img src="../css/icones/competencias.png"/><?php echo $usuario['competencias'];?></li>
                </div>
            </div>
        <?php
        }

?>

