<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Cadastro</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include('nav.php'); ?>
<section class="h-100">
	<div class="container h-100">
		<div class="row justify-content-sm-center h-100">
			<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">

				<div class="card shadow-lg">
					<div class="card-body p-5">
						
						<h1 class="fs-4 card-title fw-bold mb-4">Cadastro</h1>

						<form action="salvar.php" method="POST" class="needs-validation" novalidate="" autocomplete="off">

							<!-- Nome Completo -->
							<div class="mb-3">
								<label class="mb-2 text-muted">Nome Completo</label>
								<input type="text" name="nome_completo" class="form-control" required>
								<div class="invalid-feedback">Informe o nome completo</div>
							</div>

							<!-- Data Nascimento -->
							<div class="mb-3">
								<label class="mb-2 text-muted">Data de Nascimento</label>
								<input type="date" name="data_nascimento" class="form-control" required>
								<div class="invalid-feedback">Informe a data</div>
							</div>

							<!-- Endereço - Rua -->
							<div class="mb-3">
								<label class="mb-2 text-muted">Rua</label>
								<input type="text" name="rua" class="form-control" required>
								<div class="invalid-feedback">Informe a rua</div>
							</div>

							<!-- Número + Bairro -->
							<div class="row">
								<div class="col-md-4 mb-3">
									<label class="mb-2 text-muted">Número</label>
									<input type="text" name="numero" class="form-control" required>
									<div class="invalid-feedback">Informe o número</div>
								</div>

								<div class="col-md-8 mb-3">
									<label class="mb-2 text-muted">Bairro</label>
									<input type="text" name="bairro" class="form-control" required>
									<div class="invalid-feedback">Informe o bairro</div>
								</div>
							</div>

							<!-- CEP -->
							<div class="mb-3">
								<label class="mb-2 text-muted">CEP</label>
								<input type="text" name="cep" class="form-control" required>
								<div class="invalid-feedback">Informe o CEP</div>
							</div>

							<!-- Nome do Responsável -->
							<div class="row">
								<div class="col-md-8 mb-3">
									<label class="mb-2 text-muted">Nome do Responsável</label>
									<input type="text" name="nome_responsavel" class="form-control">
								</div>
								<div class="col-md-4 mb-3">
									<label class="mb-2 text-muted">Tipo</label>
									<select name="tipo_responsavel" class="form-control" required>
										<option value="">Selecione</option>
										<option value="Pai">Pai</option>
										<option value="Mãe">Mãe</option>
										<option value="Padrasto">Padrasto</option>
										<option value="Madrasta">Madrasta</option>
										<option value="Avô">Avô</option>
										<option value="Avó">Avó</option>
										<option value="Tio">Tio</option>
										<option value="Tia">Tia</option>
										<option value="Irmão">Irmão</option>
										<option value="Irmã">Irmã</option>
									</select>
								</div>
							</div>

							<!-- Curso -->
							<div class="mb-3">
								<label class="mb-2 text-muted">Curso</label>
								<select name="curso" class="form-control" required>
									<option value="">Selecione</option>
									<option value="Desenvolvimento de Sistemas">Desenvolvimento de Sistemas</option>
									<option value="Informática">Informática</option>
									<option value="Administração">Administração</option>
									<option value="Enfermagem">Enfermagem</option>
								</select>
								<div class="invalid-feedback">Escolha um curso</div>
							</div>

							<!-- Botão -->
							<div class="d-flex align-items-center">
								<button type="submit" class="btn btn-primary ms-auto">
									Cadastrar
								</button>
							</div>

						</form>
					</div>
				</div>

				<div class="text-center mt-5 text-muted">
					Copyright &copy; 2025 — Your Company
				</div>

			</div>
		</div>
	</div>
</section>
</body>
</html>