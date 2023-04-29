<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Autor</title>

    <!-- Links -->
    <script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
    <script type="text/javascript">
        $("document").ready(function(){
            $("button").click(function(){
                var nm_autor = $("#nm_autor").val();
                $.ajax({
				url: "php/script_autor.php",
				type: "POST",
				data: "nm_autor="+nm_autor,
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
<input type="text" id="nm_autor">
<button type="submit">Enviar</button>
<div class="resposta">
    
</div>
</body>
</html>