<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=db_biblioteca', 'root', 'usbw');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectou!";
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>