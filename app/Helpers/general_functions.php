<?php
define("BR",false);
function hitungBulan(string $tanggal_lahir){
    $time = strtotime($tanggal_lahir);
    $difference = time() - $time;
    return floor($difference / (60*60*24*30));
}

function pwaAssets($path){
    return asset('pwa/'.$path);
}

function assets($path){
    return asset("assets/{$path}");
}

function parseJenisKelamin($jenis_kelamin) {
    return str_replace(['L','P'],['Laki-Laki','Perempuan'],$jenis_kelamin);
}

function parseTanggalLahir($tanggal_lahir){
    $start = new DateTime(date('Y-m-d',strtotime($tanggal_lahir)));
    $end = new DateTime(date('Y-m-d',time()));
    return $end->diff($start);
}

function kategoriStatusPbTb($zScore)
{
    if ($zScore < -3) {
        return "<span class='text-danger'>Sangat pendek (severely stunted)</span>";
    } else if ($zScore >= -3 && $zScore < -2) {
        return "<span class='text-warning'>Pendek (Stunted)</span>";
    } else if ($zScore >= -2 && $zScore <= 3) {
        return "<span class='text-success'>Normal</span>";
    } else if ($zScore > 3) {
        return "Tinggi";
    }
}
function kategoriStatusBb($zScore)
{
    if ($zScore < -3) {
        return "<span class='text-danger'>Sangat kurang (severely underweight)</span>";
    } else if ($zScore >= -3 && $zScore < -2) {
        return "<span class='text-danger'>kurang (underweight)</span>";
    } else if ($zScore >= -2 && $zScore <= 2) {
        return "<span class='text-success'>Normal</span>";
    } else if ($zScore > 2) {
        return "Risiko Berat badan lebih";
    }
}

function rekomendasiDanSaranHidupSehatByZscore($z_score){
    $text = "";
    if($z_score < -2) {
        $text = "Asupan energi yang memadai,Pastikan anak mendapatkan cukup kalori untuk mendukung pertumbuhan yang optimal. Tambahkan makanan yang kaya kalori seperti kacang-kacangan, lemak sehat, dan makanan tinggi protein.".BR;

    }else if($z_score > 2) {
        $text = "Porsi makan yang seimbang, Pastikan porsi makan tidak berlebihan dan sesuai dengan kebutuhan energi anak.".BR;
        $text .= "Batasi makanan tinggi lemak jenuh dan gula, Kurangi konsumsi makanan olahan, makanan cepat saji, minuman manis, dan makanan yang mengandung lemak jenuh. Gantilah dengan makanan yang lebih sehat dan rendah kalori.".BR;
        $text .= "Aktivitas fisik teratur, Dorong anak untuk berpartisipasi dalam kegiatan fisik yang menyenangkan dan sesuai dengan usianya, seperti bermain di luar, olahraga, atau kegiatan lain yang melibatkan gerakan.".BR;
        
    } else if ( $z_score > -2 OR $z_score < 2  ) {
        $text = "Pastikan anak mendapatkan makanan yang kaya akan serat, protein, lemak sehat, dan vitamin serta mineral penting. Rekomendasi makanan yang baik termasuk:".BR;
        $text .= "Sayuran dan buah-buahan segar: Makanan ini kaya akan serat, vitamin, dan mineral. Pastikan untuk menyertakan beragam jenis sayuran dan buah-buahan dalam makanan sehari-hari.".BR;
        $text .= "Sumber protein sehat: Termasuk daging tanpa lemak, ikan, telur, kacang-kacangan, dan produk susu rendah lemak. Protein penting untuk pertumbuhan dan perkembangan yang baik.".BR;
        $text .= "Sumber karbohidrat sehat: Pilih karbohidrat kompleks seperti roti gandum, nasi merah, sereal utuh, dan kentang. Hindari makanan olahan dan tinggi gula.".BR;
        $text .= "Lemak sehat: Sertakan makanan yang mengandung lemak sehat, seperti ikan berlemak (salmon, sarden), alpukat, kacang-kacangan, dan minyak zaitun. Lemak sehat penting untuk perkembangan otak dan penyerapan vitamin yang larut dalam lemak.".BR;
        $text .= "Minum air yang cukup: Pastikan anak mengonsumsi cukup air untuk menjaga hidrasi yang baik.".BR;


    } 
    return $text;
}

