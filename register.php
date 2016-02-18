<?php include('header.php');?>
<div id="register-doge">
		<form action="register.php" method="post">
				<p><label class="label" for="username">Username:</label><input id="username" type="text" name="username" size="30" maxlength="30" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"></p>
				<p><label class="label" for="email">Email:</label><input id="email" type="text" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
				<p><label class="label" for="password">Password:</label><input id="password" type="password" name="password" size="30" maxlength="15" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" ></p>
				<p><label class="label" for="password2">Confirm Password:</label><input id="password2" type="password" name="password2" size="30" maxlength="15" value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>" ></p>
				<p><input id="submit" type="submit" name="submit" value="Register"></p>
		</form>
	</div>
 <?php include('footer.php'); ?>