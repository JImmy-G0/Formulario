<!-- NAVBAR COMPLETA (Bootstrap 5) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow mb-3">
  <div class="container-fluid">

    <!-- LOGO / NOME -->
    <a class="navbar-brand fw-bold" href="painel.php">
      Home
    </a>

    <!-- BOTÃO HAMBURGUER -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- LINKS -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link fw-semibold" href="cadastro_aluno.php">Cadastro</a>
        </li>

        <li class="nav-item">
          <a class="nav-link fw-semibold" href="exibir.php">Alunos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-danger fw-bold" href="logout.php">Logout</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>