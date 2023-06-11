<?php
include 'dataset_standard_pengukuran_kemenkes_laki_laki.php';

function beratBadan()
{

}

if (isset($_POST['ukur'])) {
    $z_score = 0;
    $berat_badan = $_POST['berat_badan'] ?? null;
    $umur = $_POST['umur'] ?? null;
    if (isset($standard_berat_badan_menurut_umur_laki_laki_0_60[$umur])) {
        $dataset = $standard_berat_badan_menurut_umur_laki_laki_0_60[$umur];
        //nilai median
        $nilai_median = floatval($dataset[4]);
        $calculate = intval($berat_badan) - $nilai_median;
        if (!abs($calculate)) {
            $z_score = $calculate / (floatval($dataset[5]) - $nilai_median);
        } else {
            $z_score = $calculate / ($nilai_median - floatval($dataset[3]));
        }
        $z_score = round($z_score, 2);
    } else {
        echo "Umur {$umur} harus <= 60 Bulan";
    }

}

$string = "Tidak Di ketahui";


$koneksi = new mysqli('localhost', 'root', '', 'test');


foreach ($standard_berat_badan_menurut_umur_laki_laki_0_60 as $umur => $value) {
    $koneksi->query("INSERT INTO `bb_u_references` ( `umur`, `-3sd`, `-2sd`, `-1sd`, `median`, `1sd`, `2sd`, `3sd`)
    VALUES ('{$umur}','{$value[0]}','{$value[1]}','{$value[2]}','{$value[3]}','{$value[4]}','{$value[5]}','{$value[6]}')");
}

if ($z_score < -3) {
    $string = "Berat badan sangat <b style='color:red;'>buruk</b>!";
} else if ($z_score > -3 && $z_score < -2) {
    $string = "Berat badan <b style='color:orange;'>buruk</b>!";
} else if ($z_score > -2 && $z_score < 1) {
    $string = "Berat badan sangat <b style='color:green;'>Baik</b>!";
} else {
    $string = "Berat badan berlebihan!";
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengukuran</title>
</head>
<body>
<form action="" method="POST">
    <?php if (isset($string)): ?>
        <h1><?= $string ?></h1>
        <h1>BB/U: <?= $z_score ?></h1>
    <?php endif; ?>
    <input type="text" placeholder="Ketikan Umur Anak" name="umur">
    <br>
    <input type="text" placeholder="Ketikan Berat badan anak" name="berat_badan">
    <br>
    <button name="ukur">Hitung</button>
</form>
</body>
</html>

