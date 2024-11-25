<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Diri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #f9f9f9;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4b400;
            color: white;
        }
        h1 {
            text-align: center;
        }
        form {
            width: 50%;
            margin: 20px auto;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        .button-container {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Biodata Diri</h1>

    <form method="post">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="tel" id="nomor_telepon" name="nomor_telepon" required>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required>

        <label for="hobi">Hobi:</label>
        <input type="text" id="hobi" name="hobi" required>

        <input type="submit" value="Kirim">
    </form>

    <?php
        // Inisialisasi biodata
        session_start();

        if (!isset($_SESSION['biodata'])) {
            $_SESSION['biodata'] = [];
        }

        // Menangani pengiriman data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Simpan data biodata ke session
            $_SESSION['biodata'] = [
                "Nama Lengkap" => isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '',
                "Tanggal Lahir" => isset($_POST['tanggal_lahir']) ? htmlspecialchars($_POST['tanggal_lahir']) : '',
                "Alamat" => isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : '',
                "Jenis Kelamin" => isset($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : '',
                "Email" => isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '',
                "Nomor Telepon" => isset($_POST['nomor_telepon']) ? htmlspecialchars($_POST['nomor_telepon']) : '',
                "Status" => isset($_POST['status']) ? htmlspecialchars($_POST['status']) : '',
                "Hobi" => isset($_POST['hobi']) ? htmlspecialchars($_POST['hobi']) : ''
            ];
        }

        // Menangani penghapusan data
        if (isset($_POST['hapus'])) {
            unset($_SESSION['biodata']);
        }

        // Tampilkan data jika ada
        if (!empty($_SESSION['biodata'])) {
            $biodata = $_SESSION['biodata'];
    ?>

    <table>
        <tr>
            <th>Informasi</th>
            <th>Detail</th>
        </tr>
        <?php foreach ($biodata as $key => $value): ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo $value; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="button-container">
        <form method="post">
            <input type="submit" name="hapus" value="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus data?');">
        </form>
    </div>

    <?php
        }
    ?>
</body>
</html>