<?php
session_start();

if (!isset($_SESSION['produk'])) {
    $_SESSION['produk'] = [];
}

function hitungTotalHarga($harga, $jumlah) {
    return $harga * $jumlah;
}

$total_penjualan = 0;
$total_jumlah_terjual = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $harga = (int)$_POST['harga'];
    $jumlah = (int)$_POST['jumlah'];

    $_SESSION['produk'][] = [
        'nama' => $nama,
        'harga' => $harga,
        'jumlah' => $jumlah
    ];
}

foreach ($_SESSION['produk'] as $p) {
    $total_penjualan += hitungTotalHarga($p['harga'], $p['jumlah']);
    $total_jumlah_terjual += $p['jumlah'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        .container {
            background-color: #DCDCDC;
            width: 400px;
            height: 150px;
            margin: 0 auto;
            padding: 20px;
            border: 3px solid #ccc;
            border-radius: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            font-size: 170%;
        }
        button {
            background-color: #34495e;
            color: white;
            border: none;
            border-radius: 15px;
            padding: 8px;
            font-size: 15px;
            font-family: 'Times New Roman';
            font-weight: bold;
            cursor: pointer;
        }
        button:hover{
            background-color: #B0C4DE;
        }  
        input {
            width: 35%;
            height: 20px;
            font-size: 15px;
            font-family: 'Verdana';
            font-weight: bold;
        }
    </style>

</head>
<body>
<center>
    <h1>Sistem Pencatatan Penjualan</h1>
    <div class="container">
    <form method="post">
        <label for="nama">Nama Produk:</label>
        <input type="text" id="nama" name="nama" required>
        <br>
        <label for="harga">Harga Produk:</label>
        <input type="number" id="harga" name="harga" required>
        <br>
        <label for="jumlah">Jumlah Terjual:</label>
        <input type="number" id="jumlah" name="jumlah" required>
        <br>
        <br>
        <button type="submit">Simpan</button>
    </div>
    </form>
<center>

<h2>Laporan Penjualan :</h2>
    <table border="1" cellpadding="5" cellspacing="0" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga Per Produk</th>
                <th>Jumlah Terjual</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['produk'] as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['nama']) ?></td>
                <td><?= number_format($p['harga'], 0, ',', '.') ?></td>
                <td><?= $p['jumlah'] ?></td>
                <td><?= number_format(hitungTotalHarga($p['harga'], $p['jumlah']), 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="2"><strong>Total Penjualan</strong></td>
                <td><strong><?= $total_jumlah_terjual ?></strong></td>
                <td><strong><?= number_format($total_penjualan, 0, ',', '.') ?></strong></td>
            </tr>
        </tbody>
    </table>
</body>
</html>