<?php
$exibir = "";
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_livro_idioma (id_livro, id_idioma) VALUES(:livro, :idioma)');
    $stmt->execute(array(
        ':livro' => $_POST['id_livro'],
        ':idioma' => $_POST['id_idioma']
    ));

    $sql = 'SELECT * FROM tb_livro_idioma';
    foreach ($conn->query($sql) as $row) {
        $exibir .= $row['cd_livro_idioma']." - ".$row['id_livro']." - ".$row['id_idioma']."<br>";
    }
    echo $exibir;
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    echo "<br>".$stmt->rowCount();
}
?>