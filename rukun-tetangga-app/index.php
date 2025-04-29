<?php
require 'config.php';

// Fetch all warga
$stmt = $pdo->query("SELECT * FROM warga ORDER BY created_at DESC");
$warga = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rukun Tetangga - Warga List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto bg-white p-6 rounded shadow overflow-x-auto">
        <h1 class="text-2xl font-bold mb-4">Rukun Tetangga - Warga List</h1>
        <a href="create.php" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add New Warga</a>
        <table class="min-w-full border border-gray-300 table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">No KK</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">No NIK</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nama Kepala Keluarga</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Alamat</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">RT</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">RW</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Kelurahan</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Kecamatan</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Kabupaten</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Provinsi</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Kode Pos</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Anggota Keluarga</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($warga) > 0): ?>
                    <?php foreach ($warga as $w): ?>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($w['no_kk']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($w['no_nik']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($w['nama_kepala_keluarga']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($w['alamat']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($w['rt']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($w['rw']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($w['kelurahan']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($w['kecamatan']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($w['kabupaten']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($w['provinsi']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($w['kode_pos']) ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($w['anggota_keluarga']) ?></td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="edit.php?id=<?= $w['id'] ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                                <a href="delete.php?id=<?= $w['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this warga?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="13" class="border border-gray-300 px-4 py-2 text-center">No warga found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
