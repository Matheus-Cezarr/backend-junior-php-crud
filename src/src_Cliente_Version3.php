<?php
require_once __DIR__ . '/db.php';

class Cliente {
    public static function listar($pdo) {
        $stmt = $pdo->query("SELECT * FROM clientes");
        return $stmt->fetchAll();
    }

    public static function adicionar($pdo, $nome, $email) {
        $stmt = $pdo->prepare("INSERT INTO clientes (nome, email) VALUES (?, ?)");
        return $stmt->execute([$nome, $email]);
    }

    public static function editar($pdo, $id, $nome, $email) {
        $stmt = $pdo->prepare("UPDATE clientes SET nome = ?, email = ? WHERE id = ?");
        return $stmt->execute([$nome, $email, $id]);
    }

    public static function excluir($pdo, $id) {
        $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function buscarPorId($pdo, $id) {
        $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}