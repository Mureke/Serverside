<!DOCTYPE html>

<?php 
session_start();
include('db/user.php');
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
    
                    
                    <div id="login-button">
                    <button id="logout" type="submit" name="logoutsubmit" value="Logout">Log out</button>
                </div>
			
                
		</div>
    
	<?php
        //Session testing
        echo "<p class='error' style='color:white;'> Logged in as " . $_SESSION['name'] . ".  Your user ID is: " . $_SESSION['id'] . "</p>"; 
        ?>


	