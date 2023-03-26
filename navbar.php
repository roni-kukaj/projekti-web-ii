<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <script src="https://kit.fontawesome.com/26e97bbe8d.js" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar">
		<div class="navbar-content">
			<a href="index.html">
				LOGO
			</a>
			<div class="middle">
				<a href="#" class="link">Home</a>
				<a href="#" class="link">Shop</a>
				<a href="#" class="link">Categories</a>
			</div>
			<div class="right">
				<a href="#" class="link">Sign In</a>
				<a href="#" class="link" id="cart"><i class="fa fa-shopping-cart" style="font-size:22px"></i></a>
			</div>
			<i class="fa-solid fa-bars-staggered" id="burger-menu"></i>
		</div>
	</nav>

    <script>
        $(document).ready(() => {
	// Navbar links dropdown
	$("#burger-menu").click(() => {
		$(".middle").toggle();
		$(".right").toggle();
	});
});
    </script>
</body>
</html>