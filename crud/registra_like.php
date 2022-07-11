<?php 
 include_once("funcoes.php");

        $id  =  $_GET['id'];
        // $user = $_GET['user'];
        $curtida = 0;
        $query = "SELECT curtida FROM posts where id_posts = $id";
        $usuarios = fazConsulta($query,'fetchAll');
        foreach($usuarios as $usuario){
            $curtida = $usuario['curtida'] +1;
            $query =  "UPDATE posts SET curtida = $curtida WHERE id_posts = $id";
            $usuarios = fazConsulta($query,'fetchAll');
        }
        // $query = "insert into curtidas (id_usuario,id_posts) values (?,?)";
        // $array = array($user, $id);
        // $usuario=fazConsulta($query,'query',$array);
?>