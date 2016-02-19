<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>DogeBook</title>
	</head>
<body>
    <div id="header">
		<p>DogeBook</p>
		<div class="login">
			<label for="username">Username:</label><input id="username" type="text" name="username" size="15" maxlength="30" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
			<label for="password">Password:</label><input id="password" type="password" name="password" size="15" maxlength="15" value="" >
				<div id="login-button">
					<button id="login" type="submit" name="login" value="Log in">Log in</button>
				</div>
		</div>
	</div>


	