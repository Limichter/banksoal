<?php
include"config/koneksi.php";
function antiInjections($string) {
	include"config/koneksi.php";
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = mysqli_real_escape_string($conn,$string);
    return $string;
}
$kateg = antiInjections($_POST['questionname']);
$soal = antiInjections($_POST['questiontext']);
$name = $_FILES['gambarsoal']['name'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["gambarsoal"]["name"]);
move_uploaded_file($_FILES["gambarsoal"]["tmp_name"], $target_file);
$image_base64 = base64_encode(file_get_contents('img/'.$name) );
if ($image_base64==""){
    $gambar = "N";
}else{$gambar = "Y";}

$name = $_FILES['gambara']['name'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["gambara"]["name"]);
move_uploaded_file($_FILES["gambara"]["tmp_name"], $target_file);
$image_base64a = base64_encode(file_get_contents('img/'.$name) );
if ($image_base64a ==""){
    $ga = "N";
}else{$ga = "Y";}

$name = $_FILES['gambarb']['name'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["gambarb"]["name"]);
move_uploaded_file($_FILES["gambarb"]["tmp_name"], $target_file);
$image_base64b = base64_encode(file_get_contents('img/'.$name) );
if ($image_base64b==""){
    $gb = "N";
}else{$gb = "Y";}

$name = $_FILES['gambarc']['name'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["gambarc"]["name"]);
move_uploaded_file($_FILES["gambarc"]["tmp_name"], $target_file);
$image_base64c = base64_encode(file_get_contents('img/'.$name) );
if ($image_base64c==""){
    $gc = "N";
}else{$gc = "Y";}

$name = $_FILES['gambard']['name'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["gambard"]["name"]);
move_uploaded_file($_FILES["gambard"]["tmp_name"], $target_file);
$image_base64d = base64_encode(file_get_contents('img/'.$name) );
if ($image_base64d==""){
    $gd = "N";
}else{$gd = "Y";}

$A = antiInjections($_POST['a']);
$B = antiInjections($_POST['b']);
$C = antiInjections($_POST['c']);
$D = antiInjections($_POST['d']);
$knc_jawaban = antiInjections($_POST['Answer_1']);
$query= mysqli_query($conn,"insert into soal (questionname,questiontext,gambarsoal,gambar,a,gambara,ga,b,gambarb,gb,c,gambarc,gc,d,gambard,gd,Answer_1)
values ('$kateg','$soal','$image_base64','$gambar','$A','$image_base64a','$ga','$B','$image_base64b','$gb','$C','$image_base64c','$gc','$D','$image_base64d','$gd','$knc_jawaban')");
if ($query){
	echo "<script language='javascript'>
alert('DATA BERHASIL DISIMPAN, SILAKAN CEK DATA ANDA!');
document.location='list_soal.php';
</script>";
}
else
{echo "<script language='javascript'>
alert('DATA GAGAL DISIMPAN');
document.location='buat_soal.php';
</script>";
}
mysql_close($konak);
?>