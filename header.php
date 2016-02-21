<!DOCTYPE html>
<?php 
    include('db/user.php');

    if(!empty($_POST['loginsubmit'])){
        $user = new User;
        $password = trim($_POST['passwordlogin']);
                    $user->password = ($password);
                    $user->name = trim($_POST['usernamelogin']);
        $user->login();
        }
?>

<html>
	<head>
		<meta charset=utf-8>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/gif" href="images/favIcon.gif">
		<title>DogeBook</title>
	</head>
<body>
    <div id="header">
    	<div id="logo">
        	<a href="index.php">
            	<p>DogeBook</p>
        	</a>
        </div>
        
        
        
		<div class="login">
                    <form method="post">
			<label for="usernamelogin">Username:</label><input id="username" type="text" name="usernamelogin" size="15" maxlength="30" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
			<label for="passwordlogin">Password:</label><input id="password" type="password" name="passwordlogin" size="15" maxlength="15" value="" >
				<div id="login-button">
					<button id="login" type="submit" name="loginsubmit" value="Log in">Log in</button>
				</div>
                    </form>
		</div>
	</div>


	