<?php

class Buku {
    private $id;
    private $judul;
    private $penulis;
    private $tahun_terbit;

    // Konstruktor
    public function __construct($id, $judul, $penulis, $tahun_terbit) {
        $this->id = $id;
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahun_terbit = $tahun_terbit;
    }

    // Getter
    public function getId() {
        return $this->id;
    }

    public function getJudul() {
        return $this->judul;
    }

    public function getPenulis() {
        return $this->penulis;
    }

    public function getTahunTerbit() {
        return $this->tahun_terbit;
    }
}

class BukuCRUD {
    private $bukuList = [];

    // Fungsi untuk menambah buku baru
    public function tambahBuku($judul, $penulis, $tahun_terbit) {
        $id = count($this->bukuList) + 1;
        $buku = new Buku($id, $judul, $penulis, $tahun_terbit);
        $this->bukuList[$id] = $buku;
    }

    // Fungsi untuk mengambil semua buku
    public function bacaSemuaBuku() {
        return $this->bukuList;
    }

    // Fungsi untuk mencari buku berdasarkan ID
    public function bacaBuku($id) {
        return isset($this->bukuList[$id]) ? $this->bukuList[$id] : null;
    }

    // Fungsi untuk memperbarui buku
    public function updateBuku($id, $judul, $penulis, $tahun_terbit) {
        if (isset($this->bukuList[$id])) {
            $this->bukuList[$id] = new Buku($id, $judul, $penulis, $tahun_terbit);
            return true;
        }
        return false;
    }

    // Fungsi untuk menghapus buku
    public function hapusBuku($id) {
        if (isset($this->bukuList[$id])) {
            unset($this->bukuList[$id]);
            return true;
        }
        return false;
    }
}
?>
