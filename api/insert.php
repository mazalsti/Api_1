<?php
require('../conexao.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if($method === 'post'){
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
      
        if($title && $body){

            // $sql = $db->prepare("INSERT INTO notes SET title=:title, body=:body, data_criacao=now()");
            $sql = $db->prepare("INSERT INTO notes SET  title=:title, body=:body, data_criacao=now()");
            $sql->bindValue(':title', $title);
            $sql->bindValue(':body', $body);
            $sql->execute();

            $id = $db->lastInsertId();

            $array['result'] = [
                'id' => $id,
                'title' => $title,
                'body' => $body
            ];

        } else {
            $array['error'] = "Compos invalido";
        }
    } else{
        $array['error'] = "Metodo nao permitido (apenas POST)";
    }

require('../return.php');