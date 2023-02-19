<?php
$exibir = "";
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_editora (nm_editora) VALUES(:nome)');
    $stmt->execute(array(
        ':nome' => $_POST['nm_editora']
    ));

    $sql = 'SELECT * FROM tb_editora';
    foreach ($conn->query($sql) as $row) {
        $exibir .= $row['cd_editora']." - ".$row['nm_editora']."<br>";
    }
    echo $exibir;

} catch(PDOException $e) {
    echo "<br>".$stmt->rowCount();
    echo 'Error: ' . $e->getMessage();
}
?>