<!DOCTYPE html>
<html>
<head>
	<title>Management - Login</title>
	<!-- Bootstrap 5 CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-cjQrmvGB+whwTW8SgnPWkGjDlk+ogf9WgB8jKDXljh21DjOtr7goW32q3ZtLjO+vBhSKR9LYGRt+ZXKjvv7+pA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}
	</style>
    <link rel="apple-touch-icon" href="assets/images/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/shoe-favicon.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="../assets/css/index.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">   
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<form action="includes/sessions/manager-login.php" method="post" class="border p-5 rounded">
                    <div class="mb-3">
                        <h4 class="text-center">Write your credentials!</h4>
                        <hr>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="manager-username" name="manager-username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="manager-password" name="manager-password">
                    </div>
                    <p class="text-danger">
                        <?php
                            if(isset($_GET['error'])){
                                echo $_GET['error'];
                            }
                        ?>
                    </p>
                    <button type="submit" class="btn btn-success">Log In</button>
                </form>
			</div>
		</div>
	</div>

</body>
</html>