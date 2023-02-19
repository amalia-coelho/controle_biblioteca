<?php
$exibir = "";
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_genero_usuario (id_genero, id_usuario) VALUES(:genero, :usuario)');
    $stmt->execute(array(
        ':genero' => $_POST['id_genero'],
        ':usuario' => $_POST['id_usuario']
    ));

    $sql = 'SELECT * FROM tb_genero_usuario';
    foreach ($conn->query($sql) as $row) {
        $exibir .= $row['cd_genero_usuario']." - ".$row['id_genero']." - ".$row['id_usuario']."<br>";
    }
    echo $exibir;
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    echo "<br>".$stmt->rowCount();
}
?>