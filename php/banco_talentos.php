<?php
      session_start(); 
      include_once("../crud/funcoes.php");
?>
<link rel="stylesheet" type="text/css" href="../css/banco_talentos.css">
<section class="banco_talentos-container">
    <header class="banco_talentos-header">
        <div class="banco_talentos-headerColor">
        </div>
    </header>
    <div class="banco_talentos-pesquisar">
        <img class="" src="../crud/imagens/<?php echo $_SESSION['user_image'] ?>" />
        <input  id="banco_talentos-input" onkeypress=carregar_cards()  type="text" placeholder="Pesquisar..." class="banco_talentos-input">
        <button title="Pesquisar">Pesquisar</button>
    </div>
    <div id="banco_talentos-cards" class="banco_talentos-cards">
        <?php
            $query = "SELECT * FROM usuarios  where banco_talentos = 0 ORDER BY email desc";
            $usuarios = fazConsulta($query,'fetchAll');

            foreach($usuarios as $usuario){
                    ?>
                        <div class="banco_card">
                        <img class="banco_card-image" src="../crud/imagens/<?php echo $usuario['imagem']; ?>" />
                        <div class="banco_card-infos">
                            <p class="banco_card-nome"><?php echo $usuario['nome']; ?></p>
                            <p class="banco_card-competencias"><?php echo $usuario['competencias']; ?></p>
                            <p><form method="get" action="chat.php"><button class="banco_card-mensagem" name="id" value="<?php echo $usuario['id_usuarios']; ?>"><span class="icon_mensagem"></span>Mensagem</button></form></p>

                        </div>
                    </div>
                <?php
                }
        ?>
    </div>
</section>
<script src="../js/ajax.js"></script>