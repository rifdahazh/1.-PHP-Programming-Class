<?php
include_once 'Buku.php'; 

// Objek BukuCRUD
$bukuCRUD = new BukuCRUD();

// CRUD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tambah'])) {
        // Menambahkan buku baru
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $bukuCRUD->tambahBuku($judul, $penulis, $tahun_terbit);
    } elseif (isset($_POST['hapus'])) {
        // Menghapus buku
        $id = $_POST['id'];
        $bukuCRUD->hapusBuku($id);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku</title>
</head>
<body>

    <h2>Manajemen Buku</h2>

    <!-- Formulir untuk menambah buku -->
    <h3>Tambah Buku</h3>
    <form method="POST">
        <label for="judul">Judul: </label><br>
        <input type="text" name="judul" required><br>
        <label for="penulis">Penulis: </label><br>
        <input type="text" name="penulis" required><br>
        <label for="tahun_terbit">Tahun Terbit: </label><br>
        <input type="text" name="tahun_terbit" required><br><br>
        <button type="submit" name="tambah">Tambah Buku</button>
    </form>

    <!-- Tampilkan daftar buku -->
    <h3>Daftar Buku</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun Terbit</th>
            <th>Aksi</th>
        </tr>
        <?php
        $bukuList = $bukuCRUD->bacaSemuaBuku();
        foreach ($bukuList as $buku) {
            echo "<tr>
                    <td>{$buku->getId()}</td>
                    <td>{$buku->getJudul()}</td>
                    <td>{$buku->getPenulis()}</td>
                    <td>{$buku->getTahunTerbit()}</td>
                    <td>
                        <!-- Formulir Hapus -->
                        <form method='POST' style='display:inline'>
                            <input type='hidden' name='id' value='{$buku->getId()}'>
                            <button type='submit' name='hapus'>Hapus</button>
                        </form>
                    </td>
                </tr>";
        }
        ?>
    </table>

</body>
</html>
