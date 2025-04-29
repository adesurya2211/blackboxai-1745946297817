<?php
require 'config.php';

$no = $_GET['no'] ?? null;
if ($no) {
    $sql = "DELETE FROM kas WHERE no = :no";
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(":no", $no, PDO::PARAM_INT);
        $stmt->execute();
    }
}

header("Location: kas_index.php");
exit();
?>
