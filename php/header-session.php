<?php 
    include("../php/barra_acessibilidade.php");
    session_start(); 

?>
<header class="header__logado">
    <div class="header__logado-conteudo wrapper">
        <div class="box_pesquisa-input">
        <a href="../php/inicio.php"><img src="../css/imagens/logo.png" class="" width="200px" height="40px"/></a>

            <input type="text" title="Pesquisar" required class="pesquisa-input" name="pesquisa" id="pesquisa" placeholder="Pesquisar" />
            <button type="submit" title="Pesquisar" class="pesquisa-bt" name="pesquisar" value="" onclick=carregar_page_busca(<?php $_SESSION['pesquisa'] ?>)></button>
        </div>
        <ul class="header__menu-buttons">
            <li class="header__menu-item" title="Inicio" ><a href="../php/inicio.php" class="bt_home-link" id="" name="" value=""> <img src="../css/icones/home.png"/> Inicio </a></li>
            <li class="header__menu-item modal_perfil" title="Perfil" ><button type="submit" class="bt_perfil" id="perfil" name="perfil" onclick="OpenModalPerfil()"><a class="bt_home-link"><img src="../css/icones/menu-perfil.png"/> Perfil</a></button></li>
            <li class="header__menu-item modal_users" title="Users" >  <button type="submit" class="bt_perfil" id="users"    name="users"  onclick="OpenModalUsers()"><a class="bt_home-link"><img src="../css/icones/menu-perfil.png"/>Usuárias</a></button></li>
            <li class="header__menu-item" title="Sair" ><form action="../crud/logica_usuario.php" method="POST"> <button type="submit" class="bt_sair" id="sair" name="sair" value=""><a class="bt_sair-text">Sair</a></button></form></li>
        </ul>
    </div>
</header>  
<?php 
    include("../php/barra_acessibilidade.php");

?>