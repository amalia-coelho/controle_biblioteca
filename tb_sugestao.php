<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!-- links -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- config da página -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8">
	<title>tb_livro</title>

	<!-- jquery link -->
	<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("button").click(function(){
				var livro = $("#ds_livro").val();
				var usuario = $("#id_usuario").val();
				var isbn = $("#nr_isbn").val();
				var curtidas = $("#curtidas").val();
				var descurtidas = $("#descurtidas").val();

				$.ajax({
				url: "php/script_sugestao.php",
				type: "POST",
				data: "livro="+livro+"&usuario="+usuario+"&isbn="+isbn+"&curtidas="+curtidas+"&descurtidas="+descurtidas,

				}).done(function(resposta){
					console.log("ajax funfou");

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
						<p>Descrição do Livro:</p>
						<textarea cols="24" rows="10" id="ds_livro" placeholder="Diga um pouco sobre o livro..."></textarea>
					</div>
					<div class="input">
						<p>ISBN:</p>
						<input type="number" class="input_medio" id="nr_isbn">
					</div>
					<div class="input">
						<p>ID Usuario: </p>
						<select id="id_usuario">
							<option>ID_usuario</option>
							<?php 
				 				require('php/conecta.php');
				 				$option = "";
					 			$sql = 'SELECT * FROM tb_usuario';
								foreach ($conn->query($sql) as $row){
									$option .= "<option value='".$row['cd_usuario']."'>".$row['nm_usuario']."</option>";
								}	
								echo $option;
					 		?>
						</select>
					</div>
					<div class="input">
						<p>Curtidas:</p>
						<input type="number" class="input_medio" id="curtidas">
					</div>
					<div class="input">
						<p>Descurtidas:</p>
						<input type="number" class="input_medio" id="descurtidas">
					</div>
				 	<div class="button">
						<button type="submit" id="enviar">Enviar</button>
				 	</div>
				</div><!-- form -->
			</div><!-- content -->
		</div><!-- split -->
	</div><!-- center -->
</body>
</html>