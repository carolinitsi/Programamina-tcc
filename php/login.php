<?php 
    session_start(); 

    // if(!$_SESSION['logado'])
    // {
	//     header('location:login.php');
    // }else{
    //     header('location:inicio.php');

    // }

    ini_set('display_errors', 0 );
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/base.css">
        <link rel="stylesheet" type="text/css" href="../css/cabecalho.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <link rel="sortcut icon" type="image/x-icon" href="css/icones/pc.png">
        <title>ProgramaMina | Login</title>
    </head>
    <body class="">
        <ul class="header__menu wrapper">
                <li class="header__menu-item">Home</li>
                <li class="header__menu-item">Contato</li>
                <li class="header__menu-item"><a href="php/login.php"> Login </a></li>
        </ul>
        <div class="page-login"> </div>
        <div class="background-effect"> </div>
            <section class="secao__form__login">
                <div class="container__form__login">
                    <div class="container__form__cabecalho">
                        <a class="container__form__arrow" href="../index.html"><img src="../css/icones/arrow-left.png"/></a>
                        <h1>Programa<span>Mina</span></h1>
                    </div>

                    <form class="form__login" action="../crud/logica_usuario.php" method="post"> 
                        <label class="form__login-label" for="email" >Email: </label>
                        <input class="form__login-input" type="text" name="email" id="email" placeholder="email">
                        <label class="form__login-label" for="senha" >Senha: </label>
                        <input class="form__login-input" type="password" name="senha" id="senha" placeholder="senha">
                        <span class="menssagem"> 
                            <font font-family="kiona" color="red">
                                <?php 
                                    session_start();
                                    if (isset($_SESSION['msg_login']))
                                        {
                                            echo $_SESSION['msg_login'];
                                            unset($_SESSION['msg_login']);
                                        }
                                ?> 
                            </font>
                        </span> 
                        <input class="form__login-bt" type="submit" id='login' name='login' value="Login">           
                    </form>     
                </div>
            </section>
</html>


  


