<?php 
    if(!$_SESSION['logado'])
    {
	    header('location:index.html');
    }

    ini_set('display_errors', 0 );
    error_reporting(0);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="..css/estilo.css">
<link rel="stylesheet" type="text/css" href="..css/modal.css">
<link rel="stylesheet" type="text/css" href="../css/reset.css">
<link rel="stylesheet" type="text/css" href="../css/base.css">
<link rel="stylesheet" type="text/css" href="../css/cabecalho.css">
<link rel="stylesheet" type="text/css" href="../css/editar-perfil.css">
<link rel="stylesheet" type="text/css" href="../css/editar-post.css">
<link rel="stylesheet" type="text/css" href="../css/responsivo-editPerfil.css">
<link rel="stylesheet" type="text/css" href="../css/like.css">
<link rel="stylesheet" type="text/css" href="../css/darkmode.css">
<link rel="stylesheet" type="text/css" href="../css/barra-acessibilidade.css">
<link rel="stylesheet" type="text/css" href="../css/modal-edit-post.css">
<link rel="stylesheet" type="text/css" href="../css/chat.css">




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="../js/input.js"></script>
<script src="../js/previewimage.js"></script>
<script src="../js/darkmode.js"></script>
<script src="../js/online.js"></script>
<script src="../js/chat.js"></script>
<script src="../Js/openModalPerfil.js"></script>
<script src="../Js/atualizaScrollChat.js"></script>





<link rel="stylesheet" type="text/css" href="../css/estilo-posts.css">
<link rel="stylesheet" type="text/css" href="../css/cabecalho.css">
<link rel="stylesheet" type="text/css" href="../css/modal.css">
<link rel="stylesheet" type="text/css" href="../css/rodape.css">
<link rel="stylesheet" type="text/css" href="../css/base.css">
<link rel="stylesheet" type="text/css" href="../css/secao-novo-post.css">
<link rel="stylesheet" type="text/css" href="../css/responsivo-inicio.css">
<link rel="stylesheet" type="text/css" href="../css/article-user.css">
<link rel="sortcut icon" type="image/x-icon" href="../css/icones/pc.png">
<link href="../css/emoji.css" rel="stylesheet">



  <!-- ** Don't forget to Add jQuery here ** -->
  
    
        <!-- <div class="bts_cabecalho">
            <form action="../crud/logica_usuario.php" method="POST" > <button type="submit" class="bt_sair" id="sair" name="sair" value=""></button></form>               
            <form action="../crud/editar-perfil.php" method="POST" > <button  type="submit" class="bt_editar_perfil" id="" name="editar" value="editar" alt="Editar"></button></form>               
        </div> -->
