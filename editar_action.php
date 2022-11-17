<?php
require 'config.php';

$id_usuario = filter_input(INPUT_POST, 'id_usuario');
$nome = filter_input(INPUT_POST,'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($id_usuario && $nome && $email){
    $sql  = $pdo->prepare("UPDATE usuario SET nome = :nome, email = :email WHERE id_usuario = :id_usuario");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':id_usuario', $id_usuario);
    $sql->execute();

    header("Location: index1.php");
    exit;
}else{
    header("Location: index1.php");
    exit;
   
}