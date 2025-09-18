<?php
require_once __DIR__ . '/../src/src_db_Version3.php';
require_once __DIR__ . '/../src/src_Cliente_Version3.php';

$mensagem = '';
// Adicionar cliente
if (isset($_POST['adicionar'])) {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    if ($nome && $email) {
        Cliente::adicionar($pdo, $nome, $email);
        $mensagem = "Cliente adicionado!";
        header("Location: public_index_Version3.php");
        exit();
    }
}

// Editar cliente
if (isset($_POST['editar'])) {
    $id = $_POST['id'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    if ($id && $nome && $email) {
        Cliente::editar($pdo, $id, $nome, $email);
        $mensagem = "Cliente editado!";
    header("Location: public_index_Version3.php");
        exit();
    }
}

// Excluir cliente
if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    Cliente::excluir($pdo, $id);
    $mensagem = "Cliente excluído!";
    header("Location: public_index_Version3.php");
    exit();
}

// Buscar para edição
$clienteEditar = null;
if (isset($_GET['editar'])) {
    $clienteEditar = Cliente::buscarPorId($pdo, $_GET['editar']);
}

$clientes = Cliente::listar($pdo);
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Clientes</title>
    <meta charset="UTF-8">
    <style>
        table {border-collapse: collapse;}
        th, td {border:1px solid #ccc; padding:8px;}
    </style>
</head>
<body>
    <h1>Clientes</h1>
    <?php if ($mensagem) echo "<p><b>$mensagem</b></p>"; ?>
    <table>
        <tr>
            <th>ID</th><th>Nome</th><th>Email</th><th>Ações</th>
        </tr>
        <?php foreach ($clientes as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= htmlspecialchars($c['nome']) ?></td>
            <td><?= htmlspecialchars($c['email']) ?></td>
            <td>
                <a href="?editar=<?= $c['id'] ?>">Editar</a>
                <a href="?excluir=<?= $c['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <hr>
    <h2><?= $clienteEditar ? 'Editar Cliente' : 'Adicionar Cliente' ?></h2>
    <form method="post">
        <?php if ($clienteEditar): ?>
            <input type="hidden" name="id" value="<?= $clienteEditar['id'] ?>">
        <?php endif; ?>
        <input name="nome" placeholder="Nome" value="<?= $clienteEditar['nome'] ?? '' ?>" required>
        <input name="email" placeholder="Email" type="email" value="<?= $clienteEditar['email'] ?? '' ?>" required>
        <button type="submit" name="<?= $clienteEditar ? 'editar' : 'adicionar' ?>">
            <?= $clienteEditar ? 'Salvar Edição' : 'Adicionar' ?>
        </button>
        <?php if ($clienteEditar): ?>
            <a href="index.php">Cancelar</a>
        <?php endif; ?>
    </form>
</body>
</html>