<?php 
	session_start();
	include 'includes/header.php';
	
?>
<div class="container p-3">
	<div class="card">
		<div class="card-header">
			<h3 class="p-2 h3-responsive">Login here!</h3>
		</div>
		<form action="" method="post">
			<div class="card-body">
				<div class="md-form form-sm">
					<input type="text" id="email" class="form-control form-control-sm" name="email" required>
					<label for="email">Email</label>
				</div>
				<div class="md-form form-sm">
					<input type="password" id="password" class="form-control form-control-sm" name="password" required>
					<label for="password">Password</label>
				</div>
				<div class="p-3">
					<div class="float-left">
						<p class="">Forgot your password? <a href="checkout.php?forgot_pass">Click here</a></p>
					</div>
					<div class="float-right">
						<p class="">Don't have an account? <a href="register.php">Register now</a></p>
					</div>
				</div>
			</div>			
			<div class="card-footer">
				<div class="float-right">
					<button type="submit" name="login" class="btn btn-black" style="border-radius: 10em;background: #1c2a48">Login</button>
				</div>
			</div>
		</form>
		<?php 
			if(isset($_POST['login'])){
				$email = $_POST['email'];
				$password = $_POST['password'];

				$sql = "SELECT * FROM ngo WHERE password = '$password' AND email = '$email'";
				$runSql = $db->query($sql);
				$check_user = mysqli_num_rows($runSql);
				if($check_user == 0){
					echo "<script>alert('Your password or email is incorrect, please try again!')</script>";
					exit();
				}
				$ip = getIp();				
				if($check_user > 0){
					$_SESSION['email'] = $email;
					echo "<script>alert('You logged in successfully!')</script>";
					echo "<script>window.open('myaccount.php','_self')</script>";
				}else{
					$_SESSION['email'] = $email;
					echo "<script>alert('You logged in successfully!')</script>";
					echo "<script>window.open('myaccount.php','_self')</script>";
				}
			}
		?>
	</div>
</div>

<?php
	include 'includes/footer.php';
?>

