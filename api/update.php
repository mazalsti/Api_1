<?php
require('../conexao.php');
$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'put'){

    parse_str(file_get_contents('php://input'), $input);

    $id = (!empty($input['id'])?$input['id']:null);
    $title = (!empty($input['title'])?$input['title']:null);
    $body = (!empty($input['body'])?$input['body']:null);

    $id = filter_var($id);
    $title = filter_var($title);
    $body = filter_var($body);

    if($id && $title && $body){
        $sql = $db->prepare('SELECT * FROM notes WHERE id=:id');
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $db->prepare("UPDATE notes SET title=:title, body=:body, data_criacao=now() WHERE id=:id");
            $sql->bindValue(':id',$id);
            $sql->bindValue(':title', $title);
            $sql->bindValue(':body',$body);
            $sql->execute();

            $array['result'] = [
                'id' => $id,
                'title' => $title,
                'body' => $body
            ];

        } else {
            $array['error'] = "ID inexistente!";
        }

    } else {
        $sarray['error'] = "Dados nao enviados";
    }

} else {
    $array['error'] = "Metodo nao permitido (apenas PUT)";
}

require('../return.php');