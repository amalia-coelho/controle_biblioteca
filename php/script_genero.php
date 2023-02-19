<?php
$exibir = "";
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_genero (nm_genero) VALUES(:nome)');
    $stmt->execute(array(
        ':nome' => $_POST['nm_genero']
    ));

    $sql = 'SELECT * FROM tb_genero';
    foreach ($conn->query($sql) as $row) {
        $exibir .= $row['cd_genero']." - ".$row['nm_genero']."<br>";
    }
    echo $exibir;


} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    echo "<br>".$stmt->rowCount();
}
?>