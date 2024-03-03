<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
    <style>
        body {
            background-color: #ffffff; /* Warna latar belakang */
            color: #ff0000; /* Warna teks merah */
            font-weight: bold; /* Teks tebal */
            text-align: center; /* Rata tengah */
            font-family: Arial, sans-serif; /* Jenis font */
        }

        h1 {
            color: #ff0000; /* Warna teks merah untuk judul h1 */
        }

        span.blue-text {
            color: #0000ff; /* Warna teks biru */
        }
    </style>
</head>
<body>
    <h1>Biodata</h1>
    <p><span class="blue-text">Nama</span> : <span class="blue-text">Nila Seftyani</span></p>
    <p><span class="blue-text">Email</span> : <span class="blue-text">nilaseftyani@gmail.com</span></p>
    <p><span class="blue-text">Jurusan</span> : <span class="blue-text">Teknik Informatika</span></p>
    <p><span class="blue-text">Hobi</span> : <span class="blue-text">Travelling</span></p>
</body>
</html>
<?php
// Pesan Anda pertama kali belajar PHP
$pesan = "Kesan pertama saya belajar php sangat menyenangkan!";

// HTML untuk memformat tampilan
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kesan Pertama Belajar PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f2f2f2;
            margin: 0;
            padding: 50px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1>Kesan Pertama Belajar PHP</h1>
    <p>'.$pesan.'</p>
</body>
</html>
';

// Menampilkan HTML
echo $html;
?>
