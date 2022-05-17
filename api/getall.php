<?php

require("../conexao.php");

    $method = strtolower($_SERVER['REQUEST_METHOD']);
    if($method === 'get'){
        $sql = $db->prepare("SELECT * FROM notes WHERE id = 1");
        $sql->execute();
        if($sql->rowCount() > 0){
           $data = $sql->fetchAll(PDO::FETCH_ASSOC);
          
           foreach($data as $items){
             $array['result'][] = [
                 'id' => $items['id'],
                 'body' => $items['body'],
                 'data' => $items['data_criacao']
             ];
           }
        }
    } else {
        $array['error'] = 'Metodo nao permitido (apenas GET)!';
    }


require("../return.php");