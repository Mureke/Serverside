<!DOCTYPE html>
<html>
	<head>
		<title>Serverside project</title>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
		<body>
		<?php include("header.php"); ?>
			<div id="container">
				<p><label class="label" for="username">Username:</label><input id="username" type="text" name="username" size="30" maxlength="30" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"></p>
				<p><label class="label" for="password">Password:</label><input id="password" type="password" name="password" size="30" maxlength="15" value="" ></p>
				<p><input id="login" type="submit" name="login" value="Log in">
				<a href="register.php">Create account</a></p>
			</div>
		</body>
</html>