<?php
$exibir = ""; 
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_nivel (nm_nivel) VALUES(:nome)');
    $stmt->execute(array(
        ':nome' => $_POST['nivel']
    ));

    $sql = 'SELECT * FROM tb_nivel';
    foreach ($conn->query($sql) as $row) {
        $exibir .= $row['cd_nivel']." - ".$row['nm_nivel']."<br>";
    }

  echo $exibir;
} catch(PDOException $e) {
    echo "<br>".$stmt->rowCount();
    echo 'Error: ' . $e->getMessage();
}
?>