<?php
//Conexao do banco de dados
function conectar(){
    $pdo = new PDO('mysql:host=localhost:3307;dbname=site_agenda', 'root', '') or die("Não foi possível conectar");
    return $pdo;


}
?>