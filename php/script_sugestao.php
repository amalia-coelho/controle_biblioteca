<?php
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_sugestao (ds_livro, nr_isbn, id_usuario, nr_curtida, nr_descurtida) VALUES (:livro, :isbn, :usuario, :curtida, :descurtida)');
    $stmt->execute(array(
        ':livro' => $_POST['livro'],
        ':isbn' => $_POST['isbn'],
        ':usuario' => $_POST['usuario'],
        ':curtida' => $_POST['curtidas'],
        ':descurtida' => $_POST['descurtidas']
    ));

    echo "<br>".$stmt->rowCount();
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>