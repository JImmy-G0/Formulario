<?php
session_start();
require_once 'conexao.php'; // Inclui a conexão com o banco

// Use a variável correta do seu conexao.php
// No seu arquivo conexao.php, a conexão é $conexao, então vamos usar $conexao

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_completo      = mysqli_real_escape_string($conexao, $_POST['nome_completo']);
    $data_nascimento    = mysqli_real_escape_string($conexao, $_POST['data_nascimento']);
    $rua                = mysqli_real_escape_string($conexao, $_POST['rua']);
    $numero             = mysqli_real_escape_string($conexao, $_POST['numero']);
    $bairro             = mysqli_real_escape_string($conexao, $_POST['bairro']);
    $cep                = mysqli_real_escape_string($conexao, $_POST['cep']);
    $nome_responsavel   = mysqli_real_escape_string($conexao, $_POST['nome_responsavel']);
    $tipo_responsavel   = mysqli_real_escape_string($conexao, $_POST['tipo_responsavel']);
    $curso              = mysqli_real_escape_string($conexao, $_POST['curso']);

    $sql = "INSERT INTO alunos (
                nome_completo,
                data_nascimento,
                rua,
                numero,
                bairro,
                cep,
                nome_responsavel,
                tipo_responsavel,
                curso
            ) VALUES (
                '$nome_completo',
                '$data_nascimento',
                '$rua',
                '$numero',
                '$bairro',
                '$cep',
                '$nome_responsavel',
                '$tipo_responsavel',
                '$curso'
            )";

    if (mysqli_query($conexao, $sql)) {
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar: " . mysqli_error($conexao);
    }

    header('Location: painel.php');
    exit;
} else {
    header('Location: cadastro_aluno.php');
    exit;
}
?>