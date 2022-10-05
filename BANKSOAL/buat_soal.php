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
	<form method="post" action="input_soal2.php" enctype="multipart/form-data">
        Kategori:<br><input type="text" name="questionname"><br>
        Pertanyaan:<br><textarea name="questiontext"></textarea><br>
		<input type="file" name="gambarsoal" id="gambarsoal" multiple accept="image/*"><br>
        Jawaban A :<br><input type="text" name="a"><br>
		<input type="file" name="gambara" id="gambara" multiple accept="image/*"><br>
        Jawaban B :<br><input type="text" name="b"><br>
		<input type="file" name="gambarb" id="gambarb" multiple accept="image/*"><br>
        Jawaban C :<br><input type="text" name="c"><br>
		<input type="file" name="gambarc" id="gambarc" multiple accept="image/*"><br>
        Jawaban D :<br><input type="text" name="d"><br>
		<input type="file" name="gambard" id="gambard" multiple accept="image/*"><br>
        <label>Kunci Jawaban :</label><br>
            <select name="Answer_1">
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