<?php
session_start();
require_once 'conexao.php';

/*CONSULTAS*/

/* Responsáveis */
$q = mysqli_query($conexao,"
    SELECT tipo_responsavel, COUNT(*) AS qtd
    FROM alunos
    GROUP BY tipo_responsavel
    ORDER BY qtd DESC
");
while ($r = mysqli_fetch_assoc($q)) {
    $labelsResponsaveis[] = $r['tipo_responsavel'];
    $valoresResponsaveis[] = $r['qtd'];
}

/* Idade x Bairro */
$q = mysqli_query($conexao,"
    SELECT bairro,
           TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) AS idade,
           COUNT(*) AS qtd
    FROM alunos
    GROUP BY bairro, idade
    ORDER BY bairro, idade
");
while($r = mysqli_fetch_assoc($q)) {
    $labelsIdadeBairro[] = "{$r['bairro']} - {$r['idade']} anos";
    $valoresIdadeBairro[] = $r['qtd'];
}

/* Idade média por bairro */
$q = mysqli_query($conexao,"
    SELECT bairro,
           AVG(TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE())) AS idade_media
    FROM alunos
    GROUP BY bairro
    ORDER BY idade_media DESC
");
while($r = mysqli_fetch_assoc($q)) {
    $labelsMediaIdade[] = $r['bairro'];
    $valoresMediaIdade[] = round($r['idade_media'], 1);
}

/* Top 5 bairros */
$q = mysqli_query($conexao,"
    SELECT bairro, COUNT(*) AS qtd
    FROM alunos
    GROUP BY bairro
    ORDER BY qtd DESC
    LIMIT 5
");
while($r = mysqli_fetch_assoc($q)) {
    $labelsTop5[] = $r['bairro'];
    $valoresTop5[] = $r['qtd'];
}

/* Totais */
$total = mysqli_fetch_assoc(
    mysqli_query($conexao, "SELECT COUNT(*) AS total FROM alunos")
)['total'];

/* Por curso */
$q = mysqli_query($conexao,"
    SELECT curso, COUNT(*) AS qtd
    FROM alunos
    GROUP BY curso ORDER BY curso
");
while ($r = mysqli_fetch_assoc($q)) {
    $labelsCursos[] = $r['curso'];
    $valoresCursos[] = $r['qtd'];
}

/* Curso mais cadastrado */
$cursoMaisCadastrado = mysqli_fetch_assoc(
    mysqli_query($conexao,"
        SELECT curso
        FROM alunos
        GROUP BY curso
        ORDER BY COUNT(*) DESC
        LIMIT 1
    ")
)['curso'];

/* Por bairro */
$q = mysqli_query($conexao,"
    SELECT bairro, COUNT(*) AS qtd
    FROM alunos
    GROUP BY bairro
    ORDER BY bairro
");
while ($r = mysqli_fetch_assoc($q)) {
    $labelsBairros[] = $r['bairro'];
    $valoresBairros[] = $r['qtd'];
}

/* Bairro mais cadastrado */
$bairroMaisCadastrado = mysqli_fetch_assoc(
    mysqli_query($conexao,"
        SELECT bairro FROM alunos
        GROUP BY bairro ORDER BY COUNT(*) DESC LIMIT 1
    ")
)['bairro'];

/* Idades */
$q = mysqli_query($conexao,"
    SELECT TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) AS idade,
           COUNT(*) AS qtd
    FROM alunos
    GROUP BY idade ORDER BY idade
");
while ($r = mysqli_fetch_assoc($q)) {
    $labelsIdade[] = $r['idade'] . ' anos';
    $valoresIdade[] = $r['qtd'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Painel de Alunos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.small-card{min-height:130px;padding:15px;text-align:center;}
.small-chart-card{padding:15px;min-height:260px;}
canvas{max-height:180px!important;}
</style>
</head>
<body>

<?php include('nav.php'); ?>

<div class="container mt-4">
    <div class="row g-3">

        <div class="col-md-4">
            <div class="card shadow small-card">
                <h6>Total de Alunos</h6>
                <h3 class="text-primary fw-bold"><?= $total ?></h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow small-card">
                <h6>Curso com mais cadastros</h6>
                <h4 class="text-success fw-bold"><?= $cursoMaisCadastrado ?></h4>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow small-card">
                <h6>Bairro com mais cadastros</h6>
                <h4 class="text-warning fw-bold"><?= $bairroMaisCadastrado ?></h4>
            </div>
        </div>

    </div>
</div>

<div class="container mt-4">
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow small-chart-card">
                <h6 class="text-center">Alunos por Curso</h6>
                <canvas id="graficoCurso"></canvas>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow small-chart-card">
                <h6 class="text-center">Alunos por Bairro</h6>
                <canvas id="graficoBairro"></canvas>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow small-chart-card">
                <h6 class="text-center">Comparativo por Idade</h6>
                <canvas id="graficoComparativoIdade"></canvas>
            </div>
        </div>

    </div>
</div>

<div class="container mt-4">
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow small-chart-card">
                <h6 class="text-center">Responsáveis Mais Comuns</h6>
                <canvas id="graficoResponsaveis"></canvas>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow small-chart-card">
                <h6 class="text-center">Idade média por bairro</h6>
                <canvas id="graficoBairrosMaisVelhos"></canvas>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow small-chart-card">
                <h6 class="text-center">Bairros com Mais Alunos</h6>
                <canvas id="graficoTop5Bairros"></canvas>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
new Chart(graficoCurso,{type:'pie',data:{labels:<?=json_encode($labelsCursos)?>,datasets:[{data:<?=json_encode($valoresCursos)?>,backgroundColor:['#0d6efd','#198754','#ffc107','#dc3545','#6610f2','#6c757d']}]}});
new Chart(graficoBairro,{type:'bar',data:{labels:<?=json_encode($labelsBairros)?>,datasets:[{label:'Total',data:<?=json_encode($valoresBairros)?>,backgroundColor:'#0d6efd'}]},options:{scales:{y:{beginAtZero:true}}}});
new Chart(graficoComparativoIdade,{type:'doughnut',data:{labels:<?=json_encode($labelsIdade)?>,datasets:[{data:<?=json_encode($valoresIdade)?>,backgroundColor:['#0d6efd','#198754','#ffc107','#dc3545','#6610f2','#6c757d','#20c997','#fd7e14']}]}});
new Chart(graficoResponsaveis,{type:'doughnut',data:{labels:<?=json_encode($labelsResponsaveis)?>,datasets:[{data:<?=json_encode($valoresResponsaveis)?>,backgroundColor:['#0d6efd','#198754','#ffc107','#dc3545','#6610f2','#6c757d','#20c997','#fd7e14']}]}});
new Chart(graficoBairrosMaisVelhos,{type:'line',data:{labels:<?=json_encode($labelsMediaIdade)?>,datasets:[{label:'Idade média',data:<?=json_encode($valoresMediaIdade)?>,borderColor:'#dc3545',backgroundColor:'#dc354580',tension:.3}]}});
new Chart(graficoTop5Bairros,{type:'doughnut',data:{labels:<?=json_encode($labelsTop5)?>,datasets:[{data:<?=json_encode($valoresTop5)?>,backgroundColor:['#0d6efd','#198754','#ffc107','#dc3545','#6610f2']}]}});
</script>

</body>
</html>