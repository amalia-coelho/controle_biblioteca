<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Autor</title>

	<!-- Links -->
	<link rel="stylesheet" href="css/style_cadastro.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">

</head>
<body>
	<header>
		<div class="logo">
			<img src="img/book_logo.png" alt="Logo do site">
		</div>
		<nav>
			<li>
				<ul><a href="#">Cadastro</a></ul>
				<ul><a href="#">Ligações</a></ul>
				<ul><a href="#">Design</a></ul>
			</li>
		</nav>
	</header>
	<div class="center">
		<main>
			<div class="head-main">
				<h2>Cadastro de Autor</h2>
			</div>
			<div class="split-form-exibir">
				<section>
					<div class="input">
						<label>Nome do Autor</label>
						<input type="text" id="nm_autor">
					</div>
					<div class="button-enviar">
						<button type="button" id="enviar">Cadastrar</button>
					</div>
				</section>
				<aside>
					<table>
						<thead>
							<tr>
								<th>Id</th>
								<th>Nome do Autor</th>
							</tr>
						</thead>
						<tbody>
							<!-- local de exibição das informações cadastradas no banco -->
						</tbody>
					</table>
				</aside>
			</div>
		</main>
	</div><!-- center -->
</body>
</html>