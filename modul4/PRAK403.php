<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th {
            background-color: lightgray;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 2px;
        }
    </style>
</head>
<body>
    <?php 
        $krs = [
            [
                "nama" => "Ridho",
                "mataKuliah" => [
                    ["matkul" => "Pemrograman I", "sks" => 2],
                    ["matkul" => "Praktikum Pemrograman I", "sks" => 1],
                    ["matkul" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
                    ["matkul" => "Arsitektur Komputer", "sks" => 3]
                ]
            ],
            [
                "nama" => "Ratna",
                "mataKuliah" => [
                    ["matkul" => "Basis Data I", "sks" => 2],
                    ["matkul" => "Praktikum Basis Data I", "sks" => 1],
                    ["matkul" => "Kalkulus", "sks" => 3]
                ]
            ],
            [
                "nama" => "Tono",
                "mataKuliah" => [
                    ["matkul" => "Rekayasa Perangkat Lunak", "sks" => 3],
                    ["matkul" => "Analisis dan Perancangan Sistem", "sks" => 3],
                    ["matkul" => "Komputasi Awan", "sks" => 3],
                    ["matkul" => "Kecerdasan Bisnis", "sks" => 3]
                ]
            ]
                ];

        foreach ($krs as $key => $data){
            $totalSks = 0;
            foreach ($data['mataKuliah'] as $mk){
                $totalSks += $mk['sks'];
            }

            $krs[$key]['total_sks'] = $totalSks;
            if($totalSks < 7){
                $krs[$key]['keterangan'] = "<td style='background-color: red;'>Revisi KRS</td>";
            }else{
                $krs[$key]['keterangan'] = "<td style='background-color: green;'>Tidak Revisi</td>";
            }
        }

        echo "<table>";
        echo "<tr><th>No</th><th>Nama</th><th>Mata Kuliah diambil</th><th>SKS</th><th>Total SKS</th><th>Keterangan</th></tr>";
        $no = 1;
        foreach ($krs as $data){
            $rowspan = count($data['mataKuliah']);
            echo "<tr>";
            echo "<td rowspan='$rowspan'>$no</td>";
            echo "<td rowspan='$rowspan'>".$data['nama']."</td>";
            echo "<td>".$data['mataKuliah'][0]['matkul']."</td>";
            echo "<td>".$data['mataKuliah'][0]['sks']."</td>";
            echo "<td rowspan='$rowspan'>".$data['total_sks']."</td>";
            echo $data['keterangan']."</tr>";
            for ($i = 1; $i < count($data['mataKuliah']); $i++){
                echo "<tr>";
                echo "<td>".$data['mataKuliah'][$i]['matkul']."</td>";
                echo "<td>".$data['mataKuliah'][$i]['sks']."</td>";
                echo "</tr>";
            }
            $no++;
        }
        echo "</table>";
    ?>
</body>
</html>