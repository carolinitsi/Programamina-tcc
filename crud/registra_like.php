<?php 
 include_once("funcoes.php");

        $id_post  =  $_GET['id'];
        $id_user = $_GET['id_user'];
        // echo($id_user);
        $query = "SELECT * FROM likes WHERE id_post = $id_post and id_user = $id_user";
        $usuario = fazConsulta($query,'fetchAll');
            if($usuario){
                echo("ERROR");
            }else{
                $query = "INSERT INTO likes (id_post,id_user) values (?,?)";
                $array = array($id_post, $id_user);
                $usuario=fazConsulta($query,'query',$array);
            }
           
            //  }
            // $query = "SELECT curtidas FROM posts where id_posts = $id";
            // $usuarios = fazConsulta($query,'fetchAll');
            // foreach($usuarios as $usuario){
            //     $curtida = $usuario['curtidas'] +1;
            //     $query =  "UPDATE posts SET curtidas = $curtida WHERE id_posts = $id";
            //     $usuarios = fazConsulta($query,'fetchAll');
            // }
        // $query = "insert into curtidas (id_usuario,id_posts) values (?,?)";
        // $array = array($user, $id);
        // $usuario=fazConsulta($query,'query',$array);
?>