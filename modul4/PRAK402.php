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
    $mahasiswa = [
        [
            "nama" => "Andi",
            "nim" => "2101001",
            "uts" => 87,
            "uas" => 65
        ],
        [
            "nama" => "Budi",
            "nim" => "2101002",
            "uts" => 76,
            "uas" => 79
        ],
        [
            "nama" => "Tono",
            "nim" => "2101003",
            "uts" => 50,
            "uas" => 41
        ],
        [
            "nama" => "Jessica",
            "nim" => "2101004",
            "uts" => 60,
            "uas" => 75
        ]
    ];

    foreach ($mahasiswa as $key => $data) {
        $nilaiAkhir = (0.4 * $data['uts']) + (0.6 * $data['uas']);
        $mahasiswa[$key]['nilai_akhir'] = round($nilaiAkhir, 1);

        if ($nilaiAkhir >= 80) {
            $huruf = "A";
        } elseif ($nilaiAkhir >= 70) {
            $huruf = "B";
        } elseif ($nilaiAkhir >= 60) {
            $huruf = "C";
        } elseif ($nilaiAkhir >= 50) {
            $huruf = "D";
        } else {
            $huruf = "E";
        }
        $mahasiswa[$key]['huruf'] = $huruf;
    }

    echo "<table>";
    echo "<tr><th>Nama</th><th>NIM</th><th>Nilai UTS</th><th>Nilai UAS</th><th>Nilai Akhir</th><th>Huruf</th></tr>";
    foreach ($mahasiswa as $data) {
        echo "<tr>";
        echo "<td>{$data['nama']}</td>";
        echo "<td>{$data['nim']}</td>";
        echo "<td>{$data['uts']}</td>";
        echo "<td>{$data['uas']}</td>";
        echo "<td>{$data['nilai_akhir']}</td>";
        echo "<td>{$data['huruf']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>

</body>
</html>