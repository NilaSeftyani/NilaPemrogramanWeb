<?php 
include '../header.php';

$id = $_GET['id'];

// Fetch specific news item
$stmt = $conn->prepare("SELECT * FROM tblBerita WHERE idBerita = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$berita = $result->fetch_assoc();
$stmt->close();

// Fetch categories
$sql = "SELECT * FROM tblKategori";
$query = mysqli_query($conn, $sql);
$kategori = $query->fetch_all(MYSQLI_ASSOC);

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $idKategori = $_POST['kategori'];
    $isi = $_POST['isi'];
    $penulis = $_POST['penulis'];
    $tanggal = $_POST['tanggal'];

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE tblBerita SET judulBerita = ?, isiBerita = ?, penulis = ?, tgldipublish = ?, idKategori = ? WHERE idBerita = ?");
    $stmt->bind_param("sssisi", $judul, $isi, $penulis, $tanggal, $idKategori, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<section>
    <form action="edit.php?id=<?= $id ?>" method="POST">
        <fieldset>
            <legend>Edit Berita</legend>

            <label for="judul">Judul Berita</label>
            <input type="text" name="judul" id="judul" value="<?= $berita['judulBerita'] ?>" required>
            <br>

            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" required>
                <option value="">Pilih Kategori</option>
                <?php foreach ($kategori as $value) : ?>
                    <option value="<?= $value['idKategori'] ?>" <?= $value['idKategori'] == $berita['idKategori'] ? 'selected' : '' ?>><?= $value['nama_kategori'] ?></option>
                <?php endforeach; ?>
            </select>
            <br>

            <label for="isi">Isi Berita</label>
            <textarea name="isi" id="isi" cols="20" rows="10" required><?= $berita['isiBerita'] ?></textarea>
            <br>

            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" value="<?= $berita['penulis'] ?>" required>
            <br>

            <label for="tanggal">Tanggal Publish</label>
            <input type="date" name="tanggal" id="tanggal" value="<?= date('Y-m-d', strtotime($berita['tgldipublish'])) ?>" required>
            <br>

            <input type="submit" value="Simpan" name="simpan">
        </fieldset>
    </form>
</section>

<?php 
include '../footer.php';
?>
