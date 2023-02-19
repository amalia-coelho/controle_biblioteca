<?php
	require('conecta.php');
	$coletanea = "";
	try{

		$stmt = $conn->prepare('INSERT INTO tb_coletanea (nm_coletanea, id_tipo) VALUES (:nome, :tipo)');
		$stmt->execute(array(
		':nome' => $_POST['nm_coletanea'],
		':tipo' => $_POST['tipo_coletanea']
		));

	//SELECT
    $sql = 'SELECT * FROM tb_coletanea';
    foreach ($conn->query($sql) as $row) {
        $coletanea.=$row['cd_coletanea']." - ".$row['nm_coletanea']." - ".$row['id_tipo']."<br>";
    }
    echo $coletanea;
	
	}catch(PDOException $e) {
		echo "<br>".$stmt->rowCount();
    	echo 'Error: ' . $e->getMessage();
	}

?>