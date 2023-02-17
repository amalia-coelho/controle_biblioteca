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
			var disp;
			$("#disp_sim").change(function(){
				disp = $(this).val();
			});

			$("#disp_nao").change(function(){
				disp = $(this).val();
			});
			
			$("button").click(function(){
				var nm_livro = $("#nm_livro").val();
				var nr_paginas = $("#nr_paginas").val();	
				var id_editora = $("#id_editora").val();	
				var dt_lancamento = $("#dt_lancamento").val();	
				var ds_descricao = $("#ds_descricao").val();	
				var ds_imagem = $("#ds_imagem").val();	
				var ds_video = $("#ds_video").val();	
				var ds_audio = $("#ds_audio").val();	
				var ds_sumario = $("#ds_sumario").val();
				var id_coletanea = $("#id_coletanea").val();

				$.ajax({
				url: "php/script_livro.php",
				type: "POST",
				data: "nm_livro="+nm_livro
					+"&nr_paginas="+nr_paginas+
					"&id_editora="+id_editora+
					"&dt_lancamento="+dt_lancamento+
					"&ds_descricao="+ds_descricao+
					"&ds_imagem="+ds_imagem+
					"&ds_video="+ds_video+
					"&ds_audio="+ds_audio+
					"&ds_sumario="+ds_sumario+
					"&id_coletanea="+id_coletanea+
					"&disp="+disp,
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
					 	<p>Nome do Livro:</p>
					 	<input type="text" class="input_medio" id="nm_livro">
					</div>
					<div class="input">
						<p>Núm. de Páginas:</p>
						<input type="number" class="input_medio" id="nr_paginas">
					</div>
					<div class="input">
						<p>Id Editora: </p>
						<select id="id_editora">
							<option checked>ID editora</option>
							<?php 
								require('php/conecta.php');
								$option = "";
								$sql = 'SELECT * FROM tb_editora';
								foreach ($conn->query($sql) as $row){
									$option .= "<option value='".$row['cd_editora']."'>".$row['nm_editora']."</option>";
								}
								echo $option;
							?>
						</select>
					</div>
					<div class="input">
						<p>Data de Lançamento:</p>
						<input type="date" class="input_medio" id="dt_lancamento">
					</div>
					<div class="input">
						<p><input type="radio" name="disp" id="disp_sim" value="sim">Disponivel</p>
						<p><input type="radio" name="disp" id="disp_nao" value="nao">Indisponivel</p>
					</div>
					<div class="input">
						<p>Id Coletanea</p>
						<select id="id_coletanea">
							<option checked>id coletânea</option>
							<?php
								require('php/conecta.php');
								$options = " ";
								$sql = 'SELECT * FROM tb_coletanea';
								foreach ($conn->query($sql) as $row) {
									$options .= "<option value='".$row['cd_coletanea']."'>".$row['nm_coletanea']."</option>";
								}
								echo $options;
							?>
						</select>
					</div>
					<div class="input">
						<p>Descricao</p>
						<textarea cols="25" rows="7" placeholder="Descreva aqui..." id="ds_descricao"></textarea>
					</div>
					<div class="input">
						<p>Sumário</p>
						<textarea cols="25" rows="7" id="ds_sumario"></textarea>
					</div>
					<form enctype="multipart/form-data">
						<div class="input">
							<p>Imagem</p>
							<input type="file" id="ds_imagem">
						</div>
						<div class="input">
							<p>Vídeo</p>
							<input type="file" id="ds_video">
						</div>
						<div class="input">
							<p>Audio</p>
							<input type="file" id="ds_audio">
						</div>
					</form>
				 	<div class="button">
						<button type="submit" id="enviar">Enviar</button>
				 	</div>
				</div><!-- form -->
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