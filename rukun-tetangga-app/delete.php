<?php
require 'config.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $sql = "DELETE FROM warga WHERE id = :id";
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}

header("Location: index.php");
exit();
?>
