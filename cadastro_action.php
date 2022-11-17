<?php
require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);

if($nome && $email){
    
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0){
        
        $sql = $pdo->prepare("INSERT INTO usuario (nome, email) VALUES (:nome,:email)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email',$email);
        $sql->execute();
        
        header("Location: index1.php");
        exit;
    }else{
        header("Location: cadastro.php");
    }

}else{
    header("Location: cadastro.php");
    exit;
}


