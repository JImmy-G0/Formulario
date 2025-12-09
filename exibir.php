<?php
session_start();
require_once 'conexao.php';

// Verifica se há pesquisa
$busca = "";
if (isset($_GET['buscar']) && $_GET['buscar'] != "") {
    $busca = mysqli_real_escape_string($conexao, $_GET['buscar']);
    $sql = "SELECT * FROM alunos 
            WHERE nome_completo LIKE '%$busca%' 
            ORDER BY nome_completo ASC";
} else {
    $sql = "SELECT * FROM alunos ORDER BY nome_completo ASC";
}

$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<?php include('nav.php'); ?>

<div class="container mt-5">

    <h2 class="mb-4 text-center">Informações dos Alunos</h2>

    <!-- =============================== -->
    <!--         CAMPO DE PESQUISA       -->
    <!-- =============================== -->
    <form method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="buscar" 
                   class="form-control" 
                   placeholder="Pesquisar aluno por nome..."
                   value="<?= $busca; ?>">

            <button class="btn btn-primary">Pesquisar</button>
            
            <?php if ($busca != ""): ?>
                <a href="exibir.php" class="btn btn-secondary">Limpar</a>
            <?php endif; ?>
        </div>
    </form>

    <div class="card shadow">
        <div class="card-body">

            <?php if (mysqli_num_rows($result) > 0): ?>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>Nascimento</th>
                            <th>Endereço</th>
                            <th>Responsável</th>
                            <th>Curso</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($aluno = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $aluno['nome_completo']; ?></td>
                                <td><?= date('d/m/Y', strtotime($aluno['data_nascimento'])); ?></td>

                                <td>
                                    <?= $aluno['rua']; ?><br>
                                    Nº <?= $aluno['numero']; ?><br>
                                    Bairro: <?= $aluno['bairro']; ?><br>
                                    CEP: <?= $aluno['cep']; ?>
                                </td>

                                <td>
                                    <?= $aluno['nome_responsavel']; ?><br>
                                    <strong><?= $aluno['tipo_responsavel']; ?></strong>
                                </td>

                                <td><?= $aluno['curso']; ?></td>

                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">

                                        <a href="tela_editar.php?id=<?= $aluno['id']; ?>" 
                                        class="btn btn-primary btn-sm w-100">
                                            Editar
                                        </a>

                                        <a href="deletar.php?id=<?= $aluno['id']; ?>"
                                        class="btn btn-danger btn-sm w-100"
                                        onclick="return confirm('Tem certeza que deseja excluir este aluno?');">
                                            Excluir
                                        </a>

                                    </div>
                                    
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>

                </table>

            <?php else: ?>
                <div class="alert alert-warning text-center">
                    Nenhum aluno encontrado.
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>