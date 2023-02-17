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
			// VARIAVEL RECOMENDACAO
			var recomendo;
			$("#recomendacao_sim").change(function(){
				recomendo = $(this).val();
			});

			$("#recomendacao_nao").change(function(){
				recomendo = $(this).val();
			});

			// VARIAVEL FAVORITO
			var favorito;
			$("#fav_sim").change(function(){
				favorito = $(this).val();
			});

			$("#fav_nao").change(function(){
				favorito = $(this).val();
			});
			
			$("button").click(function(){
				var avaliacao = $("#nr_avaliacao").val();
				var livro = $("#id_livro").val();
				var usuario = $("#id_usuario").val();
				var status_livro = $("#id_status_livro").val();
				var comentario = $("#ds_comentario").val();

				$.ajax({
				url: "php/script_livro_usuario.php",
				type: "POST",
				data: "fav="+favorito+"&recomendo="+recomendo+"&avaliacao="+avaliacao+"&livro="+livro+"&usuario="+usuario+"&status_livro="+status_livro+"&comentario="+comentario,
				dataType: "html"

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
						<p>Avaliação:</p>
						<input type="number" class="input_medio" min="0" max="5.0" step="any" id="nr_avaliacao">
					</div>
					<div class="input">
						<p>ID Usuario: </p>
						<select id="id_usuario">
							<option>ID_Usuario</option>
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
						<p>ID Livro:</p>
						<select id="id_livro">
							<option>ID_livro</option>
							<?php 
				 				require('php/conecta.php');
				 				$options = "";
					 			$sql = 'SELECT * FROM tb_livro';
								foreach ($conn->query($sql) as $row){
									$options .= "<option value='".$row['cd_livro']."'>".$row['nm_livro']."</option>";
								}	
								echo $options;
					 		?>
						</select>
					</div>
					<div class="input">
						<p><input type="radio" name="recomendacao" id="recomendacao_sim" value="sim">Recomendo</p>
						<p><input type="radio" name="recomendacao" id="recomendacao_nao" value="nao">Não recomendo</p>
					</div>
					<div class="input">
						<p><input type="radio" name="favorito" id="fav_sim" value="sim">Favoritado</p>
						<p><input type="radio" name="favorito" id="fav_nao" value="nao">Não favoritei</p>
					</div>
					<div class="input">
						<p>Id Status Livro</p>
						<select id="id_status_livro">
							<option>ID_Status_Livro</option>
							<?php
				 				require('php/conecta.php');
				 				$option2 = "";
					 			$sql = 'SELECT * FROM tb_status_livro';
								foreach ($conn->query($sql) as $row){
									$option2 .= "<option value='".$row['cd_status_livro']."'>".$row['ds_status']."</option>";
								}	
								echo $option2;
					 		?>
						</select>
					</div>
					<div class="input">
						<p>Comentário:</p>
						<textarea cols="25" rows="7" placeholder="Comente aqui..." id="ds_comentario"></textarea>
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