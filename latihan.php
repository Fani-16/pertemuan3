<?php
function tambah ($a, $b){
    $hasil = $a + $b;
    echo "Hasil $a + $b = $hasil";
}
tambah (10,25);
echo "<hr />";
tambah (40,60);
echo "<hr />";
function kosong (){
    $isi = 100 * 10;
    echo $isi;
}
kosong();
echo "<hr />";
function coba (){
    $coba1 = "Ini isi coba 1";
    $coba2 = "Ini isi coba 2";
    return $coba2;
}

echo "Isi dari function coba adalah ".coba();
echo "<hr />";
function FormatRupiah ($angka){
    $rupiah  = "Rp. ".number_format ($angka, "2", ",", "." );
    return $rupiah;
}
echo FormatRupiah (200000);
echo "<hr />";
?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah Terjual</th>
        <th>Total</th>
        </tr>
    <tr>
        <td>1</td>
        <td>Sepatu</td>
        <td><?= FormatRupiah(120500);?></td>
        <td>2</td>
        <td><?= FormatRupiah(241000);?></td>
    </tr>
    <tr>
        <td>2</td>
        <td>Baju</td>
        <td><?= FormatRupiah(155000);?></td>
        <td>3</td>
        <td><?= FormatRupiah(465000);?></td>
    </tr>
    <tr>
        <td>3</td>
        <td>Cushion</td>
        <td><?= FormatRupiah(50000);?></td>
        <td>5</td>
        <td><?= FormatRupiah(250000);?></td>
    </tr>

</table>
