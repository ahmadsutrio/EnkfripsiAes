<?php include_once('Aes.php'); ?>
<?php

// kodingan untuk enkripsi text
if (isset($_POST['submit'])) {
    if (isset($_POST['key'])) {
        $b = $_POST['key']; //kunci utk enkripsi
        $a = $_POST['text']; //text yg akan di enkrip
        $aes = new Aes($b); // pembuatan objek dari class Aes, dengan parameter kunci dekrip

        $hasil = bin2hex($aes->encrypt($a)); // fungsi bin2hex berguna utk rubah text biner menjadi hexadecimal, karena dalm bentuk binner menjadi error saat ditampilkan
    }

// kodingan untuk dekrpsi text
    if (isset($_POST['key-dekrip'])) {
        $c = $_POST['key-dekrip']; // kunci dekrip
        $text_dekrip = $_POST['text-dekrip']; // text yg akan di dekrip

        $aes = new Aes($c);
        $hasil2 = hex2bin($text_dekrip); // fungsi hex2bin rubah text hexadecimal menjadi binner, karena text yg harus d dekrip harus dalam binner

        $hasil_dekrip = $aes->decrypt($hasil2);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <title>AES</title>
<style>
body {
  background-color: salmon;
}
</style>
</head>
<body>
    <div class="container" class="">
    <h2 class="text-center">AES Enksripsi Dekripsi</h2>
    <hr>
    <div class="row">
        <div class="col-md-6">
        <h3>Text</h3>
        <form action="" method="post">
        <textarea rows="4" cols="50" class="form-control" name="text"><?php if (isset($a)) echo $a ?></textarea><br>

        <h4>Key</h4>
        <input type="text"  class="form-control" name="key" id="" placeholder="Key" value="<?php if (isset($b)) echo $b ?>"><br>
        <input type="submit" value="submit" class="btn btn-primary" name="submit">
		
		<h4>Hasil Enkripsi</h4>
		<textarea rows="4" cols="50" class="form-control" name="hasil_enkrpsi"><?php if (isset($hasil)) echo ($hasil) ?></textarea><br>
    </form>
        </div>

        <div class="col-md-6">
        <h3>Dekripsi</h3>
        <form action="" method="post">
        <textarea rows="4" cols="50" class="form-control" name="text-dekrip"><?php if (isset($text_dekrip)) echo $text_dekrip ?></textarea><br>
        
		<h4>Key</h4>
        <input type="text" class="form-control" name="key-dekrip" id="" placeholder="Key" value="<?php if (isset($c)) echo $c ?>"><br>
        <input type="submit" value="submit" class="btn btn-primary" name="submit">
		
		<h4>Hasil Deskripsi</h4>
		<textarea rows="4" cols="50" class="form-control" name="hasil_deskripsi"><?php if (isset($hasil_dekrip)) echo $hasil_dekrip ?></textarea><br>
    </form>
        <!-- </div>

        
        </div>
    

        <p></p> -->
    </div>
    

<script type="text/javascript" src="bootstrap/jquery.js"></script>
<script type="text/javascript" src="bootstrap/bootstrap.js"></script>
</body>
</html>

