<?php
    include 'connection.php';

    class Model extends Connection{

        public function __construct(){
            $this->conn = $this->get_connection();
        }
        public function insertt($nim, $nama, $uts, $uas, $tugas){
            $na = $this->na($uts, $tugas, $uas);
            $status = $this->status($na);
            $sql = "INSERT INTO tbl_nilai (nim, nama, uts, uas, tugas, na, status) VALUES
            ('$nim', '$nama', '$uts', '$uas', '$tugas', '$na', '$status')";
            $this->conn->query($sql);
        }
        public function na($uts, $uas, $tugas){
            $na = (0.3 * $uts)+(0.3 * $uas)+(0.4 * $uas);
            return $na;
        }
        public function status($na){
            $status = "";
            if ($na >= 60 && $na <= 100) {
                $status = "LULUS";
            } else {
                $status = "TIDAK LULUS";
            }
            return $status;
        }
        public function insertmhs($nama, $smt, $alamat, $tlp, $email){
            $sql= "INSERT INTO tbl_mhs (nama, semester, alamat, no_tlp, email) VALUES
            ('$nama', '$smt', '$alamat', '$tlp', '$email')";
            $this->conn->query($sql);
        }
        public function insertmatkul($nama){
            $sql = "INSERT INTO tbl_matkul (nama_mk) VALUES ('$nama')";
            $this->conn->query($sql);
        }
        public function insertabsen($nama, $mk, $jam){
            $sts = $this->sts($jam);
            $sql = "INSERT INTO tbl_absen (mhs_id, matakuliah_id, waktu_absen, status) VALUES
            ('$nama', '$mk', '$jam', '$sts')";
            $this->conn->query($sql);
        }
        public function sts($jam){
            $sts = "";
            if ($jam) {
                $sts = "ABSEN";
            } else {
                $sts = "BELUM ABSEN";
            }
            return $sts;
        }
        public function tampil_data(){
            $sql = "SELECT * FROM tbl_nilai";
            $bind = $this->conn->query($sql);
            while ($obj = $bind->fetch_object()) {
                $baris[] = $obj;
            }
            if (!empty($baris)) {
                return $baris;
            }   
        }
        public function tampil_mhs(){
            $sql = "SELECT * FROM tbl_mhs";
            $bind = $this->conn->query($sql);
            while ($obj = $bind->fetch_object()) {
                $baris[] = $obj;
            }
            if (!empty($baris)) {
                return $baris;
            }   
        }
        public function tampil_absen(){
            $sql = "SELECT tbl_mhs.nama , tbl_matkul.nama_mk, tbl_absen.waktu_absen, tbl_absen.status
            FROM tbl_absen WHERE tbl_absen.id = tbl_mhs.id, tbl_absen.id = tbl_matkul.id";
            $bind = $this->conn->query($sql);
            while ($obj = $bind->fetch_object()) {
                $baris[] = $obj;
            }
            if (!empty($baris)) {
                return $baris;
            }
        }
        public function tampil_matkul(){
            $sql = "SELECT * FROM tbl_matkul";
            $bind = $this->conn->query($sql);
            while ($obj = $bind->fetch_object()) {
                $baris[] = $obj;
            }
            if (!empty($baris)) {
                return $baris;
            }
        }
        public function edit($id){
            $sql = "SELECT * FROM tbl_nilai WHERE nim = '$id'";
            $bind = $this->conn->query($sql);
            while ($obj = $bind->fetch_object()) {
                $baris = $obj;
            }
            return $baris;
        }
        public function editmhs($id){
            $sql = "SELECT * FROM tbl_mhs WHERE id = '$id'";
            $bind = $this->conn->query($sql);
            while ($obj = $bind->fetch_object()) {
                $baris = $obj;
            }
            return $baris;
        }
        public function editmatkul($id){
            $sql = "SELECT * FROM tbl_matkul WHERE id = '$id'";
            $bind = $this->conn->query($sql);
            while ($obj = $bind->fetch_object()) {
                $baris = $obj;
            }
            return $baris;
        }
        public function update($nim, $nama, $uts, $uas, $tugas){
            $na = $this->na($uts, $uas, $tugas);
            $status = $this->status($na);
            $sql = "UPDATE tbl_nilai SET nama='$nama', uts='$uts', uas='$uas', tugas='$tugas',
            na='$na', status='$status' WHERE nim='$nim'";
            $this->conn->query($sql);
        }
        public function updatemhs($id, $nama, $smt, $alamat, $tlp, $email){
            $sql = "UPDATE tbl_mhs SET nama='$nama', semester='$smt', alamat='$alamat', no_tlp='$tlp',
            email='$email' WHERE id='$id'";
            $this->conn->query($sql);
        }
        public function updatemk($id,$nama){
            $sql = "UPDATE tbl_matkul set nama_mk = '$nama' WHERE id = '$id'";
            $this->conn->query($sql);
        }
        public function delete($nim){
            $sql = "DELETE FROM tbl_nilai WHERE nim='$nim'";
            $this->conn->query($sql);
        }
        public function deletemhs($id){ 
            $sql = "DELETE FROM tbl_mhs WHERE id='$id'";
            $this->conn->query($sql);
        }
        public function deletemk($id){ 
            $sql = "DELETE FROM tbl_matkul WHERE id='$id'";
            $this->conn->query($sql);
        }
        public function insert_kontrak($mk_id, $mhs_id){
            $sql = "INSERT INTO kontrak_mk (mk_id,mhs_id) VALUES ('$mk_id','$mhs_id')";
            $this->conn->query($sql);
        }
        public function tampil_kontrak(){
            $sql = "SELECT * FROM kontrak_mk";
            $bind = $this->conn->query($sql);
            while ($obj = $bind->fetch_object()) {
                $baris[] = $obj;
            }
            if (!empty($baris)) {
                return $baris;
            }
        }
        
    }
?>