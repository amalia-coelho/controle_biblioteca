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
				var nm_usuario = $("#nm_usuario").val();
				var ds_login = $("#ds_login").val();
				var ds_senha = $("#ds_senha").val();
				var id_nivel = $("#id_nivel").val();
				var dt_nascimento = $("#dt_nascimento").val();
				var ds_imagem = $("#ds_imagem").val();
				var nr_rm = $("#nr_rm").val();

				$.ajax({
				url: "php/script_usuario.php",
				type: "POST",
				data: "nm_usuario="+nm_usuario+"&ds_login="+ds_login+"&ds_senha="+ds_senha+"&id_nivel="+id_nivel+"&dt_nascimento="+dt_nascimento+"&ds_imagem="+ds_imagem+"&nr_rm="+nr_rm,
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
				<div class="form" style="margin-top: 80px;">
					<div class="input">
					 	<p>Nome do Usuário:</p>
					 	<input type="text" class="input_medio" id="nm_usuario">
					</div>
					<div class="input">
						<p>Login:</p>
						<input type="text" class="input_medio" id="ds_login">
					</div>
					<div class="input">
						<p>Senha:</p>
						<input type="text" class="input_medio" id="ds_senha">
					</div>
					<div class="input">
						<p>Id Nivel:</p>
						<select id="id_nivel">
							<option>ID_nivel</option>
							<?php 
				 				require('php/conecta.php');
				 				$option = "";
					 			$sql = 'SELECT * FROM tb_nivel';
								foreach ($conn->query($sql) as $row){
									$option .= "<option value='".$row['cd_nivel']."'>".$row['nm_nivel']."</option>";
								}	
								echo $option;
					 		?>
						</select>
					</div>
					<div class="input">
						<p>Data de Nascimento:</p>
						<input type="date" class="input_medio" id="dt_nascimento">
					</div>
					<div class="input">
						<p>RM:</p>
						<input type="number" class="input_medio" id="nr_rm">
					</div>
					<form enctype="multipart/form-data">
						<div class="input">
							<p>Imagem</p>
							<input type="file" id="ds_imagem">
						</div>
					</form>
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