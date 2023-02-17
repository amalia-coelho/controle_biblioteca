<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!-- links -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- config da página -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8">
	<title>tb_livro_idioma</title>

	<!-- jquery link -->
	<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("button").click(function(){
				var id_livro = $("#id_livro").val();
				var id_idioma = $("#id_idioma").val();
				$.ajax({
				url: "php/script_livro_idioma.php",
				type: "POST",
				data: "id_livro="+id_livro+"&id_idioma="+id_idioma,
				dataType: "html"

				}).done(function(resposta){
					$("#resposta").html(resposta);

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
						<p>ID_livro</p>
						<select id="id_livro">
							<option>ID_livro</option>
						 	<?php 
				 				require('php/conecta.php');
				 				$option = "";
					 			$sql = 'SELECT * FROM tb_livro';
								foreach ($conn->query($sql) as $row){
									$option .= "<option value='".$row['cd_livro']."'>".$row['nm_livro']."</option>";
								}	
								echo $option;
					 		?>
						</select>
					</div>
					<div class="input">
					 	<p>ID Idioma:</p>
					 	<select id="id_idioma">
					 		<option>ID_idioma</option>
						 	<?php 
				 				require('php/conecta.php');
				 				$options = "";
					 			$sql = 'SELECT * FROM tb_idioma';
								foreach ($conn->query($sql) as $row){
									$options .= "<option value='".$row['cd_idioma']."'>".$row['nm_idioma']."</option>";
								}	
								echo $options;
					 		?>
					 	</select>
					</div>
				 	<div class="button">
						<button type="submit" id="enviar">Enviar</button>
				 	</div>
				</div>
				<div class="exibir">
					Registros:
					<div id="resposta">
						
					</div>
				</div>
			</div><!-- content -->
		</div><!-- split -->
	</div><!-- center -->
</body>
</html>