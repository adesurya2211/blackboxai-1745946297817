-- Database schema for Rukun Tetangga application

CREATE DATABASE IF NOT EXISTS rukun_tetangga;
USE rukun_tetangga;

DROP TABLE IF EXISTS warga;

CREATE TABLE warga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    no_kk VARCHAR(20) NOT NULL,
    no_nik VARCHAR(20) NOT NULL,
    nama_kepala_keluarga VARCHAR(100) NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    rt VARCHAR(3),
    rw VARCHAR(3),
    kelurahan VARCHAR(100),
    kecamatan VARCHAR(100),
    kabupaten VARCHAR(100),
    provinsi VARCHAR(100),
    kode_pos VARCHAR(10),
    anggota_keluarga INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS kas;

CREATE TABLE kas (
    no INT AUTO_INCREMENT PRIMARY KEY,
    uraian VARCHAR(255) NOT NULL,
    masuk DECIMAL(15,2) DEFAULT 0,
    keluar DECIMAL(15,2) DEFAULT 0,
    total DECIMAL(15,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
