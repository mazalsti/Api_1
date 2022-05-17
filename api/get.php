<?php

require('../conexao.php');
    $method = strtolower($_SERVER['REQUEST_METHOD']);
    if($method === "get"){

        $id = filter_input(INPUT_GET, 'id');
        if($id){
            $sql = $db->prepare("SELECT * FROM notes WHERE id =:id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            if($sql->rowCount() > 0){
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $array['result'][] = [
                    'id' => $data['id'],
                    'body' => $data['body'],
                    'data' => $data['data_criacao']
                ];
            }

        } else{
            $array['error'] = "ID nao enviado!";
        }
    } else {
        $array['error'] = "Metodo nao permitido (apena GET)!";
    }

require('../return.php');