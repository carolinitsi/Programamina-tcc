<?php
        $id = $_SESSION['id'];
        $query = "SELECT * FROM  usuarios where id_usuarios = $id";
        $usuarios = fazConsulta($query,'fetchAll');
        foreach($usuarios as $usuario){          
?>  
        <div class="secaoPrincipal__infosUser">
            <img src="../crud/imagens/<?php echo $usuario['imagem']; ?>" class="secaoPrincipal__infosUser-image" width="50px"/>
            <span class="secaoPrincipal__infosUser nome"><?php echo $usuario['nome']; ?></span>
            <span class="secaoPrincipal__infosUser profissao"><?php echo $usuario['profissao']; ?></span>
            <span class="secaoPrincipal__infosUser competencias"><?php echo $usuario['competencias']; ?></span>
            <a  href="../crud/editar-perfil.php" title="Editar perfil" class="bt_editar_perfil" id="" name="editar" value="editar" alt="Editar"><img src="../css/icones/config.png" class="" width=""/></a>
        </div>
<?php 
    } 
?>