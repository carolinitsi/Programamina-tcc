<div class="container_banco-slider">
<?php 
        include_once("../crud/funcoes.php");
        $query = "SELECT usuarios.id_usuarios,usuarios.nome,usuarios.imagem,usuarios.competencias, COUNT(likes.id_post) FROM likes , usuarios,posts where posts.id_posts = likes.id_post and posts.id_usuario = usuarios.id_usuarios GROUP BY usuarios.id_usuarios ORDER BY COUNT(likes.id_post) DESC";
        $resultados = fazConsulta($query,'fetchAll');
        foreach($resultados as $resultado){
    ?>
 
            <div class="banco_card">
                <img class="banco_card-image" src="../crud/imagens/<?php echo $resultado['imagem']; ?>" />
                <div class="banco_card-infos">
                    <button class="banco_card-nome" onclick="modal_user(<?php echo $resultado['id_usuarios']; ?>)"><?php echo $resultado['nome']; ?></button>
                    <p class="banco_card-competencias"><?php echo $resultado['competencias']; ?></p>
                    <p><form method="get" action="chat.php"><button class="banco_card-mensagem" name="id" value="<?php echo $resultado['id_usuarios']; ?>"><span class="icon_mensagem"></span>Mensagem</button></form></p>

                </div>
            </div>

    <?php
        }
    ?>
</div>
<button class="banco_bt" onclick=carregar_bancotalentos()>Acessar banco de talentos completo</button>


<script src="../Js/modal.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script type="text/javascript" src="../slick-1.8.1/slick/slick.js"></script>
        <script>
        $('.container_banco-slider').slick({
            centerPadding: '5px',
            slidesToShow: 5,
            dots:true,
            arrows: true,
            // centerMode: true,
            // infinity:true,
            responsive: [
            {
            breakpoint: 992,
            settings: {
                slidesToShow: 4, 
                centerPadding: '15px', 
            }
            },{
            breakpoint: 768,
            settings: {
                slidesToShow: 3,  
            }

            }]
        });
    </script>
