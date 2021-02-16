<?php
ini_set('max_execution_time', 300);  
set_time_limit(300);
require_once 'seo.php';
require_once 'bolutle.php'; 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Görüntü İşleme</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<br><br><br>
	<?php 

	if (isset($_POST['isle'])) { 


		$arr = explode(".", $_FILES['resim']['name']);

		$dosya_adi = $arr[0];

		$_FILES['resim']['name'] = seo($dosya_adi).".jpg";

		move_uploaded_file($_FILES['resim']['tmp_name'],"./resimler/{$_FILES['resim']['name']}");

		bolutle($_FILES['resim']['name'],$_POST['oran']);
		?>
		<div align="center">
			<div style="
			width: 500px;
			height: 40vh; 
			border-radius: 15px;
			box-shadow: inset 0 3px 6px rgba(0,0,0,0.16), 0 9px 9px rgba(0,0,0,0.45); 

			">
			<img width="320" src="islenenler/<?php echo $_FILES['resim']['name'] ?>">
		</div>
		<br><br><br><br>
		<a href=""><button class="btn btn-outline-success">Başka Resim Bölütle</button></a>
	</div>


	<?php
}

if (empty($_POST)) { ?> 
<div align="center">
	<form method="POST" action="" enctype="multipart/form-data"> 
		<div class="form-group">
			<div class="col-md-4 m-auto">
				<input type="file" required="" name="resim"><br><br>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 m-auto">
				<input style="width: 200px;" type="number" required="" min="0" max="255" name="oran" placeholder="Eşik Sınırı"><br><br>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 m-auto">
				<input type="submit" name="isle" value="Bölütle">
			</div>
		</div>
	</form>
</div> 
<?php } ?>


</body>
</html>