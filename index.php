<!DOCTYPE html>
<html>
<head>
	<title>Görüntü Filtreleme Ve Bölütleme</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  
	<div class="container">
		<div class="split left">
			<h1>Görüntü Filtrele</h1>
			<a href="filtreleme/" class="button">FİLTRELE</a>
		</div>
		<div class="split right">
			<h1>Görüntü Bölütle</h1>
			<a href="bolutleme/" class="button">BÖLÜTLE</a>
		</div>
	</div>

 
	<script type="text/javascript">
		const left = document.querySelector(".left");
		const right = document.querySelector(".right");
		const container = document.querySelector(".container");

		left.addEventListener("mouseenter", () => {
			container.classList.add("hover-left");
		});

		left.addEventListener("mouseleave", () => {
			container.classList.remove("hover-left");
		});

		right.addEventListener("mouseenter", () => {
			container.classList.add("hover-right");
		});

		right.addEventListener("mouseleave", () => {
			container.classList.remove("hover-right");
		});

	</script>
</body>
</html>