DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS pasien;
DROP TABLE IF EXISTS obat;

CREATE TABLE users(
  Id Integer(3) AUTO_INCREMENT PRIMARY KEY,
  username Varchar(50),
  password Varchar(100),
  level Varchar(20)
);

CREATE TABLE pasien(
  kd_pasien Integer(5) AUTO_INCREMENT PRIMARY KEY,
  nm_pasien Varchar(50),
  tempat_lahir Varchar(50),
  tgl_lahir DATE,
  agama Varchar(10),
  goldar Varchar(3),
  jenkel Varchar(10),
  alamat Varchar(10)
);

CREATE TABLE obat(
  kd_obat Integer(5) AUTO_INCREMENT PRIMARY KEY,
  nm_obat Varchar(50),
  satuan Varchar(20),
  jenis_obat Varchar(25),
  stok INT
);

CREATE TABLE dokter(
  kd_dokter Integer(5) AUTO_INCREMENT PRIMARY KEY,
  nm_dokter Varchar(50),
  telpon Varchar(15),
  alamat Varchar(100)
);

INSERT INTO `users` (`Id`, `username`, `password`, `level`) VALUES
(1, 'hendra', '7c222fb2927d828af22f592134e8932480637c0d', 'administrator'),
(2, 'via lestari', '7c222fb2927d828af22f592134e8932480637c0d', 'user');

INSERT INTO `pasien` (`nm_pasien`, `tempat_lahir`, `tgl_lahir`, `agama`, `goldar`, `jenkel`, `alamat`) VALUES
('tes', 'sungailiat', '2002-01-01', 'Khonghucu', 'O', 'Laki-Laki', 'Alamat');

INSERT INTO `obat` (`nm_obat`, `satuan`, `jenis_obat`, `stok`) VALUES
('Ibuproven', 'Stock', 'Pain Killer', 100);
