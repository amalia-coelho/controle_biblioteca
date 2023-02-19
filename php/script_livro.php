<?php
$exibir = "";
try {
    require('conecta.php');

    $stmt = $conn->prepare('INSERT INTO tb_livro (nm_livro, nr_paginas, id_editora, dt_lancamento, ds_descricao, st_disponibilidade, ds_image, ds_video, ds_audio, ds_sumario, id_coletanea) VALUES (:nm_livro, :nr_paginas, :id_editora, :dt_lancamento, :ds_descricao, :st_disponibilidade, :ds_image, :ds_video, :ds_audio, :ds_sumario, :id_coletanea)');
    $stmt->execute(array(
        ':nm_livro' => $_POST['nm_livro'],
        ':nr_paginas' => $_POST['nr_paginas'],
        ':id_editora' => $_POST['id_editora'],
        ':dt_lancamento' => $_POST['dt_lancamento'],
        ':ds_descricao' => $_POST['ds_descricao'],
        ':st_disponibilidade' => $_POST['disp'],
        ':ds_image' => $_POST['ds_imagem'],
        ':ds_video' => $_POST['ds_video'],
        ':ds_audio' => $_POST['ds_audio'],
        ':ds_sumario' => $_POST['ds_sumario'],
        ':id_coletanea' => $_POST['id_coletanea']
    ));

    $sql = 'SELECT * FROM tb_livro';
    foreach ($conn->query($sql) as $row) {
        $exibir .= $row['cd_livro']." - ".$row['nm_livro']."<br>";
    }
    echo $exibir;
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    echo "<br>".$stmt->rowCount();
}
?>