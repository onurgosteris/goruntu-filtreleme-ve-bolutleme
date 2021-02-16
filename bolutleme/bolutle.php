<?php 

function bolutle($dosya_adi,$oran){ 
	$im = imagecreatefromjpeg("resimler/{$dosya_adi}");
	$x = imagesx($im);
	$y = imagesy($im);
	// RGB renk kodlarıyla
	// Siyah ve beyaz renkleri değişkene atıyoruz
	$siyah = imagecolorallocate($im, 0, 0,0); 
	$beyaz = imagecolorallocate($im, 255, 255,255);
 
 	// Daha iyi sonuç almak için 3x3 luk ortalama filtresiyle resmi bulanıklaştırıyoruz
	// Ortalama filtresi ile bulanıklaştırıyoruz. 
	$box_blur = array([1, 1, 1], [1, 1, 1], [1, 1, 1]);
	imageconvolution($im, $box_blur, 9, 0);

	$ortalama_1 = $oran;

	for ($i=0; $i <= $x; $i++) { 
		for ($j=0; $j <= $y ; $j++) { 
			// Resimi matris gibi düşüyoruz
			// Her pixeli sırayla geziyoruz
			// Matriste üzerinde durduğumuz pixelin RGB değerinin ortalaması
			// İnput olarak girdiğimiz sayıdan küçük ise 
			// Pixeli siyah renge boyuyoruz
			// Değil ise beyaz renge boyuyoruz
			$rgb = imagecolorat($im, $i, $j);
			$r = ($rgb >> 16) & 0xFF;
			$g = ($rgb >> 8) & 0xFF;
			$b = $rgb & 0xFF; 
			$anlik_pixelin_ortalamasi = ($r+$g+$b)/3;
			// Eşik değeri kontrolunu yapıp pixeli ona göre işaretliyoruz
			if ($anlik_pixelin_ortalamasi<$ortalama_1) {
				imagesetpixel($im, $i, $j, $siyah);
			}else{
				imagesetpixel($im, $i, $j, $beyaz);
			} 
		}
	} 
	$save = "islenenler/".$dosya_adi;
	imagepng($im, $save);
} 

?>