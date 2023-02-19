<?php
$exibir = "";
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_status_livro (ds_status) VALUES(:status)');
    $stmt->execute(array(
        ':status' => $_POST['status']
    ));

    $sql = 'SELECT * FROM tb_status_livro';
    foreach ($conn->query($sql) as $row) {
        $exibir .= $row['cd_status_livro']." - ".$row['ds_status']."<br>";
    }
  
    echo $exibir;

} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    echo "<br>".$stmt->rowCount();
}
?>