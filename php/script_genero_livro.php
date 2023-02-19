<?php
$exibir="";
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_genero_livro (id_genero, id_livro) VALUES(:genero, :livro)');
    $stmt->execute(array(
        ':genero' => $_POST['id_genero'],
        ':livro' => $_POST['id_livro']
    ));

    $sql = 'SELECT * FROM tb_genero_livro';
    foreach ($conn->query($sql) as $row) {
        $exibir .= $row['cd_genero_livro']." - ".$row['id_genero']." - ".$row['id_livro']."<br>";
    }
    echo $exibir;
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    echo "<br>".$stmt->rowCount();
}
?>