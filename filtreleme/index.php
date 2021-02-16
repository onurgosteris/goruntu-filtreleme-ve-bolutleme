<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<br><br> 
	<?php 
	// dosyayı kayıt ederken türkçe karakter problemine karşı seo fonksiyonunu kullanıyoruz
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
			imagefilter($im, IMG_FILTER_NEGATE);
			$save = "islenenler/negatif-".$dosya_adi;
			imagepng($im, $save);


			?>   
			<label for="negatif">
				<img width="200" id="negatif" src="islenenler/negatif-<?php echo $dosya_adi ?>"> 
				<div class="mask">
					<div align="center">Negatif</div>
				</div>
			</label>
			<?php


			$im = imagecreatefromjpeg("resimler/{$dosya_adi}"); 
			imagefilter($im, IMG_FILTER_GRAYSCALE);
			$save = "islenenler/gri-seviye-".$dosya_adi;
			imagepng($im, $save);

			?>   
			<label for="gri-seviye">
				<img width="200" id="gri-seviye" src="islenenler/gri-seviye-<?php echo $dosya_adi ?>"> 
				<div class="mask">
					<div align="center">Gri Seviye</div>
				</div>
			</label>
			<?php



			$im = imagecreatefromjpeg("resimler/{$dosya_adi}"); 
			imagefilter($im, IMG_FILTER_BRIGHTNESS,100);
			$save = "islenenler/parlaklik-".$dosya_adi;
			imagepng($im, $save);

			?>  
			<label for="parlaklik">
				<img width="200" id="parlaklik" src="islenenler/parlaklik-<?php echo $dosya_adi ?>"> 
				<div class="mask">
					<div align="center">Parlatılmış</div>
				</div>
			</label>
			<?php


			$im = imagecreatefromjpeg("resimler/{$dosya_adi}"); 
			imagefilter($im, IMG_FILTER_CONTRAST,30);
			$save = "islenenler/konstrat-".$dosya_adi;
			imagepng($im, $save);


			?>  
			<label for="konstrat">
				<img width="200" id="konstrat" src="islenenler/konstrat-<?php echo $dosya_adi ?>">  
				<div class="mask">
					<div align="center">Konstrat</div>
				</div> 
			</label><br><br>
			<?php


			$im = imagecreatefromjpeg("resimler/{$dosya_adi}"); 
			imagefilter($im, IMG_FILTER_COLORIZE,55,0,0);
			$save = "islenenler/ozel-".$dosya_adi;
			imagepng($im, $save);


			?>  
			<label for="kirmizi">
				<img width="200" id="kirmizi" src="islenenler/ozel-<?php echo $dosya_adi ?>"> 
				<div class="mask">
					<div align="center">Kırmızı Seviye</div>
				</div>
			</label>
			<?php


			$im = imagecreatefromjpeg("resimler/{$dosya_adi}"); 
			imagefilter($im, IMG_FILTER_COLORIZE,0,55,0);
			$save = "islenenler/ozel2-".$dosya_adi;
			imagepng($im, $save);


			?>  
			<label for="yesil">
				<img width="200" id="yesil" src="islenenler/ozel2-<?php echo $dosya_adi ?>"> 
				<div class="mask">
					<div align="center">Yeşil Seviye</div>
				</div>
			</label>
			<?php

 
			$im = imagecreatefromjpeg("resimler/{$dosya_adi}"); 
			imagefilter($im, IMG_FILTER_COLORIZE,0,0,55);
			$save = "islenenler/ozel3-".$dosya_adi;
			imagepng($im, $save);


			?>  
			<label for="mavi">
				<img width="200" id="mavi" src="islenenler/ozel3-<?php echo $dosya_adi ?>"> 
				<div class="mask">
					<div align="center">Mavi Seviye</div>
				</div>
			</label>
			<?php 

			$im = imagecreatefromjpeg("resimler/{$dosya_adi}"); 
			$box_blur = array([1, 1, 1], [1, 1, 1], [1, 1, 1]);
			imageconvolution($im, $box_blur, 9, 0);
			$save = "islenenler/ortanca-filtresi-".$dosya_adi;
			imagepng($im, $save);


			?>  
			<label for="yesil">
				<img width="200" id="yesil" src="islenenler/ortanca-filtresi-<?php echo $dosya_adi ?>"> 
				<div class="mask">
					<div align="center">3x3 Ortanca Filtresi</div>
				</div>
			</label> 
			<br><br>
			<a href=""><button class="btn btn-outline-success">Başka Bir Resim Filtrele</button></a>
			<a href="ozel.php"><button class="btn btn-outline-success">Özel Ton Girerek Filtrele</button></a>
		</div>
		<?php


	}else{ ?>

	<div align="center">
		<form method="POST" action="" enctype="multipart/form-data"> 
			<div class="form-group">
				<div class="col-md-4 m-auto">
					<label>Filtrelemek İstediğiniz Fotoğrafı Yükleyin.(Jpeg)</label><br><br>
					<input class="form-control" type="file" required="" name="resim"><br><br>
				</div>
			</div> 
			<div class="form-group">
				<div class="col-md-4 m-auto">
					<input type="submit" name="isle" class="btn btn-outline-success" value="Filtrele"> 
				</div>
			</div>
		</form>
	</div>
	
	<?php } ?> 
</body>
</html>