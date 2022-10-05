<?php
include"config/koneksi.php";
function antiInjections($string) {
	include"config/koneksi.php";
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = mysqli_real_escape_string($conn, $string);
    return $string;
}
$id_soal = antiInjections($_GET['id_soal']);
$query=mysqli_query($conn, "select * from soal where id_soal='$id_soal'");
while($data = mysqli_fetch_array($query)){
?>

<!DOCTYPE HTML>

<html>
<head>
	<title>Soal</title>
	<link rel="stylesheet" href="styleTable.css">
</head>
<body>
	<div class="hero">
		<div class="navbar"> 
			<h4>SO<span>AL</span></h4>
			<ul>
				<li><a href="index.php">Home<a/></li>
				<li><a href="buat_soal.php">Buat Soal<a/></li>
				<li><a href="list_soal.php">List Soal<a/></li>
			</ul>
		</div>
	</div>
	<div class="kotaksoal">
	<form method="post" action="edit_soal2.php" enctype="multipart/form-data">
		<input type="hidden" name="id_soal" value="<?php echo"$id_soal";?>">
		Kategori:<br><input type="text" name="questionname" value="<?php echo $data['questionname'];?>"><br>
		Pertanyaan:<br><textarea name="questiontext"><?php echo $data['questiontext'];?></textarea><br>
		<input type="file" name="gambarsoal" id="gambarsoal" multiple accept="image/*"><br>
		Jawaban A :<br><input type="text" name="a" value="<?php echo $data['A'];?>"><br>
		<input type="file" name="gambara" id="gambara" multiple accept="image/*"><br>
		Jawaban B :<br><input type="text" name="b" value="<?php echo $data['B'];?>"><br>
		<input type="file" name="gambarb" id="gambarb" multiple accept="image/*"><br>
		Jawaban C :<br><input type="text" name="c" value="<?php echo $data['C'];?>"><br>
		<input type="file" name="gambarc" id="gambarc" multiple accept="image/*"><br>
		Jawaban D :<br><input type="text" name="d" value="<?php echo $data['D'];?>"><br>
		<input type="file" name="gambard" id="gambard" multiple accept="image/*"><br>
		<label>Kunci Jawaban :</label><br>
			<select name="Answer_1">
				<option value="<?php echo $data['Answer_1'];?>"><?php echo $data['Answer_1'];?></option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
			</select><br>
		<input type="submit" value="INPUT">
	</form>
	</div>
</body>
</html>
<?php 
}
?>