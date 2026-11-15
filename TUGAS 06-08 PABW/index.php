<?php
// Fungsi untuk menghitung diskon
function hitungDiskon($totalBelanja) {
    $diskon = 0;

    if ($totalBelanja >= 100000) {
        $diskon = 0.10 * $totalBelanja;
    } elseif ($totalBelanja >= 50000) {
        $diskon = 0.05 * $totalBelanja;
    }

    return $diskon;
}

// Mengambil input dari form
$totalBelanja = 0;
$diskon = 0;
$totalBayar = 0;

if (isset($_POST['hitung'])) {
    $totalBelanja = (float) $_POST['totalBelanja'];

    if ($totalBelanja >= 0) {
        $diskon = hitungDiskon($totalBelanja);
        $totalBayar = $totalBelanja - $diskon;
    }
}
?>

   <!DOCTYPE html>
     <html>
   <head>
    <title>AGUNG STORE</title>
    <link rel="stylesheet" href="style.css">
   </head>
    <body>
   <div class="container">

         
<div class="brand">
    <div class="brand-icon">🛒</div>
    <h2>AGUNG STORE</h2>
</div>

    <p class="deskripsi">
        SMART SHOPPING CALCULATOR
    </p>

    <form method="POST">
        <label>Total Belanja (Rp):</label>

        <input type="number"
               name="totalBelanja"
               min="0"
               placeholder="Masukkan nominal belanja"
               required>

        <button type="submit" name="hitung">
            Hitung Diskon
        </button>
    </form>
        
    <?php if (isset($_POST['hitung']) && $totalBelanja >= 0) { ?>

    <div class="hasil">
    
<!-- Kartu Informasi Diskon -->
<div class="diskon-info">
    <h3>Informasi Promo Diskon</h3>

    <div class="diskon-cards">

        <div class="diskon-card">
            <span class="diskon-persen">0%</span>
            <h4>Belanja Hemat</h4>
            <p>Belanja di bawah Rp50.000</p>
        </div>

        <div class="diskon-card">
            <span class="diskon-persen">5%</span>
            <h4>Promo Spesial</h4>
            <p>Belanja Rp50.000 - Rp99.999</p>
        </div>

        <div class="diskon-card">
            <span class="diskon-persen">10%</span>
            <h4>Promo Terbaik</h4>
            <p>Belanja Rp100.000 ke atas</p>
        </div>

    </div>
</div>
 
        <h3>Hasil Perhitungan</h3>

        <p>Total Belanja:
            Rp <?= number_format($totalBelanja, 0, ',', '.') ?>
        </p>

        <p>Diskon:
            Rp <?= number_format($diskon, 0, ',', '.') ?>
        </p>

        <p class="total">
            Total Bayar:
            Rp <?= number_format($totalBayar, 0, ',', '.') ?>
        </p>

    </div>

    <?php } ?>

    <p class="footer">
        Hitung diskon belanja dengan mudah dan cepat.
    </p>

</div>
</body>