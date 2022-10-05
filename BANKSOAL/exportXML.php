<?php
 
// Load the database configuration file 
include_once "config/koneksi.php";
function antiInjections($string) {
	include"config/koneksi.php";
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = mysqli_real_escape_string($conn,$string);
    return $string;
}
$category = antiInjections($_POST['kategori']);
// nama file hasil export
$namaFile = "$category.xml";
 
// header file text
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=".$namaFile);
 
// query sql baca semua data dlm tabel mhs
$query=mysqli_query($conn, "SELECT * FROM soal WHERE questionname LIKE '$category'");
?>
<?xml version="1.0" encoding="UTF-8"?>
<quiz>
<!-- question: 0  -->
  <question type="category">
    <category><?php echo $category?> 
      <text>$course$/top/<?php echo $category?> </text>
    </category>
    <info format="moodle_auto_format">
      <text>The default category for questions shared in context 'TC1'.</text>
    </info>
    <idnumber></idnumber>
  </question>
<?php
while ($data = mysqli_fetch_array($query))
{   
	?>
	<!-- question: <?php echo $data['id_soal']?>  -->
	  <question type="multichoice">
		<name>
		  <text><?php echo $data['questiontext']?></text>
		</name>
		<questiontext format="moodle_auto_format">
		  <text><![CDATA[<?php echo $data['questiontext']?><br><?php if($data['gambar']=="Y"){?><img src="@@PLUGINFILE@@/<?php echo $data['id_soal']?>.png" alt="" width="200" height="200" class="img-fluid atto_image_button_text-bottom"><?php } ?>]]></text>
<file name="<?php echo $data['id_soal']?>.png" path="/" encoding="base64"><?php echo $data['gambarsoal']?></file>
		</questiontext>
		<generalfeedback format="moodle_auto_format">
		  <text></text>
		</generalfeedback>
		<defaultgrade>1.0000000</defaultgrade>
		<penalty>0.3333333</penalty>
		<hidden>0</hidden>
		<idnumber></idnumber>
		<single>true</single>
		<shuffleanswers>true</shuffleanswers>
		<answernumbering>abc</answernumbering>
		<showstandardinstruction>0</showstandardinstruction>
		<correctfeedback format="moodle_auto_format">
		  <text></text>
		</correctfeedback>
		<partiallycorrectfeedback format="moodle_auto_format">
		  <text></text>
		</partiallycorrectfeedback>
		<incorrectfeedback format="moodle_auto_format">
		  <text></text>
		</incorrectfeedback>
		<?php if($data['Answer_1']=="A"){?><answer fraction="100" format="html"><?php }else { ?><answer fraction="0" format="html"><?php } ?>
		  <text><![CDATA[<?php echo $data['A']?><br><?php if($data['ga']=="Y"){?><img src="@@PLUGINFILE@@/<?php echo $data['id_soal']?>.png" alt="" width="200" height="200" class="img-fluid atto_image_button_text-bottom"><?php } ?>]]></text>
<file name="<?php echo $data['id_soal']?>.png" path="/" encoding="base64"><?php echo $data['gambara']?></file>
		  <feedback format="html">
			<text></text>
		  </feedback>
		</answer>
		<?php if($data['Answer_1']=="B"){?><answer fraction="100" format="html"><?php }else { ?><answer fraction="0" format="html"><?php } ?>
		  <text><![CDATA[<?php echo $data['B']?><br><?php if($data['gb']=="Y"){?><img src="@@PLUGINFILE@@/<?php echo $data['id_soal']?>.png" alt="" width="200" height="200" class="img-fluid atto_image_button_text-bottom"><?php } ?>]]></text>
<file name="<?php echo $data['id_soal']?>.png" path="/" encoding="base64"><?php echo $data['gambarb']?></file>
		  <feedback format="html">
			<text></text>
		  </feedback>
		</answer>
		<?php if($data['Answer_1']=="C"){?><answer fraction="100" format="html"><?php }else { ?><answer fraction="0" format="html"><?php } ?>
		  <text><![CDATA[<?php echo $data['C']?><br><?php if($data['gc']=="Y"){?><img src="@@PLUGINFILE@@/<?php echo $data['id_soal']?>.png" alt="" width="200" height="200" class="img-fluid atto_image_button_text-bottom"><?php } ?>]]></text>
<file name="<?php echo $data['id_soal']?>.png" path="/" encoding="base64"><?php echo $data['gambarc']?></file>
		  <feedback format="html">
			<text></text>
		  </feedback>
		</answer>
		<?php if($data['Answer_1']=="D"){?><answer fraction="100" format="html"><?php }else { ?><answer fraction="0" format="html"><?php } ?>
		  <text><![CDATA[<?php echo $data['D']?><br><?php if($data['gd']=="Y"){?><img src="@@PLUGINFILE@@/<?php echo $data['id_soal']?>.png" alt="" width="200" height="200" class="img-fluid atto_image_button_text-bottom"><?php } ?>]]></text>
<file name="<?php echo $data['id_soal']?>.png" path="/" encoding="base64"><?php echo $data['gambard']?></file>
		  <feedback format="html">
			<text></text>
		  </feedback>
		</answer>
	  </question>
<?php
}
?>
</quiz>