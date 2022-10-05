<?php
include"config\koneksi.php";

function antiInjections($string) {
	include"config\koneksi.php";
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = mysqli_real_escape_string($conn,$string);
    return $string;
}
$id_soal = antiInjections($_GET['id_soal']);
$query=mysqli_query($conn,"delete from soal where id_soal='$id_soal'");

header("location:list_soal.php");
?>