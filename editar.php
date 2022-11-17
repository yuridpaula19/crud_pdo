<?php
require 'config.php';

$usuario = [];
$id_usuario = filter_input(INPUT_GET, 'id_usuario');
if($id_usuario){
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario = :id_usuario");
    $sql->bindValue(':id_usuario', $id_usuario);
    $sql->execute();

    if($sql->rowCount() > 0){
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    }else
        header("Location: index1.php");
}else{
    header("Location: index1.php");
}
?>

<h1>Editar Usuário</h1>
<form method="POST"action="editar_action.php">
    <input type="hidden" name="id_usuario" value="<?=$usuario['id_usuario'];?>"/>
    <label>
        <input type="text" name="nome" value="<?=$usuario['nome'];?>"/>
    </label>
    <label>
        <input type="text"name="email" value="<?=$usuario['email'];?>"/>
    </label>
    <input type="submit" value="Atualizar"/>
</form>