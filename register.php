
<?php include('header.php');?>
<?php
    //Make a new instance of user class.
   $user = new User;
   
   //Register validation. Only validate if register form is submitted.
   if(!empty($_POST['registersubmit'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); 
	if (empty($_POST['username'])) {
		$errors[] = 'You forgot to enter your username.';
	} else {
		$user->name = trim($_POST['username']);
	}
	
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
        }
        // Checks if user entered a text in email format 
        elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
            $errors[] = 'Invalid email.';
        }
        
	 else {
		$user->email = trim($_POST['email']);
	}
	
	if (!empty($_POST['password'])) {
		if ($_POST['password'] != $_POST['password2']) {
			$errors[] = 'Your two password did not match.';
		} else {
			$password = trim($_POST['password']);
                        $user->password = md5($password);
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
       
        $namevalidator = $user->checkIfUserExists();
        
        if($namevalidator == 1){
            $errors[] = "User already exists in database";
        }
      
        //create new user if validation is succesfull and there is no errors.
	if (empty($errors)) { 
	echo '<p class="accountCreated">New account created!';
         $user->create();
	
	} else { 
		echo '<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { 
			echo " - $msg<br>\n";
                }
		}
    } 
}
    
?>
<!-- Form for registering new account -->
<div id="register-doge">
		<form action="register.php" method="post">
				<p class="register-input-text"><label class="label" for="username">Username:</label><input id="username" type="text" name="username" size="30" maxlength="30" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"></p>
				<p class="register-input-text"><label class="label" for="email">Email:</label><input id="email" type="text" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
				<p class="register-input-text"><label class="label" for="password">Password:</label><input id="password" type="password" name="password" size="30" maxlength="15" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" ></p>
				<p class="register-input-text"><label class="label" for="password2">Confirm Password:</label><input id="password2" type="password" name="password2" size="30" maxlength="15" value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>" ></p>
                                <p class="register-input-text"><button id="submit" type="submit" name="registersubmit" value="Register">Register</button></p>
		</form>
	</div>
 <?php include('footer.php'); ?>