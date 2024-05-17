<?php 
include '../header.php';

// Fetch news with categories
$query = "SELECT tblBerita.*, tblKategori.nama_kategori FROM tblBerita JOIN tblKategori ON tblBerita.idKategori = tblKategori.idKategori ORDER BY tgldipublish DESC";
$data = mysqli_query($conn, $query);
$data = $data->fetch_all(MYSQLI_ASSOC);
?>

<section>
    <h1>Daftar Berita</h1>
    <a href="add.php">Tambah</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Judul Berita</th>
                <th>Isi Berita</th>
                <th>Penulis</th>
                <th>Tanggal Publish</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $value) : ?>
                <tr>
                    <td><?= $value['nama_kategori'] ?></td>
                    <td><?= $value['judulBerita'] ?></td>
                    <td><?= $value['isiBerita'] ?></td>
                    <td><?= $value['penulis'] ?></td>
                    <td><?= $value['tgldipublish'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $value['idBerita'] ?>">Edit</a>
                        <a href="delete.php?id=<?= $value['idBerita'] ?>" onclick="return confirm('Are you sure?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php 
include '../footer.php';
?>
