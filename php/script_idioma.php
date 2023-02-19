<?php
$exibir = "";
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_idioma (nm_idioma) VALUES(:nome)');
    $stmt->execute(array(
        ':nome' => $_POST['idioma']
    ));

    $sql = 'SELECT * FROM tb_idioma';
    foreach ($conn->query($sql) as $row) {
        $exibir .= $row['cd_idioma']." - ".$row['nm_idioma']."<br>";
    }
    echo $exibir;

} catch(PDOException $e) {
    echo "<br>".$stmt->rowCount();
    echo 'Error: ' . $e->getMessage();
}
?>