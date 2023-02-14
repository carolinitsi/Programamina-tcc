<?php
        $id = $_SESSION['id'];
        $query = "SELECT * FROM  usuarios where id_usuarios = $id";
        $usuarios = fazConsulta($query,'fetchAll');
        foreach($usuarios as $usuario){          
?>  
<body>
        <div class="secaoPrincipal__infosUser">
            <button class="bt_darkmode" type="submit" name="bt_darkmode" value="" onclick="verificaMode()"> </button>
            <img src="../crud/imagens/<?php echo $usuario['imagem']; ?>" class="secaoPrincipal__infosUser-image" width="50px"/>
            <span class="secaoPrincipal__infosUser nome"><?php echo $usuario['nome']; ?></span>
            <span class="secaoPrincipal__infosUser profissao"><?php echo $usuario['profissao']; ?></span>
            <span class="secaoPrincipal__infosUser competencias"><?php echo $usuario['competencias']; ?></span>
            <ul class="botoes_lateral">
                <li><a  href="../crud/editar-perfil.php" title="Configurações" class="bt_barra-lateral" id="" name="editar" value="editar" alt="Editar"><img class="bt_barra_lateral-img" src="../css/icones/config.png" class="" width=""/> Configurações</a></li>
                <li><button  onclick=carregar_bancotalentos() title="Banco de talentos" class="bt_barra-lateral" id="" name="editar" value="editar" alt="Editar"><img class="bt_barra_lateral-img" src="../css/icones/banco-talentos.png" class="" width=""/> Banco de talentos</button></li>
                <li><a  href="../crud/editar-perfil.php" title="Mensagens" class="bt_barra-lateral" id="" name="editar" value="editar" alt="Editar"><img class="bt_barra_lateral-img" src="../css/icones/chat.png" class="" width=""/> Mensagens</a></li>
                <li style="position:relative;"><a  href="../crud/editar-perfil.php" title="Ver mais" class="bt_barra-lateral" id="" name="editar" value="editar" alt="Editar"><img class="bt_barra_lateral-img" src="../css/icones/menu.png" class="" width=""/> Mais</a></li>
            </ul>
        </div>
<?php 
    } 
?>
        <script src="../js/darkmode.js"></script>
        <script src="../js/ajax.js"></script>  
        <script>
            window.onload = function(){ 
    console.log("carregou");

    if (localStorage.ativaDarkMode === "true") {
            darckmode();
            console.log("darkmode");
    }
}
        </script>  

</body>
<!-- <div class="mais_opcoes">
    <ul class="botoes_lateral">
        <li><a  href="../crud/editar-perfil.php" title="Configurações" class="bt_barra-lateral" id="" name="editar" value="editar" alt="Editar"><img src="../css/icones/config.png" class="" width=""/> Alterar mode</a></li>
        <li><a  href="../crud/editar-perfil.php" title="Banco de talentos" class="bt_barra-lateral" id="" name="editar" value="editar" alt="Editar"><img src="../css/icones/banco-talentos.png" class="" width=""/> Deletar conta</a></li>
    </ul>
</div> -->