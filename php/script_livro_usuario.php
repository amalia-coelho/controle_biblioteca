<?php
$exibir = "";
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_livro_usuario (nr_avaliacao_usuario, id_usuario, id_livro, ds_comentario, st_nao_recomendo, id_status_livro, st_favorito) VALUES (:avaliacao, :usuario, :livro, :comentario, :recomendacao, :status, :favorito)');
    $stmt->execute(array(
        ":avaliacao" => $_POST['avaliacao'],
        ":usuario" => $_POST['usuario'],
        ":livro" => $_POST['livro'],
        ":comentario" => $_POST['comentario'],
        ":recomendacao" => $_POST['recomendo'],
        ":status" => $_POST['status_livro'],
        ":favorito" => $_POST['fav']
    ));

    
    $sql = 'SELECT * FROM tb_livro_usuario';
    foreach ($conn->query($sql) as $row) {
        $exibir .= $row['cd_livro_usuario']."<br>";
    }
    echo $autor;
    echo "<br>".$stmt->rowCount();
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>