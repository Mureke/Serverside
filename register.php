<?php require('db/user.php'); ?>
<?php include('header.php');?>
<?php
   if(!empty($_POST)){
    $name = $_POST['username'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    
    $user = new User;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Initialize an error array.
	// Check for a first name:
	if (empty($_POST['username'])) {
		$errors[] = 'You forgot to enter your username.';
	} else {
		$user->name = trim($_POST['username']);
	}
	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$user->email = trim($_POST['email']);
	}
	// Check for a password and match against the confirmed password:
	if (!empty($_POST['password'])) {
		if ($_POST['password'] != $_POST['password2']) {
			$errors[] = 'Your two password did not match.';
		} else {
			$user->password = trim($_POST['password']);
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
       
        $namevalidator = $user->checkIfUserExists();
        
        if($namevalidator == 1){
            $errors[] = "User already exists in database";
        }
      
	if (empty($errors)) { // If everything's OK.
	// Inform that all values are OK
	echo '<p class="accountCreated">New account created!';
         $user->create();
	
	} else { // Report the errors.
		echo '<h2>Error!</h2>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
                }
		}// End of if (empty($errors)) IF.
} // End of the main Submit conditional.
    
   
    }
?>

<div id="register-doge">
		<form action="register.php" method="post">
				<p class="register-input-text"><label class="label" for="username">Username:</label><input id="username" type="text" name="username" size="30" maxlength="30" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"></p>
				<p class="register-input-text"><label class="label" for="email">Email:</label><input id="email" type="text" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
				<p class="register-input-text"><label class="label" for="password">Password:</label><input id="password" type="password" name="password" size="30" maxlength="15" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" ></p>
				<p class="register-input-text"><label class="label" for="password2">Confirm Password:</label><input id="password2" type="password" name="password2" size="30" maxlength="15" value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>" ></p>
                                <p class="register-input-text"><button id="submit" type="submit" name="submit" value="Register">Register</button></p>
		</form>
	</div>
 <?php include('footer.php'); ?>