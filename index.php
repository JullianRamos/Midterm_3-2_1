<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			height: 100vh; /* Full viewport height */
			margin: 0;
			background-color: #f4f4f4; /* Optional: Light background color */
		}

		h1, h2 {
			text-align: center;
		}

		form {
			text-align: center; /* Center form elements */
		}
	</style>
</head>
<body>
	<?php session_start(); ?>

	<h1>Fill in the input fields below</h1>
	
	<h2>
		User logged in:
		<?php
		if (isset($_SESSION['firstName'])) {
			echo $_SESSION['firstName'];
		} else {
			echo "No user logged in.";
		}
		?>		
	</h2>

	<h2>
		User password:
		<?php
		if (isset($_SESSION['password'])) {
			echo $_SESSION['password'];
		} else {
			echo "No password stored.";
		}
		?>		
	</h2>
	<a href="unset.php">Logout</a>

	<!-- Display error message if it exists -->
	<?php 
	if (isset($_SESSION['error_message'])) {
		echo "<p style='color: red; text-align: center;'>" . $_SESSION['error_message'] . "</p>";
		unset($_SESSION['error_message']); // Clear the message after displaying it
	}
	?>

	<form action="handleForm.php" method="POST">
		<p><input type="text" placeholder="First name here" name="firstName"></p>
		<p><input type="password" placeholder="Password here" name="password"></p>
		<p><input type="submit" value="Submit" name="submitBtn"></p>
	</form>
</body>
</html>