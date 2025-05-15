<?php 
    include 'koneksi.php';

    class model {
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function getMembers(){
            return $this->db->query("SELECT * FROM member");
        }

        public function getMembersById($id){
            $stmt = $this->db->prepare("SELECT * FROM member WHERE id_member = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function insertMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_terakhir_bayar){
            $stmt = $this->db->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (?, ?, ?, ?, ?)");
            return $stmt->execute([$nama, $nomor, $alamat, $tgl_daftar, $tgl_terakhir_bayar]);

        }

        public function updateMember($id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_terakhir_bayar){
            $stmt = $this->db->prepare("UPDATE member SET nama_member = ?, nomor_member = ?, alamat = ?, tgl_mendaftar = ?, tgl_terakhir_bayar = ? WHERE id_member = ?");
            return $stmt->execute([$nama, $nomor, $alamat, $tgl_daftar, $tgl_terakhir_bayar, $id]);
        }

        public function deleteMember($id){
            $stmt = $this->db->prepare("DELETE FROM member WHERE id_member = ?");
            return $stmt->execute([$id]);
        }

        public function getBooks(){
            return $this->db->query("SELECT * FROM buku");
        }

        public function getBooksById($id){
            $stmt = $this->db->prepare("SELECT * FROM buku WHERE id_buku = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function insertBook($judul, $penulis, $penerbit, $tahun_terbit){
            $stmt = $this->db->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$judul, $penulis, $penerbit, $tahun_terbit]);
        }

        public function updateBook($id, $judul, $penulis, $penerbit, $tahun_terbit){
            $stmt = $this->db->prepare("UPDATE buku SET judul_buku = ?, penulis = ?, penerbit = ?, tahun_terbit = ? WHERE id_buku = ?");
            return $stmt->execute([$judul, $penulis, $penerbit, $tahun_terbit, $id]);
        }

        public function deleteBook($id){
            $stmt = $this->db->prepare("DELETE FROM buku WHERE id_buku = ?");
            return $stmt->execute([$id]);
        }

        public function getPeminjaman(){
            $stmt = $this->db->prepare("
            SELECT p.id_peminjaman, m.nama_member AS nama_member, b.judul_buku AS judul_buku,
                   p.tgl_pinjam, p.tgl_kembali
            FROM peminjaman p
            INNER JOIN member m ON p.id_member = m.id_member
            INNER JOIN buku b ON p.id_buku = b.id_buku
            ORDER BY p.id_peminjaman DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        public function getPeminjamanById($id){
            $stmt = $this->db->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function insertPeminjaman($tgl_pinjam, $tgl_kembali, $id_member, $id_buku ){
            $stmt = $this->db->prepare("INSERT INTO peminjaman (tgl_pinjam, tgl_kembali, id_member, id_buku) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$tgl_pinjam, $tgl_kembali, $id_member, $id_buku]);
        }

        public function updatePeminjaman($id, $tgl_pinjam, $tgl_kembali){
            $stmt = $this->db->prepare("UPDATE peminjaman SET tgl_pinjam = ?, tgl_kembali = ? WHERE id_peminjaman = ?");
            return $stmt->execute([$tgl_pinjam, $tgl_kembali, $id]);
        }

        public function deletePeminjaman($id){
            $stmt = $this->db->prepare("DELETE FROM peminjaman WHERE id_peminjaman = ?");
            return $stmt->execute([$id]);
        }

    }
?>