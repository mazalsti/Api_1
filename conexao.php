<?php

const DB_HOST = "localhost";
const DB_NAME = "devnote"; 
const DB_USER = "root";
const DB_PASSWORD = "root";

$db = new PDO("mysql:dbname=".DB_NAME.";host".DB_HOST, DB_USER, DB_PASSWORD);

$array = [
    'error' => '',
    'result' => []
];
