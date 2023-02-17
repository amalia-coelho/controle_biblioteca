<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!-- links -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<!-- config da página -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8">
	<title>tb_autor</title>

	<!-- jquery link -->
	<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#enviar").click(function(){
				var nm_autor = $("#nm_autor").val();
				$.ajax({
				url: "php/script_autor.php",
				type: "POST",
				data: "nm_autor="+nm_autor,
				dataType: "html"

				}).done(function(resposta) {
	    			$("tbody").html(resposta);
	    			$("#nm_autor").val(" ");
					
					}).fail(function(jqXHR, textStatus ) {
					    console.log("Request failed: " + textStatus);
					});
			});
		});
	</script>
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastroModal">Adicionar cadastro</button>

					<!-- Modal -->
					<div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
					    			<h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro</h1>
					    			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					    		</div><!-- modal-header -->
						    	<div class="modal-body">
						      		<p>Nome do Autor: </p>
						      		<input type="text" id="nm_autor" class="input_medio">
						    	</div><!-- modal-body-->
						      	<div class="modal-footer">
						        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						        	<button type="button" class="btn btn-success" id="enviar">Enviar</button>
						      	</div><!-- modal-footer -->
					   		</div><!-- modal-content --> 
					  	</div><!-- modal-dialog -->
					</div><!-- modal -->
				</div><!-- form -->
				<div class="exibir">
					<table>
						<thead>
							<tr>
								<th>cd_autor</th>
								<th>nm_autor</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div><!-- content -->
		</div><!-- split -->
	</div><!-- center -->
</body>
</html>