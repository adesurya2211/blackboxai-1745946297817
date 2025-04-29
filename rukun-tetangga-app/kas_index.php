<?php
require 'config.php';

// Fetch all kas entries
$stmt = $pdo->query("SELECT * FROM kas ORDER BY no DESC");
$kas_entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rukun Tetangga - Kas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow overflow-x-auto">
        <h1 class="text-2xl font-bold mb-4">Kas</h1>
        <a href="kas_create.php" class="inline-block mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Add New Kas Entry</a>
        <table class="min-w-full border border-gray-300 table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Uraian</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Masuk</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Keluar</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Total</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($kas_entries) > 0): ?>
                    <?php foreach ($kas_entries as $entry): ?>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($entry['no']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($entry['uraian']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= number_format($entry['masuk'], 2) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= number_format($entry['keluar'], 2) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= number_format($entry['total'], 2) ?></td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="kas_edit.php?no=<?= $entry['no'] ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                                <a href="kas_delete.php?no=<?= $entry['no'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this entry?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="border border-gray-300 px-4 py-2 text-center">No kas entries found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
