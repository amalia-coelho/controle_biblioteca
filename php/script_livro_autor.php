<?php
$exibir = "";
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_livro_autor (id_livro, id_autor) VALUES(:livro, :autor)');
    $stmt->execute(array(
        ':livro' => $_POST['id_livro'],
        ':autor' => $_POST['id_autor']
    ));

    $sql = 'SELECT * FROM tb_livro_autor';
    foreach ($conn->query($sql) as $row) {
        $exibir .= $row['cd_livro_autor']." - ".$row['id_livro']." - ".$row['id_autor']."<br>";
    }
    echo $exibir;
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    echo "<br>".$stmt->rowCount();
}
?>