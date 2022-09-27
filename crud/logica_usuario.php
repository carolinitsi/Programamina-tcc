<?php

ini_set('display_errors', 0 );
error_reporting(0);

 include_once("funcoes.php");
 session_start();

#EDITAR PERFIL EMAIL

 if(isset($_POST['editar_perfil'])){
    $id     = $_SESSION['id'];
    $email  = $_POST['email'];
    $nome   = $_POST['nome'];
    $profissao   = $_POST['profissao'];
    $competencias   = $_POST['competencias'];
        
    $query = " UPDATE usuarios SET email = ?, nome = ? , profissao = ?, competencias = ? WHERE id_usuarios = $id ";
    $array = array($email, $nome, $profissao, $competencias);
    $usuario=fazConsulta($query,'query',$array);
    if($usuario)
    {
        //ENVIA EMAIL.
        // $email_destinatario = $email;
        // $email_remetente    = "programamina@gmail.com";
        // $mensagem = "Email alterado com sucesso!";
        // $assunto = "ProgramaMina";

        // enviacontato($email_destinatario, $email_remetente, $mensagem, $assunto);
        // $_SESSION['email'] = $email;
        $_SESSION['msg']= "<span id='sucesso'><img style='width: 20px;' src='../css/icones/sucesso.png'/> Informações aualizadas com sucesso!</span>";
        header('location: editar-perfil.php');
    }
    else
    {
        $_SESSION['msg']= "<span id='error' style='color='red';'><img style='width: 20px;' src='../css/icones/error-.png'/> OPS! Não foi possivel atualizar suas informações</span>";
        header('location:./editar-perfil.php');
    }

}

#EDITAR PERFIL FOTO

if(isset($_POST['editar_foto_perfil'])){
    $id     = $_SESSION['id'];
    $teste = $_REQUEST['file']; 
    $file  = upload($teste);
    
    $query = " UPDATE usuarios SET imagem = ? WHERE id_usuarios = $id ";
    $array = array($file);
    $usuario=fazConsulta($query,'query',$array);
    if($usuario)
    {
        $_SESSION['msg']= "<span id='sucesso'><img style='width: 20px;' src='../css/icones/sucesso.png'/> Imagem alterada com sucesso!</span>";
        header('location: editar-perfil.php');
    }
    else
    {
        $_SESSION['msg']= "<span id='error' style='color='red';'><img style='width: 20px;' src='../css/icones/error-.png'/> OPS! Não foi possivel atualizar sua foto de perfil!</span>";
        header('location:./editar-perfil.php');
    }

}
#EDITAR POST

if(isset($_POST['editar_post'])){
    $id       = $_SESSION['id'];
    $id_post  = $_POST['id_post'];
    $assunto  = $_POST['assunto'];
    $post     = $_POST['post'];
    $data     = date("d/m/Y h:i:s");
    $imagem   =  $_POST['file'];
    $file     = upload($imagem);
  
    $query    = "UPDATE posts SET  post = ?, assunto = ?, imagem_post = ? WHERE id_posts = $id_post ";
    $array    = array($post,$assunto,$file);
    $usuario  = fazConsulta($query,'query',$array);
    if($usuario)
    {
        $_SESSION['msg_edicao--post']= "Edição salva!";
        header('location:../edicao_concluida.html');
    }
    else
    {
        $_SESSION['msg']= "Ops, não foi possível editar o seu post!";
        header('location:../php/pg_editar_post.php'); 
    }
}

#POSTAR

 if(isset($_POST['postar'])){
    $assunto    = $_POST['assunto'];
    $post       = $_POST['post'];
    $id_usuario = $_SESSION['id'];
    $imagem = $_SESSION['file'];
    $data       = date("d/m/Y h:i");
    
    $file  = upload($imagem);
    
    $query = "insert into posts (id_usuario, post,assunto,data_post,imagem_post) values (?,?,?,?,?)";
    $array = array($id_usuario,$post, $assunto,$data,$file);
    $usuario=fazConsulta($query,'query',$array);
    if($usuario)
    {
        header('location:../php/inicio.php');
    }
    else
    {
        header('location:../php/inicio.php');
        echo("Erro ao inserir");
        
    }
}

#COMENTAR


if(isset($_POST['comentar'])){
   
    $id_usuario    = $_SESSION['id'];
    $id_post       = $_POST['comentar'];
    $comentario    = $_POST['comentario'];
    $data       = date("d/m/Y h:i:s");
    echo( $id_post);
    
    $query = "insert into comentarios (id_usuario,id_post,comentario,data_comentario) values (?,?,?,?)";
    $array = array($id_usuario, $id_post, $comentario,$data);
    $usuario=fazConsulta($query,'query',$array);
    if($usuario)
    {
        header('location:../php/inicio.php');
    }
    else
    {
        echo("Erro ao inserir");
        
    }
}

#CADASTRAR

if(isset($_REQUEST['cadastrar'])){
    $email = $_REQUEST['email'];
    $senha = $_REQUEST['senha'];    
    $senhaEncriptada = base64_encode($senha);
    $teste = $_REQUEST['file'];
    $nome = $_REQUEST['nome']; 
    $profissao = $_REQUEST['profissao'];
    $competencias = $_REQUEST['competencias'];
    $file  = upload($teste);
 
    $query = "SELECT * FROM posts , usuarios where posts.id_usuario = usuarios.id_usuarios ORDER BY posts.id_posts desc";
    $usuarios = fazConsulta($query,'fetchAll');
    foreach($usuarios as $usuario){
        if($email == $usuario['email']){
            $_SESSION['msg']="Ops! Esse endereço de email já foi cadastrado!";
            header('location:../error.html');
            $existe = true;
        } 
    }
    if($existe != true){
        $query = "insert into usuarios (email, senha,imagem,nome,profissao,competencias) values (?,?,?,?,?,?)";
        $array = array($email, $senhaEncriptada,$file,$nome, $profissao, $competencias);
        $usuario=fazConsulta($query,'query',$array);
        if($usuario)
        {
        //     $mensagem="Bem Vindo ".$nome." Seu cadastro foi concluído com sucesso";
		//    $assunto="Cadastro Sistema";

		//    $retorno= enviaEmail($email,$nome,$mensagem,$assunto);
	
		//    $_SESSION["msg"].= "Cadastro Efetuado com sucesso";
            header('location:../cadastro_concluido.html');

        }
        else
        {
            $_SESSION['msg']="Erro ao inserir";
        }
    }
}

#lOGIN

 if (isset($_POST['login']))
 {
    $email = addslashes($_REQUEST['email']);//impede que o sql seja alterado
    $senha = $_REQUEST['senha'];
    $senhaEncriptada = base64_encode($senha);
    $query = "select * from usuarios where email=? and senha=?";
    $array = array($email, $senhaEncriptada);
    $usuario = fazConsulta($query,'fetch',$array);
    if($usuario){
        $_SESSION['logado'] = 'logado';
        $_SESSION['id'] = $usuario['id_usuarios'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['user_nome'] = $usuario['nome'];
        $_SESSION['user_image'] = $usuario['imagem'];
        $_SESSION['pesquisa'] = '';
        $online = true;
        $id = $usuario['id_usuarios'];
        $query  =  "UPDATE usuarios
                    SET user_online = ?
                    WHERE id_usuarios= $id";
        $array    = array($online);
        $usuario  = fazConsulta($query,'query',$array);
        
        // $data=date("d/m/Y h:i:s");
        // $mensagem.="Olá,você acaba de logar em ProgamaMina! Login foi realizado em ".$data;
		// $assunto="Checkin Sistema";
		// $retorno= enviaEmail($email,$mensagem,$assunto);	
        header('location: ../php/inicio.php');
        
    }
    else{
        $_SESSION['msg_login'] = "Ops! Usuário ou Senha Inválidos...";
        header('location: ../php/login.php');
    }
}

#SAIR
if(isset($_REQUEST['sair'])){
    session_destroy();
    $online = false;
    $id = $_SESSION['id'];
    $query  =  "UPDATE usuarios
                SET user_online = ?
                WHERE id_usuarios= $id";
    $array    = array($online);
    $usuario  = fazConsulta($query,'query',$array);
    header('location:../index.html');
}

#ENVIAR MENSAGEM

if (isset($_POST['enviar'])) 
{
    //AQUI DEFINI O ADM DO "SITE", PARAR RECEBE O EMAIL.
    $email_destinatario = "caroline.oliveira1800@gmail.com";
    $email_remetente    = $_POST['email_remetente'];
    $mensagem = $_POST['mensagem'];
    $assunto = ['Contato'];

    enviacontato($email_destinatario, $email_remetente, $mensagem, $assunto);
    header('location:../php/inicio.php');

}


#ALTERAR SENHA

if (isset($_POST['alterar']))
{
   $nova_senha =  base64_encode($_REQUEST['nova_senha']);
   $senha_atual = base64_encode($_REQUEST['senha_atual']);
   $email       = $_SESSION['email'];

  

   $query = "select * from  usuarios where email = ?";
   $array = array($email);
   $usuario=fazConsulta($query,'query',$array);
   foreach($usuario as $usuario){          
        
       if($usuario['senha'] === $senha_atual){
           $query = " UPDATE usuarios SET senha = '$nova_senha' WHERE email = ?";
           $array = array($email);
           $usuario=fazConsulta($query,'query',$array);
           $_SESSION['msg']= "<span id='sucesso'><img style='width: 20px;' src='../css/icones/sucesso.png'/> Senha alterada com sucesso!</span>";
           header('location:editar-perfil.php');
       }   
       else{
           $_SESSION['msg']= "<span id='error' style='color='red';'><img style='width: 20px;' src='../css/icones/error-.png'/> Senha atual não confere!</span>";
           header('location:editar-perfil.php');
       }                                                 
   }
}

#DELETAR

if(isset($_REQUEST['deletar'])){

    $id = $_REQUEST['deletar'];
    echo($id);
    $array=array($id);
    $query = "delete from posts where id_posts = ?";
    $usuario=fazConsulta($query,'query', $array);
    if($usuario)
        {
            $_SESSION['msg']="Publicação deletada com Sucesso";
            header('location:../php/inicio.php');

        }
        else
        {
            $_SESSION['msg']="Erro ao deletar";
            header('location: ../php/inicio.php');
        }
    
}
?>