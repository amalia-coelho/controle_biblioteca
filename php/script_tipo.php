<?php
$exibir = "";
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_tipo (nm_tipo) VALUES(:tipo)');
    $stmt->execute(array(
        ':tipo' => $_POST['tipo']
    ));

    $sql = 'SELECT * FROM tb_tipo';
    foreach ($conn->query($sql) as $row) {
        $exibir .= $row['cd_tipo']." - ".$row['nm_tipo']."<br>";
    }
  echo $exibir;
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    echo "<br>".$stmt->rowCount();
}
?>