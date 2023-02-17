<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!-- links -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- config da página -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8">
	<title>tb_genero_usuario</title>

	<!-- jquery link -->
	<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("button").click(function(){
				var id_genero = $("#id_genero").val();
				var id_usuario = $("#id_usuario").val();
				$.ajax({
				url: "php/script_genero_usuario.php",
				type: "POST",
				data: "id_genero="+id_genero+"&id_usuario="+id_usuario,
				dataType: "html"

				}).done(function(resposta){
					$("#resposta").html(resposta);

					}).fail(function(jqXHR, textStatus) {
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
					 	<p>ID Gênero:</p>
					 	<select id="id_genero">
					 		<option>ID_genero</option>
						 	<?php 
				 				require('php/conecta.php');
				 				$option = "";
					 			$sql = 'SELECT * FROM tb_genero';
								foreach ($conn->query($sql) as $row){
									$option .= "<option value='".$row['cd_genero']."'>".$row['nm_genero']."</option>";
								}
							echo $option;
				 			?>
					 	</select>
					</div>
					<div class="input">
					 	<p>ID Usuário:</p>
					 	<select id="id_usuario">
					 		<option>ID_usuario</option>
					 	<?php 
			 				require('php/conecta.php');
			 				$options = "";
				 			$sql = 'SELECT * FROM tb_usuario';
							foreach ($conn->query($sql) as $row){
								$options .= "<option value='".$row['cd_usuario']."'>".$row['nm_usuario']."</option>";
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