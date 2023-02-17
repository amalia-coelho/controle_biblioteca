<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!-- links -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- config da página -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8">
	<title>tb_autor</title>

	<!-- jquery link -->
	<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("button").click(function(){
				var idioma = $("#idioma").val();
				$.ajax({
				url: "php/script_idioma.php",
				type: "POST",
				data: "idioma="+idioma,
				dataType: "html"

				}).done(function(resposta){
					$("#resposta").html(resposta);
					$("input").val(" ");

					}).fail(function(jqXHR, textStatus ) {
					    console.log("Request failed: " + textStatus);
					});
			});
		});
	</script>
</head>
<body>
	<div class="center">
		<div class="split">
			<div class="menu">
				<div class="options">
					<a href="#">tb_autor</a>
					<a href="#">tb_coletanea</a>
					<a href="#">tb_editora</a>
					<a href="#">tb_genero</a>
					<a href="#">tb_genero_livro</a>
					<a href="#">tb_genero_usuario</a>
					<a href="#">tb_idioma</a>
					<a href="#">tb_livro</a>
					<a href="#">tb_livro_autor</a>
					<a href="#">tb_livro_idioma</a>
					<a href="#">tb_livro_usuario</a>
					<a href="#">tb_nivel</a>
					<a href="#">tb_status_livro</a>
					<a href="#">tb_sugestao</a>
					<a href="#">tb_tipo</a>
					<a href="#">tb_usuario</a>
				</div><!-- options -->
			</div><!-- menu -->
			<div class="content">
				<div class="form">
					<div class="input">
					 	<p>Idioma:</p>
					 	<input type="text" class="input_medio" id="idioma">
					</div>
				 	<div class="button">
						<button type="submit" id="enviar">Enviar</button>
				 	</div>
				</div>
				<div class="exibir">
					Registros:
					<div id="resposta"></div>
				</div>
			</div><!-- content -->
		</div><!-- split -->
	</div><!-- center -->
</body>
</html>