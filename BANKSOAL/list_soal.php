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
	<div class="center">
	<table class="center">
	  <tr>
		<th>NO</th>
		<th>KATEGORI</th>
		<th>Soal</th>
		<th>A</th>
		<th>B</th>
		<th>C</th>
		<th>D</th>
		<th>KUNCI JAWABAN</th>
		<th>AKSI</th>
	  </tr>
	<?php
	include"config/koneksi.php";
	function antiInjections($string) {
		$string = stripslashes($string);
		$string = strip_tags($string);
		$string = mysqli_real_escape_string($string);
		return $string;
	}
	$no=1;
	$query=mysqli_query($conn, "select * from soal");
	while($data = mysqli_fetch_array($query)){
	?>
	  <tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $data['questionname'];?></td>
		<td><?php echo $data['questiontext'];?><br><?php if($data['gambar']=="Y"){?><img src="data:image/png;base64,<?php echo $data['gambarsoal'];?>" alt="Red dot" width="200" height="150"/><?php } ?></td>
		<td><?php echo $data['A'];?><br><?php if($data['ga']=="Y"){?><img src="data:image/png;base64,<?php echo $data['gambara'];?>" alt="Red dot" width="200" height="150"/><?php } ?></td>
		<td><?php echo $data['B'];?><br><?php if($data['gb']=="Y"){?><img src="data:image/png;base64,<?php echo $data['gambarb'];?>" alt="Red dot" width="200" height="150"/><?php } ?></td>
		<td><?php echo $data['C'];?><br><?php if($data['gc']=="Y"){?><img src="data:image/png;base64,<?php echo $data['gambarc'];?>" alt="Red dot" width="200" height="150"/><?php } ?></td>
		<td><?php echo $data['D'];?><br><?php if($data['gd']=="Y"){?><img src="data:image/png;base64,<?php echo $data['gambard'];?>" alt="Red dot" width="200" height="150"/><?php } ?></td>
		<td><?php echo $data['Answer_1'];?></td>
		<td>
		<a href="edit_soal.php?id_soal=<?php echo $data['id_soal'];?>">EDIT</a>  |   
		<a href="hapus_soal.php?id_soal=<?php echo $data['id_soal'];?>">HAPUS</a>
		</td>
	  </tr>
	<?php
	}
	?>
	</table>

	<br></br>
		<br></br>
			<br></br>
				<br></br>
	<form method="post" action="exportXML.php">
	<select name="kategori">
        <?php
        $category = mysqli_query($conn,"SELECT questionname FROM soal GROUP BY questionname");
        while($row = mysqli_fetch_array($category)){?>
            <option value="<?php echo $row['questionname'];?>"><?php echo $row['questionname'];?></option>
        <?php
        }
        ?>
        </select><br>
        <input type="submit" value="EXPORT"> </form>
	</div>
</body>
</html>
