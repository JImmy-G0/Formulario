<?php
session_start();
require_once 'conexao.php';

// Verifica se recebeu o ID via GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['msg'] = "ID inválido!";
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']); // garante que é número

// Prepara a query de exclusão
$sql = "DELETE FROM alunos WHERE id = ?";
$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['msg'] = "Aluno excluído com sucesso!";
    } else {
        $_SESSION['msg'] = "Erro ao excluir o aluno!";
    }

    mysqli_stmt_close($stmt);
} else {
    $_SESSION['msg'] = "Erro na preparação da consulta!";
}

mysqli_close($conexao);

// Redireciona para a página anterior (listagem)
header("Location: exibir.php");
exit;
