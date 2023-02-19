<?php
$exibir = "";
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_usuario (nm_usuario, ds_login, ds_senha, id_nivel, dt_nascimento, ds_imagem, nr_rm) VALUES (:nm_usuario, :ds_login, :ds_senha, :id_nivel, :dt_nascimento, :ds_imagem, :nr_rm)');
    $stmt->execute(array(
        ':nm_usuario' => $_POST['nm_usuario'],
        ':ds_login' => $_POST['ds_login'],
        ':ds_senha' => $_POST['ds_senha'],
        ':id_nivel' => $_POST['id_nivel'],
        ':dt_nascimento' => $_POST['dt_nascimento'],
        ':ds_imagem' => $_POST['ds_imagem'],
        ':nr_rm' => $_POST['nr_rm']
    ));

    $sql = 'SELECT * FROM tb_usuario';
    foreach ($conn->query($sql) as $row) {
        $exibir .= $row['cd_usuario']." - ".$row['nm_usuario']."<br>";
    }
    echo $exibir;
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    echo "<br>".$stmt->rowCount();
}
?>