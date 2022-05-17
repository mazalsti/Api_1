<?php
 header("Access-Control-Allow-Origin: *"); // permitindo minha conexao com servidor de api
 header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); //permitindo todos os metedos de conexao
 header("Content-Type: application/json"); // permitindo o tipo JSON a ser lido, 
 echo json_encode($array);
 exit;