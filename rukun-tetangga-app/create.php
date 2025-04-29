<?php
require 'config.php';

$no_kk = $no_nik = $nama_kepala_keluarga = $alamat = $rt = $rw = $kelurahan = $kecamatan = $kabupaten = $provinsi = $kode_pos = $anggota_keluarga = "";
$no_kk_err = $no_nik_err = $nama_kepala_keluarga_err = $alamat_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_kk = trim($_POST["no_kk"]);
    $no_nik = trim($_POST["no_nik"]);
    $nama_kepala_keluarga = trim($_POST["nama_kepala_keluarga"]);
    $alamat = trim($_POST["alamat"]);
    $rt = trim($_POST["rt"]);
    $rw = trim($_POST["rw"]);
    $kelurahan = trim($_POST["kelurahan"]);
    $kecamatan = trim($_POST["kecamatan"]);
    $kabupaten = trim($_POST["kabupaten"]);
    $provinsi = trim($_POST["provinsi"]);
    $kode_pos = trim($_POST["kode_pos"]);
    $anggota_keluarga = trim($_POST["anggota_keluarga"]);

    if (empty($no_kk)) {
        $no_kk_err = "Please enter No KK.";
    }
    if (empty($no_nik)) {
        $no_nik_err = "Please enter No NIK.";
    }
    if (empty($nama_kepala_keluarga)) {
        $nama_kepala_keluarga_err = "Please enter Nama Kepala Keluarga.";
    }
    if (empty($alamat)) {
        $alamat_err = "Please enter Alamat.";
    }

    if (empty($no_kk_err) && empty($no_nik_err) && empty($nama_kepala_keluarga_err) && empty($alamat_err)) {
        $sql = "INSERT INTO warga (no_kk, no_nik, nama_kepala_keluarga, alamat, rt, rw, kelurahan, kecamatan, kabupaten, provinsi, kode_pos, anggota_keluarga) VALUES (:no_kk, :no_nik, :nama_kepala_keluarga, :alamat, :rt, :rw, :kelurahan, :kecamatan, :kabupaten, :provinsi, :kode_pos, :anggota_keluarga)";
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":no_kk", $no_kk, PDO::PARAM_STR);
            $stmt->bindParam(":no_nik", $no_nik, PDO::PARAM_STR);
            $stmt->bindParam(":nama_kepala_keluarga", $nama_kepala_keluarga, PDO::PARAM_STR);
            $stmt->bindParam(":alamat", $alamat, PDO::PARAM_STR);
            $stmt->bindParam(":rt", $rt, PDO::PARAM_STR);
            $stmt->bindParam(":rw", $rw, PDO::PARAM_STR);
            $stmt->bindParam(":kelurahan", $kelurahan, PDO::PARAM_STR);
            $stmt->bindParam(":kecamatan", $kecamatan, PDO::PARAM_STR);
            $stmt->bindParam(":kabupaten", $kabupaten, PDO::PARAM_STR);
            $stmt->bindParam(":provinsi", $provinsi, PDO::PARAM_STR);
            $stmt->bindParam(":kode_pos", $kode_pos, PDO::PARAM_STR);
            $stmt->bindParam(":anggota_keluarga", $anggota_keluarga, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header("Location: index.php");
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
    <title>Add New Warga - Rukun Tetangga</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow overflow-x-auto">
        <h1 class="text-2xl font-bold mb-4">Add New Warga</h1>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" novalidate>
            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="no_kk">No KK</label>
                <input type="text" name="no_kk" id="no_kk" value="<?= htmlspecialchars($no_kk) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <?php if ($no_kk_err): ?>
                    <p class="text-red-600 text-sm mt-1"><?= $no_kk_err ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" value="<?= htmlspecialchars($nama_kepala_keluarga) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <?php if ($nama_kepala_keluarga_err): ?>
                    <p class="text-red-600 text-sm mt-1"><?= $nama_kepala_keluarga_err ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="<?= htmlspecialchars($alamat) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <?php if ($alamat_err): ?>
                    <p class="text-red-600 text-sm mt-1"><?= $alamat_err ?></p>
                <?php endif; ?>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1 font-semibold" for="rt">RT</label>
                    <input type="text" name="rt" id="rt" value="<?= htmlspecialchars($rt) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label class="block mb-1 font-semibold" for="rw">RW</label>
                    <input type="text" name="rw" id="rw" value="<?= htmlspecialchars($rw) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1 font-semibold" for="kelurahan">Kelurahan</label>
                    <input type="text" name="kelurahan" id="kelurahan" value="<?= htmlspecialchars($kelurahan) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label class="block mb-1 font-semibold" for="kecamatan">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" value="<?= htmlspecialchars($kecamatan) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1 font-semibold" for="kabupaten">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" value="<?= htmlspecialchars($kabupaten) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label class="block mb-1 font-semibold" for="provinsi">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" value="<?= htmlspecialchars($provinsi) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1 font-semibold" for="kode_pos">Kode Pos</label>
                    <input type="text" name="kode_pos" id="kode_pos" value="<?= htmlspecialchars($kode_pos) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label class="block mb-1 font-semibold" for="anggota_keluarga">Anggota Keluarga</label>
                    <input type="number" name="anggota_keluarga" id="anggota_keluarga" value="<?= htmlspecialchars($anggota_keluarga) ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
            </div>
            <div class="flex justify-between">
                <a href="index.php" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add Warga</button>
            </div>
        </form>
    </div>
</body>
</html>
