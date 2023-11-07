<?php


$conn = mysqli_connect('localhost', 'root', '', 'penyimpanan_barang');
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$id = $_GET['id'];


$query = "SELECT * FROM Barang WHERE id = $id";
$result = mysqli_query($conn, $query);

$barang = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama_barang = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $jenis_tempat = $_POST['jenis_tempat'];
    $tempat = $_POST['tempat'];

    $update = "UPDATE Barang SET 
        nama_barang = '$nama_barang',
        deskripsi = '$deskripsi',
        kategori = '$kategori',
        jenis_tempat = '$jenis_tempat',
        tempat = '$tempat'
        WHERE id = $id";


    if (mysqli_query($conn, $update)) {
        echo "
            <script>
                alert('Data berhasil diubah !');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah ! silahkan ulangi');
            </script>
        ";
    }
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Update </h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $barang['nama_barang'] ?>" required >
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"><?= $barang['deskripsi'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $barang['kategori'] ?>">
            </div>
            <div class="mb-3">
                <label for="jenis_tempat" class="form-label">Jenis Tempat</label>
                <input type="text" class="form-control" id="jenis_tempat" name="jenis_tempat" value="<?= $barang['jenis_tempat'] ?>">
            </div>
            <div class="mb-3">
                <label for="tempat" class="form-label">Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat" value="<?= $barang['tempat'] ?>">
            </div>
            <button type="submit" name="update" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengubah barang ini?')">Update Barang</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/js/bootstrap.min.js"></script>
</body>
</html>

