<?php
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM usuario");
if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h1>Listagem de Usuarios</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php foreach($lista as $usuario): ?>
        <tr>
            <td><?=$usuario['id_usuario'];?></td>
            <td><?=$usuario['nome'];?></td>
            <td><?=$usuario['email'];?></td>
            <td>
                <a href="editar.php?id_usuario=<?=$usuario['id_usuario'];?>">[ Editar ]</a>
                <a href="excluir.php?id_usuario=<?=$usuario['id_usuario'];?>">[ Excluir ]</a>
            </td>
        </tr>

    <?php endforeach; ?>                
</table>
<a href="cadastro.php">Cadastrar Usuário</a>