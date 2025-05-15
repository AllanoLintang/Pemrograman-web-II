<?php 
    namespace App\Models;
    use CodeIgniter\Model;

    class Praktikan extends Model {
        function getData () {
            return [
                "nama" => "Allano Lintang Ertantora",
                "nim" => "2310817210004",
                "foto" => "Allano.jpeg",
                "prodi" => "Teknologi Informasi",
                "hobi" => "Ngoding",
                "skill" => "PHP"
            ];
        }
    }
?>