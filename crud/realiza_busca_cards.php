<body>
    <section class="secao_lista--post" style="margin:0px;">
        <?php 
            ini_set('display_errors', 0 );
            error_reporting(0);
            include_once("funcoes.php");
            session_start();
            #PESQUISAR
                // $user_logado = $_SESSION['id'];
                $pesquisa  =  $_GET['pesquisa'];
                $query = "SELECT * FROM usuarios where competencias like '%$pesquisa%' or nome like '%$pesquisa%' and banco_talentos = 0 ";
                $usuarios = fazConsulta($query,'fetchAll');
                foreach($usuarios as $usuario){          
                    ?>  
                    <div class="banco_card">
                        <img class="banco_card-image" src="../crud/imagens/<?php echo $usuario['imagem']; ?>" />
                        <div class="banco_card-infos">
                            <p class="banco_card-nome"><?php echo $usuario['nome']; ?></p>
                            <?php  
                                    if (strpos($usuario['competencias'], $pesquisa) !== false)  {
                                        ?>
                                        <p class="banco_card-competencias"><?php echo $usuario['competencias']; ?></p>
                                    <?php
                                    } else {
                                        ?>
                                        <p class="banco_card-competencias" style="background:#DD4872;"><?php echo $usuario['competencias']; ?></p>
                                    <?php
                                    }?>
                            <p><form method="get" action="chat.php"><button class="banco_card-mensagem" name="id" value="<?php echo $usuario['id_usuarios']; ?>"><span class="icon_mensagem"></span>Mensagem</button></form></p>
                        </div>
                    </div>
                                                                
                    <?php
                        $contador = 1;  
                }

                if($contador <= 0){
                    include("../php/box_error.php");
                }
                ?> 
    </section> 
</body>
<script src="../ajax.js"></script>
