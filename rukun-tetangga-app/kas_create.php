<?php
require 'config.php';

$uraian = "";
$masuk = $keluar = $total = 0;
$uraian_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uraian = trim($_POST["uraian"]);
    $masuk = floatval($_POST["masuk"]);
    $keluar = floatval($_POST["keluar"]);
    $total = $masuk - $keluar;

    if (empty($uraian)) {
        $uraian_err = "Please enter Uraian.";
    }

    if (empty($uraian_err)) {
        $sql = "INSERT INTO kas (uraian, masuk, keluar, total) VALUES (:uraian, :masuk, :keluar, :total)";
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":uraian", $uraian, PDO::PARAM_STR);
            $stmt->bindParam(":masuk", $masuk);
            $stmt->bindParam(":keluar", $keluar);
            $stmt->bindParam(":total", $total);

            if ($stmt->execute()) {
                header("Location: kas_index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Kas Entry - Rukun Tetangga</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Add Kas Entry</h1>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" novalidate>
            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="uraian">Uraian</label>
                <input type="text" name="uraian" id="uraian" value="<?= htmlspecialchars($uraian) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
                <?php if ($uraian_err): ?>
                    <p class="text-red-600 text-sm mt-1"><?= $uraian_err ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="masuk">Masuk</label>
                <input type="number" step="0.01" name="masuk" id="masuk" value="<?= htmlspecialchars($masuk) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="keluar">Keluar</label>
                <input type="number" step="0.01" name="keluar" id="keluar" value="<?= htmlspecialchars($keluar) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
            </div>
            <div class="flex justify-between">
                <a href="kas_index.php" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Add Entry</button>
            </div>
        </form>
    </div>
</body>
</html>
