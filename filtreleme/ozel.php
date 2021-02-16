<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<br><br><br><br> 
	<?php 
	require_once 'seo.php';

	if (isset($_POST['isle'])) {

		?> 
		<div align="center">  
			<?php 
			$arr = explode(".", $_FILES['resim']['name']);

			$dosya_adi = $arr[0];

			$dosya_adi = seo($dosya_adi).".jpg";

			move_uploaded_file($_FILES['resim']['tmp_name'],"./resimler/{$dosya_adi}");

			$im = imagecreatefromjpeg("resimler/{$dosya_adi}"); 
			// gelen değerlere göre filtrele
			$kirmizi = $_POST['kirmizi'];
			$mavi = $_POST['mavi'];
			$yesil = $_POST['yesil']; 
			imagefilter($im, IMG_FILTER_COLORIZE,$kirmizi,$yesil,$mavi);
			$save = "islenenler/ozel-input-renk-".$dosya_adi;
			imagepng($im, $save);


			?>
			<img width="400" src="islenenler/ozel-input-renk-<?php echo $dosya_adi ?>">   <br><br><br>
			<a href=""><button class="btn btn-outline-success">Başka Bir Resim Filtrele</button></a> 
		</div>
		<?php


	}else{ ?>

	<div align="center">
		<form method="POST" action="" enctype="multipart/form-data"> 
			<div class="form-group">
				<div class="col-md-4 m-auto">
					<input class="form-control" type="file" required="" name="resim">
				</div>
			</div> 
			<div class="form-group">
				<div class="col-md-4 m-auto">
					<input type="number" class="form-control" required="" min="0" max="255" name="mavi" placeholder="Mavi Renk Baskınlığı">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 m-auto">
					<input type="number" class="form-control" required="" min="0" max="255" name="kirmizi" placeholder="Kırmızı Renk Baskınlığı">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 m-auto">
					<input type="number" class="form-control" required="" min="0" max="255" name="yesil" placeholder="Yeşil Renk Baskınlığı">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 m-auto">
					<input type="submit" name="isle" class="btn btn-outline-success" value="Filtrele"> 
				</div>
			</div>
		</form>
	</div>
	
	<?php }



	?>












</body>
</html>