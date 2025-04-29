<?php
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Rukun Tetangga</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-600 p-4 text-white flex justify-between items-center">
        <div class="text-lg font-bold">Rukun Tetangga Dashboard</div>
        <div>
            <span class="mr-4">Welcome, <?= htmlspecialchars($_SESSION['username']) ?></span>
            <a href="logout.php" class="underline hover:text-gray-300">Logout</a>
        </div>
    </nav>
    <main class="p-6 max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="index.php" class="bg-white p-6 rounded shadow hover:shadow-lg transition text-center">
                <div class="text-xl font-semibold mb-2">Manage Warga</div>
                <div class="text-gray-600">View and manage warga data</div>
            </a>
            <a href="kas_index.php" class="bg-white p-6 rounded shadow hover:shadow-lg transition text-center">
                <div class="text-xl font-semibold mb-2">Manage Kas</div>
                <div class="text-gray-600">View and manage kas entries</div>
            </a>
        </div>
    </main>
</body>
</html>
