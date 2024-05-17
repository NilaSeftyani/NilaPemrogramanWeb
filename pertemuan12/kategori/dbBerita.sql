CREATE TABLE tblKategori (
    idKategori INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama_kategori VARCHAR(50) NOT NULL
);

CREATE TABLE tblBerita (
    idBerita INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    judulBerita VARCHAR(50) NOT NULL,
    isiBerita TEXT NOT NULL,
    penulis VARCHAR(50) NOT NULL,
    tgldipublish DATETIME NOT NULL,
    idKategori INT NOT NULL,
    FOREIGN KEY (idKategori) REFERENCES tblKategori(idKategori)
);
